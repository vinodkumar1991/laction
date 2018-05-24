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
use frontend\modules\booking\models\Billing;

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
        $arrModifiedInputs = $this->modifyInputs($arrInputs);
        if (! isset($arrModifiedInputs['errors']) && ! empty($arrModifiedInputs)) {
            $arrBilling = $arrModifiedInputs['billing_details'];
            unset($arrModifiedInputs['billing_details']);
            foreach ($arrModifiedInputs as $arrModifiedInput) {
                $objBooking = new Booking();
                $objBooking->scenario = 'preview';
                $arrModifiedInput = array_merge($arrModifiedInput, $objBooking->getDefaults());
                $objBooking->attributes = $arrModifiedInput;
                if ($objBooking->validate()) {
                    $arrValidatedInputs = [];
                    $arrValidatedInputs = $objBooking->getAttributes();
                    unset($arrValidatedInputs['id'], $arrValidatedInputs['last_modified_date'], $arrValidatedInputs['last_modified_by']);
                    $arrResponse['slots'][] = $arrValidatedInputs;
                } else {
                    $arrResponse['errors'] = $objBooking->errors;
                }
            }
            if (! isset($arrResponse['errors'])) {
                Booking::createPreview($arrResponse['slots']);
                $arrResponse['billing_id'] = $this->doBilling($arrBilling);
                Yii::$app->session['booking_data'] = null;
                Yii::$app->session['booking_data'] = $arrResponse['slots'];
                unset($arrResponse['slots'], $arrModifiedInputs, $arrBilling);
                $arrResponse['message'] = "Successfully Booked Your Slot";
            }
        } else {
            $arrResponse = $arrModifiedInputs;
        }
        echo Json::encode($arrResponse);
    }

    public function modifyInputs($arrInputs, $strScenario = 'preview')
    {
        $arrResponse = [];
        $arrSlotTimes = $arrInputs['slot_time'];
        unset($arrInputs['slot_time']);
        $doubleAmount = 0.00;
        if (! empty($arrSlotTimes)) {
            // Booking Number
            $arrInputs['booking_no'] = ('preview' == $strScenario) ? 'LP' : 'LA' . CommonComponent::getNumberToken(6);
            // Modify Event Date
            $arrInputs['event_date'] = date('Y-m-d', strtotime($arrInputs['event_date']));
            foreach ($arrSlotTimes as $strSlotTime) {
                $arrSlotDet = [];
                $arrSlotDet = explode('-', $strSlotTime);
                $arrResponse[] = array_merge($arrInputs, [
                    'from_time' => $arrSlotDet[0],
                    'to_time' => $arrSlotDet[1]
                ]);
                $doubleAmount = $doubleAmount + $arrSlotDet[2];
            }
            $arrResponse['billing_details'] = $this->getAmount([
                'booking_no' => $arrResponse[0]['booking_no'],
                'base_amount' => $doubleAmount
            ]);
        } else {
            $objBooking = new Booking();
            $objBooking->scenario = $strScenario;
            $objBooking->attributes = $arrInputs;
            if ($objBooking->validate()) {} else {
                $arrResponse['errors'] = $objBooking->errors;
            }
        }
        unset($arrInputs);
        return $arrResponse;
    }

    private function getAmount($arrInputs)
    {
        $arrResponse = [];
        $doubleCGSTPer = Yii::$app->params['tax']['cgst_per'];
        $doubleCGSTAmount = $arrInputs['base_amount'] * ($doubleCGSTPer / 100);
        $arrResponse['booking_no'] = $arrInputs['booking_no'];
        $arrResponse['cgst_percentage'] = $doubleCGSTPer;
        $arrResponse['cgst_amount'] = $doubleCGSTAmount;
        $arrResponse['base_amount'] = $arrInputs['base_amount'];
        $arrResponse['total_amount'] = $arrInputs['base_amount'] + $doubleCGSTAmount;
        unset($arrInputs);
        return $arrResponse;
    }

    private function doBilling($arrBilling)
    {
        $arrResponse = [];
        $objBilling = new Billing();
        $arrBillingData = array_merge($arrBilling, $objBilling->getDefaults());
        $objBilling->attributes = $arrBillingData;
        if ($objBilling->validate()) {
            $arrValidatedData = $objBilling->getAttributes();
            $arrResponse['billing_id'] = $objBilling->save();
        } else {
            $arrResponse['errors'] = $objBilling->errors;
        }
        unset($arrBilling, $arrBillingData);
        return $arrResponse;
    }

    public function actionBookAudition()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        $arrModifiedInputs = $this->modifyInputs($arrInputs, 'audition');
        if (! isset($arrModifiedInputs['errors']) && ! empty($arrModifiedInputs)) {
            $arrBilling = $arrModifiedInputs['billing_details'];
            unset($arrModifiedInputs['billing_details']);
            foreach ($arrModifiedInputs as $arrModifiedInput) {
                $objBooking = new Booking();
                $objBooking->scenario = 'audition';
                $arrModifiedInput = array_merge($arrModifiedInput, $objBooking->getDefaults());
                $objBooking->attributes = $arrModifiedInput;
                if ($objBooking->validate()) {
                    $arrValidatedInputs = [];
                    $arrValidatedInputs = $objBooking->getAttributes();
                    unset($arrValidatedInputs['id'], $arrValidatedInputs['last_modified_date'], $arrValidatedInputs['last_modified_by']);
                    $arrResponse['slots'][] = $arrValidatedInputs;
                } else {
                    $arrResponse['errors'] = $objBooking->errors;
                }
            }
            if (! isset($arrResponse['errors'])) {
                Booking::createAudition($arrResponse['slots']);
                $arrResponse['billing_id'] = $this->doBilling($arrBilling);
                Yii::$app->session['booking_data'] = null;
                Yii::$app->session['booking_data'] = $arrResponse['slots'];
                unset($arrResponse['slots'], $arrModifiedInputs, $arrBilling);
                $arrResponse['message'] = "Successfully Booked Your Slot";
            }
        } else {
            $arrResponse = $arrModifiedInputs;
        }
        echo Json::encode($arrResponse);
    }
}
