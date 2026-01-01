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
        ini_set('memory_limit', '4096M');
        $this->seedFromSqlFile(module_path('Location', 'database/sql/regions.sql'));
        $this->seedFromSqlFile(module_path('Location', 'database/sql/subregions.sql'));
        $this->seedFromSqlFile(module_path('Location', 'database/sql/countries.sql'));
        $this->seedFromSqlFile(module_path('Location', 'database/sql/states.sql'));

        foreach (range(1, 3) as $i) {
            $this->seedFromSqlFile(module_path('Location', "database/sql/cities.{$i}.sql"));
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
