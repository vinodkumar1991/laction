<?php
namespace console\models;

use yii\db\ActiveRecord;
use yii\db\Query;

class SenderIds extends ActiveRecord
{

    public static function tableName()
    {
        return 'senderids';
    }

    public static function getSenderIds($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            's.subject',
            's.message_type',
            's.category_type',
            's.id as sender_id',
            's.route',
            's.status',
            't.code',
            't.template'
        ]);
        $objQuery->from('senderids as s');
        $objQuery->innerJoin('templates as t', 't.senderid_id=s.id');
        // Message Type
        if (isset($arrInputs['message_type']) && ! empty($arrInputs['message_type'])) {
            $objQuery = $objQuery->andWhere('s.message_type=:MessageType', [
                ':MessageType' => $arrInputs['message_type']
            ]);
        }
        // Category Type
        if (isset($arrInputs['category_type']) && ! empty($arrInputs['category_type'])) {
            $objQuery = $objQuery->andWhere('s.category_type=:CategoryType', [
                ':CategoryType' => $arrInputs['category_type']
            ]);
        }
        // Subject
        if (isset($arrInputs['subject']) && ! empty($arrInputs['subject'])) {
            $objQuery = $objQuery->andWhere('s.subject=:Subject', [
                ':Subject' => $arrInputs['subject']
            ]);
        }
        // Id
        if (isset($arrInputs['id']) && ! empty($arrInputs['id'])) {
            $objQuery = $objQuery->andWhere('s.id!=:Id', [
                ':Id' => $arrInputs['id']
            ]);
        }
        // Sender Id
        if (isset($arrInputs['sender_id']) && ! empty($arrInputs['sender_id'])) {
            $objQuery = $objQuery->andWhere('s.id=:senderId', [
                ':senderId' => $arrInputs['sender_id']
            ]);
        }
        // Status
        if (isset($arrInputs['status']) && ! empty($arrInputs['status'])) {
            $objQuery = $objQuery->andWhere('s.status=:status', [
                ':status' => $arrInputs['status']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }
}
