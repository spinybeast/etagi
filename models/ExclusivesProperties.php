<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "exclusives_properties".
 *
 * @property integer $id
 * @property integer $exclusive_id
 * @property integer $property_id
 * @property string $value
 */
class ExclusivesProperties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'exclusives_properties';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exclusive_id', 'property_id', 'value'], 'required'],
            [['exclusive_id', 'property_id'], 'integer'],
            [['value'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'exclusive_id' => 'Exclusive ID',
            'property_id' => 'Property ID',
            'value' => 'Value',
        ];
    }

    public function getProperty()
    {
        return $this->hasOne(Properties::className(), ['id' => 'property_id']);
    }

    public function getName()
    {
        return !empty($this->property) ? $this->property->name : '';
    }
}
