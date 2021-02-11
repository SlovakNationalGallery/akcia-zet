<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddPublisedAtToArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->timestamp('published_at')->after('published')->nullable();
        });

        DB::statement(
            'UPDATE articles set published_at = updated_at WHERE published = true'
        );

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('published');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->boolean('published')->after('published_at');
        });

        DB::statement(
            'UPDATE articles set published = true WHERE published_at < NOW()'
        );

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('published_at');
        });
    }
}
