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
        Schema::table('tasks', function (Blueprint $table) {
            $table->string('coordinate')->nullable()->after('task');
            $table->time('assigned_time')->nullable()->after('assigned_date');
            $table->time('done_time')->nullable()->after('done_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('coordinate');
            $table->dropColumn('assigned_time');
            $table->dropColumn('done_time');
        });
    }
};
