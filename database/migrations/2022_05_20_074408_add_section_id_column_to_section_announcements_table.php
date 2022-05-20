<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Section;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('section_announcements','section_id'))
        {
            Schema::table('section_announcements', function (Blueprint $table) {
                $table->foreignIdFor(Section::class)->constrained()
                ->onUpdate('cascade')->onDelete('cascade')->after('content')->nullable();
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
        Schema::table('section_announcements', function (Blueprint $table) {
            $table->dropConstrainedForeignId('section_id');
        });
    }
};
