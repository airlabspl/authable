<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirRolesTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::create(
            config('authable.roles_table', 'air_roles'),
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
            }
        );
    }

    public function down()
    {
        Schema::dropIfExists(
            config('authable.roles_table', 'air_roles')
        );
    }
}
