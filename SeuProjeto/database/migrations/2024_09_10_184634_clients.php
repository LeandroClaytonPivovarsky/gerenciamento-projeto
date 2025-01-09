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
        Schema::create('clients', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('cpf')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('email');
            $table->string('password');
            //$table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    public function register()
    {
        
    }

    public function storeRegister()
    {
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
