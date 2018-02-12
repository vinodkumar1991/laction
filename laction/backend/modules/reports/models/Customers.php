<?php
namespace backend\modules\reports\models;

use yii\db\ActiveRecord;
use Yii;
use yii\db\Query;

class Customers extends ActiveRecord
{

    public static function tableName()
    {
        return 'customer';
    }

    public static function getDb()
    {
        return Yii::$app->db2;
    }

    public static function getCustomers($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            'c.fullname',
            'c.email',
            'c.phone',
            'c.status'
        ]);
        $objQuery->from('customer as c');
        $arrResponse = $objQuery->all(self::getDb());
        return $arrResponse;
    }
}
