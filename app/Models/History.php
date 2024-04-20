<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table='history';
    protected $fillable=['oderId','userid','nama','detail','total','Status','Dibayar','updated_at'];
}
