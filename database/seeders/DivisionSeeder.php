<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ship_divisions')->insert(
            [
                'division_name'=>'Barishal'
            ]);
            DB::table('ship_divisions')->insert(
            [
                'division_name'=>'Chattogram'
            ]);
            DB::table('ship_divisions')->insert(
            [
                'division_name'=>'Dhaka'
            ]);
            DB::table('ship_divisions')->insert([
                'division_name'=>'Khulna'
            ]);
            DB::table('ship_divisions')->insert([
                'division_name'=>'MYMENSINGH'
            ]);
            DB::table('ship_divisions')->insert([
                'division_name'=>'Rajshahi'
            ]);
            DB::table('ship_divisions')->insert([
                'division_name'=>'Rangpur'
            ]);
            DB::table('ship_divisions')->insert([
                'division_name'=>'Sylhet'
            ]);
        

    }
}
