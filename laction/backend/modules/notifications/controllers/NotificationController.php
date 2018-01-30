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
        $arrInputs = Yii::$app->request->post();
        $arrResponse = ! empty($arrInputs) ? $this->saveTemplate($arrInputs) : [];
        isset($arrResponse['template_id']) ? Yii::$app->session->setFlash('template_success', 'Template created Successfully.') : NULL;
        return $this->render('/CreateTemplate', [
            'message_types' => $arrMessageTypes,
            'errors' => isset($arrResponse['errors']) ? $arrResponse['errors'] : [],
            'fields' => isset($arrResponse['fields']) ? $arrResponse['fields'] : []
        ]);
    }

    private function saveTemplate($arrInputs)
    {
        $arrResponse = [];
        $objTemplate = new Template();
        $arrDefaults = $objTemplate->getDefaults();
        $arrInputs = array_merge($arrInputs, $arrDefaults);
        $objTemplate->attributes = $arrInputs;
        if ($objTemplate->validate()) {
            $objTemplate->save();
            $arrResponse['template_id'] = $objTemplate->id;
        } else {
            $arrResponse['errors'] = $objTemplate->errors;
            $arrResponse['fields'] = $objTemplate->getAttributes();
        }
        unset($arrInputs, $arrDefaults);
        return $arrResponse;
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
        return $this->render('/Templates', []);
    }
}
