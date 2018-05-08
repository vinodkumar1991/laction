<?php
namespace app\modules\home\controllers;

use Yii;
use frontend\controllers\GoController;

class HomeController extends GoController
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionHome()
    {
        return $this->render('/Home', []);
    }
}
