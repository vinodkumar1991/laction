<?php

namespace frontend\modules\customers\models;

use Yii;
use yii\db\ActiveRecord;
use frontend\modules\customers\models\Customers;

class Profile extends ActiveRecord {

    public static function tableName() {
        return 'customer';
    }

    public $current_password;
    public $new_password;
    public $confirm_password;
    public $fb_link;
    public $google_plus_link;
    public $instagram_link;
    public $linkedin_link;
    public $twitter_link;

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
                    'current_password',
                    'new_password',
                    'confirm_password',
                    'id'
                ],
                'required',
                'on' => 'update_password',
                'message' => '{attribute} is required'
            ],
            [
                [
                    'fb_link',
                    'google_plus_link',
                    'instagram_link',
                    'linkedin_link',
                    'twitter_link',
                    'id'
                ],
                'safe',
                'on' => 'social_links',
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
            ['current_password', 'isCurrentPassword'],
            [
                [
                    'current_password',
                    'new_password',
                    'confirm_password'
                ],
                'string',
                'min' => 6,
                'max' => 100
            ],
            [
                [
                    'confirm_password'
                ],
                'compare',
                'compareAttribute' => 'new_password'
            ],
            [['fb_link',
            'google_plus_link',
            'instagram_link',
            'linkedin_link',
            'twitter_link'], 'url', 'defaultScheme' => ''],
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
        $arrScenarios['update_password'] = [
            'current_password',
            'new_password',
            'confirm_password',
            'id'
        ];
        $arrScenarios['social_links'] = [
            'fb_link',
            'google_plus_link',
            'instagram_link',
            'linkedin_link',
            'twitter_link',
            'id'
        ];

        return $arrScenarios;
    }

    public function attributeLabels() {
        return [
            'category_id' => 'category'
        ];
    }

    public function isCurrentPassword($attribute, $params) {
        if (!empty($this->current_password)) {
            $arrCustomer = Customers::getCustomer(['customer_id' => $this->id])[0];
            if (Yii::$app->getSecurity()->validatePassword($this->current_password, $arrCustomer['password'])) {
                return true;
            } else {
                $this->addError('current_password', 'Wrong password is given.');
                return false;
            }
        }
    }

}
