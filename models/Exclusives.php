<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "exclusives".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $agent
 * @property string $phone
 * @property string $lot_number
 */
class Exclusives extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'exclusives';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['title', 'agent', 'phone', 'lot_number'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'agent' => 'Agent',
            'phone' => 'Phone',
            'lot_number' => 'Lot Number',
        ];
    }
}
