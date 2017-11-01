<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirRolesTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::create('air_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        \Airlabs\Authable\Role::create([
            'name' => 'Guest',
            'slug' => 'guest'
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('air_roles');
    }
}
