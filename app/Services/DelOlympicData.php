<?php

namespace App\Services;

class DelOlympicData
{
    public static function getStats()
    {
        return [
            'total_lomba' => 12,
            'lomba_aktif' => 8,
            'total_penyelenggara' => 15,
            'penyelenggara_terverifikasi' => 12,
            'penyelenggara_pending' => 3,
            'total_peserta' => 348,
            'pendaftaran_menunggu' => 14,
            'pendaftaran_diterima' => 285,
            'pengajuan_lomba_pending' => 4,
            'jadwal_mendatang' => 6,
        ];
    }

    public static function getCategories()
    {
        return [
            ['id' => 'tech', 'name' => 'Teknologi & Coding', 'icon' => 'fa-code', 'count' => 4, 'color' => 'blue'],
            ['id' => 'design', 'name' => 'Desain UI/UX', 'icon' => 'fa-palette', 'count' => 3, 'color' => 'indigo'],
            ['id' => 'cyber', 'name' => 'Keamanan Siber (CTF)', 'icon' => 'fa-shield-halved', 'count' => 2, 'color' => 'emerald'],
            ['id' => 'esport', 'name' => 'E-Sport & Gaming', 'icon' => 'fa-gamepad', 'count' => 3, 'color' => 'purple'],
            ['id' => 'robotik', 'name' => 'Robotika & IoT', 'icon' => 'fa-robot', 'count' => 2, 'color' => 'amber'],
            ['id' => 'bisnis', 'name' => 'Business Case', 'icon' => 'fa-chart-pie', 'count' => 2, 'color' => 'rose'],
        ];
    }

    public static function getCompetitions()
    {
        return [
            [
                'id' => 1,
                'slug' => 'del-programming-contest-2026',
                'title' => 'Del Competitive Programming Contest 2026',
                'category' => 'Teknologi & Coding',
                'category_id' => 'tech',
                'organizer' => 'HIMATIF Institut Teknologi Del',
                'organizer_id' => 1,
                'organizer_avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&h=120&q=80',
                'poster' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=800&q=80',
                'status_pendaftaran' => 'Dibuka',
                'reg_start' => '01 Nov 2026',
                'reg_end' => '25 Nov 2026',
                'event_date' => '05 - 07 Des 2026',
                'location' => 'Auditorium & Lab Komputer Gedung 5 IT Del / Hybrid',
                'featured' => true,
                'prize_pool' => 'Rp 15.000.000',
                'participants_count' => 78,
                'max_quota' => 100,
                'description' => 'Ajang kompetisi algoritma dan pemrograman tahunan bergengsi tingkat nasional yang diselenggarakan oleh Himpunan Mahasiswa Informatika IT Del. Tantang kemampuan problem solving dan penguasaan struktur data Anda!',
                'rules' => [
                    'Peserta merupakan mahasiswa/i aktif S1/D4/D3 seluruh Indonesia atau siswa SMA/SMK.',
                    'Satu tim beranggotakan maksimal 3 orang.',
                    'Bahasa pemrograman yang didukung: C++, Java, Python 3.',
                    'Sistem penilaian mengacu pada standar ICPC (International Collegiate Programming Contest).',
                ],
                'contact' => 'himatif@del.ac.id | WhatsApp: +62 821-6543-9870 (Rian)',
                'branches' => [
                    ['id' => 101, 'name' => 'Divisi Mahasiswa (Senior)', 'quota' => 60, 'registered' => 48, 'type' => 'Gugur / ICPC Rule', 'fee' => 'Gratis'],
                    ['id' => 102, 'name' => 'Divisi Pelajar SMA/SMK (Junior)', 'quota' => 40, 'registered' => 30, 'type' => 'Gugur / ICPC Rule', 'fee' => 'Gratis'],
                ]
            ],
            [
                'id' => 2,
                'slug' => 'del-ux-design-challenge-2026',
                'title' => 'Del National UI/UX Design Challenge',
                'category' => 'Desain UI/UX',
                'category_id' => 'design',
                'organizer' => 'GDSC IT Del & HMPSTI',
                'organizer_id' => 2,
                'organizer_avatar' => 'https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=crop&w=120&h=120&q=80',
                'poster' => 'https://images.unsplash.com/photo-1581291518857-4e27b48ff24e?auto=format&fit=crop&w=800&q=80',
                'status_pendaftaran' => 'Dibuka',
                'reg_start' => '05 Nov 2026',
                'reg_end' => '28 Nov 2026',
                'event_date' => '10 - 12 Des 2026',
                'location' => 'Online Presentation & Hall Gd. 7 IT Del',
                'featured' => true,
                'prize_pool' => 'Rp 10.000.000',
                'participants_count' => 45,
                'max_quota' => 60,
                'description' => 'Kompetisi perancangan pengalaman pengguna (UX) dan antarmuka (UI) untuk memecahkan masalah riil di bidang pariwisata Danau Toba dan smart campus.',
                'rules' => [
                    'Peserta individu atau tim maksimal 2 orang.',
                    'Karya orisinal menggunakan Figma.',
                    'Melampirkan studi kasus (Design Thinking / Double Diamond).',
                ],
                'contact' => 'gdsc@del.ac.id | +62 813-9876-1234',
                'branches' => [
                    ['id' => 201, 'name' => 'Mobile App UI/UX Track', 'quota' => 30, 'registered' => 25, 'type' => 'Penjurian & Presentasi', 'fee' => 'Gratis'],
                    ['id' => 202, 'name' => 'Web App Experience Track', 'quota' => 30, 'registered' => 20, 'type' => 'Penjurian & Presentasi', 'fee' => 'Gratis'],
                ]
            ],
            [
                'id' => 3,
                'slug' => 'del-capture-the-flag-2026',
                'title' => 'Toba Cyber Strike: CTF Competition 2026',
                'category' => 'Keamanan Siber (CTF)',
                'category_id' => 'cyber',
                'organizer' => 'Del Cyber Security Student Club',
                'organizer_id' => 3,
                'organizer_avatar' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=120&h=120&q=80',
                'poster' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=800&q=80',
                'status_pendaftaran' => 'Segera Dibuka',
                'reg_start' => '20 Nov 2026',
                'reg_end' => '10 Des 2026',
                'event_date' => '18 - 19 Des 2026',
                'location' => 'Server Khusus Del CTF (Online)',
                'featured' => true,
                'prize_pool' => 'Rp 12.000.000',
                'participants_count' => 32,
                'max_quota' => 50,
                'description' => 'Kompetisi hacking etis berformat Jeopardy: Web Exploitation, Reverse Engineering, Binary Exploitation, Cryptography, dan Digital Forensics.',
                'rules' => [
                    'Dilarang melakukan DoS/DDoS pada infrastruktur lomba.',
                    'Tim terdiri dari 1-3 orang.',
                    'Format skor dinamis berdasarkan jumlah solver per challenge.',
                ],
                'contact' => 'ctf@del.ac.id | Telegram: @delcybersec',
                'branches' => [
                    ['id' => 301, 'name' => 'Jeopardy Style Cybersecurity', 'quota' => 50, 'registered' => 32, 'type' => 'Poin & Klasemen', 'fee' => 'Gratis'],
                ]
            ],
            [
                'id' => 4,
                'slug' => 'del-olympic-esport-valorant',
                'title' => 'Del Olympic Esports: Valorant Collegiate Championship',
                'category' => 'E-Sport & Gaming',
                'category_id' => 'esport',
                'organizer' => 'Del Esports Association & BEM IT Del',
                'organizer_id' => 4,
                'organizer_avatar' => 'https://images.unsplash.com/photo-1527980965255-d3b416303d12?auto=format&fit=crop&w=120&h=120&q=80',
                'poster' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=800&q=80',
                'status_pendaftaran' => 'Dibuka',
                'reg_start' => '02 Nov 2026',
                'reg_end' => '26 Nov 2026',
                'event_date' => '01 - 04 Des 2026',
                'location' => 'Student Lounge & Live Arena IT Del',
                'featured' => false,
                'prize_pool' => 'Rp 8.000.000',
                'participants_count' => 16,
                'max_quota' => 16,
                'description' => 'Turnamen tactical FPS resmi antarmahasiswa se-Sumatera Utara dengan sistem gugur ganda (Double Elimination) dan siaran langsung streaming.',
                'rules' => [
                    'Satu roster terdiri dari 5 pemain inti + 1 cadangan.',
                    'Map pool resmi VCT 2026.',
                    'Dilarang penggunaan script atau cheat pihak ketiga.',
                ],
                'contact' => 'esport@del.ac.id | Discord: DelEsports',
                'branches' => [
                    ['id' => 401, 'name' => 'Valorant 5v5 Tactical', 'quota' => 16, 'registered' => 16, 'type' => 'Bracket Sistem Gugur', 'fee' => 'Rp 50.000/tim'],
                ]
            ],
            [
                'id' => 5,
                'slug' => 'del-line-follower-robotics',
                'title' => 'Sumatera Fast Track Line Follower Robotics 2026',
                'category' => 'Robotika & IoT',
                'category_id' => 'robotik',
                'organizer' => 'Himpunan Mahasiswa Teknik Elektro (HME)',
                'organizer_id' => 5,
                'organizer_avatar' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=120&h=120&q=80',
                'poster' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&w=800&q=80',
                'status_pendaftaran' => 'Dibuka',
                'reg_start' => '10 Nov 2026',
                'reg_end' => '30 Nov 2026',
                'event_date' => '15 Des 2026',
                'location' => 'Open Hall Lapangan Hijau Kampus Del',
                'featured' => false,
                'prize_pool' => 'Rp 7.500.000',
                'participants_count' => 22,
                'max_quota' => 32,
                'description' => 'Adu kecepatan dan ketelitian robot analog & mikrocontroller di atas lintasan berliku dengan rintangan canggih.',
                'rules' => [
                    'Dimensi robot maksimal 20cm x 20cm x 20cm.',
                    'Robot mandiri tanpa kendali jarak jauh selama balapan.',
                ],
                'contact' => 'hme@del.ac.id | 0812-3456-7890',
                'branches' => [
                    ['id' => 501, 'name' => 'Mikrokontroler Otomatis', 'quota' => 20, 'registered' => 14, 'type' => 'Time Attack & Bracket', 'fee' => 'Gratis'],
                    ['id' => 502, 'name' => 'Analog Line Follower', 'quota' => 12, 'registered' => 8, 'type' => 'Time Attack', 'fee' => 'Gratis'],
                ]
            ],
        ];
    }

    public static function getOrganizers()
    {
        return [
            [
                'id' => 1,
                'name' => 'HIMATIF Institut Teknologi Del',
                'type' => 'Himpunan Mahasiswa Program Studi',
                'email' => 'himatif@del.ac.id',
                'pic' => 'Samuel Lumbantobing',
                'phone' => '+62 821-6543-9870',
                'status' => 'Terverifikasi',
                'registered_at' => '12 Okt 2026',
                'competitions_count' => 3,
                'document' => 'SK_Kepengurusan_HIMATIF_2026.pdf',
                'verified_by' => 'Admin Utama',
            ],
            [
                'id' => 2,
                'name' => 'GDSC Institut Teknologi Del',
                'type' => 'Komunitas Kampus Google',
                'email' => 'gdsc@del.ac.id',
                'pic' => 'Grace Simanjuntak',
                'phone' => '+62 813-9876-1234',
                'status' => 'Terverifikasi',
                'registered_at' => '18 Okt 2026',
                'competitions_count' => 2,
                'document' => 'Google_Developer_Club_Charter_2026.pdf',
                'verified_by' => 'Admin Utama',
            ],
            [
                'id' => 3,
                'name' => 'Del Cyber Security Club',
                'type' => 'Unit Kegiatan Mahasiswa',
                'email' => 'ctf@del.ac.id',
                'pic' => 'Kevin Silalahi',
                'phone' => '+62 852-1122-3344',
                'status' => 'Menunggu Verifikasi',
                'registered_at' => '14 Nov 2026',
                'competitions_count' => 1,
                'document' => 'Surat_Rekomendasi_Dosen_Pembina.pdf',
                'verified_by' => '-',
            ],
            [
                'id' => 4,
                'name' => 'Komunitas Robotika Toba Tech',
                'type' => 'Organisasi Eksternal Kampus',
                'email' => 'contact@tobatech.org',
                'pic' => 'David Hutapea',
                'phone' => '+62 878-9012-3456',
                'status' => 'Menunggu Verifikasi',
                'registered_at' => '15 Nov 2026',
                'competitions_count' => 0,
                'document' => 'Akta_Pendirian_Komunitas_Robotika.pdf',
                'verified_by' => '-',
            ],
            [
                'id' => 5,
                'name' => 'Indie Gamer Guild Sumatera',
                'type' => 'Komunitas Non-Akademik',
                'email' => 'guild@indiegames.id',
                'pic' => 'Riko Siregar',
                'phone' => '+62 896-1234-5678',
                'status' => 'Ditolak',
                'registered_at' => '05 Nov 2026',
                'competitions_count' => 0,
                'document' => 'Proposal_Kegiatan_Gaming.pdf',
                'verified_by' => 'Admin Utama',
                'rejection_reason' => 'Dokumen legalitas organisasi belum lengkap dan tidak memiliki surat rekomendasi dari institusi terkait.',
            ],
        ];
    }

    public static function getSubmissions()
    {
        return [
            [
                'id' => 101,
                'title' => 'Del AI Hackathon: Solution for Lake Toba Tourism',
                'organizer' => 'GDSC IT Del',
                'category' => 'Teknologi & Coding',
                'submitted_at' => '15 Nov 2026 09:30',
                'event_date' => '20 - 22 Des 2026',
                'status' => 'Pending',
                'description' => 'Hackathon 48 jam bertema pemanfaatan Generative AI untuk akselerasi pariwisata Danau Toba dan UMKM lokal.',
                'quota' => 120,
                'rejection_reason' => null,
            ],
            [
                'id' => 102,
                'title' => 'Lomba Debat Bahasa Inggris & Teknologi (Del Debate 2026)',
                'organizer' => 'Del English Club',
                'category' => 'Akademik & Soft Skill',
                'submitted_at' => '14 Nov 2026 14:15',
                'event_date' => '12 Des 2026',
                'status' => 'Pending',
                'description' => 'Kompetisi debat parlemen gaya British Parliamentary seputar etika kecerdasan buatan dan masa depan sains.',
                'quota' => 48,
                'rejection_reason' => null,
            ],
            [
                'id' => 103,
                'title' => 'Del Competitive Programming Contest 2026',
                'organizer' => 'HIMATIF Institut Teknologi Del',
                'category' => 'Teknologi & Coding',
                'submitted_at' => '28 Okt 2026 11:00',
                'event_date' => '05 - 07 Des 2026',
                'status' => 'Disetujui',
                'description' => 'Kompetisi pemrograman algoritma tahunan dengan standar ICPC.',
                'quota' => 100,
                'rejection_reason' => null,
            ],
            [
                'id' => 104,
                'title' => 'Toba Mobile Legends Championship Season 4',
                'organizer' => 'Indie Gamer Guild Sumatera',
                'category' => 'E-Sport & Gaming',
                'submitted_at' => '06 Nov 2026 16:45',
                'event_date' => '28 Nov 2026',
                'status' => 'Ditolak',
                'description' => 'Turnamen MLBB antarklub non-resmi.',
                'quota' => 64,
                'rejection_reason' => 'Pengajuan ditolak karena akun penyelenggara belum lolos verifikasi legalitas dan belum ada kejelasan izin lokasi dari pihak kampus.',
            ],
        ];
    }

    public static function getRegistrations()
    {
        return [
            [
                'id' => 'REG-2026-001',
                'participant_name' => 'Tim Horas Coder',
                'leader_name' => 'Bona Ventura Panjaitan',
                'email' => 'bona.panjaitan@del.ac.id',
                'phone' => '+62 812-4455-6677',
                'institution' => 'Institut Teknologi Del',
                'competition' => 'Del Competitive Programming Contest 2026',
                'branch' => 'Divisi Mahasiswa (Senior)',
                'members' => ['Bona Ventura (Ketua)', 'Riris Marpaung', 'Andre Manurung'],
                'registered_at' => '10 Nov 2026 13:20',
                'status' => 'Terverifikasi',
                'rejection_reason' => null,
                'documents' => ['KTM_Bona.pdf', 'KTM_Riris.pdf', 'KTM_Andre.pdf'],
            ],
            [
                'id' => 'REG-2026-002',
                'participant_name' => 'Pixel Pioneers',
                'leader_name' => 'Yolanda Sirait',
                'email' => 'yolanda.sirait@gmail.com',
                'phone' => '+62 822-1133-5577',
                'institution' => 'Universitas Sumatera Utara',
                'competition' => 'Del National UI/UX Design Challenge',
                'branch' => 'Mobile App UI/UX Track',
                'members' => ['Yolanda Sirait (Ketua)', 'Hendra Sitorus'],
                'registered_at' => '12 Nov 2026 15:40',
                'status' => 'Menunggu Verifikasi',
                'rejection_reason' => null,
                'documents' => ['KTM_Yolanda.pdf', 'Portofolio_Brief.pdf'],
            ],
            [
                'id' => 'REG-2026-003',
                'participant_name' => 'Shadow Hackers',
                'leader_name' => 'Daniel Tambunan',
                'email' => 'daniel.t@itb.ac.id',
                'phone' => '+62 853-9988-7766',
                'institution' => 'Institut Teknologi Bandung',
                'competition' => 'Toba Cyber Strike: CTF Competition 2026',
                'branch' => 'Jeopardy Style Cybersecurity',
                'members' => ['Daniel Tambunan', 'Farhan Maulana', 'Siti Zahra'],
                'registered_at' => '14 Nov 2026 10:15',
                'status' => 'Terverifikasi',
                'rejection_reason' => null,
                'documents' => ['Surat_Tugas_Kampus.pdf'],
            ],
            [
                'id' => 'REG-2026-004',
                'participant_name' => 'Team Alpha Omega',
                'leader_name' => 'Budi Santoso',
                'email' => 'budi.santoso@yahoo.com',
                'phone' => '+62 877-3322-1100',
                'institution' => 'SMA Unggul Del',
                'competition' => 'Del Competitive Programming Contest 2026',
                'branch' => 'Divisi Pelajar SMA/SMK (Junior)',
                'members' => ['Budi Santoso', 'Lestari Siahaan'],
                'registered_at' => '14 Nov 2026 16:30',
                'status' => 'Menunggu Verifikasi',
                'rejection_reason' => null,
                'documents' => ['Kartu_Pelajar_Budi.pdf'],
            ],
            [
                'id' => 'REG-2026-005',
                'participant_name' => 'Dragon Slayer 99',
                'leader_name' => 'Joko Tarigan',
                'email' => 'joko.tarigan@gmail.com',
                'phone' => '+62 899-7766-5544',
                'institution' => 'Politeknik Negeri Medan',
                'competition' => 'Del Olympic Esports: Valorant',
                'branch' => 'Valorant 5v5 Tactical',
                'members' => ['Joko (C)', 'Roni', 'Tegar', 'Arya', 'Gideon'],
                'registered_at' => '08 Nov 2026 18:00',
                'status' => 'Ditolak',
                'rejection_reason' => 'Data identitas anggota tim ke-4 buram dan bukti pembayaran pendaftaran tidak valid/tidak terbaca.',
                'documents' => ['Bukti_Transfer_Buram.jpg'],
            ],
        ];
    }

    public static function getMatches()
    {
        return [
            [
                'id' => 'M-101',
                'competition' => 'Del Olympic Esports: Valorant',
                'branch' => 'Valorant 5v5 Tactical',
                'round' => 'Semifinal A',
                'team_a' => 'Tim Del Phoenix',
                'team_b' => 'USU Cyber Knights',
                'score_a' => 2,
                'score_b' => 1,
                'datetime' => '02 Des 2026 - 13:00 WIB',
                'venue' => 'Arena Gaming Lt. 2 Gd. 7',
                'status' => 'Selesai',
                'winner' => 'Tim Del Phoenix',
                'format' => 'BO3',
            ],
            [
                'id' => 'M-102',
                'competition' => 'Del Olympic Esports: Valorant',
                'branch' => 'Valorant 5v5 Tactical',
                'round' => 'Semifinal B',
                'team_a' => 'Polmed Titans',
                'team_b' => 'Unimed Rangers',
                'score_a' => 0,
                'score_b' => 2,
                'datetime' => '02 Des 2026 - 15:30 WIB',
                'venue' => 'Arena Gaming Lt. 2 Gd. 7',
                'status' => 'Selesai',
                'winner' => 'Unimed Rangers',
                'format' => 'BO3',
            ],
            [
                'id' => 'M-103',
                'competition' => 'Del Olympic Esports: Valorant',
                'branch' => 'Valorant 5v5 Tactical',
                'round' => 'Grand Final',
                'team_a' => 'Tim Del Phoenix',
                'team_b' => 'Unimed Rangers',
                'score_a' => '-',
                'score_b' => '-',
                'datetime' => '03 Des 2026 - 14:00 WIB',
                'venue' => 'Panggung Utama Auditorium Del',
                'status' => 'Mendatang',
                'winner' => null,
                'format' => 'BO5',
            ],
            [
                'id' => 'M-201',
                'competition' => 'Del Competitive Programming Contest 2026',
                'branch' => 'Divisi Mahasiswa (Senior)',
                'round' => 'Babak Penyisihan Online',
                'team_a' => 'Semua Peserta Terdaftar (48 Tim)',
                'team_b' => 'Sistem Otomatis Judge (Domjudge)',
                'score_a' => 'Live Scoreboard',
                'score_b' => '-',
                'datetime' => '05 Des 2026 - 09:00 WIB',
                'venue' => 'Online Platform IT Del',
                'status' => 'Terjadwal',
                'winner' => null,
                'format' => 'ICPC Standard 5 Jam',
            ],
            [
                'id' => 'M-202',
                'competition' => 'Del Competitive Programming Contest 2026',
                'branch' => 'Divisi Mahasiswa (Senior)',
                'round' => 'Final Onsite Top 15',
                'team_a' => 'Top 15 Tim Lolos',
                'team_b' => 'Live Arena',
                'score_a' => '-',
                'score_b' => '-',
                'datetime' => '07 Des 2026 - 09:00 WIB',
                'venue' => 'Lab Komputer Gedung 5 IT Del',
                'status' => 'Terjadwal',
                'winner' => null,
                'format' => 'ICPC Standard 5 Jam',
            ],
        ];
    }

    public static function getBracket()
    {
        return [
            'quarter_finals' => [
                ['match' => 1, 'team1' => 'Del Phoenix', 'score1' => 2, 'team2' => 'Harimau Toba', 'score2' => 0, 'winner' => 'Del Phoenix'],
                ['match' => 2, 'team1' => 'USU Knights', 'score1' => 2, 'team2' => 'Nommensen Force', 'score2' => 1, 'winner' => 'USU Knights'],
                ['match' => 3, 'team1' => 'Polmed Titans', 'score1' => 2, 'team2' => 'Mikroskil Tech', 'score2' => 0, 'winner' => 'Polmed Titans'],
                ['match' => 4, 'team1' => 'Unimed Rangers', 'score1' => 2, 'team2' => 'IT Del Vipers', 'score2' => 1, 'winner' => 'Unimed Rangers'],
            ],
            'semi_finals' => [
                ['match' => 5, 'team1' => 'Del Phoenix', 'score1' => 2, 'team2' => 'USU Knights', 'score2' => 1, 'winner' => 'Del Phoenix'],
                ['match' => 6, 'team1' => 'Polmed Titans', 'score1' => 0, 'team2' => 'Unimed Rangers', 'score2' => 2, 'winner' => 'Unimed Rangers'],
            ],
            'finals' => [
                ['match' => 7, 'team1' => 'Del Phoenix', 'score1' => '?', 'team2' => 'Unimed Rangers', 'score2' => '?', 'winner' => 'Belum Dimainkan', 'date' => '03 Des 2026 - 14:00 WIB'],
            ],
            'third_place' => [
                ['match' => 8, 'team1' => 'USU Knights', 'score1' => 2, 'team2' => 'Polmed Titans', 'score2' => 1, 'winner' => 'USU Knights (Juara 3)'],
            ]
        ];
    }

    public static function getStandings()
    {
        return [
            ['rank' => 1, 'team' => 'Tim Horas Coder (IT Del)', 'played' => 4, 'solved' => 8, 'penalty' => 540, 'points' => 24],
            ['rank' => 2, 'team' => 'Gadjah Algoritma (UGM)', 'played' => 4, 'solved' => 8, 'penalty' => 610, 'points' => 24],
            ['rank' => 3, 'team' => 'Bandung Binary (ITB)', 'played' => 4, 'solved' => 7, 'penalty' => 480, 'points' => 21],
            ['rank' => 4, 'team' => 'Cyber Toba (IT Del)', 'played' => 4, 'solved' => 6, 'penalty' => 520, 'points' => 18],
            ['rank' => 5, 'team' => 'USU Logic (USU)', 'played' => 4, 'solved' => 5, 'penalty' => 490, 'points' => 15],
            ['rank' => 6, 'team' => 'Andalas Code (UNAND)', 'played' => 4, 'solved' => 4, 'penalty' => 430, 'points' => 12],
        ];
    }

    public static function getActivities()
    {
        return [
            ['time' => '10 menit yang lalu', 'user' => 'Admin Utama', 'action' => 'Menyetujui akun penyelenggara Del Cyber Security Club', 'type' => 'approve'],
            ['time' => '25 menit yang lalu', 'user' => 'HIMATIF IT Del', 'action' => 'Memperbarui jadwal babak final Del Programming Contest', 'type' => 'update'],
            ['time' => '1 jam yang lalu', 'user' => 'Bona Ventura (Peserta)', 'action' => 'Mengirim formulir pendaftaran untuk Tim Horas Coder', 'type' => 'register'],
            ['time' => '2 jam yang lalu', 'user' => 'Admin Utama', 'action' => 'Menolak pengajuan Toba Mobile Legends karena izin belum lengkap', 'type' => 'reject'],
            ['time' => '4 jam yang lalu', 'user' => 'GDSC IT Del', 'action' => 'Mengunggah poster dan cabang lomba baru Del UX Design Challenge', 'type' => 'create'],
        ];
    }
}
