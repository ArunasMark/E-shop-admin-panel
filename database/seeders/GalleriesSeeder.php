<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;

class GalleriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [];

        for ($y = 1; $y <= 17; $y++) {
            for ($i = 1; $i <= 3; $i++) {
                $data[] = [
                    'product_id' => $y,
                    'img' => 'g' . $y . '-' . $i . '.png',
                ];
            }
        }


        DB::table('galleries')->insert($data);
    }
}
