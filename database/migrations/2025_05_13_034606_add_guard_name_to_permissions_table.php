<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGuardNameToPermissionsTable extends Migration
{
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            // Menambahkan kolom 'guard_name' pada tabel permissions
            $table->string('guard_name')->default('web');
        });
    }

    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            // Menghapus kolom 'guard_name' jika rollback
            $table->dropColumn('guard_name');
        });
    }
}
