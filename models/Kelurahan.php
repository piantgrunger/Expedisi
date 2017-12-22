<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "tb_m_kelurahan".
 *
 * @property string $id_kelurahan
 * @property int $id_kecamatan
 * @property string $nama_kelurahan
 *
 * @property TbMKecamatan $kecamatan
 * @property TbMtResi[] $tbMtResis
 * @property TbMtResi[] $tbMtResis0
 */
class Kelurahan extends \yii\db\ActiveRecord
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
        return 'tb_m_kelurahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kelurahan', 'id_kecamatan', 'nama_kelurahan'], 'required'],
            [['id_kelurahan', 'id_kecamatan'], 'integer'],
            [['nama_kelurahan'], 'string', 'max' => 50],
            [['id_kecamatan'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['id_kecamatan' => 'id_kecamatan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kelurahan' => 'Id Kelurahan',
            'id_kecamatan' => 'Id Kecamatan',
            'nama_kelurahan' => 'Nama Kelurahan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['id_kecamatan' => 'id_kecamatan']);
    }

       public function getDataBrowseKelurahan()
    {        
     return ArrayHelper::map(
                     Kelurahan::find()
                                        ->select([
                                                'id_kelurahan','nama_kelurahan'
                                        ])
                                        ->asArray()
                                        ->all(), 'id_kelurahan', 'nama_kelurahan');
    }
  
}
