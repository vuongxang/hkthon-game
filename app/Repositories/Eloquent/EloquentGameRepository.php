<?php

namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\GameRepository;
use Illuminate\Support\Facades\DB;

class EloquentGameRepository extends EloquentBaseRepository implements GameRepository
{
    public function getGames($gameId)
    {
        $query = DB::table( 'games')
            ->where('games.status', '!=', -1);
        if (!empty($gameId)) {
            $query = $query->where('games.id', $gameId)
                ->where('codes.status', '!=', -1)
                ->join('codes', 'codes.game_id', '=', 'games.id')
                ->select('games.*', 'codes.code');
        }
        $result = $query->get()->toArray();
        return $result;
    }

    public function getRoundsGame($gameId)
    {
        $query = DB::table('rounds')
            ->where('rounds.status', '!=', -1)
            ->where('rounds.game_id', $gameId)
            ->join('locations', 'locations.round_id', '=', 'rounds.id')
//            ->join('questions', 'questions.round_id', '=', 'rounds.id')
            ->select('rounds.*', 'locations.suggest')

        ;
        $result = $query->get()->toArray();
        return $result;
    }
}
