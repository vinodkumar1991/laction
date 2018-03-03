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
                    'event_date'
                ],
                'changeDateNTime'
            ],
            [
                [
                    'from_time'
                ],
                'changeFromTime'
            ],
            [
                [
                    'to_time'
                ],
                'changeToTime'
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
            ],
            [
                'to_time',
                'isValidTime'
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
            's.status',
            'date_format(s.from_time,"%r") as slot_from_time',
            'date_format(s.to_time,"%r") as slot_to_time',
            'date_format(s.event_date,"%a %D %b %Y") as slot_event_date'
        
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
        // Status
        if (isset($arrInputs['status']) && ! empty($arrInputs['status'])) {
            $objQuery = $objQuery->andWhere('s.status=:Status', [
                ':Status' => $arrInputs['status']
            ]);
        }
        // From Time
        if (isset($arrInputs['from_time']) && ! empty($arrInputs['from_time'])) {
            $objQuery = $objQuery->andWhere('s.from_time=:fromTime', [
                ':fromTime' => $arrInputs['from_time']
            ]);
        }
        // To Time
        if (isset($arrInputs['to_time']) && ! empty($arrInputs['to_time'])) {
            $objQuery = $objQuery->andWhere('s.to_time=:toTime', [
                ':toTime' => $arrInputs['to_time']
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
                'slot_type' => $this->category_type,
                'id' => $this->id,
                'from_time' => $this->from_time,
                'to_time' => $this->to_time
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
        $arrDefaults = [];
        $arrDefaults = [
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => Yii::$app->session['session_data']['user_id'],
            'last_modified_by' => Yii::$app->session['session_data']['user_id']
        ];
        return $arrDefaults;
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
        $this->event_date = date('Y-m-d', strtotime($this->event_date));
        return true;
    }

    public function changeFromTime($attribute, $params)
    {
        $this->from_time = str_replace(' : ', ':', $this->from_time);
        $this->from_time = date("H:i:s", strtotime($this->from_time));
        return true;
    }

    public function changeToTime($attribute, $params)
    {
        $this->to_time = str_replace(' : ', ':', $this->to_time);
        $this->to_time = date('H:i:s', strtotime($this->to_time));
        return true;
    }

    public function isValidTime($attribute, $params)
    {
        $strFromTime = strtotime($this->from_time);
        $strToTime = strtotime($this->to_time);
        if ($strToTime > $strFromTime) {
            return true;
        } else {
            $this->addError('to_time', 'To time should be less than from time');
            return false;
        }
    }

    public static function updateSlot($arrInputs, $arrWhere)
    {
        $objConnection = Yii::$app->db;
        $intUpdate = $objConnection->createCommand()
            ->update('slots', $arrInputs, $arrWhere)
            ->execute();
        return $intUpdate;
    }
}
