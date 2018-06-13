<?php

namespace console\models;

use yii\db\ActiveRecord;
use Yii;
use yii\db\Query;

class Fsms extends ActiveRecord {

    public static function tableName() {
        return 'sms';
    }

    public static function getSms($arrInputs = []) {
        $objQuery = new Query();
        $objQuery->select([
            's.customer_id',
            's.template_code',
            's.mobile_number',
            's.params',
            's.status',
            's.id'
        ]);
        $objQuery->from('sms as s');
        //Status
        if (isset($arrInputs['status']) && !empty($arrInputs['status'])) {
            $objQuery->andWhere('s.status=:status', [
                ':status' => $arrInputs['status']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }

    public static function updateSms($arrInputs, $arrWhere) {
        $objConnection = Yii::$app->db;
        $intUpdate = $objConnection->createCommand()
                ->update('sms', $arrInputs, $arrWhere)
                ->execute();
        return $intUpdate;
    }

}
