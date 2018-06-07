<?php

namespace frontend\modules\booking\models;

use yii\db\ActiveRecord;
use Yii;
use yii\db\Query;

class Booking extends ActiveRecord {

    public $agree;
    public $category;

    public static function tableName() {
        return 'bookings';
    }

    public function rules() {
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

    public function scenarios() {
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

    public function attributeLabels() {
        return [
            'id' => 'id',
            'booking_no' => 'Order Number'
        ];
    }

    public static function createPreview($arrInputs) {
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

    public static function createAudition($arrInputs) {
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

    public static function getSlots($arrInputs = []) {
        $objQuery = new Query();
        $objQuery->select([
            'b.category_type',
            'b.from_time',
            'b.to_time',
            'b.booking_no',
            'DATE_FORMAT(b.from_time, "%h:%i %p") as slot_start_time',
            'DATE_FORMAT(b.to_time, "%h:%i %p") as slot_end_time',
            'bb.payment_type',
            'bb.total_amount',
            'b.event_date',
            'DATE_FORMAT(b.event_date, "%D:%M %Y") as booked_date',
            'b.booking_status'
        ]);
        $objQuery->from('bookings as b');
        $objQuery->innerJoin('booking_billing as bb', 'bb.booking_no = b.booking_no');
        // Category Type
        if (isset($arrInputs['category_type']) && !empty($arrInputs['category_type'])) {
            $objQuery->andWhere('b.category_type=:categoryType', [
                ':categoryType' => $arrInputs['category_type']
            ]);
        }
        // Event Date
        if (isset($arrInputs['event_date']) && !empty($arrInputs['event_date'])) {
            $objQuery->andWhere('b.event_date=:eventDate', [
                ':eventDate' => $arrInputs['event_date']
            ]);
        }
        // Customer Id
        if (isset($arrInputs['customer_id']) && !empty($arrInputs['customer_id'])) {
            $objQuery->andWhere('b.customer_id=:customerId', [
                ':customerId' => $arrInputs['customer_id']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }

    public function getDefaults() {
        return [
            'customer_id' => Yii::$app->session['customer_data']['customer_id'],
            'booking_status' => 'inprogress',
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => Yii::$app->session['customer_data']['customer_id']
        ];
    }

    public function isAgreed($attribute, $params) {
        if ($this->agree == 'true') {
            return true;
        } else {
            $this->addError('agree', 'Terms and Conditions Are Required');
            return false;
        }
    }

}
