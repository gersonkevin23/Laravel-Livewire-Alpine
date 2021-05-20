<?php

namespace Database\Seeders;

use App\Models\Pair;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
        ]);
        Pair::create(['name' => 'XRP', 'type' => 'USDT']);
        Pair::create(['name' => 'STORJ', 'type' => 'BNB']);
        Pair::create(['name' => 'DOGE', 'type' => 'BTC']);
        Pair::create(['name' => 'TETHER', 'type' => 'ETH']);
    }
}
