<?php

namespace app\models;

use Yii;
use mongosoft\file\UploadImageBehavior;
/**
 * This is the model class for table "managers".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $photo
 */
class Managers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'managers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name', 'photo'], 'string', 'max' => 250],
            array('photo', 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'),
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'photo' => 'Photo',
        ];
    }
}
