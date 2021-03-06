<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $fillable = [
        'name'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class, 'id_bank', 'id');
    }
}
