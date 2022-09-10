<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Spatie\Permission\Traits\HasRoles;

class PayPoint extends Model
{
    use HasFactory,HasRoles;

    protected $fillable = ['*'];

    public function compony(){
        return $this->belongsTo(Compony::class);
    }

    // This Morph Relations , Sender two type {PayPoint , Users}
    public function senderWalletUsers(){
        return $this->morphMany(HistoryWallet::class,'object','object_type','object_id','id');
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }

    public function name() : Attribute {
        return Attribute::make(
            get: fn() => App::isLocale('ar') ? $this->name_ar : $this->name_en,
        ); 
    }

    public function state() : Attribute {
        return Attribute::make(
            get:fn() => $this->status == 'active' ? __('dash.available') : __('dash.block'),
        ); 
    }
}
