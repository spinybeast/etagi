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
            [['name'], 'string', 'max' => 250],
            ['photo', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'checkExtensionByMimeType' => false, 'on' => ['default', 'create', 'update']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => UploadImageBehavior::className(),
                'attribute' => 'photo',
                'scenarios' => ['default', 'create', 'update'],
                'placeholder' => '@webroot/img/no_photo.jpg',
                'path' => '@webroot/img/managers/{id}',
                'url' => '@web/img/managers/{id}',
                'thumbs' => [
                    'thumb' => ['width' => 400, 'quality' => 90],
                    'preview' => ['width' => 200, 'height' => 200],
                ],
            ],
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
