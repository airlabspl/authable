<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableAddRoleIdColumn extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::table(
            config('authable.users_table', 'users'),
            function (Blueprint $table) {
                $table->unsignedInteger(
                    config('authable.users_role_column', 'role_id')
                )->default(0);
            }
        );
    }

    public function down()
    {
        Schema::table(
            config('authable.users_table', 'users'),
            function (Blueprint $table) {
                $table->dropColumn(
                    config('authable.users_role_column', 'role_id')
                );
            }
        );
    }
}
