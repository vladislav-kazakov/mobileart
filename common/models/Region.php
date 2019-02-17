<?php

namespace common\models;

use omgdef\multilingual\MultilingualBehavior;
use omgdef\multilingual\MultilingualQuery;
use yii\db\ActiveRecord;

/**
 * Region model
 *
 * @property integer $id
 * @property string $name
 * @property string $name_en
 * @property string $annotation
 * @property string $annotation_en
 * @property integer $created_at
 * @property integer $updated_at
 */
class Region extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'ml' => [
                'class' => MultilingualBehavior::className(),
                'languages' => [
                    'ru' => 'Russian',
                    'en' => 'English',
                ],
                'languageField' => 'locale',
                'defaultLanguage' => 'ru',
                'langForeignKey' => 'region_id',
                'tableName' => "{{%region_language}}",
                'attributes' => [
                    'name',
                    'annotation',
                ]
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'name_en', 'x', 'y'], 'required'],
            [['name', 'annotation'], 'string'],
            [['x', 'y'], 'double', 'min' => 0, 'max' => 1],
        ];
    }

    /**
     * @return MultilingualQuery|\yii\db\ActiveQuery
     */
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }

    /**
     * label attr
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'name_en' => 'Название на английском',
            'annotation' => 'Аннотация',
            'annotation_en' => 'Аннотация на английском',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSites()
    {
        return $this->hasMany(Site::className(), ['region_id' => 'id']);
    }
}
