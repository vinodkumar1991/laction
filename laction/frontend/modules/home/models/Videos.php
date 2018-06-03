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
            'v.rank',
            'DATE_FORMAT(v.created_date, "%d %b %Y") as release_on'
        ]);
        $objQuery->from('videos as v');
        // Status
        if (isset($arrInputs['status']) && ! empty($arrInputs['status'])) {
            $objQuery->andWhere('v.status=:status', [
                ':status' => $arrInputs['status']
            ]);
        }
        // Home
        if (isset($arrInputs['home']) && ! empty($arrInputs['home'])) {
            $objQuery->andWhere('v.rank!=:rank', [
                ':rank' => ""
            ]);
        }
        // Order By
        if (isset($arrInputs['home']) && ! empty($arrInputs['home'])) {
            $objQuery->orderBy([
                'v.rank' => SORT_ASC
            ]);
        } else {
            $objQuery->orderBy([
                'v.created_date' => SORT_DESC
            ]);
        }
        // Limit
        if (isset($arrInputs['limit']) && ! empty($arrInputs['limit'])) {
            $objQuery->limit($arrInputs['limit']);
        }
        
        $arrResponse = $objQuery->all(self::getDb());
        return $arrResponse;
    }
}
