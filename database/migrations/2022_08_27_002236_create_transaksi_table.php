<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->boolean('status_transaksi');
            $table->dateTime('terima_mailroom')->nullable()->change();;
            $table->string('no_resi')->nullable()->change();
            $table->integer('id_user1');
            $table->string('nama_guest');
            $table->string('alamat_guest');
            $table->string('kota_guest');
            $table->string('tipe_barang');
            $table->integer('id_kurir')->nullable()->change();
            $table->dateTime('terima_user')->nullable()->change();
            $table->integer('id_user3')->nullable()->change();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
