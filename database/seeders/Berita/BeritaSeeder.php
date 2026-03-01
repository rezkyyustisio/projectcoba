<?php

namespace Database\Seeders\Berita;

use App\Models\Berita\Berita;
use App\Models\Berita\BeritaCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=6;$i++){
            $sourcePath      = public_path('template/berita/'.$i.'.png');
            $destinationPath = storage_path('app/public/images/berita/berita/'.$i.'.png');
            File::copy($sourcePath, $destinationPath);
        }

        $berita = BeritaCategory::where('name', 'Berita')->first();
        $user = User::first();
        $datas = [
            [
                'id' => (string)Str::uuid(),
                'category_id' => $berita->id,
                'name' => 'Unit Reskrim Polsek Pontianak Barat Gelar Silaturahmi dan Salurkan Sembako ke Pondok Pesantren Al Ahsani',
                'slug' => Str::slug('Unit Reskrim Polsek Pontianak Barat Gelar Silaturahmi dan Salurkan Sembako ke Pondok Pesantren Al Ahsani'),
                'top' => 1,
                'highlight' => 1,
                'description' => '<p><strong>PONTIANAKKERAS.ID, PONTIANAK</strong>- Unit Reskrim Polsek Pontianak Barat melaksanakan kegiatan silaturahmi ke Pondok Pesantren Al Ahsani, Jalan Rais A. Rahman, Kecamatan Pontianak Barat, Jumat (13/2/2026). Acara ini dilakukan sebagai bentuk komunikasi aktif dan penguatan kedekatan antara Polri dan masyarakat.</p>
                    <p>Kegiatan dipimpin jajaran Unit Reskrim dan disambut baik oleh pengurus serta para santri. Pertemuan berlangsung sederhana namun sarat makna, mencerminkan hubungan harmonis antara aparat penegak hukum dan lingkungan pendidikan keagamaan.</p>
                    <p>Dalam kesempatan tersebut, Unit Reskrim Polsek Pontianak Barat menyerahkan bantuan sembako berupa beras, gula, minyak goreng, telur, dan mi instan.</p>
                    <p>Bantuan diterima secara simbolis oleh pengurus pesantren dan diharapkan dapat membantu kebutuhan sehari-hari para santri, terutama menjelang bulan suci Ramadan.</p>
                    <p>Kapolsek Pontianak Barat, AKP Basuki, melalui Kanit Reskrim Ipda Alvon Oktobertus, menyampaikan bahwa kegiatan ini merupakan bagian dari komitmen Polri untuk terus hadir di tengah masyarakat.</p>
                    <p>&ldquo; Kegiatan ini merupakan bentuk silaturahmi dan komunikasi antara Polri dan masyarakat. Kami ingin berbagi sebagai wujud rasa syukur karena telah melewati tahun 2025 dengan baik dan memasuki tahun 2026,&rdquo; ujar Ipda Alvon.</p>
                    <p>Selain penyerahan bantuan, kegiatan juga menjadi ruang dialog terkait situasi keamanan dan ketertiban masyarakat (kamtibmas).</p>
                    <p>Ipda Alvon menegaskan, keberhasilan menjaga kondusivitas wilayah tidak terlepas dari dukungan seluruh elemen, termasuk tokoh agama dan lembaga pendidikan seperti pondok pesantren.</p>
                    <p>&ldquo; Menjelang Ramadan, kami berharap seluruh rangkaian kegiatan di wilayah Pontianak Barat dapat berjalan lancar. Kami memohon doa agar anggota Reskrim selalu diberikan kesehatan dan kelancaran dalam bertugas,&rdquo; tambahnya.</p>
                    <p>Menurutnya, silaturahmi ini bukan sekadar seremonial, melainkan pendekatan humanis Polri dalam membangun rasa saling percaya. Dengan komunikasi yang baik, setiap potensi permasalahan di lingkungan dapat diantisipasi dan ditangani lebih cepat.</p>
                    <p>Pengurus Pondok Pesantren Al Ahsani menyampaikan apresiasi atas kunjungan dan perhatian yang diberikan. Mereka menilai kehadiran kepolisian dalam kegiatan sosial menunjukkan bahwa Polri tidak hanya hadir saat terjadi persoalan hukum, tetapi juga dalam aktivitas kemasyarakatan.</p>
                    <p>Dialog yang berlangsung hangat antara personel kepolisian dan para santri turut memperkuat hubungan emosional. Doa bersama pun dipanjatkan agar seluruh personel diberikan kesehatan, keselamatan, dan keberhasilan dalam menjalankan tugas.</p>
                    <p>Menjelang Ramadan, aktivitas masyarakat cenderung meningkat, baik dalam kegiatan ibadah maupun ekonomi. Karena itu, koordinasi dan komunikasi antara aparat dan warga menjadi faktor penting dalam menjaga situasi tetap aman dan kondusif.</p>
                    <p>Melalui silaturahmi ini, Polsek Pontianak Barat menegaskan komitmennya untuk terus membangun sinergi dengan masyarakat.</p>
                    <p>Langkah sederhana namun bermakna tersebut diharapkan menjadi fondasi kuat dalam menjaga keamanan dan ketertiban di wilayah Pontianak Barat sepanjang tahun 2026.</p>',
                'tags' => 'ipda alvon,pontianak keras,unit reskrim polsek pontianak barat',
                'image' => 'images/berita/berita/1.png',
                'created_by' => $user->id,
                'created_at' => Carbon::parse('13-02-2026'),
            ],
            [
                'id' => (string)Str::uuid(),
                'category_id' => $berita->id,
                'name' => 'KPPPA Bersama Pihak Kepolisian Dalami Kasus Kematiaan Siswa SD di Ngada Nusa Tenggara Timur',
                'slug' => Str::slug('KPPPA Bersama Pihak Kepolisian Dalami Kasus Kematiaan Siswa SD di Ngada Nusa Tenggara Timur'),
                'top' => 1,
                'highlight' => 1,
                'description' => '<p><strong>PONTIANAKKERAS.ID, JAKARTA</strong> &ndash; Kementerian Pemberdayaan Perempuan dan Perlindungan Anak (KPPPA) dan kepolisian mendalami penyebab meninggalnya Y (10), seorang siswa kelas 4 Sekolah Dasar (SD) di Ngada, Nusa Tenggara Timur (NTT).</p>
                    <p>Hingga kini, belum ditemukan indikasi kekerasan fisik, namun dugaan kekerasan psikis masih dalam proses pendalaman.</p>
                    <p>Menteri Pemberdayaan Perempuan dan Perlindungan Anak, Arifatul Choiri Fauzi, mengatakan pihaknya menaruh perhatian serius terhadap aspek psikologis dalam kasus tersebut.</p>
                    <p>Menurutnya, penelusuran dilakukan secara menyeluruh dengan melibatkan berbagai pihak.</p>
                    <p>&ldquo; Untuk kasus anak di Ngada ini, sampai saat ini memang tidak terlihat adanya kekerasan secara fisik. Tetapi untuk kekerasan secara psikis, ini yang sedang kami dalami,&rdquo; kata Arifatul.</p>
                    <p>Arifatul menyebut proses pendalaman masih berlangsung untuk mengetahui faktor-faktor yang memengaruhi kondisi mental korban hingga mengambil keputusan yang berujung pada kematian.</p>
                    <p>&ldquo; Saat ini masih proses, kira-kira apa yang menyebabkan si anak sehingga mengambil keputusan melakukan hal yang sangat tidak diinginkan oleh kita semua,&rdquo; ujarnya.</p>
                    <p>Selain itu, KPPPA juga menelusuri kemungkinan adanya pengaruh eksternal yang menjadi pemicu tindakan korban.</p>
                    <p>&ldquo; Kemudian yang kedua, dia terinspirasi dari apa sehingga melakukan hal ini. Ini juga yang sedang kami coba dalami,&rdquo; lanjut Arifatul.</p>
                    <p>Berdasarkan informasi yang dihimpun, Y selama ini tinggal bersama neneknya di Kabupaten Ngada. Sementara sang ibu diketahui tinggal di kampung lain bersama empat saudara kandung korban.</p>
                    <p>Kondisi tersebut menjadi salah satu aspek yang turut diperhatikan dalam proses pendampingan. Peristiwa ini terjadi pada Kamis (29/1/2026).</p>
                    <p>Korban ditemukan meninggal dunia dan meninggalkan sepucuk surat yang ditujukan kepada ibunya. Surat tersebut kini menjadi bagian dari bahan pendalaman aparat dan tim pendamping, dengan tetap mengedepankan perlindungan identitas anak.</p>
                    <p>Pihak kepolisian belum memberikan keterangan rinci terkait isi surat tersebut demi menjaga privasi keluarga korban.</p>
                    <p>Kementerian PPPA memastikan penanganan kasus ini dilakukan secara terpadu. Tim layanan SAPA 129 KPPPA telah berkoordinasi dengan Unit Pelaksana Teknis Daerah Perlindungan Perempuan dan Anak (UPTD PPPA) Ngada, Polres Ngada, serta Polda NTT.</p>
                    <p>Koordinasi ini bertujuan untuk memastikan penanganan berjalan komprehensif, baik dari sisi hukum, perlindungan anak, maupun pendampingan psikologis bagi keluarga korban.</p>
                    <p>&ldquo; Kami terus berkoordinasi dengan pemerintah daerah dan aparat penegak hukum agar penanganan kasus ini berjalan optimal,&rdquo; ujar Arifatul.</p>
                    <p>Tragedi ini, menurut Arifatul, menjadi pengingat penting bagi seluruh pemerintah daerah untuk memperkuat sistem perlindungan anak.</p>
                    <p>Ia meminta setiap kabupaten dan kota meninjau kembali implementasi kebijakan Kabupaten/Kota Layak Anak (KLA).</p>
                    <p>&ldquo; Kami menyampaikan duka cita yang mendalam kepada keluarga korban. Peristiwa ini menjadi pengingat bahwa penguatan sistem perlindungan anak melalui implementasi kebijakan Kabupaten/Kota Layak Anak sangat diperlukan,&rdquo; katanya.</p>
                    <p>Ia menegaskan, kebijakan KLA harus benar-benar diterapkan secara konsisten dan berkelanjutan, bukan sekadar formalitas administratif.</p>
                    <p>&ldquo; Kami mendorong kabupaten dan kota memastikan kebijakan KLA dapat diterapkan secara nyata, sehingga anak-anak dapat bersekolah dengan aman, nyaman, dan mendapatkan perlindungan yang memadai,&rdquo; ujarnya.</p>
                    <p>Selain keluarga, peran sekolah dan lingkungan sekitar juga menjadi perhatian dalam pendalaman kasus ini. KPPPA menilai sekolah memiliki peran strategis sebagai ruang aman bagi anak untuk tumbuh dan berkembang.</p>
                    <p>Arifatul menekankan pentingnya kepekaan tenaga pendidik dalam membaca perubahan perilaku anak yang dapat menjadi indikasi adanya tekanan psikologis.</p>
                    <p>&ldquo;Anak-anak sering kali tidak mampu menyampaikan apa yang mereka rasakan secara langsung. Karena itu, kepekaan guru dan lingkungan sekitar sangat dibutuhkan,&rdquo; katanya.</p>
                    <p>KPPPA juga mendorong penguatan edukasi terkait kesehatan mental anak di lingkungan sekolah, termasuk mekanisme pelaporan dan pendampingan yang mudah diakses.</p>
                    <p>Kementerian PPPA memastikan pendampingan terhadap keluarga korban akan dilakukan secara berkelanjutan.</p>
                    <p>Pendampingan tersebut mencakup aspek psikologis, sosial, serta koordinasi dengan pemerintah daerah setempat. Arifatul menyebut, pihaknya akan terus memantau perkembangan kasus ini hingga seluruh proses pendalaman selesai.</p>
                    <p>&ldquo; Kami ingin memastikan tidak hanya kasus ini yang ditangani, tetapi juga sistem perlindungan anak di daerah dapat diperkuat agar kejadian serupa tidak terulang,&rdquo; ujarnya.</p>
                    <p>Kasus ini mendapat perhatian luas dari masyarakat. KPPPA mengajak seluruh elemen, mulai dari keluarga, sekolah, pemerintah daerah, hingga masyarakat umum, untuk lebih peduli terhadap kondisi psikologis anak.</p>
                    <p>Perubahan perilaku, penurunan semangat belajar, hingga kecenderungan menarik diri dari lingkungan sosial disebut sebagai sinyal awal yang perlu mendapat perhatian serius.</p>
                    <p>&ldquo; Kita semua memiliki tanggung jawab untuk memastikan anak-anak merasa aman, didengar, dan dilindungi,&rdquo; kata Arifatul.</p>
                    <p>KPPPA berharap, melalui penguatan sistem perlindungan anak dan kerja sama lintas sektor, lingkungan yang aman dan ramah anak dapat terwujud secara nyata di seluruh wilayah Indonesia.</p>',
                'tags' => 'KPPA,nusa tenggara timur,pontianak keras,siswa sd',
                'image' => 'images/berita/berita/2.png',
                'created_by' => $user->id,
                'created_at' => Carbon::parse('5-02-2026'),
            ],
            [
                'id' => (string)Str::uuid(),
                'category_id' => $berita->id,
                'name' => 'Konser Epilogfest di Pontianak Ditunda Dua Kali, Calon Penonton Kecewa dan Pertanyakan Refund',
                'slug' => Str::slug('Konser Epilogfest di Pontianak Ditunda Dua Kali, Calon Penonton Kecewa dan Pertanyakan Refund'),
                'top' => 1,
                'highlight' => 0,
                'description' => '<p><strong>PONTIANAKKERAS.ID, PONTIANAK</strong> &ndash; Ketidakpastian menyelimuti calon penonton konser Epilogfest yang rencananya digelar di Pelataran Grand Mahkota Hotel Pontianak.</p>
                    <p>Acara musik tersebut kembali menuai sorotan publik setelah mengalami penundaan untuk kedua kalinya, sehingga memicu kekecewaan dan keluhan dari para pemegang tiket.</p>
                    <p>Konser yang semula dijadwalkan berlangsung pada 1 November 2025 lebih dulu mengalami perubahan jadwal ke 10 Januari 2026.</p>
                    <p>Namun, menjelang pelaksanaan, promotor kembali mengumumkan penundaan lanjutan dengan menggeser waktu penyelenggaraan hingga Agustus 2026.</p>
                    <p>Salah satu calon penonton, Riya Hoiriyah, mengaku kecewa dengan minimnya informasi serta kurangnya transparansi dari pihak promotor terkait kejelasan acara dan mekanisme pengembalian dana tiket (refund).</p>
                    <p>Menurut Riya, pemberitahuan penundaan justru ia terima pada hari pelaksanaan konser. Informasi tersebut muncul secara mendadak melalui notifikasi di ponselnya.</p>
                    <p>&ldquo; Pemberitahuannya baru muncul waktu subuh, tepat di hari H konser. Tiba-tiba ada notifikasi dari pihak Epilogfest yang menyatakan konser diundur ke 10 Januari 2026,&rdquo; ungkap Riya saat ditemui.</p>
                    <p>Ia menilai cara penyampaian informasi tersebut sangat merugikan penonton, terlebih bagi mereka yang telah mempersiapkan waktu dan biaya untuk datang ke lokasi acara.</p>
                    <p>Keraguan Riya terhadap kepastian konser sebenarnya sudah muncul sejak sehari sebelum acara. Ia mengaku sempat melewati lokasi konser pada Jumat, 30 Oktober 2025, sekitar pukul 17.00 WIB.</p>
                    <p>Saat itu, ia tidak melihat adanya aktivitas persiapan seperti pembangunan panggung maupun perlengkapan teknis lainnya di area pelataran hotel.</p>
                    <p>&ldquo; Dari promotor tidak ada informasi apa pun. Kami hanya berharap ada konfirmasi yang jelas dari tim mereka soal kejelasan acara ini sebenarnya seperti apa,&rdquo; tambahnya.</p>
                    <p>Kondisi tersebut semakin memperkuat kekecewaan calon penonton yang merasa tidak mendapatkan kepastian hingga mendekati waktu pelaksanaan.</p>
                    <p>Penundaan konser Epilogfest Pontianak ini juga berdampak secara finansial bagi Riya. Ia mengaku telah mengajukan cuti kerja jauh hari demi menyaksikan penampilan penyanyi favoritnya, Feby Putri.</p>
                    <p>Selain itu, ia juga mengalami kerugian materi akibat pembelian tiket secara kolektif bersama rekan-rekannya.</p>
                    <p>&ldquo; Mengenai pembayaran tiket, awalnya kami ingin checkout bersama. Tapi karena aplikasi membatasi maksimal dua tiket, akhirnya kami melakukan satu transaksi untuk lima tiket VIP dan satu tiket seharga Rp395 ribu, sudah termasuk biaya admin. Total lima tiket sekitar Rp1,9 juta,&rdquo; jelasnya.</p>
                    <p>Menurut Riya, kerugian tersebut bukan hanya soal uang, tetapi juga waktu dan rencana yang sudah disusun sejak lama.</p>
                    <p>Kekecewaan terhadap sikap promotor yang dinilai tidak profesional membuat Riya dan sejumlah calon penonton lainnya mempertimbangkan langkah hukum. Mereka menilai penundaan berulang tanpa kejelasan refund telah merugikan banyak pihak.</p>
                    <p>Ia menegaskan tidak akan tinggal diam jika promotor tidak menunjukkan itikad baik dalam waktu dekat.</p>
                    <p>&ldquo; Harapan saya, promotor bisa segera mempercepat proses pengembalian uang. Kalau tidak ada kejelasan, kami berencana melaporkan kasus ini ke pihak kepolisian karena sudah merugikan banyak orang,&rdquo; tegasnya.</p>
                    <p>Menanggapi gelombang protes dari publik, Promotor Epilogfest akhirnya memberikan klarifikasi melalui kanal resmi mereka di media sosial Instagram @epilogfest.</p>
                    <p>Dalam pernyataannya, promotor menyampaikan permohonan maaf dan menyebut keputusan penundaan diambil dengan berat hati demi kebaikan bersama, setelah mempertimbangkan kondisi dan situasi yang dinilai tidak memungkinkan.</p>
                    <p>&ldquo; Dengan segala kerendahan hati, kami menyampaikan permohonan maaf sebesar-besarnya kepada seluruh pihak, khususnya peserta, penonton, dan semua yang telah memberikan dukungan,&rdquo; tulis promotor dalam flyer yang diunggah di akun resminya.</p>
                    <p>Dalam pengumuman tersebut, promotor memastikan konser Epilogfest resmi ditunda hingga Agustus 2026. Mereka juga menjanjikan akan melakukan pembaruan daftar pengisi acara atau line-up sebagai bagian dari persiapan ulang event.</p>
                    <p>&ldquo; Setelah melalui pertimbangan matang dan melihat kondisi terkini yang tidak memungkinkan melaksanakan event pada 10 Januari 2026, dengan berat hati kami memutuskan event ini harus ditunda,&rdquo; tulis promotor.</p>
                    <p>Sebagai bentuk tanggung jawab, promotor Epilogfest menyatakan komitmennya untuk melakukan pengembalian dana tiket kepada para penonton. Mereka juga berjanji akan menyampaikan informasi teknis terkait mekanisme refund secara transparan melalui kanal resmi.</p>
                    <p>&ldquo; Sebagai bentuk tanggung jawab, kami akan melanjutkan proses refund tiket. Informasi teknis mengenai mekanisme refund maupun jadwal event pengganti akan kami sampaikan secara transparan melalui kanal resmi kami,&rdquo; tegas promotor.</p>
                    <p>Hingga kini, calon penonton masih menunggu kepastian lebih lanjut terkait realisasi refund tersebut.</p>
                    <p>Publik berharap promotor dapat segera memenuhi janjinya agar polemik ini tidak berlarut-larut dan kepercayaan terhadap penyelenggaraan event musik di Pontianak dapat kembali terjaga.</p>',
                'tags' => 'Epilogfest,konser gagal,pontianak keras',
                'image' => 'images/berita/berita/3.png',
                'created_by' => $user->id,
                'created_at' => Carbon::parse('19-01-2026'),
            ],
        ];

        Berita::insert($datas);
        $berita = BeritaCategory::where('name', 'Hukum')->first();
        $datas = [
            [
                'id' => (string)Str::uuid(),
                'category_id' => $berita->id,
                'name' => 'Pria Tenteng Sajam dan Ancam Pengguna Jalan Raya di Pontianak Diciduk Polisi',
                'slug' => Str::slug('Pria Tenteng Sajam dan Ancam Pengguna Jalan Raya di Pontianak Diciduk Polisi'),
                'top' => 1,
                'highlight' => 0,
                'description' => '<p><strong>PONTIANAKKERAS.ID, PONTIANAK</strong>- Polisi turun tangan menangkap pria, R (36) warga Sambas yang diduga membawa sajam secara ilegal di Jalan Tanjung Pura, Pontianak Selatan, Kota Pontianak, hari Sabtu (14/2/2026) malam.</p>
                    <p>Aksi pelaku itu sempat bikin resah pengguna jalan raya dan videonya sempat viral di media sosial. Tak butuh waktu lama, R langsung diciduk polisi.</p>
                    <p>&rdquo; Menindaklanjuti laporan, yang viral di medsos. Anggota langsung melakukan pencarian terhadap diduga pelaku,&rdquo; kata Kasat Reskrim Polresta Pontianak, AKP Ryan Cahya Eka.</p>
                    <p>Diketahui pelaku sempat melakukan pengancaman terhadap pengguna jalan raya. Dari penangkapan pelaku, disita barang bukti sajam.</p>
                    <p>&rdquo; Anggota menemukan senjata tajam (sajam) jenis pisau yang disimpan di pinggang kanan pelaku,&rdquo; terangnya.</p>
                    <p>Pelaku bersama barang bukti dibawa ke kantor polisi untuk pemeriksaan lebih lanjut. Perbuatan itu membuat pelaku berhadapan dengan hukum.</p>
                    <p>&rdquo; Saat ditanya anggota, pelaku mengaku sebelum melakukan mengancam pengguna jalan. Sempat dalam pengaruh minuman keras alkohol,&rdquo; tambah Ryan.</p>
                    <p>Polisi menjerat pelaku dengan Pasal 307 KUHP Undang Undang Nomor 1 Tahun 2023&nbsp; Tentang Penguasaan atau Pembawaan Senjata Tajam Secara Tidak Sah.</p>',
                'tags' => 'alkohol,miras,pasal 307 kuh,ppontianak keras,senjata tajam',
                'image' => 'images/berita/berita/4.png',
                'created_by' => $user->id,
                'created_at' => Carbon::parse('15-02-2026'),
            ],
            [
                'id' => (string)Str::uuid(),
                'category_id' => $berita->id,
                'name' => 'Polisi Imbau Warga Tak Terprovokasi Isu Konflik Lahan Batu Ampar',
                'slug' => Str::slug('Polisi Imbau Warga Tak Terprovokasi Isu Konflik Lahan Batu Ampar'),
                'top' => 0,
                'highlight' => 1,
                'description' => '<p><strong>PONTIANAKKERAS.ID, KUBU RAYA</strong> - Polres Kubu Raya mengajak masyarakat untuk tetap tenang dan tidak terprovokasi oleh informasi yang beredar terkait konflik lahan di Desa Ambarawa, Kecamatan Batu Ampar.</p>
                    <p>Imbauan ini disampaikan menyusul viralnya video yang memperlihatkan ketegangan antara dua warga.</p>
                    <p>Kasubsi Penmas Polres Kubu Raya, Aiptu Ade, menegaskan bahwa seluruh proses penanganan perkara telah dilakukan sesuai peraturan perundang-undangan yang berlaku.</p>
                    <p>&ldquo; Kami memastikan proses hukum berjalan profesional dan adil. Tidak ada keberpihakan terhadap pihak mana pun,&rdquo; ujar Ade.</p>
                    <p>Konflik tersebut berawal dari sengketa jual beli lahan yang terjadi sejak tahun 2002. Perkara ini pernah diselesaikan melalui jalur Tata Usaha Negara dan dimenangkan oleh pihak BN.</p>
                    <p>Namun dalam beberapa tahun terakhir, perselisihan kembali muncul hingga memuncak pada November 2024. Dalam insiden tersebut, terjadi keributan saat aktivitas panen kelapa.</p>
                    <p>HM datang ke lokasi dan membawa senjata tajam, yang kemudian menjadi bagian dari proses hukum yang berjalan saat ini.</p>
                    <p>Selain itu, fakta lain yang terungkap dalam penyelidikan menyebutkan bahwa lahan yang disengketakan disebut berada dalam kawasan hutan lindung. Informasi ini menjadi bagian dari pendalaman lebih lanjut oleh aparat.</p>
                    <p>Polres Kubu Raya menegaskan komitmennya menjaga situasi kamtibmas tetap kondusif.&nbsp; Ade meminta masyarakat untuk menghormati putusan pengadilan yang telah berkekuatan hukum tetap.</p>
                    <p>&ldquo; Kami mengimbau masyarakat agar tidak terpengaruh oleh narasi sepihak. Serahkan proses hukum kepada aparat dan hormati putusan pengadilan,&rdquo; ungkapnya.</p>
                    <p>Ade berharap masyarakat mendapatkan informasi yang lebih lengkap dan tidak terjebak pada spekulasi yang berkembang di media sosial.</p>
                    <p>Polres Kubu Raya memastikan setiap persoalan hukum diselesaikan melalui mekanisme yang sah demi menjamin kepastian hukum dan rasa keadilan bagi seluruh pihak.</p>',
                'tags' => 'aiptu ade,polres kubu raya,pontianak keras,sengketa lahan',
                'image' => 'images/berita/berita/5.png',
                'created_by' => $user->id,
                'created_at' => Carbon::parse('12-02-2026'),
            ],
            [
                'id' => (string)Str::uuid(),
                'category_id' => $berita->id,
                'name' => 'Sempat Ajukan Praperadilan, Proses Hukum Konflik Lahan Batu Ampar Dinyatakan Sah',
                'slug' => Str::slug('Sempat Ajukan Praperadilan, Proses Hukum Konflik Lahan Batu Ampar Dinyatakan Sah'),
                'top' => 0,
                'highlight' => 1,
                'description' => '<p><strong>PONTIANAKKERAS.ID, KUBU RAYA </strong>- Proses hukum dalam kasus konflik lahan di Desa Ambarawa, Kecamatan Batu Ampar, Kabupaten Kubu Raya, dipastikan telah berjalan sesuai prosedur.</p>
                    <p>Hal ini ditegaskan Kasubsi Penmas Polres Kubu Raya, Aiptu Ade Surdiansyah menyusul viralnya video konflik yang melibatkan dua warga setempat.</p>
                    <p>&ldquo; Kami perlu memastikan kepastian hukum. Setelah dilakukan pemeriksaan oleh tenaga medis, dinyatakan bahwa yang bersangkutan tidak dalam kondisi sakit,&rdquo; ujar Aiptu Ade.</p>
                    <p>Dikatakannya, selama proses penyidikan, tersangka HM sempat beberapa kali tidak kooperatif. Ia diketahui mengaku sakit dalam jangka waktu cukup lama sehingga tidak dapat memenuhi panggilan pemeriksaan.</p>
                    <p>Namun demi memastikan kondisi kesehatannya, penyidik membawa HM ke rumah sakit untuk menjalani pemeriksaan medis. Hasil pemeriksaan menyatakan bahwa yang bersangkutan dalam kondisi sehat dan dapat mengikuti proses hukum.</p>
                    <p>Tidak hanya itu, HM juga menempuh berbagai langkah hukum lanjutan. Ia melaporkan penyidik Polres Kubu Raya ke Irwasda dan Propam, serta mengajukan praperadilan sebagai bentuk keberatan terhadap proses penyidikan.</p>
                    <p>Namun hasil praperadilan menyatakan bahwa tindakan penyidik telah sesuai dengan ketentuan hukum yang berlaku. Laporan ke internal kepolisian juga tidak menemukan adanya pelanggaran prosedur.</p>
                    <p>Dengan demikian, proses hukum terhadap HM tetap berlanjut. Ia telah ditetapkan sebagai tersangka terkait dugaan kepemilikan senjata tajam berdasarkan Undang-Undang Darurat.</p>
                    <p>Sebelumnya, insiden terjadi pada November 2024 saat BN tengah melakukan panen kelapa di lahan yang menjadi objek sengketa.</p>
                    <p>Ketegangan muncul ketika HM datang ke lokasi dengan membawa senjata tajam. Dalam peristiwa tersebut terjadi keributan hingga menyebabkan luka.</p>
                    <p>Kedua pihak sempat saling melaporkan dugaan penganiayaan. Anak BN telah menjalani persidangan dan divonis enam bulan penjara dengan putusan inkrah.</p>
                    <p>Polres Kubu Raya menegaskan bahwa penanganan kasus ini dilakukan secara objektif dan transparan. Semua tahapan penyidikan dilakukan berdasarkan alat bukti dan keterangan saksi yang sah.</p>
                    <p>&ldquo; Kami bekerja sesuai aturan. Tidak ada perlakuan khusus maupun keberpihakan,&rdquo; tegasnya.</p>
                    <p>Kepolisian juga mengimbau masyarakat untuk tidak mudah terprovokasi oleh potongan video atau informasi yang belum tentu benar.</p>
                    <p>Proses hukum, kata dia, harus dihormati demi menjaga stabilitas keamanan di wilayah Batu Ampar dan sekitarnya.</p>',
                'tags' => 'batu ampar,Konflik,pontianak keras,sengketa lahan',
                'image' => 'images/berita/berita/6.png',
                'created_by' => $user->id,
                'created_at' => Carbon::parse('12-02-2026'),
            ],
        ];
        Berita::insert($datas);
    }
}
