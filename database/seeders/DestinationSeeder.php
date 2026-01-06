<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destinations = [
            [
                'name' => 'Kawah Putih',
                'description' => 'Danau kawah vulkanik dengan air berwarna putih kehijauan yang menakjubkan',
                'category' => 'lake',
                'address' => 'Ciwidey, Kabupaten Bandung, Jawa Barat',
                'address_url' => 'https://maps.google.com/?q=-7.1661,107.4023',
                'latitude' => -7.1661,
                'longitude' => 107.4023,
                'price' => 50000,
                'capacity_perday' => 500,
                'main_image' => 'kawah_putih.png',
                'image_1' => 'kawah_putih_1.png',
                'image_2' => 'kawah_putih_2.png',
                'image_3' => 'kawah_putih_3.png',
                'content' => '<p>Kawah Putih adalah sebuah danau kawah dari Gunung Patuha yang terletak di kawasan Ciwidey, Kabupaten Bandung, Jawa Barat. Keindahan kawah ini terletak pada warna airnya yang putih kehijauan dengan pemandangan alam yang memukau. Suhu udara di kawasan ini berkisar 8-22°C.</p>',
            ],
            [
                'name' => 'Tangkuban Perahu',
                'description' => 'Gunung berapi aktif dengan kawah yang dapat dikunjungi wisatawan',
                'category' => 'mountain',
                'address' => 'Lembang, Kabupaten Bandung Barat, Jawa Barat',
                'address_url' => 'https://maps.google.com/?q=-6.7600,107.6100',
                'latitude' => -6.7600,
                'longitude' => 107.6100,
                'price' => 30000,
                'capacity_perday' => 1000,
                'main_image' => 'tangkuban_perahu.png',
                'image_1' => 'tangkuban_perahu_1.png',
                'image_2' => 'tangkuban_perahu_2.png',
                'content' => '<p>Tangkuban Perahu adalah salah satu gunung yang terletak di Provinsi Jawa Barat, Indonesia. Gunung ini memiliki kawah yang sangat terkenal dan menjadi objek wisata utama di Bandung. Kawah Ratu adalah kawah utama yang dapat dikunjungi dengan mudah.</p>',
            ],
            [
                'name' => 'Pantai Pangandaran',
                'description' => 'Pantai indah dengan pasir putih dan ombak yang cocok untuk berselancar',
                'category' => 'beach',
                'address' => 'Pangandaran, Kabupaten Pangandaran, Jawa Barat',
                'address_url' => 'https://maps.google.com/?q=-7.6844,108.6496',
                'latitude' => -7.6844,
                'longitude' => 108.6496,
                'price' => 15000,
                'capacity_perday' => 2000,
                'main_image' => 'pangandaran.png',
                'image_1' => 'pangandaran_1.png',
                'image_2' => 'pangandaran_2.png',
                'image_3' => 'pangandaran_3.png',
                'content' => '<p>Pantai Pangandaran adalah salah satu pantai terindah di Jawa Barat yang terletak di Kabupaten Pangandaran. Pantai ini menawarkan pemandangan sunrise dan sunset yang menawan, serta berbagai aktivitas air seperti berenang, snorkeling, dan berselancar.</p>',
            ],
            [
                'name' => 'Curug Cimahi',
                'description' => 'Air terjun spektakuler dengan ketinggian 87 meter',
                'category' => 'waterfall',
                'address' => 'Cisarua, Kabupaten Bandung Barat, Jawa Barat',
                'address_url' => 'https://maps.google.com/?q=-6.7832,107.5401',
                'latitude' => -6.7832,
                'longitude' => 107.5401,
                'price' => 20000,
                'capacity_perday' => 300,
                'main_image' => 'curug_cimahi.png',
                'image_1' => 'curug_cimahi_1.png',
                'image_2' => 'curug_cimahi_2.png',
                'content' => '<p>Curug Cimahi atau yang juga dikenal sebagai Curug Pelangi adalah air terjun setinggi 87 meter yang terletak di kawasan Cisarua. Air terjun ini sering menghasilkan pelangi alami pada pagi hari ketika sinar matahari menyinari percikan airnya.</p>',
            ],
            [
                'name' => 'Situ Patenggang',
                'description' => 'Danau indah dikelilingi perkebunan teh dengan legenda romantis',
                'category' => 'lake',
                'address' => 'Ciwidey, Kabupaten Bandung, Jawa Barat',
                'address_url' => 'https://maps.google.com/?q=-7.1593,107.3767',
                'latitude' => -7.1593,
                'longitude' => 107.3767,
                'price' => 25000,
                'capacity_perday' => 800,
                'main_image' => 'situ_patenggang.png',
                'image_1' => 'situ_patenggang_1.png',
                'image_2' => 'situ_patenggang_2.png',
                'image_4' => 'situ_patenggang_4.png',
                'content' => '<p>Situ Patenggang adalah sebuah danau yang terletak di kawasan Ciwidey, Bandung Selatan. Danau ini dikelilingi oleh perkebunan teh yang hijau dan memiliki legenda romantis tentang Ki Santang dan Dewi Rengganis.</p>',
            ],
            [
                'name' => 'Taman Safari Indonesia Cisarua',
                'description' => 'Kebun binatang safari dengan ratusan spesies hewan dari berbagai negara',
                'category' => 'zoo',
                'address' => 'Cisarua, Kabupaten Bogor, Jawa Barat',
                'address_url' => 'https://maps.google.com/?q=-6.7158,106.9501',
                'latitude' => -6.7158,
                'longitude' => 106.9501,
                'price' => 150000,
                'capacity_perday' => 3000,
                'main_image' => 'taman_safari.png',
                'image_1' => 'taman_safari_1.png',
                'image_2' => 'taman_safari_2.png',
                'image_3' => 'taman_safari_3.png',
                'image_4' => 'taman_safari_4.png',
                'content' => '<p>Taman Safari Indonesia Cisarua adalah kebun binatang konservasi yang menawarkan pengalaman safari drive-thru. Pengunjung dapat melihat berbagai satwa dari dekat sambil berkendara melalui habitat alami mereka.</p>',
            ],
            [
                'name' => 'Green Canyon',
                'description' => 'Ngarai hijau dengan sungai jernih dan tebing batu kapur yang megah',
                'category' => 'river',
                'address' => 'Cijulang, Kabupaten Pangandaran, Jawa Barat',
                'address_url' => 'https://maps.google.com/?q=-7.7159,108.4813',
                'latitude' => -7.7159,
                'longitude' => 108.4813,
                'price' => 100000,
                'capacity_perday' => 400,
                'main_image' => 'green_canyon.png',
                'image_1' => 'green_canyon_1.png',
                'image_2' => 'green_canyon_2.png',
                'content' => '<p>Green Canyon atau Cukang Taneuh adalah sebuah ngarai dengan sungai berwarna hijau tosca yang terletak di Pangandaran. Wisatawan dapat menikmati keindahan alam dengan menyusuri sungai menggunakan perahu atau body rafting.</p>',
            ],
            [
                'name' => 'Gedung Sate',
                'description' => 'Bangunan bersejarah ikonik Bandung dengan arsitektur Indo-Eropa',
                'category' => 'museum',
                'address' => 'Jl. Diponegoro No.22, Citarum, Kec. Bandung Wetan, Kota Bandung',
                'address_url' => 'https://maps.google.com/?q=-6.9024,107.6186',
                'latitude' => -6.9024,
                'longitude' => 107.6186,
                'price' => 0,
                'capacity_perday' => 1500,
                'main_image' => 'gedung_sate.png',
                'image_1' => 'gedung_sate_1.png',
                'image_2' => 'gedung_sate_2.png',
                'content' => '<p>Gedung Sate adalah gedung bersejarah yang menjadi ikon Kota Bandung. Diresmikan pada tahun 1920, gedung ini memiliki arsitektur perpaduan Indo-Eropa yang unik dengan ornamen tusuk sate pada puncak menara tengahnya.</p>',
            ],
        ];

        foreach ($destinations as $destination) {
            Destination::create($destination);
        }
    }
}
