<?php
namespace backend\modules\reports\models;

use yii\db\ActiveRecord;
use Yii;
use yii\db\Query;

class Bookings extends ActiveRecord
{

    public static function tableName()
    {
        return 'bookings';
    }

    public static function getDb()
    {
        return Yii::$app->db2;
    }

    public static function getBookings($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            'b.category_type',
            'b.booking_type',
            'b.email',
            'b.phone',
            'b.event_date',
            'b.from_time',
            'b.to_time',
            'b.booking_status',
            'c.fullname',
            'b.booking_no'
        ]);
        $objQuery->from('bookings as b');
        $objQuery->innerJoin('customer as c', 'c.id = b.customer_id');
        $arrResponse = $objQuery->all(self::getDb());
        return $arrResponse;
    }
}
