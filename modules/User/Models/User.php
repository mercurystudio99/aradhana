<?php
namespace Modules\User\Models;

class User extends \App\User
{
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email'
    ];

}
