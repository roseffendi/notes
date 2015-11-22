<?php

namespace Roseffendi\Notes\Repositories;

interface NotnotTokenRepository
{
    /**
     * Retrieve token by user id
     * @param  mixed $userId
     * @return mixed
     */
    public function findByUserId($userId);

    /**
     * Persist token
     * @param  string $token
     * @param  mixed $userId
     * @return void
     */
    public function save($token, $userId);

}