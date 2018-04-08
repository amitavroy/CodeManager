<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Project::class)->create([
            'name' => 'CodeManager',
            'git_url' => 'https://github.com/amitavroy/CodeManager.git'
        ]);

        factory(\App\Project::class, 5)->create();
    }
}
