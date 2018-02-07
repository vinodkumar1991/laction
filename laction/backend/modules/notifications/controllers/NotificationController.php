<?php
namespace app\modules\notifications\controllers;

use yii\web\Controller;
use Yii;
use common\components\CommonComponent;
use backend\modules\notifications\models\SenderIds;
use backend\modules\notifications\models\Template;
use yii\helpers\Json;

class NotificationController extends Controller
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

    public function actionCreateSenderId()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        $arrRoutes = CommonComponent::getRoutes();
        $arrInputs['route'] = isset($arrRoutes[$arrInputs['message_type']][$arrInputs['category_type']]) ? $arrRoutes[$arrInputs['message_type']][$arrInputs['category_type']] : NULL;
        $objSenderId = new SenderIds();
        $arrDefaults = isset($arrInputs['id']) ? $objSenderId->getDefaults($arrInputs['id']) : $objSenderId->getDefaults();
        $arrInputs = array_merge($arrInputs, $arrDefaults);
        $objSenderId->attributes = $arrInputs;
        if ($objSenderId->validate()) {
            $arrValidatedInputs = $objSenderId->getAttributes();
            if (! empty($arrValidatedInputs['id'])) {
                unset($arrValidatedInputs['created_date'], $arrValidatedInputs['created_by'], $arrValidatedInputs['last_modified_date']);
                SenderIds::updateSubject($arrValidatedInputs, [
                    'id' => $arrValidatedInputs['id']
                ]);
                $arrResponse['message'] = 'Subject updated successfully';
            } else {
                
                $objSenderId->save();
                $arrResponse['sender_id'] = $objSenderId->id;
                $arrResponse['message'] = 'Subject created successfully';
            }
        } else {
            $arrResponse['errors'] = $objSenderId->errors;
            $arrResponse['fields'] = $objSenderId->getAttributes();
        }
        unset($arrInputs, $arrDefaults);
        echo Json::encode($arrResponse);
    }

    public function actionCreateTemplate()
    {
        $arrResponse = [];
        $arrMessageTypes = CommonComponent::getMessageTypes();
        $arrSubjects = SenderIds::getSenderIds();
        return $this->render('/CreateTemplate', [
            'message_types' => $arrMessageTypes,
            'subjects' => $arrSubjects
        ]);
    }

    public function actionSaveTemplate()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        $objTemplate = new Template();
        $objTemplate->scenario = $arrInputs['message_type'];
        $arrDefaults = $objTemplate->getDefaults();
        $arrInputs = array_merge($arrInputs, $arrDefaults);
        $objTemplate->attributes = $arrInputs;
        if ($objTemplate->validate()) {
            $objTemplate->save();
            $arrResponse['template_id'] = $objTemplate->id;
            $arrResponse['message'] = 'Template Created Successfully';
        } else {
            $arrResponse['errors'] = $objTemplate->errors;
        }
        unset($arrInputs, $arrDefaults);
        echo Json::encode($arrResponse);
    }

    public function actionGetSubjects()
    {
        $arrInputs = Yii::$app->request->post();
        $arrResponse = SenderIds::getSenderIds($arrInputs)[0];
        echo Json::encode($arrResponse);
    }

    public function actionSubjects()
    {
        $arrMessageTypes = CommonComponent::getMessageTypes();
        $arrMessageCategoryTypes = CommonComponent::getMessageCategoryTypes();
        $arrStatuses = CommonComponent::getStatuses();
        $arrSubjects = SenderIds::getSenderIds();
        return $this->render('/SenderId', [
            'subjects' => $arrSubjects,
            'message_types' => $arrMessageTypes,
            'category_types' => $arrMessageCategoryTypes,
            'statuses' => $arrStatuses
        ]);
    }

    public function actionTemplates()
    {
        $arrTemplates = Template::getTemplates();
        return $this->render('/Templates', [
            'templates' => $arrTemplates
        ]);
    }

    public function actionGetTemplate()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        if (! empty($arrInputs)) {
            $arrResponse = Template::getTemplates($arrInputs)[0];
        }
        unset($arrInputs);
        echo Json::encode($arrResponse);
    }
}
