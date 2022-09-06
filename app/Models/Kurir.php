<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kurir extends Model
{
    use SoftDeletes;
    protected $fillable = ['nama','alamat','kota','no_telepon','email'];
    protected $table = 'kurir';
    use HasFactory;
}
