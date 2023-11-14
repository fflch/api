<?php

use App\Utilities\ValidationUtils;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $roles = ValidationUtils::getRoles('array');
            $roles[] = 'admin';

            $table->id();
            $table->string('name');
            $table->string('invitation_token')->unique()->nullable();
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->enum('role', $roles);
            $table->datetime('deactivation_date')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->unique('username');
            $table->unique(['invitation_token', 'username']);

            $table->foreign('invitation_token')
                ->references('invitation_token')
                ->on('invitations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
