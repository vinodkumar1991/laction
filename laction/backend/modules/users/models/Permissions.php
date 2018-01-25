<?php
namespace backend\modules\users\models;

use yii\db\ActiveRecord;
use yii\db\Query;
use Yii;

class Permissions extends ActiveRecord
{

    public static function tableName()
    {
        return 'permissions';
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
                'pattern' => Yii::$app->params['permission.name'],
                'message' => 'Invalid Permission Name'
            ],
            [
                'name',
                'isValidPermission'
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
            'name' => 'Permission Name',
            'status' => 'Status'
        ];
    }

    public static function getPermissions($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            'p.id',
            'p.name',
            'p.status'
        ]);
        $objQuery->from('permissions as p');
        // Permission
        if (isset($arrInputs['permission_id']) && ! empty($arrInputs['permission_id'])) {
            $objQuery = $objQuery->andWhere('p.id=:permissionId', [
                ':permissionId' => $arrInputs['permission_id']
            ]);
        }
        // Name
        if (isset($arrInputs['name']) && ! empty($arrInputs['name'])) {
            $objQuery = $objQuery->andWhere('p.name=:permissionName', [
                ':permissionName' => $arrInputs['name']
            ]);
        }
        // Id
        if (isset($arrInputs['id']) && ! empty($arrInputs['id'])) {
            $objQuery = $objQuery->andWhere('p.id!=:Id', [
                ':Id' => $arrInputs['id']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }

    public function isValidPermission($attribute, $params)
    {
        $arrPermission = [];
        if (! empty($this->name)) {
            $arrPermission = self::getPermissions([
                'name' => $this->name,
                'id' => $this->id
            ]);
        }
        if (empty($arrPermission)) {
            return true;
        } else {
            $this->addError($attribute, 'Permission name is already exists.');
            return false;
        }
    }

    public function getDefaults()
    {
        return [
            'last_modified_by' => 1 // Need to change
        ];
    }

    public static function updatePermission($arrInputs, $arrWhere)
    {
        $objConnection = Yii::$app->db;
        $intUpdate = $objConnection->createCommand()
            ->update('permissions', $arrInputs, $arrWhere)
            ->execute();
        return $intUpdate;
    }
}
