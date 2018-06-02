<?php
namespace frontend\modules\home\models;

use yii\db\ActiveRecord;
use Yii;
use yii\db\Query;

class Videos extends ActiveRecord
{

    public static function tableName()
    {
        return 'videos';
    }

    public static function getDb()
    {
        return Yii::$app->db2;
    }

    public static function getVideos($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            'v.id as file_id',
            'v.name as file_name',
            'v.image as file_image',
            'v.file as file_link',
            'v.description as file_description',
            'v.publish_on',
            'v.rank'
        ]);
        $objQuery->from('videos as v');
        // Status
        if (isset($arrInputs['status']) && ! empty($arrInputs['status'])) {
            $objQuery->andWhere('v.status=:status', [
                ':status' => $arrInputs['status']
            ]);
        }
        // Order By
        $objQuery->orderBy([
            'v.rank' => SORT_ASC
        ]);
        $arrResponse = $objQuery->all(self::getDb());
        return $arrResponse;
    }
}
