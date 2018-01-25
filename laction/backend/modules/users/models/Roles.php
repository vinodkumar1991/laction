<?php
namespace backend\modules\users\models;

use yii\db\ActiveRecord;
use yii\db\Query;
use Yii;

class Roles extends ActiveRecord
{

    public static function tableName()
    {
        return 'roles';
    }

    public function rules()
    {
        return [
            [
                [
                    'name'
                
                ],
                'required',
                'message' => '{attribute} is required'
            ],
            [
                [
                    'name'
                ],
                'trim'
            ],
            [
                'name',
                'string',
                'min' => 3,
                'max' => 30
            ],
            [
                'name',
                'match',
                'pattern' => Yii::$app->params['role.name'],
                'message' => 'Invalid Role Name'
            ],
            [
                'name',
                'isValidRole'
            ],
            [
                [
                    'id',
                    'status'
                ],
                'safe'
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'name' => 'Role Name',
            'status' => 'Status'
        ];
    }

    public static function getRoles($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            'r.id',
            'r.name',
            'r.status'
        ]);
        $objQuery->from('roles as r');
        // Role
        if (isset($arrInputs['role_id']) && ! empty($arrInputs['role_id'])) {
            $objQuery = $objQuery->andWhere('r.id=:roleId', [
                ':roleId' => $arrInputs['role_id']
            ]);
        }
        // Name
        if (isset($arrInputs['name']) && ! empty($arrInputs['name'])) {
            $objQuery = $objQuery->andWhere('r.name=:roleName', [
                ':roleName' => $arrInputs['name']
            ]);
        }
        // Id
        if (isset($arrInputs['id']) && ! empty($arrInputs['id'])) {
            $objQuery = $objQuery->andWhere('r.id!=:Id', [
                ':Id' => $arrInputs['id']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }

    public function isValidRole($attribute, $params)
    {
        $arrRole = [];
        if (! empty($this->name)) {
            $arrRole = self::getRoles([
                'name' => $this->name,
                'id' => $this->id
            ]);
        }
        if (empty($arrRole)) {
            return true;
        } else {
            $this->addError($attribute, 'Role name is already exists.');
            return false;
        }
    }

    public function getDefaults()
    {
        return [
            'last_modified_by' => 1 // Need to change
        ];
    }

    public static function updateRole($arrInputs, $arrWhere)
    {
        $objConnection = Yii::$app->db;
        $intUpdate = $objConnection->createCommand()
            ->update('roles', $arrInputs, $arrWhere)
            ->execute();
        return $intUpdate;
    }
}
