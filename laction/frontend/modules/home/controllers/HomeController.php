<?php

namespace app\modules\home\controllers;

use Yii;
use frontend\controllers\GoController;
use frontend\modules\home\models\Videos;
use frontend\modules\booking\models\Categories;
use frontend\modules\customers\models\Customers;

class HomeController extends GoController {

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionHome() {
        $arrVideos = Videos::getVideos([
                    'status' => 'active',
                    'home' => 'home',
                    'limit' => 4
        ]);
        return $this->render('/Home', [
                    'home_videos' => $arrVideos
        ]);
    }

    public function actionVideos() {
        $arrVideos = Videos::getVideos([
                    'status' => 'active'
        ]);
        return $this->render('/Videos', [
                    'videos' => $arrVideos
        ]);
    }

    public function actionProfiles() {
        $arrInputs = Yii::$app->request->get();
        $arrInputs = !empty($arrInputs) ? array_merge(['status' => 'active'], $arrInputs) : $arrInputs;
        $arrCategories = Categories::getCategories($arrInputs);
        $arrCustomers = $this->getCustomers($arrInputs);
        return $this->render('/Profiles', ['categories' => $arrCategories, 'customers' => $arrCustomers, 'inputs' => $arrInputs]);
    }

    public function actionPolicy() {
        return $this->render('/Policy', []);
    }

    public function actionTnc() {
        return $this->render('/TnC', []);
    }

    public function getCustomers($arrInputs = []) {
        $arrCustomers = [];
        $arrCustomers = Customers::getCustomer($arrInputs);
        unset($arrInputs);
        return $arrCustomers;
    }

    public function actionProfileDetails() {
        $arrInputs = Yii::$app->request->get();
        $arrCustomers = Customers::getCustomer($arrInputs)[0];
        return $this->render('/Profile_Details', ['customers' => $arrCustomers]);
    }

}
