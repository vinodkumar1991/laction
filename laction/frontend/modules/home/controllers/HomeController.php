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
        $arrCategories = Categories::getCategories(['status' => 'active']);
        $arrCustomers = $this->getCustomers();
        return $this->render('/Profiles', ['categories' => $arrCategories, 'customers' => $arrCustomers]);
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

}
