<?php

use App\Utilities\ValidationUtils;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $roles = ValidationUtils::getRoles('array');
            $table->id();
            $table->string('invited_email');
            $table->string('invitation_token')->unique();
            $table->string('inviter_username');
            $table->enum('role', $roles);
            $table->integer('api_access_period_days');
            $table->boolean('token_was_used');
            $table->datetime('date_token_was_used')->nullable();
            $table->datetime('invitation_expiration_date');
            $table->text('motive');
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
        Schema::dropIfExists('invitations');
    }
}
