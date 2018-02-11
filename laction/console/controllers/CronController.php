<?php
namespace console\controllers;

use yii\console\Controller;
use console\models\Sms;
use common\components\SMSComponent;
use Yii;
use console\models\SenderIds;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

class CronController extends Controller
{

    public function actionSms()
    {
        $arrResponse = [];
        
        $arrSmses = Sms::getSms([
            'status' => 'notsend'
        ]);
        if (! empty($arrSmses)) {
            foreach ($arrSmses as $arrSms) {
                $arrSmsData = [];
                $arrSmsData = $this->prepareData($arrSms);
                $objSmsComponent = new SMSComponent($arrSmsData);
                $strConfirmationToken = $objSmsComponent->fireSMS();
                if (! empty($strConfirmationToken)) {
                    Sms::updateSms([
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
        } else {
            $arrResponse['message'] = 'No sms is available to send';
        }
        unset($arrSmses);
        echo Json::encode($arrResponse);
    }

    private function prepareData($arrInputs)
    {
        $arrResponse = [];
        $arrSmsAuth = Yii::$app->params['sms'];
        $arrSubjects = SenderIds::getSenderIds([
            'status' => 'active'
        ]);
        $arrTemplates = ArrayHelper::map($arrSubjects, 'code', 'template');
        $arrSubjects = ArrayHelper::map($arrSubjects, 'code', 'route');
        if (! empty($arrInputs)) {
            $arrInputs = array_merge($arrInputs, $arrSmsAuth);
            $arrInputs['params'] = Json::decode($arrInputs['params']);
            $arrInputs = array_merge($arrInputs, [
                'sender' => $arrInputs['template_code'],
                'phone' => $arrInputs['mobile_number']
            ]);
            $arrInputs['route'] = $arrSubjects[$arrInputs['sender']];
            $arrInputs['message'] = $this->bind_to_template($arrInputs['params'], $arrTemplates[$arrInputs['sender']]);
            unset($arrInputs['params'], $arrInputs['template_code'], $arrInputs['mobile_number'], $arrInputs['status']);
            $arrResponse = $arrInputs;
        }
        unset($arrInputs, $arrSubjects, $arrTemplates);
        return $arrResponse;
    }

    private function bind_to_template($replacements, $template)
    {
        return preg_replace_callback('/{{(.+?)}}/', function ($matches) use ($replacements) {
            return $replacements[$matches[1]];
        }, $template);
    }
}