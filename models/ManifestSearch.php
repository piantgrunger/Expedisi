<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Manifest;

/**
 * ManifestSearch represents the model behind the search form of `app\models\Manifest`.
 */
class ManifestSearch extends Manifest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_manifest', 'id_outlet'], 'integer'],
            [['no_manifest', 'tgl_manifest', 'tujuan_manifest', 'nama_sopir', 'nomor_polisi', 'telepon_sopir', 'pembuat_manifest', 'created_at', 'updated_at'], 'safe'],
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
        $query = Manifest::find();

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
            'id_manifest' => $this->id_manifest,
            'id_outlet' => $this->id_outlet,
            'tgl_manifest' => $this->tgl_manifest,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'no_manifest', $this->no_manifest])
            ->andFilterWhere(['like', 'tujuan_manifest', $this->tujuan_manifest])
            ->andFilterWhere(['like', 'nama_sopir', $this->nama_sopir])
            ->andFilterWhere(['like', 'nomor_polisi', $this->nomor_polisi])
            ->andFilterWhere(['like', 'telepon_sopir', $this->telepon_sopir])
            ->andFilterWhere(['like', 'pembuat_manifest', $this->pembuat_manifest]);

        return $dataProvider;
    }
}
