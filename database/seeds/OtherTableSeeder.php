<?php

use Illuminate\Database\Seeder;

class OtherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $others = [
        	[

        		'detail' => 'Adapun biaya jasa pengerjaan kaligrafi mulai dari harga Rp. 300.000/meter lari (tinggi maksimal 60 cm). Jika tinggi lebih dari 60 cm maka harga kami hitung Rp.400.000/meter lari. Harga tergantung dari ukuran dan tingkat kerumitan motif / konsep desain yang diinginkan. Harga di atas hanya untuk estimasi / perkiraan saja, untuk kepastian harga bisa di tentukan jika sudah ada kepastian dan ukuran dari pihak masjid, ataupun harga bisa di tentukan pada saat survey ke lokasi anda. Harga ini sudah termasuk biaya pengerjaan, peralatan, transportasi, dll. Jika di perlukan survey terlebih dahulu, kami siap berangkat ke lokasi dengan biaya survey di bebankan kepada konsumen. (Biaya survey tergantung dimana lokasi masjid tersebut).',
        		'keterangan' => 'ket_harga'
        	],
        	[

        		'detail' => '‘Fahri Art’ adalah sebuah organisasi yang bergerak di jasa pembuatan kaligrafi masjid, ornamentasi mihrab, ornamentasi dinding masjid, ornamentasi kubah masjid, ornamentasi ruangan, penulisan mushaf Al-Qur’an, dan lain sebagainya pada bidang Islamic.',
        		'keterangan' => 'profile'
        	],
        	[

        		'detail' => 'Teknik pengerjaan ‘Fahri Art’ secara manual oleh tangan-tangan kami yang kreatif dan professional akan memanjakan mata anda untuk melihat keindahan tulisan para dekor islam. Team kami terdiri dari seniman muslim yang sudah mengeluarkan banyak karyanya pada sebagian masjid di Indonesia.',
        		'keterangan' => 'pengerjaan'
        	],
        	[

        		'detail' => '‘Fahri Art’ menyuguhkan beberapa jenis tulisan yang sesuai dengan kemauan anda yaitu, kombinasi khat tsulus, naskhi, riq’i, kufi, farisi dan diwani. Dengan teknik pengecetan yang profesional sehingga mampu menjaga kehalusan karya dan kualitas ketahanan.',
        		'keterangan' => 'kualitas'
        	],
        	[

        		'detail' => 'Harga terjangkau tergantung dari ukuran dan tingkat kerumitan motif atau konsep desain yang diinginkan.',
        		'keterangan' => 'harga'
        	]
        ];
        foreach ($others as $other) {
            DB::table('others')->insert([
                'detail' => $other['detail'],
                'keterangan' => $other['keterangan']
            ]);    
        }
    }
}
