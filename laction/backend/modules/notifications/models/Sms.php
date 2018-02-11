<?php
namespace backend\modules\notifications\models;

use yii\db\ActiveRecord;
use Yii;

class Sms extends ActiveRecord
{

    public static function tableName()
    {
        return 'sms';
    }

    public static function create($arrInputs)
    {
        $intInsert = Yii::$app->db->createCommand()
            ->batchInsert('sms', [
            'user_id',
            'template_code',
            'mobile_number',
            'params',
            'status',
            'created_date',
            'created_by'
        ], $arrInputs)
            ->execute();
        return $intInsert;
    }
}
