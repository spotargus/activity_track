<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateActivityTrackTable
 */
class CreateActivityTracksTable extends Migration
{
    public function up()
    {
        $tableNames = config('activity-track.table_names');
        $columnNames = config('activity-track.column_names');

        Schema::create($tableNames['activity_tracks'], function(Blueprint $table) {
            $table->increments($columnNames['activity_tracks']['id']);
            $table->unsignedBigInteger($columnNames['activity_tracks']['model_key']);
            $table->string($columnNames['activity_tracks']['model_type']);
            $table->string($columnNames['activity_tracks']['tracking_type']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        $tableName = config('activity-track.table_names');

        Schema::dropIfExists($tableName['activity_tracks']);

    }
}