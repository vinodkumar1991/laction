<?php
namespace frontend\modules\booking\models;

use yii\db\ActiveRecord;
use Yii;
use yii\db\Query;

class Slots extends ActiveRecord
{

    public static function tableName()
    {
        return 'slots';
    }

    public static function getDb()
    {
        return Yii::$app->db2;
    }

    public static function getSlots($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            's.id as slot_id',
            's.category_type',
            's.event_date',
            's.from_time',
            's.to_time',
            's.amount as slot_amount',
            'DATE_FORMAT(s.from_time, "%h:%i %p") as slot_start_time',
            'DATE_FORMAT(s.to_time, "%h:%i %p") as slot_end_time'
        ]);
        $objQuery->from('slots as s');
        // Event Date
        if (isset($arrInputs['event_date']) && ! empty($arrInputs['event_date'])) {
            $objQuery->andWhere('s.event_date=:eventDate', [
                ':eventDate' => $arrInputs['event_date']
            ]);
        }
        // Category Type
        if (isset($arrInputs['category_type']) && ! empty($arrInputs['category_type'])) {
            $objQuery->andWhere('s.category_type=:categoryType', [
                ':categoryType' => $arrInputs['category_type']
            ]);
        }
        $arrResponse = $objQuery->all(self::getDb());
        return $arrResponse;
    }
}
