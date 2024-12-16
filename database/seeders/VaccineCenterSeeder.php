<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaccineCenterSeeder extends Seeder
{
    public function run()
    {
        DB::table('vaccine_centers')->insert([[
                'name'           => 'Dhaka Central Vaccine Center',
                'location'       => '123 Main Street, Dhaka',
                'capacity'       => 50,
                'contact_number' => '+8801711111111',
            ],
            [
                'name'           => 'Chittagong Vaccine Hub',
                'location'       => '456 Station Road, Chittagong',
                'capacity'       => 40,
                'contact_number' => '+8801722222222',
            ],
            [
                'name'           => 'Sylhet Health Care Center',
                'location'       => '789 Medical Street, Sylhet',
                'capacity'       => 35,
                'contact_number' => '+8801733333333',
            ],
            [
                'name'           => 'Khulna Vaccine Center',
                'location'       => '101 Green Road, Khulna',
                'capacity'       => 30,
                'contact_number' => '+8801744444444',
            ],
            [
                'name'           => 'Barisal Health Point',
                'location'       => '202 Lake View, Barisal',
                'capacity'       => 25,
                'contact_number' => '+8801755555555',
            ],
            [
                'name'           => 'Rajshahi Medical Vaccine Center',
                'location'       => '303 King Street, Rajshahi',
                'capacity'       => 20,
                'contact_number' => '+8801766666666',
            ],
            [
                'name'           => 'Rangpur Vaccine Station',
                'location'       => '404 Market Road, Rangpur',
                'capacity'       => 30,
                'contact_number' => '+8801777777777',
            ],
            [
                'name'           => 'Mymensingh Health Center',
                'location'       => '505 University Road, Mymensingh',
                'capacity'       => 40,
                'contact_number' => '+8801788888888',
            ],
            [
                'name'           => 'Comilla Vaccine Unit',
                'location'       => '606 High Street, Comilla',
                'capacity'       => 35,
                'contact_number' => '+8801799999999',
            ],
            [
                'name'           => 'Jessore Vaccine Hub',
                'location'       => '707 Railway Road, Jessore',
                'capacity'       => 45,
                'contact_number' => '+8801700000000',
            ],
        ]);
    }
}
