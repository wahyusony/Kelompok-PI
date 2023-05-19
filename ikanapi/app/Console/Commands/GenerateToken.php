<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate API token';

    /**
     * Execute the console command.
     */
    public function handle()
    {
          // Check if the token already exists in the cookie
        if (!Cookie::get('api_token')) {
            // Generate the token
            $token = Str::random(60);

            // Store the token in a cookie that expires after 1 month
            Cookie::queue('api_token', $token, 43200);

            // Display the generated token
            $this->info('API token generated: ' . $token);
        } else {
            // Display the existing token
            $this->info('API token already exists: ' . Cookie::get('api_token'));
        }
    }
}
