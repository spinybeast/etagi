<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ConsultForm extends Model
{

    public $name;
    public $phone;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Ваше имя',
            'phone' => 'Ваш телефон',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @return boolean whether the model passes validation
     */
    public function send()
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo(Yii::$app->params['adminEmail'])
                ->setFrom([Yii::$app->params['adminEmail'] => $this->name])
                ->setSubject('Заявка на консультацию')
                ->setTextBody('Телефон: ' . $this->phone . ', Имя: ' . $this->name)
                ->send();

            return true;
        }
        return false;
    }
}