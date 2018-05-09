<?php
namespace app\modules\booking\controllers;

use Yii;
use frontend\controllers\GoController;

class BookingController extends GoController
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
