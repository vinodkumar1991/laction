<?php
namespace app\modules\slots\controllers;

use yii\web\Controller;
use backend\modules\slots\models\Categories;
use Yii;
use yii\helpers\Json;
use common\components\CommonComponent;
use backend\modules\slots\models\SubCategories;
use backend\modules\slots\models\Slots;

class SlotsController extends Controller
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

    public function actionCategories()
    {
        $arrStatus = CommonComponent::getStatuses();
        $arrCategories = Categories::getCategories();
        return $this->render('/Categories', [
            'categories' => $arrCategories,
            'statuses' => $arrStatus
        ]);
    }

    public function actionSubCategories()
    {
        $arrStatus = CommonComponent::getStatuses();
        $arrCategories = Categories::getCategories();
        $arrSubCategories = SubCategories::getSubCategories();
        return $this->render('/SubCategories', [
            'subcategories' => $arrSubCategories,
            'categories' => $arrCategories,
            'statuses' => $arrStatus
        ]);
    }

    public function actionSlots()
    {
        $arrSlots = Slots::getSlots([
            'status' => 'active'
        ]);
        $arrModifiedSlots = ! empty($arrSlots) ? $this->modifySlots($arrSlots) : [];
        return $this->render('/Slots', [
            'all_slots' => Json::encode($arrModifiedSlots)
        ]);
    }

    public function actionCreateSlot()
    {
        $arrSlotTypes = CommonComponent::getSlotTypes();
        return $this->render('/CreateSlots', [
            'slot_types' => $arrSlotTypes
        ]);
    }

    public function actionCreateCategory()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        $objCategories = new Categories();
        $objCategories->attributes = $arrInputs;
        if ($objCategories->validate()) {
            $arrValidatedInputs = $objCategories->getAttributes();
            if (! empty($arrValidatedInputs['id'])) {
                Categories::updateCategory($arrValidatedInputs, [
                    'id' => $arrValidatedInputs['id']
                ]);
                $arrResponse['message'] = 'Category Updated Successfully.';
            } else {
                $objCategories->save();
                $arrResponse['category_id'] = $objCategories->id;
                $arrResponse['message'] = 'New Category Created Successfully.';
            }
        } else {
            $arrResponse['errors'] = $objCategories->errors;
        }
        unset($arrInputs);
        echo Json::encode($arrResponse);
    }

    public function actionCreateSubCategory()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        $objSubCategories = new SubCategories();
        $objSubCategories->attributes = $arrInputs;
        if ($objSubCategories->validate()) {
            $arrValidatedInputs = $objSubCategories->getAttributes();
            if (! empty($arrValidatedInputs['id'])) {
                SubCategories::updateSubCategory($arrValidatedInputs, [
                    'id' => $arrValidatedInputs['id']
                ]);
                $arrResponse['message'] = 'SubCategory Updated Successfully.';
            } else {
                $objSubCategories->save();
                $arrResponse['sub_category_id'] = $objSubCategories->id;
                $arrResponse['message'] = 'New SubCategory Created Successfully.';
            }
        } else {
            $arrResponse['errors'] = $objSubCategories->errors;
        }
        unset($arrInputs);
        echo Json::encode($arrResponse);
    }

    public function actionGetCategories()
    {
        $arrCategories = [];
        $arrInputs = Yii::$app->request->post();
        if (! empty($arrInputs)) {
            $arrCategories = Categories::getCategories($arrInputs)[0];
        }
        unset($arrInputs);
        echo Json::encode($arrCategories);
    }

    public function actionGetSubCategories()
    {
        $arrSubCategories = [];
        $arrInputs = Yii::$app->request->post();
        if (! empty($arrInputs)) {
            $arrSubCategories = SubCategories::getSubCategories($arrInputs)[0];
        }
        unset($arrInputs);
        echo Json::encode($arrSubCategories);
    }

    public function actionSaveSlots()
    {
        $arrResponse = [];
        $arrInputs = Yii::$app->request->post();
        if (! empty($arrInputs)) {
            $arrSlots = isset($arrInputs['slots']) ? $arrInputs['slots'] : [];
            if (! empty($arrSlots)) {
                unset($arrInputs['slots']);
                $arrBasic = $arrInputs;
                $i = 1;
                foreach ($arrSlots as $arrSlot) {
                    $objSlot = new Slots();
                    $arrDefaults = $objSlot->getDefaults();
                    $arrSlot = array_merge($arrSlot, $arrDefaults, $arrBasic);
                    $objSlot->attributes = $arrSlot;
                    if ($objSlot->validate()) {
                        $arrValidatedInputs = [];
                        $arrValidatedInputs = $objSlot->getAttributes();
                        unset($arrValidatedInputs['id'], $arrValidatedInputs['last_modified_date']);
                        $arrResponse['new'][] = $arrValidatedInputs;
                    } else {
                        $arrResponse['errors'][$i] = $objSlot->errors;
                    }
                    $i ++;
                }
                unset($arrSlots, $arrBasic);
                $intInsert = ! isset($arrResponse['errors']) ? Slots::create($arrResponse['new']) : 0;
                if ($intInsert > 0) {
                    unset($arrResponse['new']);
                    $arrResponse['inserted_count'] = $intInsert;
                    $arrResponse['message'] = 'Slots created successfully';
                }
            }
        }
        unset($arrInputs);
        echo Json::encode($arrResponse);
    }

    private function modifySlots($arrSlots)
    {
        $arrResponse = [];
        $i = 1;
        foreach ($arrSlots as $arrSlot) {
            $arrResponse[$arrSlot['event_date'] . ' ' . $arrSlot['from_time']] = [
                'title' => 'Slot -' . $i,
                'start' => $arrSlot['event_date'] . ' ' . $arrSlot['from_time'],
                'end' => $arrSlot['event_date'] . ' ' . $arrSlot['to_time'],
                'className' => 'bg-danger'
            ];
            $i ++;
        }
        $arrResponse = array_values($arrResponse);
        return $arrResponse;
    }
}
