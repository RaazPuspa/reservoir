<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('links', static function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('title');
            $table->text('url');
            $table->boolean('in_new_tab')->default(false);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
