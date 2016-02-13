<?php

namespace App\Obsan\Entities;

class User extends Authenticable
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'token',
        'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token', 'password'];

    public function evaluations()
    {
        return $this->hasMany(Evaluation::getNamespace(), 'user_id');
    }
}
