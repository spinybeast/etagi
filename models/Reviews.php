<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property integer $id
 * @property string $author
 * @property string $text
 * @property integer $published
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author'], 'required', 'message' => 'Введите Ваше имя'],
            [['text'], 'string'],
            [['published'], 'integer'],
            [['author'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => 'Ваше имя',
            'text' => 'Ваш отзыв',
            'published' => 'Опубликован',
        ];
    }
}
