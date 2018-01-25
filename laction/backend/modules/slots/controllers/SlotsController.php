<?php
namespace app\modules\slots\controllers;

use yii\web\Controller;

class SlotsController extends Controller
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionCategories()
    {
        return $this->render('/Categories', []);
    }

    public function actionSubCategories()
    {
        return $this->render('/SubCategories', []);
    }

    public function actionSlots()
    {
        return $this->render('/Slots', []);
    }

    public function actionCreateSlot()
    {
        return $this->render('/CreateSlot', []);
    }
}
