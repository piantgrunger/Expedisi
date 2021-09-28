<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use mdm\behaviors\ar\RelationTrait;

/**
 * This is the model class for table "tb_mt_manifest".
 *
 * @property int $id_manifest
 * @property int $id_outlet
 * @property string $no_manifest
 * @property string $tgl_manifest
 * @property string $tujuan_manifest
 * @property string $nama_sopir
 * @property string $nomor_polisi
 * @property string $telepon_sopir
 * @property string $pembuat_manifest
 * @property string $created_at
 * @property string $updated_at
 */
class Manifest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    use RelationTrait;
 


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
        return 'tb_mt_manifest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_outlet'], 'integer'],
            [['no_manifest', 'tgl_manifest', 'tujuan_manifest', 'nama_sopir', 'nomor_polisi', 'telepon_sopir', 'pembuat_manifest'], 'required'],
            [['tgl_manifest', 'created_at', 'updated_at'], 'safe'],
            [['tujuan_manifest'], 'string'],
            [['no_manifest', 'nama_sopir', 'nomor_polisi', 'telepon_sopir', 'pembuat_manifest'], 'string', 'max' => 255],
            [['no_manifest'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_manifest' => 'Id Manifest',
            'id_outlet' => 'Id Outlet',
            'no_manifest' => 'No Manifest',
            'tgl_manifest' => 'Tgl Manifest',
            'tujuan_manifest' => 'Tujuan Manifest',
            'nama_sopir' => 'Nama Sopir',
            'nomor_polisi' => 'Nomor Polisi',
            'telepon_sopir' => 'Telepon Sopir',
            'pembuat_manifest' => 'Pembuat Manifest',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getDetailManifest()
    {
        return $this->hasMany(Det_Manifest::className(), ['id_manifest' => 'id_manifest']);
    }
    public function setDetailManifest($value)
    {
        return $this->loadRelated('detailManifest',$value);
    }
    public function getOutlet()
    {
        return $this->hasOne(Outlet::className(), ['id_outlet' => 'id_outlet']);
    }
    public function getDetailCount()
    {
         return Det_Manifest::find()->where(['id_manifest' => $this->id_manifest])->count();;
    }
  
}
