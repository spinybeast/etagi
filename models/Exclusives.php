<?php

namespace app\models;

use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "exclusives".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $agent
 * @property string $phone
 * @property string $lot_number
 * @property integer $price
 * @property string $address
 * @property string $type
 */
class Exclusives extends \yii\db\ActiveRecord
{

    public $images = [];
    public static $path = '@webroot/img/exclusives/';

    const HOUSE = 1;
    const FLAT = 0;

    public static $types = array(
        self::HOUSE => 'Дом',
        self::FLAT => 'Квартира',
    );
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
            [['description', 'address'], 'string'],
            [['price', 'type'], 'integer'],
            [['title', 'agent', 'phone', 'lot_number'], 'string', 'max' => 200],
            [['images'], 'file', 'maxFiles' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'price' => 'Цена',
            'description' => 'Описание',
            'agent' => 'Агент',
            'phone' => 'Телефон',
            'lot_number' => 'Номер лота',
            'address' => 'Адрес',
            'typeName' => 'Тип',
            'type' => 'Тип'
        ];
    }

    public function getProperties()
    {
        return $this->hasMany(ExclusivesProperties::className(), ['exclusive_id' => 'id']);
    }

    public function clearProperties()
    {
        if (!empty($this->properties)) {
            foreach($this->properties as $property) {
                $property->delete();
            }
        }
    }

    public function getRawProperties()
    {
        $content = '';
        foreach ($this->properties as $property) {
            $content .= $property->name . ': ' . $property->value . '<br />';
        }
        return $content;
    }

    public function getTypeName()
    {
        return self::$types[$this->type];
    }

    public function getImages()
    {
        $images = [];
        $path = Yii::getAlias(self::$path . $this->id);
        if (is_dir($path) && $files = FileHelper::findFiles($path)) {
            foreach ($files as $file) {
                $images[] = Yii::getAlias('@web/img/exclusives/' . $this->id . '/' . basename($file));
            }
        }
        if (empty($images)) {
            $images[] = Yii::getAlias('@web/img/no_photo.jpg');
        }
        return $images;
    }

    public function beforeDelete()
    {
        $path = Yii::getAlias(self::$path . $this->id);
        FileHelper::removeDirectory($path);

        return parent::beforeDelete();
    }
}
