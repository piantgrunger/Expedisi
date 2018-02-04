<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Invoice;

/**
 * InvoiceSearch represents the model behind the search form of `app\models\Invoice`.
 */
class InvoiceSearch extends Invoice
{
    /**
     * {@inheritdoc}
     */

    public $namaCustomer;
    public function rules()
    {
        return [
            [['id_invoice', 'id_outlet', 'id_customer'], 'integer'],
            [['namaCustomer'],'string'],
            [['no_invoice','namaCustomer', 'tgl_invoice', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
    public function search($params)
    {
        $query = Invoice::find()
        ->select(['tb_mt_invoice.*'])
        ->leftJoin('tb_m_customer c','c.id_customer=tb_mt_invoice.id_customer')
        ->orderBy('tgl_invoice desc');   


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
            'id_invoice' => $this->id_invoice,
            'id_outlet' => $this->id_outlet,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'no_invoice', $this->no_invoice]);
        $query->andFilterWhere(['like', 'nama_customer', $this->namaCustomer]);
        if ( ! is_null($this->tgl_invoice) && strpos($this->tgl_invoice, ' - ') !== false ) {
            list($start_date, $end_date) = explode(' - ', $this->tgl_invoice);
            $query->andFilterWhere(['between', 'tgl_invoice', $start_date, $end_date]);
            
        }

        return $dataProvider;
    }
}
