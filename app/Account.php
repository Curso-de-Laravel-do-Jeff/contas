<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $connection = 'pgsql';
    protected $fillable = [
        'type',
        'balance',
        'status',
        'id_client'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id', 'id_client');
    }
}
