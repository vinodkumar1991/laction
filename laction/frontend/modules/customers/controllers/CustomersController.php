<?php
namespace app\modules\customers\controllers;

use Yii;
use frontend\controllers\GoController;
use yii\helpers\Json;
use frontend\modules\customers\models\Customers;
use frontend\modules\customers\models\Login;
use frontend\modules\customers\models\Token;
use frontend\modules\customers\models\Sms;
use common\components\CommonComponent;

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
            if (! empty($arrInputs['password']) && strlen($arrInputs['password']) >= 6) {
                $arrInputs['password'] = Yii::$app->getSecurity()->generatePasswordHash($arrInputs['password']);
            }
            $objCustomer->attributes = $arrInputs;
            if ($objCustomer->validate()) {
                $arrValidatedInputs = $objCustomer->getAttributes();
                $objCustomer->save();
                $arrResponse['customer_id'] = $arrValidatedInputs['customer_id'] = $objCustomer->id;
                $this->setSession($arrValidatedInputs);
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

    public function actionGenerateOtp()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        if (! empty($arrInputs)) {
            $objLogin = new Login();
            $objLogin->scenario = 'generateotp';
            $objLogin->attributes = $arrInputs;
            if ($objLogin->validate()) {
                $arrCustomer = Customers::getCustomer($arrInputs);
                $arrResponse = $this->sendToken($arrCustomer[0]);
            } else {
                $arrResponse['errors'] = $objLogin->errors;
            }
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
            $arrNotificationCodes = CommonComponent::getNotificationCodes();
            $arrSmsInputs[] = [
                'customer_id' => $arrInputs['customer_id'],
                'template_code' => $arrNotificationCodes['sms']['forgotpwd'],
                'mobile_number' => $arrInputs['phone'],
                'params' => Json::encode([
                    'token' => $arrInputs['token']
                ]),
                'status' => 'notsend',
                'created_date' => date("Y-m-d H:i:s"),
                'created_by' => 1
            ];
            Sms::create($arrSmsInputs);
            $arrResponse['customer_id'] = $arrInputs['customer_id'];
            $arrResponse['token_id'] = $objToken->id;
            $arrResponse['message'] = "OTP has been sent successfully.";
        } else {
            $arrResponse['errors'] = $objToken->errors;
        }
        unset($arrInputs, $arrDefaults);
        return $arrResponse;
    }

    public function actionUpdatePassword()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        if (! empty($arrInputs)) {
            $objLogin = new Login();
            $objLogin->scenario = 'updatepassword';
            $objLogin->attributes = $arrInputs;
            if ($objLogin->validate()) {
                $arrValidatedInputs = $arrInputs;
                $arrValidatedInputs['password'] = Yii::$app->getSecurity()->generatePasswordHash($arrInputs['newpassword']);
                $arrValidatedInputs['last_modified_by'] = $arrValidatedInputs['id'];
                unset($arrValidatedInputs['confirmpassword'], $arrValidatedInputs['newpassword'], $arrValidatedInputs['otp']);
                $arrResponse['is_updated'] = Customers::updateCustomer($arrValidatedInputs, [
                    'id' => $arrValidatedInputs['id']
                ]);
                $arrResponse['message'] = 'Password changed successfully';
                unset($arrValidatedInputs);
            } else {
                $arrResponse['errors'] = $objLogin->errors;
            }
            unset($arrInputs);
        }
        echo Json::encode($arrResponse);
        exit();
    }

    public function actionProfile()
    {
        return $this->render('/Profile', []);
    }

    public function actionSaveQuery()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        if (! empty($arrInputs)) {
            
        }
        echo Json::encode($arrResponse);
    }
}
