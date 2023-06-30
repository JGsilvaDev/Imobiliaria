<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('usuarios')->insert([
        [
            'id' => 1,
            'name' => 'Admin',
            'id_permissao' => 1,
            'email' => 'admin@admin.com',
            'password' => '21232f297a57a5a743894a0e4a801fc3',
            'telefone' => '12 999999999'
        ],
            // Adicione mais registros, se necessário
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('usuarios')->truncate();
    }
};
