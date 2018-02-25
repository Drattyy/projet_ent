<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PromotionSeeder::class);
        $this->call(TdgroupSeeder::class);
        $this->call(TpgroupSeeder::class);
        $this->call(SemesterSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(ModuleTdGroupSeeder::class);
        $this->call(ModuleUserSeeder::class);
    }
}
