<?php
namespace app\modules\slots\controllers;

use yii\web\Controller;
use backend\modules\slots\models\Categories;
use Yii;
use yii\helpers\Json;
use common\components\CommonComponent;
use backend\modules\slots\models\SubCategories;

class SlotsController extends Controller
{

    public function beforeAction($action)
    {
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
        return $this->render('/Slots', []);
    }

    public function actionCreateSlot()
    {
        return $this->render('/CreateSlot', []);
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
}
