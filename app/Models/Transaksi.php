<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use SoftDeletes;
    protected $fillable = ['status_transaksi','terima_mailroom','no_resi','id_user1','nama_guest','alamat_guest','kota_guest','tipe_barang','id_kurir','terima_user','id_user3'];
    protected $table = 'transaksi';
    public function User1()
    {
        return $this->belongsTo(User::class, 'id_user1','id')->withTrashed();
    }
    public function User3()
    {
        return $this->belongsTo(User::class, 'id_user3','id')->withTrashed();
    }
    public function Kurir()
    {
        return $this->belongsTo(Kurir::class, 'id_kurir','id')->withTrashed();
    }

    protected $dates = ['terima_mailroom','terima_user'];
    use HasFactory;
}
