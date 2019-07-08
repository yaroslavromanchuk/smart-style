<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "cars".
 *
 * @property int $id
 * @property int $year
 * @property int $price
 * @property int $currency_id
 * @property int $categories_id
 * @property int $brand_id
 * @property int $model_id
 * @property string $modification
 * @property int $body_id
 * @property int $mileage
 * @property int $region_id
 * @property int $city_id
 * @property string $image
 * @property string $damage 1-da, 0- net
 * @property string $custom 1-da, 0- net
 * @property string $VIN
 * @property int $gearbox_id
 * @property int $drive_id
 * @property int $fuel_id
 * @property int $consumption_route
 * @property int $consumption_city
 * @property int $consumption_combine
 * @property double $engine
 * @property int $power_hp
 * @property int $power_kw
 * @property int $color_id
 * @property int $metallic
 * @property int $post_auctions
 * @property string $video_key
 * @property string $description_ru
 * @property string $description_uk
 * @property int $doors
 * @property int $seats
 * @property int $country_id
 * @property int $spare_parts
 *
 * @property AutoBodystyles $body
 * @property AutoGearboxes $gearbox
 * @property AutoModels $model
 * @property AutoStates $region
 * @property AutoMarks $brand
 * @property AutoCategories $categories
 * @property AutoCities $city
 * @property AutoColors $color
 * @property AutoCountries $country
 * @property Currency $currency
 * @property AutoDriverTypes $drive
 * @property AutoOil $fuel
 * @property CarsImages[] $carsImages
 */
class Cars extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'extensions' => 'png, jpg'],
            [['year', 'price', 'currency_id', 'categories_id',  'brand_id', 'model_id',  'body_id', 'mileage', 'region_id', 'city_id', 'image'], 'required'],
            [['year', 'price', 'currency_id', 'categories_id', 'status_id', 'brand_id', 'model_id', 'damage', 'custom', 'body_id', 'mileage', 'region_id', 'city_id', 'gearbox_id', 'drive_id', 'fuel_id', 'consumption_route', 'consumption_city', 'consumption_combine', 'power_hp', 'power_kw', 'color_id', 'metallic', 'post_auctions', 'doors', 'seats', 'country_id', 'spare_parts'], 'integer'],
            [['engine'], 'number'],
            [['modification', 'image', 'VIN', 'video_key', 'description_ru', 'description_uk'], 'string', 'max' => 255],
            [['body_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoBodystyles::className(), 'targetAttribute' => ['body_id' => 'id']],
            [['gearbox_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoGearboxes::className(), 'targetAttribute' => ['gearbox_id' => 'id']],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoModels::className(), 'targetAttribute' => ['model_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoStates::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoMarks::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['categories_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoCategories::className(), 'targetAttribute' => ['categories_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoCities::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['color_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoColors::className(), 'targetAttribute' => ['color_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoCountries::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currency_id' => 'id']],
            [['drive_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoDriverTypes::className(), 'targetAttribute' => ['drive_id' => 'id']],
            [['fuel_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoOil::className(), 'targetAttribute' => ['fuel_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarsStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'year' => Yii::t('app', 'Рік випуску'),
            'price' => Yii::t('app', 'Ціна'),
            'currency_id' => Yii::t('app', 'Валюта'),
            'categories_id' => Yii::t('app', 'Тип авто'),
            'brand_id' => Yii::t('app', 'Марка'),
            'model_id' => Yii::t('app', 'Модель'),
            'modification' => Yii::t('app', 'Модифікація'),
            'body_id' => Yii::t('app', 'Тип кузова'),
            'mileage' => Yii::t('app', 'Пробіг'),
            'region_id' => Yii::t('app', 'Область'),
            'city_id' => Yii::t('app', 'Місто'),
            'image' => Yii::t('app', 'Головне фото'),
            'damage' => Yii::t('app', 'ДТП'),
            'custom' => Yii::t('app', 'Розмитнення'),
            'VIN' => Yii::t('app', 'VIN'),
            'gearbox_id' => Yii::t('app', 'Коробка передач'),
            'drive_id' => Yii::t('app', 'Тип приводу'),
            'fuel_id' => Yii::t('app', 'Тип пального'),
            'consumption_route' => Yii::t('app', 'Росхід палива на трасі'),
            'consumption_city' => Yii::t('app', 'Росхід палива по місту'),
            'consumption_combine' => Yii::t('app', 'Росхід палива в змішаному режимі'),
            'engine' => Yii::t('app', 'Об\'єм двигуна'),
            'power_hp' => Yii::t('app', 'Потужність авто в кінських силах'),
            'power_kw' => Yii::t('app', 'Потужність авто в кВ'),
            'color_id' => Yii::t('app', 'Колір'),
            'metallic' => Yii::t('app', 'Металік'),
            'post_auctions' => Yii::t('app', 'Можливий торг'),
            'video_key' => Yii::t('app', 'Ключ відео з YouTube'),
            'description_ru' => Yii::t('app', 'Опис авто на російській'),
            'description_uk' => Yii::t('app', 'Опис авто на українській'),
            'doors' => Yii::t('app', 'Кількість дверей'),
            'seats' => Yii::t('app', 'Кількість сидячих місць'),
            'country_id' => Yii::t('app', 'Країна з якої пригнане авто'),
            'spare_parts' => Yii::t('app', 'На запчастини'),
            'status_id' => Yii::t('app', 'Статус'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBody()
    {
        return $this->hasOne(AutoBodystyles::className(), ['id' => 'body_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(CarsStatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGearbox()
    {
        return $this->hasOne(AutoGearboxes::className(), ['id' => 'gearbox_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(AutoModels::className(), ['id' => 'model_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(AutoStates::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(AutoMarks::className(), ['id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasOne(AutoCategories::className(), ['id' => 'categories_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(AutoCities::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(AutoColors::className(), ['id' => 'color_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(AutoCountries::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrive()
    {
        return $this->hasOne(AutoDriverTypes::className(), ['id' => 'drive_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuel()
    {
        return $this->hasOne(AutoOil::className(), ['id' => 'fuel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarsImages()
    {
        return $this->hasMany(CarsImages::className(), ['cars_id' => 'id']);
    }
}
