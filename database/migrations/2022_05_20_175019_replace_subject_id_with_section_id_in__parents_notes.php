<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Section;
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
        if(Schema::hasColumn('parent_notes','subject_id'))
        {
            Schema::table('parent_notes', function (Blueprint $table) {
                $table->dropConstrainedForeignId('subject_id');
                $table->foreignIdFor(Section::class)->constrained()
                ->onUpdate('cascade')->onDelete('cascade')->after('content');
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
            $table->dropConstrainedForeignId('section_id');
            $table->foreignIdFor(Subject::class)->constrained()
            ->onUpdate('cascade')->onDelete('cascade')->after('content');
        });
    }
};
