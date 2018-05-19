<?php
namespace app\modules\booking\controllers;

use Yii;
use frontend\controllers\GoController;
use common\components\CommonComponent;
use frontend\modules\booking\models\Categories;
use frontend\modules\booking\models\SubCategories;
use frontend\modules\booking\models\Slots;
use yii\helpers\Json;
use frontend\modules\booking\models\Booking;

class BookingController extends GoController
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionHome()
    {
        $arrFilmTypes = CommonComponent::getFilmTypes();
        $arrGender = CommonComponent::getGenders();
        $arrCategories = Categories::getCategories();
        $arrCensored = CommonComponent::censored();
        return $this->render('/Home', [
            'film_types' => $arrFilmTypes,
            'genders' => $arrGender,
            'categories' => $arrCategories,
            'censored' => $arrCensored
        ]);
    }

    public function actionSubCategories()
    {
        $strResponse = '<option vlaue="">--Select Subcategory--</option>';
        $arrInputs = Yii::$app->request->post();
        if (! empty($arrInputs)) {
            $arrSubCategories = SubCategories::getSubCategories($arrInputs);
            if (! empty($arrSubCategories)) {
                foreach ($arrSubCategories as $arrSubCategory) {
                    $strResponse .= '<option value="' . $arrSubCategory['sub_category_id'] . '">' . $arrSubCategory['name'] . '</option>';
                }
                unset($arrSubCategories);
            }
        }
        echo $strResponse;
    }

    public function actionSlots()
    {
        $strResponse = '--Select Slots--';
        $arrInputs = Yii::$app->request->post();
        if (! empty($arrInputs)) {
            $arrDate = explode('-', $arrInputs['event_date']);
            $arrInputs['event_date'] = $arrDate['2'] . '-' . $arrDate[1] . '-' . $arrDate[0];
            $arrSlots = Slots::getSlots($arrInputs);
            if (! empty($arrSlots)) {
                foreach ($arrSlots as $arrSlot) {
                    $strResponse .= '<option value="' . $arrSlot['from_time'] . '-' . $arrSlot['to_time'] . '-' . $arrSlot['slot_amount'] . '">' . $arrSlot['slot_start_time'] . ' To ' . $arrSlot['slot_end_time'] . '</option>';
                }
                unset($arrInputs, $arrSlots);
            }
        }
        echo $strResponse;
    }

    public function actionBookPreview()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        if (! empty($arrInputs)) {
            $ObjBooking = new Booking();
            $ObjBooking->scenario = 'preview';
            $arrInputs['booking_no'] = CommonComponent::getNumberToken(6);
            $arrInputs = array_merge($arrInputs, $ObjBooking->getDefaults());
            $ObjBooking->attributes = $arrInputs;
            if ($ObjBooking->validate()) {
                $arrBookingInputs = $ObjBooking->getAttributes();
                print_r($arrBookingInputs);
                die();
            } else {
                $arrResponse['errors'] = $ObjBooking->errors;
            }
        }
        echo Json::encode($arrResponse);
    }

    public function modifyInputs($arrInputs)
    {
        $arrResponse = [];
        $arrSlotTimes = $arrInputs['slot_time'];
        unset($arrInputs['slot_time']);
        if (! empty($arrSlotTimes)) {
            foreach ($arrSlotTimes as $strSlotTime) {
                $arrSlotDet = explode('-', $strSlotTime);
                $arrResponse[] = array_merge($arrInputs, [
                    'from_time' => $arrInputs['from_time'],
                    'to_time' => $arrInputs['to_time'],
                    ''
                ]);
            }
        }
        return $arrResponse;
    }

    private function getAmount($arrInputs)
    {
        $arrResponse = [];
        //Get CGST PERCENTAGE   
        return $arrResponse;
    }
}
