<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       
        Schema::table('riwayat_bmi', function (Blueprint $table) {
        $table->string('jenis_kelamin', 20)->after('user_id')->nullable();
    });
}

public function down()
{
    Schema::table('riwayat_bmi', function (Blueprint $table) {
        $table->dropColumn('jenis_kelamin');
    });
}
    
};
