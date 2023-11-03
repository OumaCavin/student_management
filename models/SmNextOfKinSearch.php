<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SmNextOfKin;

/**
 * SmNextOfKinSearch represents the model behind the search form of `app\models\SmNextOfKin`.
 */
class SmNextOfKinSearch extends SmNextOfKin
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['next_of_kin_id', 'adm_refno'], 'integer'],
            [['surname', 'other_names', 'relationship', 'primary_phone_number', 'alternative_phone_number', 'primary_email', 'alternative_email'], 'safe'],
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
        $query = SmNextOfKin::find();

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
            'next_of_kin_id' => $this->next_of_kin_id,
            'adm_refno' => $this->adm_refno,
        ]);

        $query->andFilterWhere(['ilike', 'surname', $this->surname])
            ->andFilterWhere(['ilike', 'other_names', $this->other_names])
            ->andFilterWhere(['ilike', 'relationship', $this->relationship])
            ->andFilterWhere(['ilike', 'primary_phone_number', $this->primary_phone_number])
            ->andFilterWhere(['ilike', 'alternative_phone_number', $this->alternative_phone_number])
            ->andFilterWhere(['ilike', 'primary_email', $this->primary_email])
            ->andFilterWhere(['ilike', 'alternative_email', $this->alternative_email]);

        return $dataProvider;
    }
}
