<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MatchPlayer;

/**
 * MatchPlayerSearch represents the model behind the search form of `common\models\MatchPlayer`.
 */
class MatchPlayerSearch extends MatchPlayer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'match_id', 'team_id', 'player_id', 'balls_played', 'runs_scored', 'extra_runs', 'wickets_taken', 'wide_balls', 'no_balls', 'leg_byes', 'sixes', 'fours', 'four_runs', 'triples', 'doubles', 'singles', 'batting_duration', 'bowling_duration', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
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
        $query = MatchPlayer::find();

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
            'balls_played' => $this->balls_played,
            'runs_scored' => $this->runs_scored,
            'extra_runs' => $this->extra_runs,
            'wickets_taken' => $this->wickets_taken,
            'wide_balls' => $this->wide_balls,
            'no_balls' => $this->no_balls,
            'leg_byes' => $this->leg_byes,
            'sixes' => $this->sixes,
            'fours' => $this->fours,
            'four_runs' => $this->four_runs,
            'triples' => $this->triples,
            'doubles' => $this->doubles,
            'singles' => $this->singles,
            'batting_duration' => $this->batting_duration,
            'bowling_duration' => $this->bowling_duration,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
