<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class StoreController extends Controller
{
    use HttpResponses;

public function index(Request $request)
{
    // Path to the SQLite database file
    $databasePath = database_path('database.sqlite');

    // Ensure the database file exists
    if (!File::exists($databasePath)) {
        // Create the SQLite database file
        File::ensureDirectoryExists(database_path());
        File::put($databasePath, '');
    }

    // Run migrations if necessary
    Artisan::call('migrate', [
        '--force' => true, // Force the migration in production
    ]);

    // Seed the database if necessary (optional)
    if (!Store::exists()) { // Only seed if the table is empty
        Artisan::call('db:seed', [
            '--class' => 'YourSeederClassName', // Replace with your actual seeder class name
            '--force' => true,
        ]);
    }

    // Fetch the data from the `stores` table
    $stores = Store::select(['id', 'name', 'image', 'website_url'])->get();

    return $this->success($stores, 'Stores retrieved successfully.');
}

}
