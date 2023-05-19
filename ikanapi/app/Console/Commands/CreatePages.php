<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreatePages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:pages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create pages for Halaman Ikan, Halaman Pelabuhan, and Halaman Token API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Create the Halaman Ikan page
    File::put(resource_path('views/ikan.blade.php'), '<h1>Halaman Ikan</h1>');

    // Create the Halaman Pelabuhan page
    File::put(resource_path('views/pelabuhan.blade.php'), '<h1>Halaman Pelabuhan</h1>');

    // Create the Halaman Token API page
    File::put(resource_path('views/token-api.blade.php'), '<h1>Halaman Token API</h1>');

    $this->info('Pages created successfully!');
    }
}
