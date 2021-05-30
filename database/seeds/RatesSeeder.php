<?php
declare(strict_types=1);

namespace Database\Seeders;

use DateTime;
use Domain\Enums\LanguageEnum;
use Domain\Enums\SupportedCurrencyEnum;
use Domain\Enums\SeniorityEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatesSeeder extends Seeder
{
    private const ONE_HUNDRED_CENTS = 100;
    private const ARS_EXCHANGE_RATE = 103;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seederWasAlreadyExecuted = DB::table('rates')->find(1);

        if ($seederWasAlreadyExecuted) {
            return ;
        }

        DB::table('rates')->insert(
            [
                /*
                 * PHP SENIOR DEV
                 *  1) With ENGLISH (USD)
                 *  2) Without ENGLISH (USD)
                 *  3) Without ENGLISH (ARS)
                 */
                [
                    'id'             => 1,
                    'technology_id'  => 1,
                    'seniority'      => SeniorityEnum::SENIOR,
                    'language'       => LanguageEnum::ENGLISH,
                    'currency'       => SupportedCurrencyEnum::USD,
                    'average_salary' => 4600 * self::ONE_HUNDRED_CENTS,
                    'gross_margin'   => 46 * self::ONE_HUNDRED_CENTS,
                    'created_at'     => new DateTime(),
                    'updated_at'     => new DateTime(),
                ],
                [
                    'id'             => 2,
                    'technology_id'  => 1,
                    'seniority'      => SeniorityEnum::SENIOR,
                    'language'       => LanguageEnum::SPANISH,
                    'currency'       => SupportedCurrencyEnum::USD,
                    'average_salary' => 2300 * self::ONE_HUNDRED_CENTS,
                    'gross_margin'   => 23 * self::ONE_HUNDRED_CENTS,
                    'created_at'     => new DateTime(),
                    'updated_at'     => new DateTime(),
                ],
                [
                    'id'             => 3,
                    'technology_id'  => 1,
                    'seniority'      => SeniorityEnum::SENIOR,
                    'language'       => LanguageEnum::SPANISH,
                    'currency'       => SupportedCurrencyEnum::ARS,
                    'average_salary' => 2300 * self::ARS_EXCHANGE_RATE * self::ONE_HUNDRED_CENTS,
                    'gross_margin'   => 23 * self::ARS_EXCHANGE_RATE * self::ONE_HUNDRED_CENTS,
                    'created_at'     => new DateTime(),
                    'updated_at'     => new DateTime(),
                ],

                /*
                 * JAVASCRIPT SENIOR DEV
                 *  4) With ENGLISH (USD)
                 *  5) Without ENGLISH (USD)
                 *  6) Without ENGLISH (ARS)
                 */
                [
                    'id'             => 4,
                    'technology_id'  => 4,
                    'seniority'      => SeniorityEnum::SENIOR,
                    'language'       => LanguageEnum::ENGLISH,
                    'currency'       => SupportedCurrencyEnum::USD,
                    'average_salary' => 4200 * self::ONE_HUNDRED_CENTS,
                    'gross_margin'   => 42 * self::ONE_HUNDRED_CENTS,
                    'created_at'     => new DateTime(),
                    'updated_at'     => new DateTime(),
                ],
                [
                    'id'             => 5,
                    'technology_id'  => 4,
                    'seniority'      => SeniorityEnum::SENIOR,
                    'language'       => LanguageEnum::SPANISH,
                    'currency'       => SupportedCurrencyEnum::USD,
                    'average_salary' => 2100 * self::ONE_HUNDRED_CENTS,
                    'gross_margin'   => 21 * self::ONE_HUNDRED_CENTS,
                    'created_at'     => new DateTime(),
                    'updated_at'     => new DateTime(),
                ],
                [
                    'id'             => 6,
                    'technology_id'  => 4,
                    'seniority'      => SeniorityEnum::SENIOR,
                    'language'       => LanguageEnum::SPANISH,
                    'currency'       => SupportedCurrencyEnum::ARS,
                    'average_salary' => 2100 * self::ARS_EXCHANGE_RATE * self::ONE_HUNDRED_CENTS,
                    'gross_margin'   => 21 * self::ARS_EXCHANGE_RATE * self::ONE_HUNDRED_CENTS,
                    'created_at'     => new DateTime(),
                    'updated_at'     => new DateTime(),
                ],
            ]
        );
    }
}
