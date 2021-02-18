<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PutDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sectors')->insert([
            [
                'fname' => 'ฝ่ายขายราชการ1',
                'sname' => 'ฝ่ายขายราชการ1'
            ], [
                'fname' => 'ฝ่ายขายราชการ2',
                'sname' => 'ฝ่ายขายราชการ2'
            ], [
                'fname' => 'ฝ่ายขายราชการ3',
                'sname' => 'ฝ่ายขายราชการ3'
            ]
        ]);

        DB::table('departments')->insert([[
            'fname' => 'ส่วนขายราชการที่ 1.1',
            'sname' => 'ส่วนขายราชการที่ 1.1',
            'sector' => '1',
        ], [
            'fname' => 'ส่วนขายราชการที่ 1.2',
            'sname' => 'ส่วนขายราชการที่ 1.2',
            'sector' => '1',
        ], [
            'fname' => 'ส่วนขายราชการที่ 2.1',
            'sname' => 'ส่วนขายราชการที่ 2.1',
            'sector' => '2',
        ], [
            'fname' => 'ส่วนขายราชการที่ 2.2',
            'sname' => 'ส่วนขายราชการที่ 2.2',
            'sector' => '2',
        ], [
            'fname' => 'ส่วนขายราชการที่ 3.1',
            'sname' => 'ส่วนขายราชการที่ 3.1',
            'sector' => '3',
        ], [
            'fname' => 'ส่วนขายราชการที่ 3.2',
            'sname' => 'ส่วนขายราชการที่ 3.2',
            'sector' => '3',
        ]]);

        DB::table('customer_types')->insert([
            [
                'name' => 'ลูกค้าประจำ'
            ], [
                'name' => 'ลูกค้าใหม่'
            ], [
                'name' => 'เคยเป็นลูกค้า'
            ]
        ]);

        DB::table('project_types')->insert([
            [
                'name' => 'จ้าง'
            ], [
                'name' => 'เช่า'
            ], [
                'name' => 'ซื้อ'
            ], [
                'name' => 'อื่นๆ...'
            ]
        ]);

        DB::table('project_statuses')->insert([
            [
                'name' => 'โครงการต่อเนื่อง'
            ], [
                'name' => 'โครงการใหม่'
            ]
        ]);
    }
}
