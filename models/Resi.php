<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "tb_mt_resi".
 *
 * @property int $id_resi
 * @property int $id_outlet
 * @property string $no_resi
 * @property string $tgl_resi
 * @property string $nama_shipper
 * @property string $alamat_shipper
 * @property int $id_propinsi_shipper
 * @property int $id_kota_shipper
 * @property int $id_kecamatan_shipper
 * @property string $id_kelurahan_shipper
 * @property string $nama_consignee
 * @property string $alamat_consignee
 * @property int $id_propinsi_consignee
 * @property int $id_kota_consignee
 * @property int $id_kecamatan_consignee
 * @property string $id_kelurahan_consignee
 * @property string $isi_barang
 * @property string $berat_barang
 * @property string $volume_barang
 * @property string $penerima
 * @property string $tgl_diterima
 * @property string $charge
 * @property string $packing
 * @property string $other
 * @property string $vat
 * @property string $total
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Outlet $outlet
 * @property Propinsi $propinsiShipper
 * @property Propinsi $propinsiConsignee
 * @property Kota $kotaShipper
 * @property Kota $kotaConsignee
 * @property Kecamatan $kecamatanShipper
 * @property Kecamatan $kecamatanConsignee
 * @property Kelurahan $kelurahanShipper
 * @property Kelurahan $kelurahanConsignee
 */
class Resi extends \yii\db\ActiveRecord
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
        return 'tb_mt_resi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_outlet', 'no_resi', 'tgl_resi', 'nama_shipper', 'alamat_shipper', 'id_propinsi_shipper', 'id_kota_shipper', 'nama_consignee', 'alamat_consignee', 'id_propinsi_consignee', 'id_kota_consignee', 'isi_barang', 'berat_barang', 'charge', 'packing', 'other', 'vat', 'total','id_customer'], 'required'],
            [[ 'id_propinsi_shipper', 'id_kota_shipper', 'id_kecamatan_shipper', 'id_kelurahan_shipper', 'id_propinsi_consignee', 'id_kota_consignee', 'id_kecamatan_consignee', 'id_kelurahan_consignee'], 'integer'],
            [['tgl_resi', 'tgl_diterima','no_sj', 'created_at', 'updated_at'], 'safe'],
            [['alamat_shipper', 'alamat_consignee'], 'string'],
            [['berat_barang', 'volume_barang', 'charge','colly_barang', 'packing', 'other', 'vat', 'total'], 'number'],
            [['no_resi', 'nama_shipper', 'nama_consignee'], 'string', 'max' => 255],
            [['isi_barang', 'penerima'], 'string', 'max' => 200],
            [['no_resi'], 'unique'],
            [['id_outlet'], 'exist', 'skipOnError' => true, 'targetClass' => Outlet::className(), 'targetAttribute' => ['id_outlet' => 'id_outlet']],
            [['id_propinsi_shipper'], 'exist', 'skipOnError' => true, 'targetClass' => Propinsi::className(), 'targetAttribute' => ['id_propinsi_shipper' => 'id_propinsi']],
            [['id_propinsi_consignee'], 'exist', 'skipOnError' => true, 'targetClass' => Propinsi::className(), 'targetAttribute' => ['id_propinsi_consignee' => 'id_propinsi']],
            [['id_kota_shipper'], 'exist', 'skipOnError' => true, 'targetClass' => Kota::className(), 'targetAttribute' => ['id_kota_shipper' => 'id_kota']],
            [['id_kota_consignee'], 'exist', 'skipOnError' => true, 'targetClass' => Kota::className(), 'targetAttribute' => ['id_kota_consignee' => 'id_kota']],
            [['id_kecamatan_shipper'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['id_kecamatan_shipper' => 'id_kecamatan']],
            [['id_kecamatan_consignee'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['id_kecamatan_consignee' => 'id_kecamatan']],
            [['id_kelurahan_shipper'], 'exist', 'skipOnError' => true, 'targetClass' => Kelurahan::className(), 'targetAttribute' => ['id_kelurahan_shipper' => 'id_kelurahan']],
            [['id_kelurahan_consignee'], 'exist', 'skipOnError' => true, 'targetClass' => Kelurahan::className(), 'targetAttribute' => ['id_kelurahan_consignee' => 'id_kelurahan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_resi' => ' Resi',
            'id_outlet' => 'Outlet',
            'no_resi' => 'No Resi',
            'tgl_resi' => 'Tgl Resi',
            'nama_shipper' => 'Nama Shipper',
            'alamat_shipper' => 'Alamat Shipper',
            'id_propinsi_shipper' => 'Propinsi Shipper',
            'id_kota_shipper' => 'Kota Shipper',
            'id_kecamatan_shipper' => 'Kecamatan Shipper',
            'id_kelurahan_shipper' => 'Kelurahan Shipper',
            'nama_consignee' => 'Nama Consignee',
            'alamat_consignee' => 'Alamat Consignee',
            'id_propinsi_consignee' => 'Propinsi Consignee',
            'id_kota_consignee' => 'Kota Consignee',
            'id_kecamatan_consignee' => 'Kecamatan Consignee',
            'id_kelurahan_consignee' => 'Kelurahan Consignee',
            'isi_barang' => 'Isi Barang',
            'berat_barang' => 'Berat Barang',
            'volume_barang' => 'Volume Barang',
            'penerima' => 'Penerima',
            'tgl_diterima' => 'Tgl Diterima',
            'charge' => 'Charge',
            'packing' => 'Packing',
            'other' => 'Other',
            'vat' => 'Vat',
            'total' => 'Total',
            'id_customer' =>'Customer',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOutlet()
    {
        return $this->hasOne(Outlet::className(), ['id_outlet' => 'id_outlet']);
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id_customer' => 'id_customer']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropinsiShipper()
    {
        return $this->hasOne(Propinsi::className(), ['id_propinsi' => 'id_propinsi_shipper']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropinsiConsignee()
    {
        return $this->hasOne(Propinsi::className(), ['id_propinsi' => 'id_propinsi_consignee']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKotaShipper()
    {
        return $this->hasOne(Kota::className(), ['id_kota' => 'id_kota_shipper']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKotaConsignee()
    {
        return $this->hasOne(Kota::className(), ['id_kota' => 'id_kota_consignee']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatanShipper()
    {
        return $this->hasOne(Kecamatan::className(), ['id_kecamatan' => 'id_kecamatan_shipper']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatanConsignee()
    {
        return $this->hasOne(Kecamatan::className(), ['id_kecamatan' => 'id_kecamatan_consignee']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelurahanShipper()
    {
        return $this->hasOne(Kelurahan::className(), ['id_kelurahan' => 'id_kelurahan_shipper']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelurahanConsignee()
    {
        return $this->hasOne(Kelurahan::className(), ['id_kelurahan' => 'id_kelurahan_consignee']);
    }
    public function getKotaAsal()
    {
        return is_null($this->kotaShipper)?"":$this->kotaShipper->nama_kota;
    }
    public function getKotaTujuan()
    {
        return is_null($this->kotaConsignee)?"":$this->kotaConsignee->nama_kota;
    }
    public function getStatus()
    {
        $manifest =  \app\models\Det_Manifest::find()
                 ->where(["id_resi"=>$this->id_resi])
                 ->one();
        
        if(!is_null($this->penerima))
        {
          return 'Sampai';
        }
        else 
        if (!is_null($manifest))
        {
            return "Sudah Dikirim";
        }
        else 
        {
          "Belum Dikirim";
        }
    }
    public function getNamaCustomer()
    {
        return is_null($this->customer)?"":$this->customer->nama_customer;
    }
    public function getTglKirim()
    {
        $det_manifest =  \app\models\Det_Manifest::find()
                 
                 ->where(["id_resi"=>$this->id_resi])
                 ->one();
        
        if(!is_null($det_manifest))
        {
          return Manifest::find()
          ->where(["id_manifest"=>$det_manifest->id_manifest])
          ->one()->tgl_manifest;
        }
        else 
        {
          return  null;
        }
    }

    public function getnoManifest()
    {
        $det_manifest =  \app\models\Det_Manifest::find()
                 
                 ->where(["id_resi"=>$this->id_resi])
                 ->one();
        
        if(!is_null($det_manifest))
        {
          return Manifest::find()
          ->where(["id_manifest"=>$det_manifest->id_manifest])
          ->one()->no_manifest;
        }
        else 
        {
          return  null;
        }
    }


    public function getDataBrowseResi()
    {        
     return ArrayHelper::map(
                     Resi::find()
                                        ->select([
                                                'id_resi','no_resi'
                                        ])
                                        ->asArray()
                                    
                                        ->all(), 'id_resi', 'no_resi');

    }

    public function getDataBrowseResiInvoice($id_customer)
    {        
        $out =[];
        $data=             Resi::find()
        ->select([
               'id_resi','no_resi'=>"concat(no_resi,' - Rp ',total)"
        ])
        ->asArray()
        ->where(['not',['penerima'=>null]])
        ->andWhere(['id_customer'=>$id_customer])
        
        ->all();

     foreach ($data as $i => $list) 
     {
        $out[] = ['id' => $list['id_resi'], 'name' => $list['no_resi']];
      }
      return $out;  
    }    
    

}
