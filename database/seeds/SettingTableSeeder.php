<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
        	[

        		'setting_key' => 'Title',
        		'setting_value' => 'FahriART | Jasa Pembuatan Kaligrafi Masjid'
        	],
        	[

        		'setting_key' => 'Description',
        		'setting_value' => 'Pusat pembuatan kaligrafi masjid'
        	],
        	[

        		'setting_key' => 'Whatsapp',
        		'setting_value' => ''
        	],
        	[

        		'setting_key' => 'Email',
        		'setting_value' => ''
        	],
        	[

        		'setting_key' => 'Telphone',
        		'setting_value' => ''
        	],
        	[

        		'setting_key' => 'Facebook',
        		'setting_value' => 'https://www.facebook.com/'
        	],
        	[

        		'setting_key' => 'Instagram',
        		'setting_value' => 'https://www.instagram.com/'
        	],
            [

                'setting_key' => 'Alamat',
                'setting_value' => 'Alamat'
            ]
        ];
        foreach ($settings as $setting) {
            DB::table('settings')->insert([
                'setting_key' => $setting['setting_key'],
                'setting_value' => $setting['setting_value']
            ]);    
        }
    }
}
