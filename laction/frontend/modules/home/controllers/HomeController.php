<?php
namespace app\modules\home\controllers;

use Yii;
use frontend\controllers\GoController;
use frontend\modules\home\models\Videos;

class HomeController extends GoController
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionHome()
    {
        $arrVideos = Videos::getVideos([
            'status' => 'active',
            'home' => 'home',
            'limit' => 4
        ]);
        return $this->render('/Home', [
            'home_videos' => $arrVideos
        ]);
    }

    public function actionVideos()
    {
        $arrVideos = Videos::getVideos([
            'status' => 'active'
        ]);
        return $this->render('/Videos', [
            'videos' => $arrVideos
        ]);
    }

    // age
    // city
    // langauges known
    // height
    // category
    public function actionProfiles()
    {
        return $this->render('/Profiles', []);
    }

    public function actionPolicy()
    {
        return $this->render('/Policy', []);
    }

    public function actionTnc()
    {
        return $this->render('/TnC', []);
    }
}
