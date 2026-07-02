<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pelajar;
use App\Models\Mitra;
use App\Models\Mentor;
use App\Models\Program;
use App\Models\Enrollment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserProgramDashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create Mitra User & Profile
        $mitraUserId = (string) Str::uuid();
        $mitraId = (string) Str::uuid();
        $domain = 'telkom.co.id';

        User::create([
            'id' => $mitraUserId,
            'nama_lengkap' => 'HR Telkom Indonesia',
            'email' => 'hr@' . $domain,
            'password' => Hash::make('password123'),
            'role' => 'mitra',
            'foto_profil' => null,
        ]);

        Mitra::create([
            'id' => $mitraId,
            'user_id' => $mitraUserId,
            'nama_usaha' => 'PT Telkom Indonesia',
            'bidang_usaha' => 'Telekomunikasi & Teknologi',
            'kota' => 'Bandung',
            'kontak_bisnis' => '081122334455',
            'email_domain' => $domain,
            'logo_perusahaan' => null,
            'website' => 'https://www.telkom.co.id',
        ]);

        // 2. Create Mentor User & Profile (same domain as Mitra)
        $mentorUserId = (string) Str::uuid();
        $mentorId = (string) Str::uuid();

        User::create([
            'id' => $mentorUserId,
            'nama_lengkap' => 'Budi Mentor Telkom',
            'email' => 'budi.mentor@' . $domain,
            'password' => Hash::make('password123'),
            'role' => 'mentor',
            'foto_profil' => null,
        ]);

        Mentor::create([
            'id' => $mentorId,
            'user_id' => $mentorUserId,
            'mitra_id' => $mitraId,
            'profesi' => 'Senior Cloud Architect',
            'perusahaan' => 'PT Telkom Indonesia',
            'tahun_pengalaman' => 8,
            'bio_keahlian' => 'Expert in AWS, GCP, DevOps, Kubernetes, and Laravel Systems.',
        ]);

        // 3. Create several Pelajar Users & Profiles
        $pelajarData = [
            ['nama' => 'Rian Pelajar', 'email' => 'rian@student.com', 'univ' => 'Universitas Indonesia', 'jurusan' => 'Ilmu Komputer', 'angkatan' => 2022],
            ['nama' => 'Sinta Pelajar', 'email' => 'sinta@student.com', 'univ' => 'Institut Teknologi Bandung', 'jurusan' => 'Teknik Elektro', 'angkatan' => 2021],
            ['nama' => 'Adit Pelajar', 'email' => 'adit@student.com', 'univ' => 'Universitas Gadjah Mada', 'jurusan' => 'Teknik Elektro', 'angkatan' => 2023],
            ['nama' => 'Dewi Pelajar', 'email' => 'dewi@student.com', 'univ' => 'Universitas Diponegoro', 'jurusan' => 'Sistem Informasi', 'angkatan' => 2022],
            ['nama' => 'Fajar Pelajar', 'email' => 'fajar@student.com', 'univ' => 'Universitas Brawijaya', 'jurusan' => 'Teknik Informatika', 'angkatan' => 2022],
            ['nama' => 'Lina Pelajar', 'email' => 'lina@student.com', 'univ' => 'Universitas Airlangga', 'jurusan' => 'Statistika', 'angkatan' => 2023],
        ];

        $pelajarUserIds = [];

        foreach ($pelajarData as $data) {
            $pUserId = (string) Str::uuid();
            $pId = (string) Str::uuid();

            User::create([
                'id' => $pUserId,
                'nama_lengkap' => $data['nama'],
                'email' => 'email', // Using UUID prefix to ensure uniqueness if run multiple times
                'password' => Hash::make('password123'),
                'role' => 'pelajar',
                'foto_profil' => null,
            ]);

            Pelajar::create([
                'id' => $pId,
                'user_id' => $pUserId,
                'universitas' => $data['univ'],
                'jurusan' => $data['jurusan'],
                'angkatan' => $data['angkatan'],
                'bio' => 'Saya tertarik mempelajari cloud computing and backend engineering.',
                'total_poin' => rand(10, 150),
            ]);

            $pelajarUserIds[] = $pUserId;
        }

        // 4. Create Programs for 2024, 2025, and 2026
        // Program in 2024
        $program2024 = Program::create([
            'id' => (string) Str::uuid(),
            'mitra_id' => $mitraId,
            'judul' => 'Telkom Cloud Infrastructure 2024',
            'deskripsi' => 'Program pembelajaran cloud computing dan infrastruktur jaringan Telkom tahun 2024.',
            'bidang' => 'Teknologi',
            'status' => 'published',
            'kuota' => 20,
            'tanggal_mulai' => '2024-08-01',
            'tanggal_selesai' => '2024-11-30',
            'registrasi_mulai' => '2024-07-01',
            'registrasi_selesai' => '2024-07-25',
        ]);

        // Program in 2025
        $program2025 = Program::create([
            'id' => (string) Str::uuid(),
            'mitra_id' => $mitraId,
            'judul' => 'Telkom DevOps & Microservices 2025',
            'deskripsi' => 'Program intensif implementasi Microservices dan CI/CD pipeline tahun 2025.',
            'bidang' => 'Teknologi',
            'status' => 'published',
            'kuota' => 25,
            'tanggal_mulai' => '2025-05-01',
            'tanggal_selesai' => '2025-08-31',
            'registrasi_mulai' => '2025-04-01',
            'registrasi_selesai' => '2025-04-25',
        ]);

        // Program in 2026
        $program2026 = Program::create([
            'id' => (string) Str::uuid(),
            'mitra_id' => $mitraId,
            'judul' => 'Telkom Next-Gen Cloud Platform 2026',
            'deskripsi' => 'Program riset dan implementasi platform cloud next-gen Telkom tahun 2026.',
            'bidang' => 'Teknologi',
            'status' => 'published',
            'kuota' => 30,
            'tanggal_mulai' => '2026-03-01',
            'tanggal_selesai' => '2026-06-30',
            'registrasi_mulai' => '2026-02-01',
            'registrasi_selesai' => '2026-02-25',
        ]);

        // Assign Mentor to programs
        $program2024->mentors()->attach($mentorId, [
            'id' => (string) Str::uuid(),
            'status' => 'disetujui',
            'applied_at' => '2024-07-26 10:00:00',
            'reviewed_at' => '2024-07-26 11:00:00'
        ]);
        $program2025->mentors()->attach($mentorId, [
            'id' => (string) Str::uuid(),
            'status' => 'disetujui',
            'applied_at' => '2025-04-26 10:00:00',
            'reviewed_at' => '2025-04-26 11:00:00'
        ]);
        $program2026->mentors()->attach($mentorId, [
            'id' => (string) Str::uuid(),
            'status' => 'disetujui',
            'applied_at' => '2026-02-26 10:00:00',
            'reviewed_at' => '2026-02-26 11:00:00'
        ]);

        // 5. Create Enrollments at different months in 2024, 2025, and 2026
        // This will populate the monthly trend chart spanning up to 2 years.
        // We use pelajarUserIds and map them to enrollments with different 'enrolled_at' dates.

        // September 2024 enrollments (Program 2024)
        $this->enrollPelajar($pelajarUserIds[0], $program2024->id, '2024-08-05 10:00:00');
        $this->enrollPelajar($pelajarUserIds[1], $program2024->id, '2024-08-12 11:30:00');

        // January 2025 enrollments
        $this->enrollPelajar($pelajarUserIds[2], $program2024->id, '2025-01-15 09:00:00');

        // May 2025 enrollments (Program 2025)
        $this->enrollPelajar($pelajarUserIds[0], $program2025->id, '2025-05-02 14:00:00');
        $this->enrollPelajar($pelajarUserIds[3], $program2025->id, '2025-05-10 15:20:00');
        $this->enrollPelajar($pelajarUserIds[4], $program2025->id, '2025-05-15 08:45:00');

        // October 2025 enrollments
        $this->enrollPelajar($pelajarUserIds[1], $program2025->id, '2025-10-22 13:10:00');

        // March 2026 enrollments (Program 2026)
        $this->enrollPelajar($pelajarUserIds[2], $program2026->id, '2026-03-03 09:15:00');
        $this->enrollPelajar($pelajarUserIds[3], $program2026->id, '2026-03-12 10:40:00');
        $this->enrollPelajar($pelajarUserIds[4], $program2026->id, '2026-03-18 16:00:00');

        // June 2026 enrollments (Program 2026)
        $this->enrollPelajar($pelajarUserIds[5], $program2026->id, '2026-06-10 11:00:00');
        $this->enrollPelajar($pelajarUserIds[0], $program2026->id, '2026-06-20 14:30:00');
    }

    /**
     * Helper to create enrollment.
     */
    private function enrollPelajar(string $pelajarUserId, string $programId, string $enrolledAt): void
    {
        Enrollment::create([
            'id' => (string) Str::uuid(),
            'pelajar_id' => $pelajarUserId,
            'program_id' => $programId,
            'status' => 'aktif',
            'enrolled_at' => $enrolledAt,
        ]);
    }
}
