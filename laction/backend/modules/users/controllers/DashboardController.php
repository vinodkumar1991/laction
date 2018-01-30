<?php
namespace app\modules\users\controllers;

use Yii;
use backend\controllers\GoController;

class DashboardController extends GoController
{

    public function beforeAction($action)
    {
        $objSession = Yii::$app->session;
        if (! isset($objSession['session_data'])) {
            $this->redirect(Yii::getAlias('@web') . '/login');
        }
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionDashboard()
    {
        $strView = null;
        $objSession = Yii::$app->session;
        $arrUser = $objSession['session_data'];
        switch ($arrUser['role_name']) {
            case 'admin':
                $this->admin($arrUser);
                break;
            default:
                $strView = '/dashboard/Superadmin';
        }
        return $this->render($strView, []);
    }
}
