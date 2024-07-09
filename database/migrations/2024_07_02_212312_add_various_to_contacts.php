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
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('image',150)->nullable()->after('second_phone');
            $table->string('country',150)->nullable()->after('second_phone');
            $table->string('address',150)->nullable()->after('second_phone');
            $table->string('city',150)->nullable()->after('second_phone');
            $table->string('state',150)->nullable()->after('second_phone');
            $table->string('postal_code',150)->nullable()->after('second_phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('country');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('postalCode');
        });
    }
};
