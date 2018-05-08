<?php
namespace app\modules\customers\controllers;

use Yii;
use frontend\controllers\GoController;

class CustomersController extends GoController
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionLogin()
    {
        return $this->render('/Login', []);
    }

    public function actionRegister()
    {
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
    
    public function actionContactUs(){
        return $this->render('/ContactUs', []);
    }
}
