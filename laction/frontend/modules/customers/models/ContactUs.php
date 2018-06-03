<?php
namespace frontend\modules\customers\models;

use yii\db\ActiveRecord;

class ContactUs extends ActiveRecord
{

    public static function tableName()
    {
        return 'contact_us';
    }

    public function rules()
    {
        return [
            [
                [
                    'fullname',
                    'phone',
                    'description',
                    'status'
                ],
                'required'
            ],
            [
                [
                    'phone',
                    'email',
                    'fullname',
                    'description'
                ],
                'trim'
            ],
            [
                'phone',
                'string',
                'min' => 10,
                'max' => 10
            ],
            [
                'description',
                'string',
                'max' => 62000
            ],
            [
                'phone',
                'match',
                'pattern' => '/^[0-9]+$/',
                'message' => 'Phone number allows only numerics'
            ],
            [
                'email',
                'email'
            ],
            [
                [
                    'email'
                ],
                'string',
                'max' => 40
            ],
            [
                [
                    'fullname'
                ],
                'string',
                'max' => 100
            ],
            [
                [
                    'id',
                    'email',
                    'created_date'
                ],
                'safe'
            ]
        ];
    }

    public function getDefaults()
    {
        return [
            'created_date' => date('Y-m-d H:i:s')
        ];
    }
}
