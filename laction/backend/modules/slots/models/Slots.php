<?php
namespace backend\modules\slots\models;

use yii\db\ActiveRecord;
use yii\db\Query;
use Yii;

class Slots extends ActiveRecord
{

    public static function tableName()
    {
        return 'slots';
    }

    public function rules()
    {
        return [
            [
                [
                    'category_type',
                    'event_date',
                    'from_time',
                    'to_time',
                    'amount',
                    'status'
                
                ],
                'required',
                'message' => '{attribute} is required'
            ],
            [
                [
                    'amount'
                ],
                'double'
            ],
            [
                [
                    'created_date',
                    'created_by',
                    'last_modified_by'
                ],
                'safe'
            ],
            [
                [
                    'event_date',
                    'from_time',
                    'to_time'
                ],
                'changeDateNTime'
            ],
            [
                'event_date',
                'isValidEvent'
            ],
            [
                [
                    'id',
                    'status'
                ],
                'safe'
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'category_type' => 'Slot Type',
            'event_date' => 'Event Date',
            'from_time' => 'Slot From Time',
            'to_time' => 'Slot To Time',
            'amount' => 'Amount',
            'status' => 'Status'
        ];
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
            's.amount',
            's.status'
        ]);
        $objQuery->from('slots as s');
        // Slot Type
        if (isset($arrInputs['slot_type']) && ! empty($arrInputs['slot_type'])) {
            $objQuery = $objQuery->andWhere('s.category_type=:slotType', [
                ':slotType' => $arrInputs['slot_type']
            ]);
        }
        // Event Date
        if (isset($arrInputs['event_date']) && ! empty($arrInputs['event_date'])) {
            $objQuery = $objQuery->andWhere('s.event_date=:eventDate', [
                ':eventDate' => $arrInputs['event_date']
            ]);
        }
        // Id
        if (isset($arrInputs['id']) && ! empty($arrInputs['id'])) {
            $objQuery = $objQuery->andWhere('s.id!=:eventId', [
                ':eventId' => $arrInputs['id']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }

    public function isValidEvent($attribute, $params)
    {
        $arrSlot = [];
        if (! empty($this->event_date)) {
            $arrSlot = self::getSlots([
                'event_date' => $this->event_date,
                'id' => $this->id
            ]);
        }
        if (empty($arrSlot)) {
            return true;
        } else {
            $this->addError($attribute, 'Slot is already exists.');
            return false;
        }
    }

    public function getDefaults()
    {
        return [
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => Yii::$app->session['session_data']['user_id'],
            'last_modified_by' => Yii::$app->session['session_data']['user_id']
        ];
    }

    public static function create($arrInputs)
    {
        $intInsert = Yii::$app->db->createCommand()
            ->batchInsert('slots', [
            'category_type',
            'event_date',
            'from_time',
            'to_time',
            'amount',
            'status',
            'created_date',
            'created_by',
            'last_modified_by'
        ], $arrInputs)
            ->execute();
        return $intInsert;
    }

    public function changeDateNTime($attribute, $params)
    {
        if ('event_date' == $attribute) {
            $this->event_date = date('Y-m-d', strtotime($this->$attribute));
        } else {
            if ('from_time' == $attribute) {
                $this->from_time = date('H:i:s', strtotime($this->$attribute));
            } else {
                $this->to_time = date('H:i:s', strtotime($this->$attribute));
            }
        }
        return true;
    }
}
