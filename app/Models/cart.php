<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $table='cart';
    protected $fillable=['userid','produkid','qty','status','updated_at'];

    public function item(){
        return $this->belongsTo('App\Models\produk','produkid');
    }
}
