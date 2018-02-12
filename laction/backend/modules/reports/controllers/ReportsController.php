<?php
namespace app\modules\reports\controllers;

use yii\web\Controller;
use backend\modules\reports\models\Customers;
use backend\modules\reports\models\Bookings;

class ReportsController extends Controller
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionCustomers()
    {
        $arrCustomers = Customers::getCustomers();
        return $this->render('/Customers', [
            'customers' => $arrCustomers
        ]);
    }

    public function actionBookings()
    {
        $arrBookings = Bookings::getBookings();
        return $this->render('/Bookings', [
            'bookings' => $arrBookings
        ]);
    }
}
