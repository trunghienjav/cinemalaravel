<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddColumnAvatarToFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('films', function (Blueprint $table) {
            if (!Schema::hasColumn('films', 'avatar')) {
                Schema::table('films', function (Blueprint $table) {
                    $table->string('avatar')->after('name')->nullable();
                });
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('films', function (Blueprint $table) {
            //
        });
    }
}
