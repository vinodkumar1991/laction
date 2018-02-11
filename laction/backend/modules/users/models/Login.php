<?php
namespace backend\modules\users\models;

use yii\db\ActiveRecord;
use backend\modules\users\models\Token;

class Login extends ActiveRecord
{

    public $newpassword;

    public $confirmpassword;

    public $otp;

    public static function tableName()
    {
        return 'users';
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
                'trim'
            ],
            [
                'phone',
                'string',
                'min' => 10,
                'max' => 10
            ],
            [
                'password',
                'string',
                'min' => 6,
                'max' => 6
            ],
            [
                [
                    'newpassword',
                    'confirmpassword'
                ],
                'string',
                'min' => 6,
                'max' => 6
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
}
