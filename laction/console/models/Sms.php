<?php
namespace console\models;

use yii\db\ActiveRecord;
use yii\db\Query;
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

    public static function getSms($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            's.template_code',
            's.mobile_number',
            's.params',
            's.status',
            's.id'
        ]);
        $objQuery->from('sms as s');
        $objQuery->innerJoin('users as u', 'u.id = s.user_id');
        // Status
        if (isset($arrInputs['status']) && ! empty($arrInputs['status'])) {
            $objQuery = $objQuery->andWhere('s.status=:Status', [
                ':Status' => $arrInputs['status']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }

    public static function updateSms($arrInputs, $arrWhere)
    {
        $objConnection = Yii::$app->db;
        $intUpdate = $objConnection->createCommand()
            ->update('sms', $arrInputs, $arrWhere)
            ->execute();
        return $intUpdate;
    }
}
