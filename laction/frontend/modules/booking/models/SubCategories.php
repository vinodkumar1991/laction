<?php
namespace frontend\modules\booking\models;

use yii\db\ActiveRecord;
use Yii;
use yii\db\Query;

class SubCategories extends ActiveRecord
{

    public static function tableName()
    {
        return 'subcategories';
    }

    public static function getDb()
    {
        return Yii::$app->db2;
    }

    public static function getSubCategories($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            's.category_name',
            's.name',
            's.id as sub_category_id'
        ]);
        $objQuery->from('subcategories as s');
        if (isset($arrInputs['category']) && ! empty($arrInputs['category'])) {
            $objQuery->andWhere('s.category_name=:category', [
                ':category' => $arrInputs['category']
            ]);
        }
        $arrResponse = $objQuery->all(self::getDb());
        return $arrResponse;
    }
}
