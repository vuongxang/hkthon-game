<?php

namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\UserRepository;
use Exception;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepository
{
    public function getUser()
    {
        try {
            return $this->model::where('email', 'user2@gmail.com')->first();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getUser1()
    {
        return 1;
    }

    public function getUser2()
    {
        return 1;
    }

    public function getUser3()
    {
        return 1;
    }
}
