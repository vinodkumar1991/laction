<?php
namespace frontend\modules\booking\models;

use yii\db\ActiveRecord;
use Yii;
use yii\db\Query;

class Billing extends ActiveRecord
{

    public static function tableName()
    {
        return 'booking_billing';
    }

    public function rules()
    {
        return [
            [
                [
                    'booking_no',
                    'payment_type',
                    'total_amount',
                    'base_amount',
                    'cgst_percentage',
                    'cgst_amount',
                    'created_date',
                    'created_by'
                ],
                'required',
                'message' => '{attribute} is required'
            ]
        ];
    }

    public function getDefaults()
    {
        return [
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => Yii::$app->session['customer_data']['customer_id'],
            'payment_type' => 'none'
        ];
    }
}
