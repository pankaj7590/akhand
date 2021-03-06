<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BadmintonMatchPlayer;

/**
 * BadmintonMatchPlayerSearch represents the model behind the search form of `common\models\BadmintonMatchPlayer`.
 */
class BadmintonMatchPlayerSearch extends BadmintonMatchPlayer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'match_id', 'team_id', 'player_id', 'services', 'points_taken', 'unforced_errors', 'points_given', 'out_services', 'net_services', 'faults', 'double_faults', 'rallies', 'smashes', 'net_drops', 'returns', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
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
        $query = BadmintonMatchPlayer::find();

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
            'id' => $this->id,
            'match_id' => $this->match_id,
            'team_id' => $this->team_id,
            'player_id' => $this->player_id,
            'services' => $this->services,
            'points_taken' => $this->points_taken,
            'unforced_errors' => $this->unforced_errors,
            'points_given' => $this->points_given,
            'out_services' => $this->out_services,
            'net_services' => $this->net_services,
            'faults' => $this->faults,
            'double_faults' => $this->double_faults,
            'rallies' => $this->rallies,
            'smashes' => $this->smashes,
            'net_drops' => $this->net_drops,
            'returns' => $this->returns,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
