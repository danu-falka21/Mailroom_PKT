<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitKerja extends Model
{
    use SoftDeletes;
    protected $fillable = ['nama','kompartemen'];
    protected $table = 'unit_kerja';
    public function user()
    {
        return $this->hasMany(User::class);
    }
    use HasFactory;
}
