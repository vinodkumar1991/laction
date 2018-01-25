<?php
namespace backend\modules\users\models;

use yii\db\ActiveRecord;
use yii\db\Query;

class Roles extends ActiveRecord
{

    public static function tableName()
    {
        return 'roles';
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
        // Id
        if (isset($arrInputs['id']) && ! empty($arrInputs['id'])) {
            $objQuery = $objQuery->andWhere('r.id!=:Id', [
                ':Id' => $arrInputs['id']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }
}
