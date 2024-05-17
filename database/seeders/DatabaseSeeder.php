<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Account;
use App\Models\Option;
use App\Models\Soal;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Account::create([
            'nama_tim' => 'admin',
            'email' => 'admin',
            'password' => bcrypt('admin1223'),
            'role' => 'admin',
            'asal_sekolah' => "admin",
            'provinsi' => 'admin',
            'kabupaten' => 'admin',
            'bukti_bayar' => 'admin',
            'status_bayar' => 'verified'
        ]);

        for ($i = 2; $i <= 73; $i++) {
            Account::create([
                'nama_tim' => 'isactesting' . $i,
                'email' => 'isactesting' . $i . '@gmail.com',
                'password' => bcrypt('isactesting123'),
                'role' => 'olymp',
                'asal_sekolah' => "sdn uner",
                'provinsi' => 'fst',
                'kabupaten' => 'sistem informasi',
                'bukti_bayar' => 'done min',
                'status_bayar' => 'verified'
            ]);

            Student::create([
                'nama' => 'Airlamgga' . $i,
                'tgl_lahir' => '2004-07-14',
                'status' => 'ketua',
                'telp' => '0123',
                'bukti_siswa' => 'yea',
                'foto_profil' => rand(0, 1) == 0 ? 'https://isac.himsiunair.com/storage/images/foto-profil/6a8f2407-4048-4ab1-a501-bdbf9588994c.jpg' : 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Wendy_YoungStreet_220601.jpg/220px-Wendy_YoungStreet_220601.jpg',
                'account_id' => $i,
                'sertifikat' => 'belum'
            ]);
        }

        Account::create([
            'nama_tim' => 'jontors',
            'email' => 'jontors',
            'password' => bcrypt('jontors123'),
            'role' => 'uiux',
            'asal_sekolah' => "sdn jontors",
            'provinsi' => 'california',
            'kabupaten' => 'las vegas',
            'bukti_bayar' => 'done min',
            'status_bayar' => 'verified'
        ]);

        Student::create([
            'nama' => 'Jon Tor',
            'tgl_lahir' => '2004-07-14',
            'telp' => '0123',
            'status' => 'anggota',
            'bukti_siswa' => 'yea',
            'foto_profil' => 'yea',
            'account_id' => '74',
            'sertifikat' => 'belum'
        ]);

        Student::create([
            'nama' => 'Jean Tearr',
            'tgl_lahir' => '2004-07-14',
            'status' => 'ketua',
            'telp' => '0123',
            'bukti_siswa' => 'yea',
            'foto_profil' => 'yea',
            'account_id' => '74',
            'sertifikat' => 'belum'
        ]);


        for ($i = 1; $i <= 40; $i++) {
            Soal::create([
                'soal' => 'ini soal penyisihan ke ' . $i,
                'babak' => 'penyisihan',
                'nilai' => rand(2, 4),
                'jawaban' => rand(1, 5),
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            Soal::create([
                'soal' => 'ini soal pg semifinal ke ' . $i,
                'babak' => 'semifinal',
                'nilai' => $i,
                'jawaban' => rand(1, 5),
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Soal::create([
                'soal' => 'ini soal essay semifinal ke ' . $i,
                'babak' => 'semifinal',
            ]);
        }

        for ($i = 1; $i <= 40; $i++) {
            for ($j = 1; $j <= 5; $j++) {
                Option::create([
                    'isi_option' => 'ini option ke ' . $j . ' pada soal ' . $i,
                    'soal_id' => $i,
                    'benar' => $j == 1 ? true : false,
                ]);
            }
        }
    }
}
