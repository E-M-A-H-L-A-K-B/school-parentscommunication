<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Subject;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school_notes', function (Blueprint $table) {
            $table->foreignIdFor(Subject::class)->nullable()->constrained()
                ->onUpdate('cascade')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_notes', function (Blueprint $table) {
            $table->dropConstrainedForeignId('subject_id');
        });
    }
};
