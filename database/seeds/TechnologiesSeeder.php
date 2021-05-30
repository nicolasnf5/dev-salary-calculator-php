<?php
declare(strict_types=1);

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seederWasAlreadyExecuted = DB::table('technologies')->find(1);

        if ($seederWasAlreadyExecuted) {
            return ;
        }

        DB::table('technologies')->insert(
            [
                [
                    'id'            => 1,
                    'name'          => 'PHP',
                    'created_at'    => new DateTime(),
                    'updated_at'    => new DateTime(),
                ],
                [
                    'id'            => 2,
                    'name'          => 'C#',
                    'created_at'    => new DateTime(),
                    'updated_at'    => new DateTime(),
                ],
                [
                    'id'            => 3,
                    'name'          => 'Java',
                    'created_at'    => new DateTime(),
                    'updated_at'    => new DateTime(),
                ],
                [
                    'id'            => 4,
                    'name'          => 'JavaScript',
                    'created_at'    => new DateTime(),
                    'updated_at'    => new DateTime(),
                ],
            ]
        );
    }
}
