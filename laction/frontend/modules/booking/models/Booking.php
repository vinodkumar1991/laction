<?php
namespace frontend\modules\booking\models;

use yii\db\ActiveRecord;
use Yii;
use yii\db\Query;

class Booking extends ActiveRecord
{

    public $agree;

    public $category;

    public static function tableName()
    {
        return 'bookings';
    }

    public function rules()
    {
        return [
            [
                [
                    'category_type',
                    'booking_type',
                    'booking_no',
                    'customer_id',
                    'fullname',
                    'email',
                    'phone',
                    'film_type',
                    'film_name',
                    'film_censor',
                    'event_date',
                    'from_time',
                    'to_time',
                    'booking_status',
                    'created_date',
                    'created_by',
                    'agree'
                ],
                'required',
                'on' => 'preview',
                'message' => '{attribute} is required'
            ],
            [
                [
                    'category_type',
                    'booking_type',
                    'booking_no',
                    'customer_id',
                    'fullname',
                    'email',
                    'phone',
                    'gender',
                    'category',
                    'sub_category_id',
                    'age',
                    'event_date',
                    'from_time',
                    'to_time',
                    // 'extra_minutes',
                    'booking_status',
                    'created_date',
                    'created_by',
                    'agree'
                ],
                'required',
                'on' => 'audition',
                'message' => '{attribute} is required'
            ],
            [
                [
                    'phone',
                    'email',
                    'fullname'
                ],
                'trim'
            ],
            [
                [
                    'extra_minutes'
                ],
                'safe',
                'on' => 'preview'
            ],
            [
                [
                    'extra_minutes'
                ],
                'safe',
                'on' => 'audition'
            ],
            [
                'fullname',
                'string',
                'max' => 100
            ],
            [
                'film_name',
                'string',
                'max' => 100,
                'on' => 'preview'
            ],
            [
                'email',
                'email'
            ],
            [
                'age',
                'match',
                'pattern' => '/^([0-9])+$/',
                'message' => 'Invalid Age',
                'on' => 'audition'
            ],
            [
                'phone',
                'string',
                'min' => 10,
                'max' => 10
            ],
            [
                'phone',
                'match',
                'pattern' => '/^([0-9])+$/',
                'message' => 'Invalid Phone'
            ],
            [
                'email',
                'string',
                'max' => 40
            ],
            [
                'agree',
                'isAgreed'
            ]
        ];
    }

    public function scenarios()
    {
        $arrScenarios = parent::scenarios();
        $arrScenarios['preview'] = [
            'id',
            'category_type',
            'booking_type',
            'booking_no',
            'customer_id',
            'fullname',
            'email',
            'phone',
            'film_type',
            'film_name',
            'film_censor',
            'event_date',
            'from_time',
            'to_time',
            'extra_minutes',
            'booking_status',
            'created_date',
            'created_by',
            'agree'
        ];
        $arrScenarios['audition'] = [
            'id',
            'category_type',
            'booking_type',
            'booking_no',
            'customer_id',
            'fullname',
            'email',
            'phone',
            'gender',
            'category',
            'sub_category_id',
            'age',
            'event_date',
            'from_time',
            'to_time',
            'extra_minutes',
            'booking_status',
            'created_date',
            'created_by',
            'agree'
        ];
        return $arrScenarios;
    }

    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'booking_no' => 'Order Number'
        ];
    }

    public static function createPreview($arrInputs)
    {
        $intInsert = Yii::$app->db->createCommand()
            ->batchInsert('bookings', [
            'category_type',
            'booking_type',
            'booking_no',
            'customer_id',
            'fullname',
            'email',
            'phone',
            'gender',
            'sub_category_id',
            'age',
            'film_type',
            'film_name',
            'film_censor',
            'event_date',
            'from_time',
            'to_time',
            'extra_minutes',
            'booking_status',
            'created_date',
            'created_by'
        ], $arrInputs)
            ->execute();
        return $intInsert;
    }

    public static function createAudition($arrInputs)
    {
        $intInsert = Yii::$app->db->createCommand()
            ->batchInsert('bookings', [
            'category_type',
            'booking_type',
            'booking_no',
            'customer_id',
            'fullname',
            'email',
            'phone',
            'gender',
            'sub_category_id',
            'age',
            'film_type',
            'film_name',
            'film_censor',
            'event_date',
            'from_time',
            'to_time',
            'extra_minutes',
            'booking_status',
            'created_date',
            'created_by'
        ], $arrInputs)
            ->execute();
        return $intInsert;
    }

    // public static function getSlots($arrInputs = [])
    // {
    // $objQuery = new Query();
    // $objQuery->select([
    
    // 'DATE_FORMAT(s.from_time, "%h:%i %p") as slot_start_time',
    // 'DATE_FORMAT(s.to_time, "%h:%i %p") as slot_end_time'
    // ]);
    // $objQuery->from('bookings as b');
    // $objQuery->innerJoin('booking_billing as bb', 'bb.booking_id = b.id');
    // $arrResponse = $objQuery->all();
    // return $arrResponse;
    // }
    public function getDefaults()
    {
        return [
            'customer_id' => Yii::$app->session['customer_data']['customer_id'],
            'booking_status' => 'inprogress',
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => Yii::$app->session['customer_data']['customer_id']
        ];
    }

    public function isAgreed($attribute, $params)
    {
        if ($this->agree == 'true') {
            return true;
        } else {
            $this->addError('agree', 'Terms and Conditions Are Required');
            return false;
        }
    }
}
