<?php
namespace backend\modules\users\models;

use yii\db\ActiveRecord;
use Yii;
use common\components\CommonComponent;
use yii\db\Query;

class Users extends ActiveRecord
{

    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [
                [
                    'fullname',
                    'role_id',
                    'role_name',
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
                    'image',
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

    public function attributeLabels()
    {
        return [
            'fullname' => 'Fullname',
            'role_id' => 'Role',
            'email' => 'Email',
            'phone' => 'Phone',
            'image' => 'Image',
            'status' => 'Status'
        ];
    }

    public function getDefaults()
    {
        return [
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => 1, // Need to change
            'password' => $this->getPassword()
        ];
    }

    public function isValidInput($attribute, $params)
    {
        $arrResponse = [];
        if (! empty($this->email) && 'email' == $attribute) {
            $arrResponse = self::getUsers([
                'email' => $this->email,
                'id' => $this->id
            ]);
        } else {
            $arrResponse = self::getUsers([
                'phone' => $this->phone,
                'id' => $this->id
            ]);
        }
        if (! empty($arrResponse)) {
            $this->addError($attribute, $attribute . ' already exists.');
            return false;
        } else {
            return true;
        }
    }

    private function getPassword()
    {
        $strPassword = CommonComponent::generatePassword();
        $strPassword = Yii::$app->getSecurity()->generatePasswordHash($strPassword);
        return $strPassword;
    }

    public static function getUsers($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            'u.id as user_id',
            'u.fullname',
            'u.role_id',
            'u.role_name',
            'u.password',
            'u.email',
            'u.phone',
            'u.image',
            'u.status'
        ]);
        $objQuery->from('users as u');
        // Email
        if (isset($arrInputs['email']) && ! empty($arrInputs['email'])) {
            $objQuery = $objQuery->andWhere('u.email=:Email', [
                ':Email' => $arrInputs['email']
            ]);
        }
        // Phone
        if (isset($arrInputs['phone']) && ! empty($arrInputs['phone'])) {
            $objQuery = $objQuery->andWhere('u.phone=:Phone', [
                ':Phone' => $arrInputs['phone']
            ]);
        }
        // Id
        if (isset($arrInputs['id']) && ! empty($arrInputs['id'])) {
            $objQuery = $objQuery->andWhere('u.id!=:Id', [
                ':Id' => $arrInputs['id']
            ]);
        }
        // UserId
        if (isset($arrInputs['user_id']) && ! empty($arrInputs['user_id'])) {
            $objQuery = $objQuery->andWhere('u.id=:userId', [
                ':userId' => $arrInputs['user_id']
            ]);
        }
        // Role
        if (isset($arrInputs['role_ids']) && ! empty($arrInputs['role_ids'])) {
            $objQuery = $objQuery->andWhere([
                'not in',
                'role_id',
                $arrInputs['role_ids']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }

    public static function updateUser($arrInputs, $arrWhere)
    {
        $objConnection = Yii::$app->db;
        $intUpdate = $objConnection->createCommand()
            ->update('users', $arrInputs, $arrWhere)
            ->execute();
        return $intUpdate;
    }
}
