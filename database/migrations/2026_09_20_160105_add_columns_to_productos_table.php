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
        Schema::table('productos', function (Blueprint $table) {
            if (!Schema::hasColumn('productos', 'titulo')) {
                $table->string('titulo')->nullable();
            }
            if (!Schema::hasColumn('productos', 'plataforma')) {
                $table->string('plataforma')->nullable();
            }
            if (!Schema::hasColumn('productos', 'url')) {
                $table->string('url')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn(['titulo', 'plataforma', 'url']);
        });
    }
};