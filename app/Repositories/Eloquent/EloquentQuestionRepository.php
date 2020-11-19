<?php

namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\QuestionRepository;
use Illuminate\Support\Facades\DB;


class EloquentQuestionRepository extends EloquentBaseRepository implements QuestionRepository
{
    public function getQuestionRound($roundId)
    {
        try {
            $query = DB::table('questions')
                ->where("questions.status", "!=", -1)
                ->where('answers.status', "=", 1)
                ->join('answers', 'answers.question_id', "=", "questions.id")
                ->leftJoin('files', 'files.id', "=", "questions.file_id")
                ->select('questions.*', 'answers.id as answer_id', 'answers.content', 'answers.url', 'answers.type_answers');
            if (!empty($roundId)) {
                $query = $query->where('round_id', $roundId);
            }
            $query = $query->get()->toArray();
            return $query;
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return $message;
        }
    }

    public function getQuestionById($questionId)
    {
        try {
            $query = DB::table('questions')
                ->where("questions.status", "!=", -1)
                ->where("questions.id", $questionId)
                ->where('answers.status', "=", 1)
                ->join('answers', 'answers.question_id', "=", "questions.id")
                ->leftJoin('files', 'files.id', "=", "questions.file_id")
                ->select('questions.*', 'files.url as file', 'answers.id as answer_id', 'answers.content', 'answers.url', 'answers.type_answers');

            $query = $query->first();
            return $query;
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return $message;
        }
    }

    public function deleteQuestionRound($questionId)
    {
        try {
            if (!empty($questionId)) {
                $query = $this->model
                    ->where('id', $questionId)
                    ->update(['status' => -1]);
                return $query;
            }
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return $message;
        }
    }


}
