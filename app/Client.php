<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $fillable = [
        'name',
        'id_bank'
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_bank', 'id');
    }

    public function account()
    {
        return $this->hasOne(Account::class, 'id_client', 'id');
    }
}
