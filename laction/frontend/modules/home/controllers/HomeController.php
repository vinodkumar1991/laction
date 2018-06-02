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
        return $this->render('/Home', []);
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

    public function actionProfiles()
    {
        return $this->render('/Profiles', []);
    }
}
