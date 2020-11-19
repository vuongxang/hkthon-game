<?php

namespace App\Repositories\Contracts;

interface GameRepository extends BaseRepository
{
    public function getGames($gameId);

    public function getRoundsGame($gameId);

}
