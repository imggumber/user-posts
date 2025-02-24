<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class DatabaseMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:database-migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (!Schema::hasTable('users')) {
            Artisan::call("migrate", ['--path' => '/database/migrations/2014_10_12_000000_create_users_table.php']);
        }
        if (!Schema::hasTable('posts')) {
            Artisan::call("migrate", ['--path' => '/database/migrations/2025_02_24_095658_create_posts_table.php']);
        }
        Artisan::call("migrate", ['--path' => '/database/migrations/2019_08_19_000000_create_failed_jobs_table.php']);
        Artisan::call("migrate", ['--path' => '/database/migrations/2014_10_12_100000_create_password_resets_table.php']);
        Artisan::call("migrate", ['--path' => '/database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php']);

        $this->info("Migration completed");
    }
}
