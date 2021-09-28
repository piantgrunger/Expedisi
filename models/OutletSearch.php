<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Outlet;

/**
 * OutletSearch represents the model behind the search form of `app\models\Outlet`.
 */
class OutletSearch extends Outlet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_outlet'], 'integer'],
            [['kode_outlet', 'nama_outlet', 'alamat_outlet', 'created_at', 'updated_at'], 'safe'],
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
    public function search($params)
    {
        $query = Outlet::find();

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
            'id_outlet' => $this->id_outlet,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'kode_outlet', $this->kode_outlet])
            ->andFilterWhere(['like', 'nama_outlet', $this->nama_outlet])
            ->andFilterWhere(['like', 'alamat_outlet', $this->alamat_outlet]);

        return $dataProvider;
    }
}
