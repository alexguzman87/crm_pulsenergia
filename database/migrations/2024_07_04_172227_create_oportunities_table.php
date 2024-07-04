<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oportunities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->nullable()->nullOnDelete();
            $table->string('title')->nullable();            
            $table->string('contact_name')->nullable();            
            $table->string('organization')->nullable();            
            $table->string('email')->nullable();            
            $table->string('phone')->nullable();            
            $table->string('country')->nullable();            
            $table->string('state')->nullable();            
            $table->string('address')->nullable();            
            $table->string('city')->nullable();            
            $table->string('postal_code')->nullable();
            $table->enum('status', ['oportunity','proposal','need','sale','lost',]);            
            $table->enum('type', ['residential','industrial','commercial',]);            
            $table->string('budget')->nullable();            
            $table->string('currency')->nullable();            
            $table->string('probability')->nullable();            
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oportunities');
    }
};
