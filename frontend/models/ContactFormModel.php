<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class ContactFormModel extends Model
{
    public $name;
    public $email;
    public $subject;
    public $text;
    public $captcha;

    public function rules()
    {
        return [
            [['name', 'email', 'subject', 'text'], 'required'],
            [['email', 'email'], 'required'],
            [['text'], 'string', 'max' => 1000],
            ['captcha', 'captcha', 'captchaAction' => '/app/captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('frontend', 'Name'),
            'email' => Yii::t('frontend', 'Email'),
            'subject' => Yii::t('frontend', 'Subject'),
            'text' => Yii::t('frontend', 'Text'),
            'captcha' => Yii::t('frontend', 'Captcha'),
        ];
    }

    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->text)
                ->send();

            return true;
        } else {
            return false;
        }
    }
}
