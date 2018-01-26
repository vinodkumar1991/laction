<?php
namespace backend\modules\users\models;

use yii\db\ActiveRecord;
use Yii;
use yii\db\Query;

class RolePermissions extends ActiveRecord
{

    public static function tableName()
    {
        return 'role_permissions';
    }

    public function rules()
    {
        return [
            [
                [
                    'role',
                    'permission',
                    'status'
                ],
                'required'
            ],
            [
                [
                    'id',
                    'created_date',
                    'created_by',
                    'last_modified_date',
                    'last_modified_by'
                ],
                'safe'
            ],
            [
                'role',
                'isValidPermissionMap'
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'role' => 'Role',
            'permission' => 'Permission',
            'status' => 'Status'
        ];
    }

    public function create($arrInputs)
    {
        $intInsert = Yii::$app->db->createCommand()
            ->batchInsert('role_permissions', [
            'role',
            'permission',
            'status',
            'created_date',
            'created_by'
        ], $arrInputs)
            ->execute();
        return $intInsert;
    }

    public function getDefaults()
    {
        return [
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => 1 // Need to change
        ];
    }

    public static function getRolePermissions($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            'rp.id',
            'rp.role',
            'rp.permission',
            'rp.status'
        ]);
        $objQuery->from('role_permissions as rp');
        // role
        if (isset($arrInputs['role']) && ! empty($arrInputs['role'])) {
            $objQuery = $objQuery->andWhere('rp.role=:Role', [
                ':Role' => $arrInputs['role']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }

    public function isValidPermissionMap($attribute, $params)
    {
        $arrRolePermission = [];
        if (! empty($this->role)) {
            $arrRolePermission = self::getRolePermissions([
                'role' => $this->role
            ]);
        }
        if (empty($arrRolePermission)) {
            return true;
        } else {
            $this->addError($attribute, 'Permissions already mapped to this role');
            return false;
        }
    }
}
