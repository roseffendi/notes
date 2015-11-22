<?php

namespace Roseffendi\Notes\Infrastructure\Repositories;

use Roseffendi\Notes\Repositories\NotnotTokenRepository;
use Roseffendi\Notes\Infrastructure\Eloquents\NotnotTokens;

class NotnotEloquentRepository implements NotnotTokenRepository
{
    /**
     * @var NotnotTokens
     */
    protected $model;

    /**
     * @param NotnotTokens $model
     */
    public function __construct(NotnotTokens $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve token by user id
     * @param  mixed $userId
     * @return mixed
     */
    public function findByUserId($userId)
    {
        return $this->model->where('user_id', '=', $userId)->first();
    }

    /**
     * Persist token
     * @param  string $token
     * @param  mixed $userId
     * @return void
     */
    public function save($token, $userId)
    {
        $token = $this->model->where('user_id', '=', $userId)->firstOrNew();

        $token->token = $token;
        $token->save();
    }
}