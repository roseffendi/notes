<?php

namespace Roseffendi\Notes\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;

class NotnotTokens extends Model
{
    /* The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notnot_tokens';

    /**
     * User relation
     * @return Illuminate\Database\Eloquent\Model
     */
    public function users()
    {
        return $this->hasOne('Increative\Account\Infrastructure\Eloquents\User');
    }
}