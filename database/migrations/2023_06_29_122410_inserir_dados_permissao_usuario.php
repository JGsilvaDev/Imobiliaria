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
        DB::table('user_permissions')->insert([
            ['id' => 1, 'permissao' => 'admin'],
            ['id' => 2, 'permissao' => 'cliente'],
            // Adicione mais registros, se necessário
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('user_permissions')->truncate();
    }
};
