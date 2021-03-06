<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirPermissionsTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::create(
            config('authable.permissions_table', 'air_permissions'),
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('key')->unique();
                $table->timestamps();
            }
        );

        Schema::create(
            config('authable.pivot_table', 'air_permissions_roles'),
            function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('permission_id');
                $table->unsignedInteger('role_id');
                $table->timestamps();
            }
        );

        Schema::table(config('authable.pivot_table', 'air_permissions_roles'),
            function (Blueprint $table) {
                $table->foreign('permission_id')
                    ->references('id')
                    ->on('air_permissions')
                    ->onDelete('cascade');

                $table->foreign('role_id')
                    ->references('id')
                    ->on('air_roles')
                    ->onDelete('cascade');
            }
        );
    }

    public function down()
    {
        Schema::dropIfExists(
            config('authable.permissions_table', 'air_permissions')
        );
    }
}
