<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property int $children
 * @property string $label
 * @property string $url
 * @property int $sort
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['children', 'sort','visible', 'type'], 'integer'],
            [['label', 'url', 'sort', 'visible','type'], 'required'],
            [['label'], 'string', 'max' => 150],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '№'),
            'children' => Yii::t('app', 'Батьківська категрія'),
            'label' => Yii::t('app', 'Назва'),
            'url' => Yii::t('app', 'Url адреса'),
            'sort' => Yii::t('app', 'Сортування'),
            'visible' => Yii::t('app', 'Видимість'),
            'type' => Yii::t('app', 'Тип меню'),
        ];
    }

    
    public function getStructure()
    {
      $menu =  Menu::find()->where('visible = 1 and type = 2')->all(); 
      
      $data = [];
      foreach ($menu as $m) {
          if($m['children']){
             $data[$m['children']]['items'][$m['id']] = [
                 'label' => Yii::t('app', $m['label']),
                 'url' => [$m['url']],
             ];
             $data[$m['children']]['template'] = '<a href="{url}" class="menu-item dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{label}</a>';
             $data[$m['children']]['options'] = [
                            'class' => 'menu-item menu-item-has-children animate-dropdown dropdown',
                        ];
         }else{
              $data[$m['id']] = [
                  'label' => Yii::t('app', $m['label']),
                 'url' => [$m['url']],
              ]; 
          }
      }
      return $data;
    }
    public function adminMenu() {
        $menu =  Menu::find()->where('visible = 1 and type = 1')->all(); 
        
        $data = [];
      foreach ($menu as $m) {
          if($m['children']){
             $data[$m['children']]['items'][$m['id']] = [
                 'label' => Yii::t('app', $m['label']),
                 'url' => $m['url'],
             ];
             $data[$m['children']]['template'] = '<a href="{url}" class="menu-item dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{label}</a>';
             $data[$m['children']]['options'] = [
                            'class' => 'menu-item menu-item-has-children animate-dropdown dropdown',
                        ];
         }else{
              $data[$m['id']] = [
                  'label' => Yii::t('app', $m['label']),
                 'url' => $m['url'],
              ]; 
          }
      }
      return $data;
        
    }
}
