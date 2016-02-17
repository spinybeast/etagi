<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\db\Query;
use zxbodya\yii2\galleryManager\GalleryBehavior;

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
 * @property int $rooms
 */
class Exclusives extends \yii\db\ActiveRecord
{

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
            [['price', 'type', 'rooms'], 'integer'],
            [['title', 'agent', 'phone', 'lot_number'], 'string', 'max' => 200],
        ];
    }
    public function behaviors()
    {
        return [
            'galleryBehavior' => [
                'class' => GalleryBehavior::className(),
                'type' => 'product',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@webroot') . '/img/exclusives',
                'url' => Yii::getAlias('@web') . '/img/exclusives',
                'hasName' => false,
                'hasDescription' => false,
                'versions' => []
            ]
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
            'rooms' => 'Количество комнат',
            'description' => 'Описание',
            'agent' => 'Агент',
            'phone' => 'Телефон',
            'lot_number' => 'Номер лота',
            'address' => 'Адрес',
            'typeName' => 'Тип',
            'rawProperties' => 'Характеристики',
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

    public function getImages($type = 'original')
    {
        $images = [];
        foreach($this->getBehavior('galleryBehavior')->getImages() as $image) {
            $images[] = Html::img($image->getUrl($type), ['class' => 'img-responsive']);
        }
        if (empty($images)) {
            $images[] = Html::img(Yii::getAlias('@web/img/no_photo.jpg'));
        }
        return $images;
    }

    public static function getRoomFilters()
    {
        $rooms = (new Query())
            ->select(['rooms',])
            ->from(self::tableName())
            ->distinct()
            ->where('rooms is not null and rooms > 0')
            ->orderBy('rooms')
            ->all();

        return ArrayHelper::map($rooms, 'rooms', 'rooms');
    }
}
