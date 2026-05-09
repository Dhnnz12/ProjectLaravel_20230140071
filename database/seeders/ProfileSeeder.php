<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('profiles')->updateOrInsert(
            ['nim' => '20230140071'],
            [
                'nama'  => 'Hibrizi Fathin Dhonan',
                'prodi' => 'Teknologi Informasi',
                'email' => 'hibrizi.fathin@example.com',
                'telepon' => '081234567890',
                'alamat' => 'Yogyakarta, Indonesia',
                'bio' => 'Saya adalah seorang mahasiswa program studi Teknologi Informasi yang berdedikasi tinggi dalam mengeksplorasi dunia digital. Dengan fokus pada pengembangan web modern dan manajemen data, saya terus mengasah kemampuan teknis saya untuk menciptakan solusi yang efisien dan inovatif. Saya memiliki ketertarikan mendalam pada arsitektur perangkat lunak, keamanan siber, dan bagaimana teknologi dapat mentransformasi cara manusia berinteraksi dengan informasi. Selalu siap untuk belajar hal baru dan menghadapi tantangan kompleks dalam dunia IT.',
                'hobi'  => 'Bermain Game, Coding, Membaca Buku Teknologi, dan Eksplorasi Framework Baru',
                'github_url' => 'https://github.com/Dhnnz12',
                'instagram_url' => 'https://instagram.com/hibrizifathin',
                'linkedin_url' => 'https://linkedin.com/in/hibrizifathin',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
