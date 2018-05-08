<?php
namespace backend\modules\customers\models;

use yii\db\ActiveRecord;
use Yii;
use yii\db\Query;

class Customers extends ActiveRecord
{

    public static function tableName()
    {
        return 'customer';
    }
}
