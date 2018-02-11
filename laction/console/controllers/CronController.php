<?php
namespace console\controllers;

use yii\console\Controller;
use console\models\Sms;
use common\components\SMSComponent;
use Yii;

class CronController extends Controller
{

    public function actionSms()
    {
        $arrResponse = [];
        $arrSmsAuth = Yii::$app->params['sms'];
        print_r($arrSmsAuth);
        die();
        $arrSmses = Sms::getSms([
            'status' => 'notsend'
        ]);
        
        // $this->strAuthKey = $arrSmsData['key'];
        // $this->strSender = $arrSmsData['sender'];
        // $this->intRoute = $arrSmsData['route'];
        // $this->strSecureURL = $arrSmsData['url'];
        // $this->phone = $arrSmsData['phone'];
        // $this->message = $arrSmsData['message'];
        if (! empty($arrSmses)) {
            foreach ($arrSmses as $arrSms) {
                
                $objSmsComponent = new SMSComponent($arrSmsData);
                $strConfirmationToken = $objSmsComponent->fireSMS();
            }
        }
    }

    public function actionEmail()
    {
        echo 'test the yyyy';
        echo 'test the mmmm';
    }
}