<?php
namespace app\modules\customers\controllers;

use Yii;
use frontend\controllers\GoController;
use yii\helpers\Json;
use frontend\modules\customers\models\Customers;
use frontend\modules\customers\models\Login;

class CustomersController extends GoController
{

    public function beforeAction($action)
    {
        $objSession = Yii::$app->session;
        if (isset($objSession['customer_data'])) {
            $this->redirect(Yii::getAlias('@fweb') . '/home');
        }
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionLogin()
    {
        return $this->render('/Login', []);
    }

    public function actionRegister()
    {
        $arrInputs = Yii::$app->request->post();
        return $this->render('/Register', []);
    }

    public function actionForgotPassword()
    {
        return $this->render('/ForgotPassword', []);
    }

    public function actionPolicy()
    {
        return $this->render('/Policy', []);
    }

    public function actionContactUs()
    {
        return $this->render('/ContactUs', []);
    }

    public function actionSaveCustomer()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        if (! empty($arrInputs)) {
            $objCustomer = new Customers();
            $arrInputs = array_merge($arrInputs, $objCustomer->getDefaults());
            $arrInputs['password'] = Yii::$app->getSecurity()->generatePasswordHash($arrInputs['password']);
            $objCustomer->attributes = $arrInputs;
            if ($objCustomer->validate()) {
                $objCustomer->save();
                $arrResponse['customer_id'] = $objCustomer->id;
                $arrResponse['message'] = 'Registered Successfully';
            } else {
                $arrResponse['errors'] = $objCustomer->errors;
            }
        }
        echo Json::encode($arrResponse);
    }

    public function actionDoLogin()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        if (! empty($arrInputs)) {
            $objLogin = new Login();
            $objLogin->scenario = 'login';
            $objLogin->attributes = $arrInputs;
            if ($objLogin->validate()) {
                $arrValidatedInputs = $objLogin->getAttributes();
                $arrCustomer = Customers::getCustomer([
                    'phone' => $arrValidatedInputs['phone']
                ]);
                $arrCustomer = isset($arrCustomer[0]) ? $arrCustomer[0] : [];
                if (! empty($arrCustomer)) {
                    if (Yii::$app->getSecurity()->validatePassword($arrValidatedInputs['password'], $arrCustomer['password'])) {
                        $this->setSession($arrCustomer);
                    } else {
                        $arrResponse['errors']['password'] = [
                            'Invalid Password'
                        ];
                    }
                } else {
                    $arrResponse['errors']['password'] = [
                        'Invalid Password'
                    ];
                    $arrResponse['errors']['phone'] = [
                        'Invalid Phone'
                    ];
                }
            } else {
                $arrResponse['errors'] = $objLogin->errors;
            }
        }
        echo Json::encode($arrResponse);
        exit();
    }

    private function setSession($arrCustomer)
    {
        $objSession = Yii::$app->session;
        $arrSessionData = [
            'fullname' => $arrCustomer['fullname'],
            'email' => $arrCustomer['email'],
            'phone' => $arrCustomer['phone'],
            'customer_id' => $arrCustomer['customer_id']
        ];
        $objSession['customer_data'] = $arrSessionData;
        unset($arrUser, $arrSessionData);
        return true;
    }

    public function actionLogout()
    {
        $objSession = Yii::$app->session;
        $objSession->remove('customer_data');
        $this->redirect(Yii::getAlias('@web') . '/login');
    }

    public function actionGenerateOTP()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        if (! empty($arrInputs)) {
            $objCustomer = new Customers();
            $objCustomer->scenario = '';
            $objCustomer->attributes = $arrInputs;
            if($objCustomer->validate()){
                
            }
            
        }
        echo Json::encode($arrResponse);
    }
}
