<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resi;

/**
 * ResiSearch represents the model behind the search form of `app\models\Resi`.
 */
class ResiSearch extends Resi
{
    /**
     * @inheritdoc
     */
    public $kotaAsal;
    public $kotaTujuan;
    public $status; 
    public function rules()
    {
        return [
            [['id_resi', 'id_outlet', 'id_propinsi_shipper', 'id_kota_shipper', 'id_kecamatan_shipper', 'id_kelurahan_shipper', 'id_propinsi_consignee', 'id_kota_consignee', 'id_kecamatan_consignee', 'id_kelurahan_consignee'], 'integer'],
            [['no_resi', 'tgl_resi', 'nama_shipper', 'alamat_shipper', 'nama_consignee', 'alamat_consignee', 'isi_barang', 'penerima', 'tgl_diterima', 'created_at', 'updated_at','kotaAsal','kotaTujuan','status'], 'safe'],
            [['berat_barang', 'volume_barang', 'charge', 'packing', 'other', 'vat', 'total'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params,$terima=0)
    {
        $query = Resi::find()
                   ->select(['tb_mt_resi.*','kotaAsal'=>'k1.nama_kota' ,' kotaTujuan'=>'k2.nama_kota','status'=>new \yii\db\Expression("case when penerima is null then 'On Process' else 'Finished' end ")])
                   
                  ->leftJoin('tb_m_kota k1','k1.id_kota=tb_mt_resi.id_kota_shipper')
                  ->leftJoin('tb_m_kota k2','k2.id_kota=tb_mt_resi.id_kota_consignee')
                   ->orderBy('tgl_resi desc');   
                  // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_resi' => $this->id_resi,
            'id_outlet' => $this->id_outlet,
            'id_propinsi_shipper' => $this->id_propinsi_shipper,
            'id_kota_shipper' => $this->id_kota_shipper,
            'id_kecamatan_shipper' => $this->id_kecamatan_shipper,
            'id_kelurahan_shipper' => $this->id_kelurahan_shipper,
            'id_propinsi_consignee' => $this->id_propinsi_consignee,
            'id_kota_consignee' => $this->id_kota_consignee,
            'id_kecamatan_consignee' => $this->id_kecamatan_consignee,
            'id_kelurahan_consignee' => $this->id_kelurahan_consignee,
            'berat_barang' => $this->berat_barang,
            'volume_barang' => $this->volume_barang,
            'tgl_diterima' => $this->tgl_diterima,
            'charge' => $this->charge,
            'packing' => $this->packing,
            'other' => $this->other,
            'vat' => $this->vat,
            'total' => $this->total,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
        ]);

        $query->andFilterWhere(['like', 'no_resi', $this->no_resi])
            ->andFilterWhere(['like', 'nama_shipper', $this->nama_shipper])
            ->andFilterWhere(['like', 'alamat_shipper', $this->alamat_shipper])
            ->andFilterWhere(['like', 'nama_consignee', $this->nama_consignee])
            ->andFilterWhere(['like', 'alamat_consignee', $this->alamat_consignee])
            ->andFilterWhere(['like', 'isi_barang', $this->isi_barang])
            ->andFilterWhere(['like', 'penerima', $this->penerima])
            ->andFilterWhere(['like', 'k1.nama_kota', $this->kotaAsal])
            ->andFilterWhere(['like', 'k2.nama_kota', $this->kotaTujuan]);
        if ($terima==1)    
        {
            $query->andWhere("penerima is null");
        }
        
        if ( ! is_null($this->tgl_resi) && strpos($this->tgl_resi, ' - ') !== false ) {
            list($start_date, $end_date) = explode(' - ', $this->tgl_resi);
            $query->andFilterWhere(['between', 'tgl_resi', $start_date, $end_date]);
            
        }

        if (! is_null($this->status))
        {
            if($this->status == 'On Process')
            {
                $query->andWhere("penerima is null");
            }else{
                $query->andWhere("penerima is not null");
            }
        }
        
        return $dataProvider;
        

    }
}
