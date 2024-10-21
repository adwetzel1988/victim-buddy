<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complaints', function (Blueprint $table) {
            // Add prosecutor details
            $table->string('prosecutor_name')->nullable();
            $table->string('prosecutor_number')->nullable();
            $table->string('prosecutor_email')->nullable();

            // Add defendant status
            $table->enum('defendant_status', ['in_jail', 'on_bond', 'unknown'])->default('unknown');

            // Add judge name
            $table->string('judge_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->dropColumn('prosecutor_name');
            $table->dropColumn('prosecutor_number');
            $table->dropColumn('prosecutor_email');
            $table->dropColumn('defendant_status');
            $table->dropColumn('judge_name');
        });
    }
}
