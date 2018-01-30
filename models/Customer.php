<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tb_m_customer".
 *
 * @property int $id_customer
 * @property string $kode_customer
 * @property string $nama_customer
 * @property string $alamat_customer
 * @property int $id_propinsi
 * @property int $id_kota
 * @property int $id_kecamatan
 * @property string $id_kelurahan
 * @property string $created_at
 * @property string $updated_at
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                 'value' => new Expression('NOW()'),
            ],
        ];
    }
    public static function tableName()
    {
        return 'tb_m_customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_customer', 'nama_customer', 'alamat_customer', 'id_propinsi', 'id_kota'], 'required'],
            [['alamat_customer'], 'string'],
            [['id_propinsi', 'id_kota', 'id_kecamatan', 'id_kelurahan'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['kode_customer', 'nama_customer'], 'string', 'max' => 255],
            [['kode_customer'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_customer' => Yii::t('app', 'Id Customer'),
            'kode_customer' => Yii::t('app', 'Kode Customer'),
            'nama_customer' => Yii::t('app', 'Nama Customer'),
            'alamat_customer' => Yii::t('app', 'Alamat Customer'),
            'id_propinsi' => Yii::t('app', 'Id Propinsi'),
            'id_kota' => Yii::t('app', 'Id Kota'),
            'id_kecamatan' => Yii::t('app', 'Id Kecamatan'),
            'id_kelurahan' => Yii::t('app', 'Id Kelurahan'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getPropinsi()
    {
        return $this->hasOne(Propinsi::className(), ['id_propinsi' => 'id_propinsi']);
    }
    public function getKota()
    {
        return $this->hasOne(Kota::className(), ['id_kota' => 'id_kota']);
    }
    public function getKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['id_kecamatan' => 'id_kecamatan']);
    }
    public function getKelurahan()
    {
        return $this->hasOne(Kelurahan::className(), ['id_kelurahan' => 'id_kelurahan']);
    }
}
