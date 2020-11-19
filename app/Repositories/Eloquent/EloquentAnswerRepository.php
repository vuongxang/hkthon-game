<?php

namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\AnswerRepository;

class EloquentAnswerRepository extends EloquentBaseRepository implements AnswerRepository
{
    public function deleteAnswerQuestion($questionId)
    {
        try {
            if (!empty($questionId)) {
                $query = $this->model
                    ->where('question_id', $questionId)
                    ->update(['status' => -1]);
                return $query;
            }
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return $message;
        }
    }
}
