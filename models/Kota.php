<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "tb_m_kota".
 *
 * @property int $id_kota
 * @property int $id_propinsi
 * @property string $nama_kota
 *
 * @property TbMKecamatan[] $tbMKecamatans
 * @property TbMPropinsi $propinsi
 * @property TbMtResi[] $tbMtResis
 * @property TbMtResi[] $tbMtResis0
 */
class Kota extends \yii\db\ActiveRecord
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
        return 'tb_m_kota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_propinsi', 'nama_kota'], 'required'],
            [['id_propinsi'], 'integer'],
            [['nama_kota'], 'string', 'max' => 50],
            [['id_propinsi'], 'exist', 'skipOnError' => true, 'targetClass' => Propinsi::className(), 'targetAttribute' => ['id_propinsi' => 'id_propinsi']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kota' => 'Id Kota',
            'id_propinsi' => 'Id Propinsi',
            'nama_kota' => 'Nama Kota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropinsi()
    {
        return $this->hasOne(Propinsi::className(), ['id_propinsi' => 'id_propinsi']);
    }
   public function getDataBrowseKota()
    {        
     return ArrayHelper::map(
                     Kota::find()
                                        ->select([
                                                'id_kota','nama_kota'
                                        ])
                                        ->asArray()
                                        ->all(), 'id_kota', 'nama_kota');
    }
}