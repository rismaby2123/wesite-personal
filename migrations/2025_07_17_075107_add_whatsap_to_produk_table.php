<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('produk', function (Blueprint $table) {
        $table->string('whatsapp')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('produks', function (Blueprint $table) {
        $table->dropColumn('whatsapp');
    });
}
};
