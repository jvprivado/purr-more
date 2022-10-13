<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'firstname' => 'eyJpdiI6IncyYy9aQVZpcGVWT1MrVVFWcS9XZVE9PSIsInZhbHVlIjoiclR0K3ZoSHl3bUx3N2E0ZXdSakpXUT09IiwibWFjIjoiOWNkNzE4Y2UxZTg0MWMzY2E1YTkxMzE5NTZkYWI1NWYzYTI3ZWM0N2FlNjhiNDU4NzNmZmFhM2I1NWNhNTA0ZSIsInRhZyI6IiJ9',
                    'lastname' => '',
                    'email' => 'admin@gmail.com',
                    'phone' => '',
                    'pur' => '',
                    'thumbnail' => NULL,
                    'cat_names' => '',
                    'agreementPromotion' => '',
                    'agreementTC' => '',
                    'pur_status' => '0',
                    'password' => '$2y$10$/qAtsVqZcvJZfeeldomk6O/jx1b9p7VR4j.6xP.6ZP/vSflrZOj2q',
                    'user_status' => '1',
                    'winningTime' => NULL,
                    'remember_token' => NULL,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            5=>
                array (
                    'id' => 6,
                    'firstname' => 'eyJpdiI6IncyYy9aQVZpcGVWT1MrVVFWcS9XZVE9PSIsInZhbHVlIjoiclR0K3ZoSHl3bUx3N2E0ZXdSakpXUT09IiwibWFjIjoiOWNkNzE4Y2UxZTg0MWMzY2E1YTkxMzE5NTZkYWI1NWYzYTI3ZWM0N2FlNjhiNDU4NzNmZmFhM2I1NWNhNTA0ZSIsInRhZyI6IiJ9',
                    'lastname' => '',
                    'email' => 'Erica.jin@effem.com',
                    'phone' => '',
                    'pur' => '',
                    'thumbnail' => NULL,
                    'cat_names' => '',
                    'agreementPromotion' => '',
                    'agreementTC' => '',
                    'pur_status' => '0',
                    'password' => '$2y$10$/qAtsVqZcvJZfeeldomk6O/jx1b9p7VR4j.6xP.6ZP/vSflrZOj2q',
                    'user_status' => '1',
                    'winningTime' => NULL,
                    'remember_token' => NULL,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            6=>
                array (
                    'id' => 7,
                    'firstname' => 'eyJpdiI6IncyYy9aQVZpcGVWT1MrVVFWcS9XZVE9PSIsInZhbHVlIjoiclR0K3ZoSHl3bUx3N2E0ZXdSakpXUT09IiwibWFjIjoiOWNkNzE4Y2UxZTg0MWMzY2E1YTkxMzE5NTZkYWI1NWYzYTI3ZWM0N2FlNjhiNDU4NzNmZmFhM2I1NWNhNTA0ZSIsInRhZyI6IiJ9',
                    'lastname' => '',
                    'email' => 'Adam.sardo@effem.com',
                    'phone' => '',
                    'pur' => '',
                    'thumbnail' => NULL,
                    'cat_names' => '',
                    'agreementPromotion' => '',
                    'agreementTC' => '',
                    'pur_status' => '0',
                    'password' => '$2y$10$/qAtsVqZcvJZfeeldomk6O/jx1b9p7VR4j.6xP.6ZP/vSflrZOj2q',
                    'user_status' => '1',
                    'winningTime' => NULL,
                    'remember_token' => NULL,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            7=>
                array (
                    'id' => 8,
                    'firstname' => 'eyJpdiI6IncyYy9aQVZpcGVWT1MrVVFWcS9XZVE9PSIsInZhbHVlIjoiclR0K3ZoSHl3bUx3N2E0ZXdSakpXUT09IiwibWFjIjoiOWNkNzE4Y2UxZTg0MWMzY2E1YTkxMzE5NTZkYWI1NWYzYTI3ZWM0N2FlNjhiNDU4NzNmZmFhM2I1NWNhNTA0ZSIsInRhZyI6IiJ9',
                    'lastname' => '',
                    'email' => 'jonathan.peach@effem.com',
                    'phone' => '',
                    'pur' => '',
                    'thumbnail' => NULL,
                    'cat_names' => '',
                    'agreementPromotion' => '',
                    'agreementTC' => '',
                    'pur_status' => '0',
                    'password' => '$2y$10$/qAtsVqZcvJZfeeldomk6O/jx1b9p7VR4j.6xP.6ZP/vSflrZOj2q',
                    'user_status' => '1',
                    'winningTime' => NULL,
                    'remember_token' => NULL,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
        ));
    }
}
