<?php
namespace frontend\modules\customers\models;

use yii\db\ActiveRecord;
use yii\db\Query;

class Cities extends ActiveRecord
{

    public static function tableName()
    {
        return 'cities';
    }

    public static function getCities($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            'c.id as city_id',
            'c.name as city_name'
        ]);
        $objQuery->from('cities as c');
        // Status
        if (isset($arrInputs['status']) && ! empty($arrInputs['status'])) {
            $objQuery = $objQuery->andWhere('c.status=:Status', [
                ':Status' => $arrInputs['status']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }
}
