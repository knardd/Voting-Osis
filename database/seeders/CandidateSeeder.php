<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Candidate::insert([
            [
                'name' => 'Andi Pratama',
                'class' => 'X TJKT 1',
                'vision' => 'Menjadikan OSIS sebagai organisasi yang aktif, kreatif, dan menjadi wadah aspirasi siswa.',
                'mission' => 'Mengadakan kegiatan sekolah yang positif, menampung aspirasi siswa, serta meningkatkan kerja sama antar siswa dan guru.',
            ],
            [
                'name' => 'Bima Saputra',
                'class' => 'X DKV 2',
                'vision' => 'Mewujudkan lingkungan sekolah yang disiplin, nyaman, dan berprestasi.',
                'mission' => 'Menumbuhkan sikap disiplin, mendukung pengembangan bakat siswa, dan menciptakan suasana sekolah yang aman.',
            ],
            [
                'name' => 'Cahyo Nugroho',
                'class' => 'X PPLG 3',
                'vision' => 'Membangun OSIS yang peduli, bertanggung jawab, dan berjiwa kepemimpinan.',
                'mission' => 'Mengadakan kegiatan sosial, melatih kepemimpinan siswa, dan meningkatkan rasa kebersamaan.',
            ],
        ]);
    }
}
