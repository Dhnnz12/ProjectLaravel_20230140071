<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('email')->nullable()->after('prodi');
            $table->string('telepon')->nullable()->after('email');
            $table->string('alamat')->nullable()->after('telepon');
            $table->text('bio')->nullable()->after('alamat');
            $table->string('github_url')->nullable()->after('hobi');
            $table->string('instagram_url')->nullable()->after('github_url');
            $table->string('linkedin_url')->nullable()->after('instagram_url');
            $table->string('foto')->nullable()->after('linkedin_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['email', 'telepon', 'alamat', 'bio', 'github_url', 'instagram_url', 'linkedin_url', 'foto']);
        });
    }
};
