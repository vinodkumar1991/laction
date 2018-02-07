<?php
namespace backend\modules\users\models;

use yii\db\ActiveRecord;
use Yii;
use yii\db\Query;

class RolePermissions extends ActiveRecord
{

    public $sign;

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
                    'last_modified_by',
                    'sign'
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
            'created_by' => Yii::$app->session['session_data']['user_id'],
            'last_modified_by' => Yii::$app->session['session_data']['user_id']
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
        // permission
        if (isset($arrInputs['permission']) && ! empty($arrInputs['permission'])) {
            $objQuery = $objQuery->andWhere('rp.permission=:Permission', [
                ':Permission' => $arrInputs['permission']
            ]);
        }
        // status
        if (isset($arrInputs['status']) && ! empty($arrInputs['status'])) {
            $objQuery = $objQuery->andWhere('rp.status=:status', [
                ':status' => $arrInputs['status']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }

    public function isValidPermissionMap($attribute, $params)
    {
        $arrRolePermission = [];
        if (! empty($this->role)) {
            $arrInputs = ! empty($this->sign) ? [
                'role' => $this->role,
                'permission' => $this->permission
            ] : [
                'role' => $this->role
            ];
            $arrRolePermission = self::getRolePermissions($arrInputs);
        }
        if (empty($arrRolePermission)) {
            return true;
        } else {
            $this->addError($attribute, 'Permissions already mapped to this role');
            return false;
        }
    }

    public static function updateRolePermission($arrInputs, $arrWhere)
    {
        $objConnection = Yii::$app->db;
        $intUpdate = $objConnection->createCommand()
            ->update('role_permissions', $arrInputs, $arrWhere)
            ->execute();
        return $intUpdate;
    }
}
