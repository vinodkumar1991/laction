<?php
namespace app\modules\users\controllers;

use yii\web\Controller;
use Yii;
use backend\controllers\GoController;
use backend\modules\users\models\Roles;
use backend\modules\users\models\Permissions;
use backend\modules\users\models\RolePermissions;
use backend\modules\users\models\Users;
use backend\modules\users\models\Token;
use common\components\CommonComponent;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use backend\modules\users\models\Login;
use yii\web\Session;

class UsersController extends GoController
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionLogin()
    {
        $arrInputs = Yii::$app->request->post();
        // $arrInputs = [
        // 'phone' => '1234567890',
        // 'password' => '12345',
        // 'do_login' => 'Login'
        // ];
        $arrResponse = isset($arrInputs['do_login']) ? $this->validateCredentials($arrInputs) : [];
        if (isset($arrResponse['user'])) {
            $this->setSession($arrResponse['user']);
            $this->redirect(Yii::getAlias('@web') . '/dashboard');
        }
        return $this->render('/users/Login', [
            'errors' => isset($arrResponse['errors']) ? $arrResponse['errors'] : [],
            'fields' => isset($arrResponse['fields']) ? $arrResponse['fields'] : []
        ]);
    }

    private function validateCredentials($arrInputs)
    {
        $arrResponse = [];
        $objLogin = new Login();
        $objLogin->scenario = 'login';
        $objLogin->attributes = $arrInputs;
        if ($objLogin->validate()) {
            $arrValidatedInputs = $objLogin->getAttributes();
            $arrUser = Users::getUsers([
                'phone' => $arrValidatedInputs['phone']
            ]);
            $arrUser = isset($arrUser[0]) ? $arrUser[0] : [];
            if (! empty($arrUser)) {
                // Validate Password
                if (Yii::$app->getSecurity()->validatePassword($arrValidatedInputs['password'], $arrUser['password'])) {
                    $arrResponse['user'] = $arrUser;
                } else {
                    $arrResponse['errors']['password'] = 'Invalid Password';
                }
            } else {
                $arrResponse['errors']['phone'] = 'Invalid Phone';
            }
            unset($arrUser, $arrInputs);
        } else {
            $arrResponse['errors'] = $objLogin->errors;
            $arrResponse['fields'] = $objLogin->getAttributes();
        }
        return $arrResponse;
    }

    private function setSession($arrUser)
    {
        $objSession = Yii::$app->session;
        $arrSessionData = [
            'fullname' => $arrUser['fullname'],
            'role_id' => $arrUser['role_id'],
            'role_name' => $arrUser['role_name'],
            'email' => $arrUser['email'],
            'phone' => $arrUser['phone'],
            'image' => $arrUser['image']
        ];
        $objSession['session_data'] = $arrSessionData;
        unset($arrUser, $arrSessionData);
        return true;
    }

    public function actionLogout()
    {
        $objSession = Yii::$app->session;
        $objSession->remove('session_data');
        $this->redirect(Yii::getAlias('@web') . '/login');
    }

    public function actionCreateRolePermissions()
    {
        $arrErrors = $arrResponse = [];
        $arrRoles = Roles::getRoles([
            'role_ids' => [
                1
            ]
        ]);
        $arrPermissions = Permissions::getPermissions();
        $arrInputs = Yii::$app->request->post();
        $arrResponse = isset($arrInputs['create_role_permission']) ? $this->saveRolePermissions($arrInputs) : [];
        return $this->render('/users/CreateRolePermission', [
            'roles' => $arrRoles,
            'permissions' => $arrPermissions,
            'errors' => isset($arrResponse['errors']) ? $arrResponse['errors'] : [],
            'fields' => isset($arrResponse['fields']) ? $arrResponse['fields'] : []
        ]);
    }

    private function saveRolePermissions($arrInputs)
    {
        $arrResponse = [];
        $objRolePermissions = new RolePermissions();
        $objRolePermissions->attributes = $arrInputs;
        if ($objRolePermissions->validate()) {
            $arrValidatedInputs = $objRolePermissions->getAttributes();
            $arrPermissions = $arrValidatedInputs['permission'];
            $arrRecord = [];
            $arrDefaults = $objRolePermissions->getDefaults();
            foreach ($arrPermissions as $strKey => $strValue) {
                $arrRecord = [
                    'role' => $arrValidatedInputs['role'],
                    'permission' => $strKey,
                    'status' => $arrValidatedInputs['status']
                ];
                $arrRecord = array_merge($arrRecord, $arrDefaults);
                $arrResponse['new'][] = $arrRecord;
            }
        } else {
            $arrResponse['errors'] = $objRolePermissions->errors;
            $arrResponse['fields'] = $objRolePermissions->getAttributes();
        }
        $intInsert = ! isset($arrResponse['errors']) ? $objRolePermissions->create($arrResponse['new']) : 0;
        $arrResponse['inserted_count'] = $intInsert;
        unset($arrInputs, $intInsert);
        return $arrResponse;
    }

    public function actionCreateUser()
    {
        $arrResponse = [];
        $arrRoles = Roles::find()->select([
            'id',
            'name'
        ])
            ->asArray()
            ->all();
        $arrRoles = ArrayHelper::map($arrRoles, 'id', 'name');
        $arrInputs = Yii::$app->request->post();
        $arrResponse = isset($arrInputs['create_user']) ? $this->saveUser($arrInputs) : [];
        isset($arrResponse['user_id']) ? Yii::$app->session->setFlash('user_success', 'User created Successfully.') : NULL;
        return $this->render('/users/User', [
            'roles' => $arrRoles,
            'errors' => isset($arrResponse['errors']) ? $arrResponse['errors'] : NULL,
            'fields' => isset($arrResponse['fields']) ? $arrResponse['fields'] : NULL
        ]);
    }

    private function saveUser($arrInputs)
    {
        $arrResponse = [];
        $objUsers = new Users();
        $arrDefaults = $objUsers->getDefaults();
        $arrInputs = array_merge($arrInputs, $arrDefaults);
        $arrRoleData = explode('-', $arrInputs['role_id']);
        $arrInputs['role_id'] = $arrRoleData[0];
        $arrInputs['role_name'] = isset($arrRoleData[1]) ? $arrRoleData[1] : NULL;
        $objUsers->attributes = $arrInputs;
        if ($objUsers->validate()) {
            $objUsers->save();
            $arrResponse['user_id'] = $objUsers->id;
        } else {
            $arrResponse['errors'] = $objUsers->errors;
            $arrResponse['fields'] = $objUsers->getAttributes();
        }
        unset($arrInputs, $arrDefaults);
        return $arrResponse;
    }

    public function actionResetPassword()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        
        return $this->render('/ResetPassword', [
            'errors' => isset($arrResponse['errors']) ? $arrResponse['errors'] : []
        ]);
    }

    public function actionGenerateOtp()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        $arrInputs = [
            'phone' => '9502038283'
        ];
        if (! empty($arrInputs)) {
            $arrUser = Users::getUsers([
                'phone' => $arrInputs['phone'],
                'status' => 'active'
            ]);
            $arrResponse = ! empty($arrUser) ? $this->sendToken($arrUser[0]) : 'Invalid Username';
            print_r($arrResponse);
            die();
            unset($arrInputs, $arrUser);
        }
        echo Json::encode($arrResponse);
    }

    private function sendToken($arrInputs)
    {
        $arrResponse = [];
        $objToken = new Token();
        $arrInputs['category_type'] = 'forgotpassword';
        $arrInputs['token'] = CommonComponent::getNumberToken();
        $arrDefaults = $objToken->getDefaults();
        $arrInputs = array_merge($arrInputs, $arrDefaults);
        $objToken->attributes = $arrInputs;
        if ($objToken->validate()) {
            $objToken->save();
            $arrResponse['token_id'] = $objToken->id;
            // Need To Insert Data Into SMS Table
            // Need To Insert Data Into Email Table
            // Need To Run Cron Job
        } else {
            $arrResponse['errors'] = $objToken->errors;
        }
        unset($arrInputs, $arrDefaults);
        return $arrResponse;
    }

    public function actionRoles()
    {
        $arrRoles = Roles::getRoles();
        return $this->render('/users/Roles', [
            'roles' => $arrRoles
        ]);
    }

    public function actionPermissions()
    {
        $arrPermissions = Permissions::getPermissions();
        return $this->render('/users/Permissions', [
            'permissions' => $arrPermissions
        ]);
    }

    public function actionRolePermissions()
    {
        return $this->render('/users/RolePermission', []);
    }

    public function actionGetRoles()
    {
        $arrRole = [];
        $arrInputs = Yii::$app->request->post();
        if (! empty($arrInputs)) {
            $arrRole = Roles::getRoles($arrInputs)[0];
        }
        unset($arrInputs);
        echo Json::encode($arrRole);
    }

    public function actionUpdateRole()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        $objRole = new Roles();
        $arrDefaults = $objRole->getDefaults();
        $arrInputs = array_merge($arrInputs, $arrDefaults);
        $objRole->attributes = $arrInputs;
        if ($objRole->validate()) {
            $arrValidatedInputs = $objRole->getAttributes();
            Roles::updateRole([
                'name' => $arrValidatedInputs['name']
            ], [
                'id' => $arrValidatedInputs['id']
            ]);
            unset($arrValidatedInputs);
            $arrResponse['message'] = 'Role updated successfully';
        } else {
            $arrResponse['errors'] = $objRole->errors;
        }
        unset($arrInputs, $arrDefaults);
        echo Json::encode($arrResponse);
    }

    public function actionGetPermissions()
    {
        $arrPermission = [];
        $arrInputs = Yii::$app->request->post();
        if (! empty($arrInputs)) {
            $arrPermission = Permissions::getPermissions($arrInputs)[0];
        }
        unset($arrInputs);
        echo Json::encode($arrPermission);
    }

    public function actionUpdatePermission()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        $objPermission = new Permissions();
        $arrDefaults = $objPermission->getDefaults();
        $arrInputs = array_merge($arrInputs, $arrDefaults);
        $objPermission->attributes = $arrInputs;
        if ($objPermission->validate()) {
            $arrValidatedInputs = $objPermission->getAttributes();
            Permissions::updatePermission([
                'name' => $arrValidatedInputs['name']
            ], [
                'id' => $arrValidatedInputs['id']
            ]);
            unset($arrValidatedInputs);
            $arrResponse['message'] = 'Permission updated successfully';
        } else {
            $arrResponse['errors'] = $objPermission->errors;
        }
        unset($arrInputs, $arrDefaults);
        echo Json::encode($arrResponse);
    }
}
