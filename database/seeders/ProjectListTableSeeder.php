<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->db->table('project_list')->insert([
            'project_name' => "落ち武者と少女",
            'user_id' => '1',
            'genre' => '8',
            'nendai' => "戦国時代",
            'memo' => "フィクションです",
            'color' => 'ffc0cb',
            'series' => "落ち武者と少女", 
        ]);
    }
}
