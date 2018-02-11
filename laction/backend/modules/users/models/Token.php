<?php
namespace backend\modules\users\models;

use yii\db\ActiveRecord;
use yii\db\Query;

class Token extends ActiveRecord
{

    public static function tableName()
    {
        return 'tokens';
    }

    public function rules()
    {
        return [
            [
                [
                    'user_id',
                    'category_type',
                    'token'
                ],
                'required'
            ],
            [
                [
                    'id',
                    'created_date'
                ],
                'safe'
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'user_id' => 'User',
            'category_type' => 'Category Type',
            'token' => 'Token'
        ];
    }

    public function getDefaults()
    {
        return [
            'created_date' => date('Y-m-d H:i:s')
        ];
    }

    public static function getToken($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            't.id as token_id',
            't.category_type',
            't.user_id',
            't.token'
        ]);
        $objQuery->from('tokens as t');
        // User
        if (isset($arrInputs['user_id']) && ! empty($arrInputs['user_id'])) {
            $objQuery = $objQuery->andWhere('t.user_id=:userId', [
                ':userId' => $arrInputs['user_id']
            ]);
        }
        // Token
        if (isset($arrInputs['token']) && ! empty($arrInputs['token'])) {
            $objQuery = $objQuery->andWhere('t.token=:Token', [
                ':Token' => $arrInputs['token']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }
}
