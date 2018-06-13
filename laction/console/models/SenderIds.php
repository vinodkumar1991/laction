<?php

namespace console\models;

use yii\db\ActiveRecord;
use Yii;
use yii\db\Query;

class SenderIds extends ActiveRecord {

    public static function tableName() {
        return 'senderids';
    }

    public static function getDb() {
        return Yii::$app->db2;
    }

    public static function getSenderIds($arrInputs = []) {
        $objQuery = new Query();
        $objQuery->select([
            's.message_type',
            's.category_type',
            's.subject',
            's.route',
            's.status',
            't.from_email',
            't.code',
            't.name',
            't.template',
        ]);
        $objQuery->from('senderids as s');
        $objQuery->innerJoin('templates as t', 't.senderid_id = s.id');
        //Status
        if (isset($arrInputs['status']) && !empty($arrInputs['status'])) {
            $objQuery->andWhere('t.status=:status', [
                ':status' => $arrInputs['status']
            ]);
        }
        //Category Type
        if (isset($arrInputs['category_type']) && !empty($arrInputs['category_type'])) {
            $objQuery->andWhere('t.category_type=:categoryType', [
                ':categoryType' => $arrInputs['category_type']
            ]);
        }
        //Code
        if (isset($arrInputs['code']) && !empty($arrInputs['code'])) {
            $objQuery->andWhere('t.code=:code', [
                ':code' => $arrInputs['code']
            ]);
        }
        $arrResponse = $objQuery->all(self::getDb());
        return $arrResponse;
    }

}
