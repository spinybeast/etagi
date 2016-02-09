<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use mongosoft\file\UploadImageBehavior;
/**
 * This is the model class for table "banners".
 *
 * @property integer $id
 * @property string $url
 * @property string $photo
 */
class Banners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url'], 'string', 'max' => 250],
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
                'path' => '@webroot/img/banners/{id}',
                'url' => '@web/img/banners/{id}',
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
            'url' => 'Ссылка',
            'photo' => 'Картинка',
        ];
    }

    public static function getCarousel()
    {
        $slider = [];
        $items = Banners::find()->all();

        foreach ($items as $item) {
            $slide = '';
            if (!empty($item->url)) {
                $slide .= Html::beginTag('a', ['href' => $item->url]);
            }
            $slide .= Html::img($item->getUploadUrl('photo'));
            if (!empty($item->url)) {
                $slide .= Html::endTag('a');
            }
            $slider[] = $slide;
        }

        return $slider;
    }
}
