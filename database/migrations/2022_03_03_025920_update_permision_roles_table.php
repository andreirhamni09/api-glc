<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePermisionRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permision_roles', function (Blueprint $table) {            
            $table->foreign('id_roles')->references('id')->on('roles');
            $table->foreign('id_permisions')->references('id')->on('permisions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permision_roles', function (Blueprint $table) {            
            $table->dropForeign(['id_roles']);
            $table->dropForeign(['id_permisions']);
        });
    }
}
