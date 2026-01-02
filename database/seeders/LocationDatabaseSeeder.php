<?php

namespace Modules\Location\Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Modules\General\Contracts\Seeder\BaseSeeder;
use Modules\Location\Models\City;

class LocationDatabaseSeeder extends BaseSeeder
{
    public function init(): void
    {
        ini_set('memory_limit', '512M');
        foreach (glob(module_path('Location', 'database/sql/*.sql')) as $filepath) {
            $this->command->info("  - Seeding " . last(explode('/', $filepath)));
            $this->seedFromSqlFile($filepath);
        }
    }

    public function fake(): void
    {
        //
    }

    private function seedFromSqlFile(string $filepath): void
    {
        if (! File::exists($filepath)) {
            $this->command->warn("SQL file not found at $filepath");
            return;
        }

        try {
            DB::statement(file_get_contents($filepath));
        } catch (\Throwable $e) {
            $this->command->error("Error importing SQL file {$filepath}: ".$e->getMessage());
        }
    }
}
