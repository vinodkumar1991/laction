<?php
namespace frontend\modules\booking\models;

use yii\db\ActiveRecord;
use Yii;
use yii\db\Query;

class Categories extends ActiveRecord
{

    public static function tableName()
    {
        return 'categories';
    }

    public static function getDb()
    {
        return Yii::$app->db2;
    }

    public static function getCategories($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            'c.name',
            'c.id as category_id'
        ]);
        $objQuery->from('categories as c');
        $arrResponse = $objQuery->all(self::getDb());
        return $arrResponse;
    }
}
