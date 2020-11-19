<?php

namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\RoundRepository;
use Illuminate\Support\Facades\Log;

class EloquentRoundRepository extends EloquentBaseRepository implements RoundRepository
{
    public function deleteRoundGame($round_id)
    {
        try {
            if (!empty($round_id)) {
                $query = $this->model
                    ->where('id', $round_id)
                    ->update(['status' => -1]);
            }
            return $query;
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return $message;
        }
    }

    public function createRound($data, $dataDetail)
    {
        try {
            if (!empty($data)) {
                Log::info('create round>>>data' . json_encode($data));
                $result = $this->model->create($data);

            }

        } catch (\Exception $e) {
            $message = $e->getMessage();
            return $message;
        }
    }
}
