<?php
    namespace Database\Seeders;
    use Illuminate\Database\Seeder;
    use DB;

    class CurrenciesSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $data = [
                [
                    'id' => '1',
                    'title' => 'Grivna',
                    'code' => 'UAH',
                    'symbol_left' => '',
                    'symbol_right' => 'grv.',
                    'value' => '39.28',
                    'base' => '0'
                ],
                [
                    'id' => '2',
                    'title' => 'Doleris',
                    'code' => 'USD',
                    'symbol_left' => '$',
                    'symbol_right' => '',
                    'value' => '1.09',
                    'base' => '0'
                ],
                [
                    'id' => '3',
                    'title' => 'Euro',
                    'code' => 'EUR',
                    'symbol_left' => '€',
                    'symbol_right' => '',
                    'value' => '1.00',
                    'base' => '1'
                ],

            ];

            DB::table('currencies')->insert($data);
        }
    }
