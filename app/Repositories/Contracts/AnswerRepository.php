<?php

namespace App\Repositories\Contracts;

interface AnswerRepository extends BaseRepository
{
    public function deleteAnswerQuestion($questionId);
}
