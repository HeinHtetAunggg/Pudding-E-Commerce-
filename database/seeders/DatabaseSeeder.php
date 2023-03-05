<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Pudding;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


       $caramel= Category::factory()->create(['name'=>'Caramel','slug'=>'caramel']);
       $chocolate= Category::factory()->create(['name'=>'Chocolate','slug'=>'chocolate']);
        $coconut=Category::factory()->create(['name'=>'Coconut','slug'=>'coconut']);
        $banana=Category::factory()->create(['name'=>'Banana','slug'=>'banana']);

        Pudding::factory(2)->create(['category_id'=>$caramel->id]);
        Pudding::factory(2)->create(['category_id'=>$chocolate->id]);
        Pudding::factory(2)->create(['category_id'=>$coconut->id]);
        Pudding::factory(2)->create(['category_id'=>$banana->id]);

    }
}
