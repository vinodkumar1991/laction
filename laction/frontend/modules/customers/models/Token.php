<?php

namespace frontend\modules\customers\models;

use yii\db\ActiveRecord;
use yii\db\Query;

class Token extends ActiveRecord {

    public static function tableName() {
        return 'tokens';
    }

    public function rules() {
        return [
            [
                [
                    //'customer_id',
                    'category_type',
                    'token'
                ],
                'required'
            ],
            [
                [
                    'id',
                    'created_date',
                    'customer_id',
                    'phone'
                ],
                'safe'
            ]
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'Id',
            'customer_id' => 'Customer',
            'category_type' => 'Category Type',
            'token' => 'Token'
        ];
    }

    public function getDefaults() {
        return [
            'created_date' => date('Y-m-d H:i:s')
        ];
    }

    public static function getToken($arrInputs = []) {
        $objQuery = new Query();
        $objQuery->select([
            't.id as token_id',
            't.category_type',
            't.customer_id',
            't.token',
            't.phone'
        ]);
        $objQuery->from('tokens as t');
        // Customer
        if (isset($arrInputs['customer_id']) && !empty($arrInputs['customer_id'])) {
            $objQuery = $objQuery->andWhere('t.customer_id=:customerId', [
                ':customerId' => $arrInputs['customer_id']
            ]);
        }
        // Token
        if (isset($arrInputs['token']) && !empty($arrInputs['token'])) {
            $objQuery = $objQuery->andWhere('t.token=:Token', [
                ':Token' => $arrInputs['token']
            ]);
        }
        //Category Type
        if (isset($arrInputs['category_type']) && !empty($arrInputs['category_type'])) {
            $objQuery = $objQuery->andWhere('t.category_type=:categoryType', [
                ':categoryType' => $arrInputs['category_type']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }

}
