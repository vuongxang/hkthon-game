<?php

namespace App\Repositories\Contracts;

interface RoundRepository extends BaseRepository
{
    public function deleteRoundGame($round_id);

    public function createRound($data, $dataDetail);
}
