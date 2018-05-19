<?php
namespace app\modules\booking\controllers;

use Yii;
use frontend\controllers\GoController;
use common\components\CommonComponent;
use frontend\modules\booking\models\Categories;
use frontend\modules\booking\models\SubCategories;

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
}
