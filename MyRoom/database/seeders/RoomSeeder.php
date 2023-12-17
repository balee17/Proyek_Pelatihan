<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use Faker\Factory as Faker;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        
            public function run()
            {
                $faker = Faker::create();
                $gambarUrls = [
                    'https://www.virtualofficeku.co.id/wp-content/uploads/2020/08/92041-busi-mobil.jpg',
                    'https://virtualofficemurah.com/wp-content/uploads/2021/04/Ruang-Graha-Office-14-1024x683.jpg',
                    'https://virtualofficemurah.com/wp-content/uploads/2021/04/Ruang-Graha-Office-6-scaled.jpg',
                ];

                $namaRuangan = ['Ruangan Kerja A', 'Ruangan Kerja B', 'Ruangan Kerja C'];

                foreach (range(1, 5) as $index) {
                    DB::table('rooms')->insert([
                        'nama' => $faker->randomElement($namaRuangan),
                        'kode' => $this->generateRandomCode($faker),
                        'harga' => $faker->numberBetween(50000, 120000),
                        'kapasitas' => $faker->numberBetween(5, 12),
                        'foto' => $faker->randomElement($gambarUrls),
                        'kondisi' => "kosong"
                    ]);
                }
            }

            private function generateRandomCode($faker)
            {
                $characters = ['A', 'X', 'I', '2', '4', 'J', '0', '9', 'L'];
                $code = '';
                for ($i = 0; $i < 5; $i++) {
                    $code .= $faker->randomElement($characters);
                }
                return $code;
            }
    }
