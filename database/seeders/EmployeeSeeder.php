<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'nip'=>'1987654321',
                'name'=>'Bu Ani',
                'role'=>'guru',
                'department'=>'Tata Usaha',
                'created_at'=>now(),'updated_at'=>now()
            ],
            [
                'nip'=>'2001122334',
                'name'=>'Pak Budi',
                'role'=>'satpam',
                'department'=>'Keamanan',
                'created_at'=>now(),'updated_at'=>now()
            ],
        ]);
    }
}
