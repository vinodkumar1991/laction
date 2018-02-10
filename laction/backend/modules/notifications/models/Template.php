<?php
namespace backend\modules\notifications\models;

use yii\db\ActiveRecord;
use yii\db\Query;
use Yii;

class Template extends ActiveRecord
{

    public static function tableName()
    {
        return 'templates';
    }

    public function rules()
    {
        return [
            [
                [
                    'message_type',
                    'senderid_id',
                    'code',
                    'name',
                    'template',
                    'status'
                ],
                'required',
                'on' => 'sms',
                'message' => '{attribute} is required'
            ],
            [
                [
                    'message_type',
                    'from_email',
                    'senderid_id',
                    'code',
                    'name',
                    'template',
                    'status'
                ],
                'required',
                'on' => 'email',
                'message' => '{attribute} is required'
            ],
            [
                [
                    'id',
                    'description',
                    'created_date',
                    'created_by',
                    'last_modified_date',
                    'last_modified_by'
                ],
                'safe'
            ],
            [
                'code',
                'isValidCode'
            ],
            [
                'code',
                'match',
                'pattern' => '/^[0-9a-zA-Z]+$/',
                'message' => 'Invalid Code'
            ],
            [
                'from_email',
                'email'
            ],
            [
                'description',
                'match',
                'pattern' => '/^[0-9a-zA-Z :\'";!@#$%^&*()-_+=?,.`~]+$/',
                'message' => 'Invalid Description'
            ]
        ];
    }

    public function scenarios()
    {
        $arrScenarios = parent::scenarios();
        $arrScenarios['email'] = [
            'message_type',
            'from_email',
            'senderid_id',
            'code',
            'name',
            'template',
            'description',
            'status',
            'id',
            'created_date',
            'created_by',
            'last_modified_date',
            'last_modified_by',
            'sync'
        ];
        $arrScenarios['sms'] = [
            'message_type',
            'senderid_id',
            'code',
            'name',
            'template',
            'description',
            'status',
            'id',
            'created_date',
            'created_by',
            'last_modified_date',
            'last_modified_by',
            'sync'
        ];
        return $arrScenarios;
    }

    public function attributeLabels()
    {
        return [
            'message_type' => 'Message Type',
            'from_email' => 'From Email',
            'senderid_id' => 'Subject',
            'code' => 'Template Code',
            'name' => 'Template Name',
            'template' => 'Template',
            'description' => 'Description',
            'status' => 'Status'
        ];
    }

    public function getDefaults()
    {
        return [
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => Yii::$app->session['session_data']['user_id'],
            'last_modified_by' => Yii::$app->session['session_data']['user_id'],
            'sync' => 'false'
        ];
    }

    public function isValidCode($attribute, $params)
    {
        $arrTemplate = self::getTemplates([
            'code' => $this->code,
            'id' => $this->id
        ]);
        
        if (! empty($arrTemplate)) {
            $this->addError($attribute, $attribute . ' is already exists');
            return false;
        } else {
            return true;
        }
    }

    public static function getTemplates($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            't.id',
            't.message_type',
            't.from_email',
            's.subject',
            's.category_type',
            's.route',
            't.code',
            't.name',
            't.template',
            't.description',
            't.status',
            't.sync',
            't.senderid_id'
        ]);
        $objQuery->from('templates as t');
        $objQuery->innerJoin('senderids as s', 's.id = t.senderid_id');
        // Message Type
        if (isset($arrInputs['message_type']) && ! empty($arrInputs['message_type'])) {
            $objQuery = $objQuery->andWhere('t.message_type=:MessageType', [
                ':MessageType' => $arrInputs['message_type']
            ]);
        }
        // Subject
        if (isset($arrInputs['code']) && ! empty($arrInputs['code'])) {
            $objQuery = $objQuery->andWhere('t.code=:Code', [
                ':Code' => $arrInputs['code']
            ]);
        }
        // Id
        if (isset($arrInputs['id']) && ! empty($arrInputs['id'])) {
            $objQuery = $objQuery->andWhere('t.id!=:Id', [
                ':Id' => $arrInputs['id']
            ]);
        }
        // Template Id
        if (isset($arrInputs['template_id']) && ! empty($arrInputs['template_id'])) {
            $objQuery = $objQuery->andWhere('t.id=:TemplateId', [
                ':TemplateId' => $arrInputs['template_id']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }

    public static function updateTemplate($arrInputs, $arrWhere)
    {
        $objConnection = Yii::$app->db;
        $intUpdate = $objConnection->createCommand()
            ->update('templates', $arrInputs, $arrWhere)
            ->execute();
        return $intUpdate;
    }
}
