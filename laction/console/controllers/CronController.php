<?php

namespace console\controllers;

use yii\console\Controller;
use console\models\Sms;
use common\components\SMSComponent;
use Yii;
use console\models\SenderIds;
use yii\helpers\Json;
use console\models\Fsms;

//https://code.tutsplus.com/tutorials/how-to-program-with-yii2-running-cron-services--cms-27508
class CronController extends Controller {

    private function prepareData($arrInputs) {
        $arrResponse = [];
        $arrSmsAuth = Yii::$app->params['sms'];
        if (!empty($arrInputs)) {
            $arrTemplateNSubjects = SenderIds::getSenderIds(['code' => $arrInputs['template_code']])[0];
            $arrInputs = array_merge($arrInputs, $arrSmsAuth);
            $arrInputs['params'] = Json::decode($arrInputs['params']);
            $arrInputs = array_merge($arrInputs, [
                'sender' => $arrTemplateNSubjects['subject'],
                'phone' => $arrInputs['mobile_number']
            ]);
            $arrInputs['route'] = $arrTemplateNSubjects['route'];
            $arrInputs['message'] = $this->bind_to_template($arrInputs['params'], $arrTemplateNSubjects['template']);
            unset($arrInputs['customer_id'], $arrInputs['template_code'], $arrInputs['mobile_number'], $arrSmsAuth, $arrTemplateNSubjects, $arrInputs['params']);
            $arrResponse = $arrInputs;
        }
        return $arrResponse;
    }

    private function bind_to_template($arrParams, $strTemplate) {
        return preg_replace_callback('/{{(.+?)}}/', function ($arrMatches) use ($arrParams) {
            return $arrParams[$arrMatches[1]];
        }, $strTemplate);
    }

    public function actionFsms() {
        $arrResponse = [];
        $arrSmses = Fsms::getSms([
                    'status' => 'notsend'
        ]);
        if (!empty($arrSmses)) {
            foreach ($arrSmses as $arrSms) {
                $arrSmsData = [];
                $arrSmsData = $this->prepareData($arrSms);
                $objSmsComponent = new SMSComponent($arrSmsData);
                $strConfirmationToken = $objSmsComponent->fireSMS();
                if (!empty($strConfirmationToken)) {
                    Fsms::updateSms([
                        'confirmation_token' => $strConfirmationToken,
                        'status' => 'sent'
                            ], [
                        'id' => $arrSmsData['id']
                    ]);
                    $arrResponse['success']['id'][] = $arrSmsData['id'];
                } else {
                    $arrResponse['fail']['id'][] = $arrSmsData['id'];
                }
            }
            unset($arrSmses);
        } else {
            $arrResponse['message'] = 'No sms is available to send';
        }
        unset($arrSmses);
        echo Json::encode($arrResponse);
    }

}
