<?php

namespace common\models;

use Yii;
use common\models\base\RgnSubdistrict as BaseRgnSubdistrict;
use common\models\RgnDistrict;

/**
 * This is the model class for table "rgn_subdistrict".
 *
 * @property string $recordStatusLabel
 * @property integer $country_id
 * @property integer $province_id
 * @property integer $city_id
 *
 * @property \common\models\RgnCountry $country
 * @property \common\models\RgnProvince $province
 * @property \common\models\RgnCity $city
 */
class RgnSubdistrict extends BaseRgnSubdistrict
{

	public $country_id;

	public $province_id;

	public $city_id;

	public $_country;

	public $_province;

	public $_city;

	/**
	 * @inheritdoc
	 */
	static function findOne($condition)
	{
		$model = parent::findOne($condition);
		$district = $model->district;

		if ($district)
		{
			$model->city_id = $district->city_id;
			$model->_city = $district->city;

			if ($model->_city)
			{
				$model->province_id = $model->_city->province_id;
				$model->_province = $model->_city->province;

				if ($model->_province)
				{
					$model->country_id = $model->_province->country_id;
				}
			}
		}

		return $model;

	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id'				 => 'ID',
			'recordStatus'		 => 'Record Status',
			'recordStatusLabel'	 => 'Record Status',
			'number'			 => 'Number',
			'name'				 => 'Name',
			'district_id'		 => 'District',
			'city_id'			 => 'City',
			'province_id'		 => 'Province',
			'country_id'		 => 'Country',
			'created_at'		 => 'Created At',
			'updated_at'		 => 'Updated At',
			'deleted_at'		 => 'Deleted At',
			'createdBy_id'		 => 'Created By',
			'updatedBy_id'		 => 'Updated By',
			'deletedBy_id'		 => 'Deleted By',
		];

	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			/* default value */
			['recordStatus', 'default', 'value' => static::RECORDSTATUS_USED],
			/* required */
			[['name', 'district_id'], 'required'],
			/* field type */
			[['recordStatus'], 'string'],
			[['number'], 'string', 'max' => 32],
			[['name'], 'string', 'max' => 255],
			[['created_at', 'updated_at', 'deleted_at', 'createdBy_id', 'updatedBy_id', 'deletedBy_id'], 'integer'],
			/* value limitation */
			['recordStatus', 'in', 'range' => [
					self::RECORDSTATUS_USED,
					self::RECORDSTATUS_DELETED,
				]
			],
			[
				'district_id',
				'exist',
				'targetClass'		 => RgnDistrict::className(),
				'targetAttribute'	 => 'id',
				'when'				 => function ($model, $attribute)
				{
					return is_numeric($model->$attribute);
				},
				'message' => "District doesn't exist.",
			],
		];

	}

	/**
	 * @return RgnCity
	 */
	public function getCity()
	{
		if ($this->_city === NULL)
		{
			if ($this->district_id > 0)
			{
				$district = $this->district;

				if ($district)
				{
					$this->_city = $district->city;
				}
			}
		}

		return $this->_city;

	}

	/**
	 * @return RgnProvince
	 */
	public function getProvince()
	{
		if ($this->_province === NULL)
		{
			if ($this->city)
			{
				$this->_province = $this->city->province;
			}
		}

		return $this->_province;

	}

	/**
	 * @return RgnCountry
	 */
	public function getCountry()
	{
		if ($this->_country === NULL)
		{
			if ($this->province)
			{
				$this->_country = $this->province->country;
			}
		}

		return $this->_country;

	}

	/**
	 * get recordStatus label
	 *
	 * @return string
	 */
	public function getRecordStatusLabel()
	{
		return parent::getRecordStatusValueLabel($this->recordStatus);

	}

	/**
	 * @inheritdoc
	 */
	public function delete()
	{
		$this->recordStatus = static::RECORDSTATUS_USED;

		return parent::softDelete();

	}

	/**
	 * @inheritdoc
	 */
	public function restore()
	{
		$this->recordStatus = static::RECORDSTATUS_USED;

		return parent::restore();

	}

}
