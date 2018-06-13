<?php

namespace frontend\modules\customers\models;

use Yii;
use yii\db\ActiveRecord;

class Login extends ActiveRecord {

    public $newpassword;
    public $confirmpassword;
    public $otp;
    public $category_type;

    public static function tableName() {
        return 'customer';
    }

    public function rules() {
        return [
            [
                [
                    'phone',
                    'password'
                ],
                'required',
                'on' => 'login',
                'message' => '{attribute} is required'
            ],
            [
                [
                    'newpassword',
                    'confirmpassword',
                    'id'
                ],
                'required',
                'on' => 'changepassword',
                'message' => '{attribute} is required'
            ],
            [
                [
                    'newpassword',
                    'confirmpassword',
                    'id',
                    'otp'
                ],
                'required',
                'on' => 'updatepassword',
                'message' => '{attribute} is required'
            ],
            [
                [
                    'phone'
                ],
                'required',
                'on' => 'generateotp',
                'message' => '{attribute} is required'
            ],
            [
                [
                    'category_type'
                ],
                'safe',
                'on' => 'generateotp',
            ],
            [
                [
                    'phone'
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
                'phone',
                'match',
                'pattern' => '/^[0-9]+$/',
                'message' => 'Phone number allows only numerics'
            ],
            [
                'password',
                'string',
                'min' => 6,
                'max' => 100
            ],
            [
                [
                    'newpassword',
                    'confirmpassword'
                ],
                'string',
                'min' => 6,
                'max' => 100
            ],
            [
                [
                    'confirmpassword'
                ],
                'compare',
                'compareAttribute' => 'newpassword'
            ],
            [
                'otp',
                'validateOTP',
                'on' => 'updatepassword'
            ],
            [
                'phone',
                'validatePhone',
                'on' => 'generateotp'
            ]
        ];
    }

    public function scenarios() {
        $arrScenarios = parent::scenarios();
        $arrScenarios['login'] = [
            'phone',
            'password'
        ];
        $arrScenarios['changepassword'] = [
            'newpassword',
            'confirmpassword',
            'id'
        ];
        $arrScenarios['updatepassword'] = [
            'newpassword',
            'confirmpassword',
            'otp',
            'id'
        ];
        $arrScenarios['generateotp'] = [
            'phone',
            'category_type'
        ];
        return $arrScenarios;
    }

    public function attributeLabels() {
        return [
            'phone' => 'Phone Number',
            'password' => 'Password',
            'newpassword' => 'New Password',
            'confirmpassword' => 'Confirm Password'
        ];
    }

    public function validateOTP($attribute, $params) {
        $arrToken = Token::getToken([
                    'token' => $this->otp,
                    'user_id' => $this->id,
                    'category_type' => 'forgotpwd',
        ]);
        if (!empty($arrToken)) {
            return true;
        } else {
            $this->addError('otp', 'Invalid OTP is given');
            return false;
        }
    }

    public function validatePhone($attribute, $params) {
        //$arrIn = ['forgotpwd'];
        //$arrCustomer = [];
        //if (in_array($this->category_type, $arrIn)) {
        $arrCustomer = Customers::getCustomer([
                    'phone' => $this->phone
        ]);
        //}
        if ((!empty($arrCustomer) && $this->category_type != 'registration') || (empty($arrCustomer) && $this->category_type != "forgotpwd")) {
            return true;
        } else {
            $strMessage = null;
            if ($this->category_type == 'forgotpwd') {
                $strMessage = 'The phone number is not registered, please use ';
                $strSignUPLink = '<a href="' . Yii::$app->params['fweb'] . 'register' . '">Sign UP</a>';
            } else {
                $strMessage = 'Already you have an account. Please use ';
                $strSignUPLink = '<a href="' . Yii::$app->params['fweb'] . 'login' . '">Login</a>';
            }
            $this->addError('phone', $strMessage . $strSignUPLink);
            return false;
        }
    }

}
