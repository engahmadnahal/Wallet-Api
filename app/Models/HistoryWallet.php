<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryWallet extends Model
{
    use HasFactory;

    protected $fillable = ['object_id','object_type','type','amount','description','user_id'];
    public function object()
    {
        return $this->morphTo();
    }
}
