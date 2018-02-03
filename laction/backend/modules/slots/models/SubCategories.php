<?php
namespace backend\modules\slots\models;

use yii\db\ActiveRecord;
use yii\db\Query;
use Yii;

class SubCategories extends ActiveRecord
{

    public static function tableName()
    {
        return 'subcategories';
    }

    public function rules()
    {
        return [
            [
                [
                    'name',
                    'category_name',
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
                'pattern' => Yii::$app->params['sub_category.name'],
                'message' => 'Invalid Sub Category Name'
            ],
            [
                'name',
                'isValidSubCategory'
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
            'category_name' => 'Category Name',
            'name' => 'Subcategory Name',
            'status' => 'Status'
        ];
    }

    public static function getSubCategories($arrInputs = [])
    {
        $objQuery = new Query();
        $objQuery->select([
            's.id as sub_category_id',
            's.category_name',
            's.name',
            's.status'
        ]);
        $objQuery->from('subcategories as s');
        // Sub Category Id
        if (isset($arrInputs['sub_category_id']) && ! empty($arrInputs['sub_category_id'])) {
            $objQuery = $objQuery->andWhere('s.id=:subCategoryId', [
                ':subCategoryId' => $arrInputs['sub_category_id']
            ]);
        }
        // Category Name
        if (isset($arrInputs['category_name']) && ! empty($arrInputs['category_name'])) {
            $objQuery = $objQuery->andWhere('s.category_name=:categoryName', [
                ':categoryName' => $arrInputs['category_name']
            ]);
        }
        // Name
        if (isset($arrInputs['name']) && ! empty($arrInputs['name'])) {
            $objQuery = $objQuery->andWhere('s.name=:subCategoryName', [
                ':subCategoryName' => $arrInputs['name']
            ]);
        }
        // Id
        if (isset($arrInputs['id']) && ! empty($arrInputs['id'])) {
            $objQuery = $objQuery->andWhere('s.id!=:Id', [
                ':Id' => $arrInputs['id']
            ]);
        }
        $arrResponse = $objQuery->all();
        return $arrResponse;
    }

    public function isValidSubCategory($attribute, $params)
    {
        $arrSubCategory = [];
        if (! empty($this->name)) {
            $arrSubCategory = self::getSubCategories([
                'name' => $this->name,
                'id' => $this->id,
                'category_name' => $this->category_name
            ]);
        }
        if (empty($arrSubCategory)) {
            return true;
        } else {
            $this->addError($attribute, 'Subcategory name is already exists.');
            return false;
        }
    }

    public function getDefaults()
    {
        return [
            'last_modified_by' => Yii::$app->session['session_data']['user_id'] // Need to change
        ];
    }

    public static function updateSubCategory($arrInputs, $arrWhere)
    {
        $objConnection = Yii::$app->db;
        $intUpdate = $objConnection->createCommand()
            ->update('subcategories', $arrInputs, $arrWhere)
            ->execute();
        return $intUpdate;
    }
}
