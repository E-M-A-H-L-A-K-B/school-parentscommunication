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
        if(Schema::hasColumn('parent_notes','to_admin'))
        {
            Schema::table('parent_notes', function (Blueprint $table) {
                $table->dropColumn('to_admin');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parent_notes', function (Blueprint $table) {
            $table->boolean('to_admin')->default(false);
        });
    }
};
