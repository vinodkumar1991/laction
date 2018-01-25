<?php
namespace backend\modules\users\models;

use yii\db\ActiveRecord;
use yii\db\Query;

class Permissions extends ActiveRecord
{

    public static function tableName()
    {
        return 'permissions';
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
        // Id
        if (isset($arrInputs['id']) && ! empty($arrInputs['id'])) {
            $objQuery = $objQuery->andWhere('p.id!=:Id', [
                ':Id' => $arrInputs['id']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }
}
