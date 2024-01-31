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
        DB::table('produtos')->insert([
            ['id' => 1, 'descricao' => 'Terreno'],
            ['id' => 2, 'descricao' => 'Casa'],
            ['id' => 3, 'descricao' => 'Apartamento'],
            ['id' => 4, 'descricao' => 'Chacara'],
            ['id' => 5, 'descricao' => 'Comercial'],

            // Adicione mais registros, se necessário
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('produtos')->truncate();
    }
};
