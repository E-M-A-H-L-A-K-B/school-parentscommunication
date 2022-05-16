<?php

use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
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
        Schema::create('school_notes', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->foreignIdFor(User::class)->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(Subject::class)->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(Student::class)->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('school_notes');
    }
};
