<?php

namespace frontend\modules\customers\models;

use yii\db\ActiveRecord;
use Yii;
use yii\db\Query;

class Customers extends ActiveRecord {

    public static function tableName() {
        return 'customer';
    }

    public function rules() {
        return [
            [
                [
                    'fullname',
                    'password',
                    'phone',
                    'status'
                ],
                'required',
                'message' => '{attribute} is required'
            ],
            [
                [
                    'id',
                    'email',
                    'created_date',
                    'created_by',
                    'last_modified_date',
                    'last_modified_by'
                ],
                'safe'
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
                'min' => 5,
                'max' => 40
            ],
            [
                [
                    'phone'
                ],
                'string',
                'min' => 10,
                'max' => 10
            ],
            [
                [
                    'password'
                ],
                'string',
                'min' => 6,
                'max' => 100
            ],
            [
                'phone',
                'match',
                'pattern' => '/^[0-9]+$/',
                'message' => 'Phone number allows only numerics'
            ],
            [
                [
                    'fullname'
                ],
                'string',
                'min' => 3,
                'max' => 100
            ],
            [
                'fullname',
                'match',
                'pattern' => '/^[a-zA-Z \']+$/',
                'message' => 'Fullname allows only alphabets'
            ],
            [
                [
                    'email',
                    'phone'
                ],
                'isValidInput'
            ]
        ];
    }

    public function attributeLabels() {
        return [
            'fullname' => 'Fullname',
            'email' => 'Email',
            'phone' => 'Phone',
            'password' => 'password',
            'status' => 'Status'
        ];
    }

    public function getDefaults() {
        return [
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => 1 // Need to change
        ];
    }

    public function isValidInput($attribute, $params) {
        $arrResponse = [];
        if (!empty($this->email) && 'email' == $attribute) {
            $arrResponse = self::getCustomer([
                        'email' => $this->email
            ]);
        } else {
            $arrResponse = self::getCustomer([
                        'phone' => $this->phone
            ]);
        }
        if (!empty($arrResponse)) {
            $this->addError($attribute, $attribute . ' already exists.');
            return false;
        } else {
            return true;
        }
    }

    public static function getCustomer($arrInputs = []) {
        $objQuery = new Query();
        $objQuery->select([
            'c.id as customer_id',
            'c.fullname',
            'c.email',
            'c.phone',
            'c.password',
            'c.status',
            'c.age',
            'c.city',
            'c.gender',
            'c.languages',
            'c.height',
            'c.biography',
            'c.category_id',
            'c.fb_link',
            'c.google_plus_link',
            'c.instagram_link',
            'c.linkedin_link',
            'c.twitter_link'
        ]);
        $objQuery->from('customer as c');
        // Phone
        if (isset($arrInputs['phone']) && !empty($arrInputs['phone'])) {
            $objQuery = $objQuery->andWhere('c.phone=:Phone', [
                ':Phone' => $arrInputs['phone']
            ]);
        }
        // Email
        if (isset($arrInputs['email']) && !empty($arrInputs['email'])) {
            $objQuery = $objQuery->andWhere('c.email=:Email', [
                ':Email' => $arrInputs['email']
            ]);
        }
        // Id
        if (isset($arrInputs['id']) && !empty($arrInputs['id'])) {
            $objQuery = $objQuery->andWhere('c.id!=:Id', [
                ':Id' => $arrInputs['id']
            ]);
        }
        // Password
        if (isset($arrInputs['password']) && !empty($arrInputs['password'])) {
            $objQuery = $objQuery->andWhere('c.password=:password', [
                ':password' => $arrInputs['password']
            ]);
        }
        // Customer Id
        if (isset($arrInputs['customer_id']) && !empty($arrInputs['customer_id'])) {
            $objQuery = $objQuery->andWhere('c.id=:customerId', [
                ':customerId' => $arrInputs['customer_id']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }

    public static function updateCustomer($arrInputs, $arrWhere) {
        $objConnection = Yii::$app->db;
        $intUpdate = $objConnection->createCommand()
                ->update('customer', $arrInputs, $arrWhere)
                ->execute();
        return $intUpdate;
    }

}
