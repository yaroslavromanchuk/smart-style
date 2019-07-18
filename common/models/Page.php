<?php

namespace common\models;

use Yii;
use \backend\models\Template;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string $title
 * @property string $page_body
 * @property string $page_footer
 * @property string $keywords
 * @property string $description
 * @property string $image
 * @property int $nofollow
 * @property int $sitemap
 * @property int $template_id
 *
 * @property Template $template
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url', 'title',  'keywords', 'description', 'template_id'], 'required'],
            [['page_body', 'page_footer', 'keywords', 'description'], 'string'],
            [['nofollow', 'sitemap', 'template_id'], 'integer'],
            [['name', 'url', 'title'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 155],
            [['template_id'], 'exist', 'skipOnError' => true, 'targetClass' => Template::className(), 'targetAttribute' => ['template_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Назва сторінки'),
            'url' => Yii::t('app', 'Посилання'),
            'title' => Yii::t('app', 'Заголовок'),
            'page_body' => Yii::t('app', 'Зміст сторінки'),
            'page_footer' => Yii::t('app', 'Текст в кінці сторінки'),
            'keywords' => Yii::t('app', 'Ключові слова'),
            'description' => Yii::t('app', 'Опис сторінки'),
            'image' => Yii::t('app', 'Фото'),
            'nofollow' => Yii::t('app', 'Індексація'),
            'sitemap' => Yii::t('app', 'Карта сайту'),
            'template_id' => Yii::t('app', 'Шаблон'),
        ];

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemplate()
    {
        return $this->hasOne(Template::className(), ['id' => 'template_id']);
    }
}
