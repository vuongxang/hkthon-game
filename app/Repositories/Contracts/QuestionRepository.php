<?php

namespace App\Repositories\Contracts;

interface QuestionRepository extends BaseRepository
{
    public function getQuestionRound($roundId);

    public function getQuestionById($questionId);

    public function deleteQuestionRound($questionId);
}
