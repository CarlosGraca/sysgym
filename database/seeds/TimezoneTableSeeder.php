<?php

use Illuminate\Database\Seeder;
use App\TimeZone;
use Illuminate\Database\Eloquent\Model;

class TimezoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        TimeZone::create([
                'name'              => '(GMT-12:00) International Date Line West',
                'gmtAdjustment'     => 'GMT-12:00',
                'useDaylightTime'   => '0',
                'value'             => -12,
                'user_id'           => 1
        ]);
        TimeZone::create([
            'name'              => '(GMT-11:00) Midway Island, Samoa',
            'gmtAdjustment'     => 'GMT-11:00',
            'useDaylightTime'   => '0',
            'value'             => -11,
            'user_id'           => 1
        ]);
        TimeZone::create([
        'name'              => '(GMT-10:00) Hawaii',
        'gmtAdjustment'     => 'GMT-10:00',
        'useDaylightTime'   => '0',
        'value'             => -10,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-09:00) Alaska',
        'gmtAdjustment'     => 'GMT-09:00',
        'useDaylightTime'   => '1',
        'value'             => -9,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-08:00) Pacific Time (US & Canada)',
        'gmtAdjustment'     => 'GMT-08:00',
        'useDaylightTime'   => '1',
        'value'             => -8,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT-08:00) Tijuana, Baja California',
        'gmtAdjustment'     => 'GMT-08:00',
        'useDaylightTime'   => '1',
        'value'             => -8,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT-07:00) Arizona',
        'gmtAdjustment'     => 'GMT-07:00',
        'useDaylightTime'   => '0',
        'value'             => -7,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT-07:00) Chihuahua, La Paz, Mazatlan',
        'gmtAdjustment'     => 'GMT-07:00',
        'useDaylightTime'   => '1',
        'value'             => -7,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT-07:00) Mountain Time (US & Canada)',
        'gmtAdjustment'     => 'GMT-07:00',
        'useDaylightTime'   => '1',
        'value'             => -7,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT-06:00) Central America',
        'gmtAdjustment'     => 'GMT-06:00',
        'useDaylightTime'   => '0',
        'value'             => -6,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT-06:00) Central Time (US & Canada)',
        'gmtAdjustment'     => 'GMT-06:00',
        'useDaylightTime'   => '0',
        'value'             => -6,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT-06:00) Guadalajara, Mexico City, Monterrey',
        'gmtAdjustment'     => 'GMT-06:00',
        'useDaylightTime'   => '0',
        'value'             => -6,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT-06:00) Saskatchewan',
        'gmtAdjustment'     => 'GMT-06:00',
        'useDaylightTime'   => '0',
        'value'             => -6,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-05:00) Bogota, Lima, Quito, Rio Branco',
        'gmtAdjustment'     => 'GMT-05:00',
        'useDaylightTime'   => '0',
        'value'             => -5,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-05:00) Eastern Time (US & Canada)',
        'gmtAdjustment'     => 'GMT-05:00',
        'useDaylightTime'   => '0',
        'value'             => -5,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-05:00) Indiana (East)',
        'gmtAdjustment'     => 'GMT-05:00',
        'useDaylightTime'   => '0',
        'value'             => -5,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-04:00) Atlantic Time (Canada)',
        'gmtAdjustment'     => 'GMT-04:00',
        'useDaylightTime'   => '0',
        'value'             => -4,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-04:00) Caracas, La Paz',
        'gmtAdjustment'     => 'GMT-04:00',
        'useDaylightTime'   => '0',
        'value'             => -4,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-04:00) Manaus',
        'gmtAdjustment'     => 'GMT-04:00',
        'useDaylightTime'   => '0',
        'value'             => -4,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-04:00) Santiago',
        'gmtAdjustment'     => 'GMT-04:00',
        'useDaylightTime'   => '0',
        'value'             => -4,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-03:30) Newfoundland',
        'gmtAdjustment'     => 'GMT-03:30',
        'useDaylightTime'   => '0',
        'value'             => -3.5,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-03:00) Brasilia',
        'gmtAdjustment'     => 'GMT-03:00',
        'useDaylightTime'   => '0',
        'value'             => -3,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-03:00) Buenos Aires, Georgetown',
        'gmtAdjustment'     => 'GMT-03:00',
        'useDaylightTime'   => '0',
        'value'             => -3,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-03:00) Greenland',
        'gmtAdjustment'     => 'GMT-03:00',
        'useDaylightTime'   => '0',
        'value'             => -3,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-03:00) Montevideo',
        'gmtAdjustment'     => 'GMT-03:00',
        'useDaylightTime'   => '0',
        'value'             => -3,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-02:00) Mid-Atlantic',
        'gmtAdjustment'     => 'GMT-02:00',
        'useDaylightTime'   => '0',
        'value'             => -2,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-01:00) Cape Verde Is.',
        'gmtAdjustment'     => 'GMT-01:00',
        'useDaylightTime'   => '0',
        'value'             => -1,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT-01:00) Azores',
        'gmtAdjustment'     => 'GMT-01:00',
        'useDaylightTime'   => '0',
        'value'             => -1,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT+00:00) Casablanca, Monrovia, Reykjavik',
        'gmtAdjustment'     => 'GMT+00:00',
        'useDaylightTime'   => '0',
        'value'             => 0,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London',
        'gmtAdjustment'     => 'GMT+00:00',
        'useDaylightTime'   => '0',
        'value'             => 0,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna',
        'gmtAdjustment'     => 'GMT+01:00',
        'useDaylightTime'   => '0',
        'value'             => 1,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague',
        'gmtAdjustment'     => 'GMT+01:00',
        'useDaylightTime'   => '0',
        'value'             => 1,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+01:00) Brussels, Copenhagen, Madrid, Paris',
        'gmtAdjustment'     => 'GMT+01:00',
        'useDaylightTime'   => '0',
        'value'             => 1,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb',
        'gmtAdjustment'     => 'GMT+01:00',
        'useDaylightTime'   => '0',
        'value'             => 1,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+01:00) West Central Africa',
        'gmtAdjustment'     => 'GMT+01:00',
        'useDaylightTime'   => '0',
        'value'             => 1,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+02:00) Amman',
        'gmtAdjustment'     => 'GMT+02:00',
        'useDaylightTime'   => '0',
        'value'             => 2,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+02:00) Athens, Bucharest, Istanbul',
        'gmtAdjustment'     => 'GMT+02:00',
        'useDaylightTime'   => '0',
        'value'             => 2,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+02:00) Beirut',
        'gmtAdjustment'     => 'GMT+02:00',
        'useDaylightTime'   => '0',
        'value'             => 2,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+02:00) Cairo',
        'gmtAdjustment'     => 'GMT+02:00',
        'useDaylightTime'   => '0',
        'value'             => 2,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+02:00) Harare, Pretoria',
        'gmtAdjustment'     => 'GMT+02:00',
        'useDaylightTime'   => '0',
        'value'             => 2,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius',
        'gmtAdjustment'     => 'GMT+02:00',
        'useDaylightTime'   => '0',
        'value'             => 2,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+02:00) Jerusalem',
        'gmtAdjustment'     => 'GMT+02:00',
        'useDaylightTime'   => '0',
        'value'             => 2,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+02:00) Minsk',
        'gmtAdjustment'     => 'GMT+02:00',
        'useDaylightTime'   => '0',
        'value'             => 2,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+02:00) Windhoek',
        'gmtAdjustment'     => 'GMT+02:00',
        'useDaylightTime'   => '0',
        'value'             => 2,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+03:00) Kuwait, Riyadh, Baghdad',
        'gmtAdjustment'     => 'GMT+03:00',
        'useDaylightTime'   => '0',
        'value'             => 3,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+03:00) Moscow, St. Petersburg, Volgograd',
        'gmtAdjustment'     => 'GMT+03:00',
        'useDaylightTime'   => '0',
        'value'             => 3,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+03:00) Nairobi',
        'gmtAdjustment'     => 'GMT+03:00',
        'useDaylightTime'   => '0',
        'value'             => 3,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+03:00) Tbilisi',
        'gmtAdjustment'     => 'GMT+03:00',
        'useDaylightTime'   => '0',
        'value'             => 3,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+03:30) Tehran',
        'gmtAdjustment'     => 'GMT+03:30',
        'useDaylightTime'   => '0',
        'value'             => 3.5,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+04:00) Abu Dhabi, Muscat',
        'gmtAdjustment'     => 'GMT+04:00',
        'useDaylightTime'   => '0',
        'value'             => 4,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+04:00) Baku',
        'gmtAdjustment'     => 'GMT+04:00',
        'useDaylightTime'   => '0',
        'value'             => 4,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+04:00) Yerevan',
        'gmtAdjustment'     => 'GMT+04:00',
        'useDaylightTime'   => '0',
        'value'             => 4,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+04:30) Kabul',
        'gmtAdjustment'     => 'GMT+04:30',
        'useDaylightTime'   => '0',
        'value'             => 4.5,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+05:00) Yekaterinburg',
        'gmtAdjustment'     => 'GMT+05:00',
        'useDaylightTime'   => '0',
        'value'             => 5,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+05:00) Islamabad, Karachi, Tashkent',
        'gmtAdjustment'     => 'GMT+05:00',
        'useDaylightTime'   => '0',
        'value'             => 5,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+05:30) Sri Jayawardenapura',
        'gmtAdjustment'     => 'GMT+05:30',
        'useDaylightTime'   => '0',
        'value'             => 5.5,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi',
        'gmtAdjustment'     => 'GMT+05:30',
        'useDaylightTime'   => '0',
        'value'             => 5.5,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+05:45) Kathmandu',
        'gmtAdjustment'     => 'GMT+05:45',
        'useDaylightTime'   => '0',
        'value'             => 5.75,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+06:00) Almaty, Novosibirsk',
        'gmtAdjustment'     => 'GMT+06:00',
        'useDaylightTime'   => '0',
        'value'             => 6,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+06:00) Astana, Dhaka',
        'gmtAdjustment'     => 'GMT+06:00',
        'useDaylightTime'   => '0',
        'value'             => 6,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+06:30) Yangon (Rangoon)',
        'gmtAdjustment'     => 'GMT+06:30',
        'useDaylightTime'   => '0',
        'value'             => 6.5,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+07:00) Bangkok, Hanoi, Jakarta',
        'gmtAdjustment'     => 'GMT+07:00',
        'useDaylightTime'   => '0',
        'value'             => 7,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+07:00) Krasnoyarsk',
        'gmtAdjustment'     => 'GMT+07:00',
        'useDaylightTime'   => '0',
        'value'             => 7,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi',
        'gmtAdjustment'     => 'GMT+08:00',
        'useDaylightTime'   => '0',
        'value'             => 8,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+08:00) Kuala Lumpur, Singapore',
        'gmtAdjustment'     => 'GMT+08:00',
        'useDaylightTime'   => '0',
        'value'             => 8,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+08:00) Irkutsk, Ulaan Bataar',
        'gmtAdjustment'     => 'GMT+08:00',
        'useDaylightTime'   => '0',
        'value'             => 8,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+08:00) Perth',
        'gmtAdjustment'     => 'GMT+08:00',
        'useDaylightTime'   => '0',
        'value'             => 8,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+08:00) Taipei',
        'gmtAdjustment'     => 'GMT+08:00',
        'useDaylightTime'   => '0',
        'value'             => 8,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+09:00) Osaka, Sapporo, Tokyo',
        'gmtAdjustment'     => 'GMT+09:00',
        'useDaylightTime'   => '0',
        'value'             => 9,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+09:00) Seoul',
        'gmtAdjustment'     => 'GMT+09:00',
        'useDaylightTime'   => '0',
        'value'             => 9,
        'user_id'           => 1
    ]);TimeZone::create([
        'name'              => '(GMT+09:00) Yakutsk',
        'gmtAdjustment'     => 'GMT+09:00',
        'useDaylightTime'   => '0',
        'value'             => 9,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT+09:30) Adelaide',
        'gmtAdjustment'     => 'GMT+09:30',
        'useDaylightTime'   => '0',
        'value'             => 9.5,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT+09:30) Darwin',
        'gmtAdjustment'     => 'GMT+09:30',
        'useDaylightTime'   => '0',
        'value'             => 9.5,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT+10:00) Brisbane',
        'gmtAdjustment'     => 'GMT+10:00',
        'useDaylightTime'   => '0',
        'value'             => 10,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT+10:00) Canberra, Melbourne, Sydney',
        'gmtAdjustment'     => 'GMT+10:00',
        'useDaylightTime'   => '0',
        'value'             => 10,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT+10:00) Hobart',
        'gmtAdjustment'     => 'GMT+10:00',
        'useDaylightTime'   => '0',
        'value'             => 10,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT+10:00) Guam, Port Moresby',
        'gmtAdjustment'     => 'GMT+10:00',
        'useDaylightTime'   => '0',
        'value'             => 10,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT+10:00) Vladivostok',
        'gmtAdjustment'     => 'GMT+10:00',
        'useDaylightTime'   => '0',
        'value'             => 10,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT+11:00) Magadan, Solomon Is., New Caledonia',
        'gmtAdjustment'     => 'GMT+12:00',
        'useDaylightTime'   => '0',
        'value'             => 11,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT+12:00) Auckland, Wellington',
        'gmtAdjustment'     => 'GMT+12:00',
        'useDaylightTime'   => '0',
        'value'             => 12,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT+12:00) Fiji, Kamchatka, Marshall Is.',
        'gmtAdjustment'     => 'GMT+12:00',
        'useDaylightTime'   => '0',
        'value'             => 12,
        'user_id'           => 1
    ]);
        TimeZone::create([
        'name'              => '(GMT+13:00) Nuku\'alofa',
        'gmtAdjustment'     => 'GMT+13:00',
        'useDaylightTime'   => '0',
        'value'             => 13,
        'user_id'           => 1
    ]);

    }
}
