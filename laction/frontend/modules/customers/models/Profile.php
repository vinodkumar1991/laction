<?php

namespace frontend\modules\customers\models;

use yii\db\ActiveRecord;

class Profile extends ActiveRecord {

    public static function tableName() {
        return 'customer';
    }

    public function rules() {
        return [
            [
                [
                    'category_id',
                    'gender',
                    'id'
                ],
                'required',
                'on' => 'basic',
                'message' => '{attribute} is required'
            ],
            [
                [
                    'age',
                    'height',
                    'biography'
                ],
                'trim',
                'on' => 'basic'
            ],
            [
                'age',
                'match',
                'pattern' => '/^[0-9]+$/',
                'message' => 'Age allows only numerics'
            ],
            [
                'height', 'double'
            ],
        ];
    }

    public function scenarios() {
        $arrScenarios = parent::scenarios();
        $arrScenarios['basic'] = [
            'email',
            'age',
            'city',
            'category_id',
            'gender',
            'languages',
            'height',
            'biography',
            'id'
        ];
        return $arrScenarios;
    }

    public function attributeLabels() {
        return [
            'category_id' => 'category'
        ];
    }

}
