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
       Schema::create('EncodeDecode', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->string('key');
            $table->integer('views');
            $table->string('HashValue');
            $table->integer('ViewsCount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
