<?php
namespace backend\modules\slots\models;

use yii\db\ActiveRecord;
use yii\db\Query;
use Yii;

class Categories extends ActiveRecord
{

    public static function tableName()
    {
        return 'categories';
    }

    public function rules()
    {
        return [
            [
                [
                    'name',
                    'status'
                
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
                'min' => 2,
                'max' => 40
            ],
            [
                'name',
                'match',
                'pattern' => Yii::$app->params['category.name'],
                'message' => 'Invalid Category Name'
            ],
            [
                'name',
                'isValidCategory'
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
            'name' => 'Category Name',
            'status' => 'Status'
        ];
    }

    public static function getCategories($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            'c.id as category_id',
            'c.name',
            'c.status'
        ]);
        $objQuery->from('categories as c');
        // Category Id
        if (isset($arrInputs['category_id']) && ! empty($arrInputs['category_id'])) {
            $objQuery = $objQuery->andWhere('c.id=:categoryId', [
                ':categoryId' => $arrInputs['category_id']
            ]);
        }
        // Name
        if (isset($arrInputs['name']) && ! empty($arrInputs['name'])) {
            $objQuery = $objQuery->andWhere('c.name=:categoryName', [
                ':categoryName' => $arrInputs['name']
            ]);
        }
        // Id
        if (isset($arrInputs['id']) && ! empty($arrInputs['id'])) {
            $objQuery = $objQuery->andWhere('c.id!=:Id', [
                ':Id' => $arrInputs['id']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }

    public function isValidCategory($attribute, $params)
    {
        $arrCategory = [];
        if (! empty($this->name)) {
            $arrCategory = self::getCategories([
                'name' => $this->name,
                'id' => $this->id
            ]);
        }
        if (empty($arrCategory)) {
            return true;
        } else {
            $this->addError($attribute, 'Category name is already exists.');
            return false;
        }
    }

    public function getDefaults()
    {
        return [
            'last_modified_by' => Yii::$app->session['session_data']['user_id'] // Need to change
        ];
    }

    public static function updateCategory($arrInputs, $arrWhere)
    {
        $objConnection = Yii::$app->db;
        $intUpdate = $objConnection->createCommand()
            ->update('categories', $arrInputs, $arrWhere)
            ->execute();
        return $intUpdate;
    }
}
