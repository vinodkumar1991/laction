<?php
namespace frontend\modules\customers\models;

use Yii;
use yii\db\ActiveRecord;

class Login extends ActiveRecord
{

    public $newpassword;

    public $confirmpassword;

    public $otp;

    public static function tableName()
    {
        return 'customer';
    }

    public function rules()
    {
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

    public function scenarios()
    {
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
            'phone'
        ];
        return $arrScenarios;
    }

    public function attributeLabels()
    {
        return [
            'phone' => 'Phone Number',
            'password' => 'Password',
            'newpassword' => 'New Password',
            'confirmpassword' => 'Confirm Password'
        ];
    }

    public function validateOTP($attribute, $params)
    {
        $arrToken = Token::getToken([
            'token' => $this->otp,
            'user_id' => $this->id
        ]);
        if (! empty($arrToken)) {
            return true;
        } else {
            $this->addError('otp', 'Invalid OTP is given');
            return false;
        }
    }

    public function validatePhone($attribute, $params)
    {
        $arrCustomer = Customers::getCustomer([
            'phone' => $this->phone
        
        ]);
        if (! empty($arrCustomer)) {
            return true;
        } else {
            $strSignUPLink = '<a href="' . Yii::$app->params['fweb'] . 'register' . '">Sign UP</a>';
            $this->addError('phone', 'The phone number is not registered, please use ' . $strSignUPLink);
            return false;
        }
    }
}
