<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $sourcePath      = public_path('template/icon_light.png');
        $destinationPath = storage_path('app/public/images/setting/icon_light.png');
        File::copy($sourcePath, $destinationPath);

        $sourcePath      = public_path('template/icon_dark.png');
        $destinationPath = storage_path('app/public/images/setting/icon_dark.png');
        File::copy($sourcePath, $destinationPath);

        $sourcePath      = public_path('template/logo_light.png');
        $destinationPath = storage_path('app/public/images/setting/logo_light.png');
        File::copy($sourcePath, $destinationPath);

        $sourcePath      = public_path('template/logo_dark.png');
        $destinationPath = storage_path('app/public/images/setting/logo_dark.png');
        File::copy($sourcePath, $destinationPath);

        $sourcePath      = public_path('template/home_image.png');
        $destinationPath = storage_path('app/public/images/setting/home_image.png');
        File::copy($sourcePath, $destinationPath);

        $datas = [
            'name'          => 'General Name',
            'company'       => 'Company Name',
            'theme'         => '#1F305A',
            'header'        => '#1F305A',
            'icon_size'     => '35',
            'logo_size'     => '40',
            'icon_light'    => 'images/setting/icon_light.png',
            'icon_dark'     => 'images/setting/icon_dark.png',
            'logo_light'    => 'images/setting/logo_light.png',
            'logo_dark'     => 'images/setting/logo_dark.png',
            'home_image'     => 'images/setting/home_image.png',

            'contact_email'   => 'info@thedaywebsite.com',
            'contact_phone'   => '082295325277',
            'contact_address' => 'Indramayu - Jawa Barat',
            'contact_map'     => 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7929.2035278102885!2d108.46418000000001!3d-6.445148999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1759067323856!5m2!1sid!2sid',
            'contact_image'   => 'images/setting/contact_image.png',

            'sosmed_facebook'  => 'https://facebook.com',
            'sosmed_youtube'   => 'https://youtube.com',
            'sosmed_whatsapp'  => 'https://wa.me',
            'sosmed_instagram' => 'https://instagram.com',
            'sosmed_tiktok'    => 'https://tiktok.com',

            'redaksi' => '<p><strong>PENERBIT</strong></p>
                <p>PT. PONTIANAK KERAS INDONESIA</p>
                <p><strong>PEMIMPIN UTAMA</strong></p>
                <p>Fawas Refinity</p>
                <p><strong>PEMIMPIN REDAKSI</strong></p>
                <p>Muhammad Riski Farisal</p>
                <p><strong>REDAKTUR PELAKSANA</strong></p>
                <p>Dimas Yoga Pratama</p>
                <p><strong>JURNALIS</strong></p>
                <p>Rendy</p>
                <p><strong>KONTEN KREATOR</strong></p>
                <p>Alva</p>
                <p><strong>ADMIN MEDIA SOSIAL</strong></p>
                <p>Nanda Helvansyah</p>
                <p><strong>IT &amp; WEB DEVELOPMENT</strong></p>
                <p>Rizky Yustisio</p>
                <p><strong>MARKETING &amp; KERJASAMA</strong></p>
                <p>Muhammad Adnan Perkasa</p>
                <p>&nbsp;</p>
                <p><strong>ALAMAT REDAKSI</strong></p>
                <p>Jl. Sungai Raya Dalam, Kec. Pontianak Tenggara, Kota Pontianak, 78111</p>
                <p>Email: pontianakkeras12@gmail.com</p>
                <p>WhatsApp: 081256968810</p>',
            'kode_etik' => '<p>Kemerdekaan berpendapat, berekspresi, dan pers adalah hak asasi manusia yang dilindungi Pancasila, Undang-Undang Dasar 1945, dan Deklarasi Universal Hak Asasi Manusia PBB.</p>
                <p>Kemerdekaan pers adalah sarana masyarakat untuk memperoleh informasi dan berkomunikasi, guna memenuhi kebutuhan hakiki dan meningkatkan kualitas kehidupan manusia.</p>
                <p>Dalam mewujudkan kemerdekaan pers itu, wartawan Indonesia juga menyadari adanya kepentingan bangsa, tanggung jawab sosial, keberagaman masyarakat, dan norma-norma agama.</p>
                <p>Dalam melaksanakan fungsi, hak, kewajiban dan peranannya, pers menghormati hak asasi setiap orang, karena itu pers dituntut profesional dan terbuka untuk dikontrol oleh masyarakat.</p>
                <p>Untuk menjamin kemerdekaan pers dan memenuhi hak publik untuk memperoleh informasi yang benar, wartawan Indonesia memerlukan landasan moral dan etika profesi sebagai pedoman operasional dalam menjaga kepercayaan publik dan menegakkan integritas serta profesionalisme. Atas dasar itu, wartawan Indonesia menetapkan dan menaati Kode Etik Jurnalistik:</p>
                <p><strong>Pasal 1</strong></p>
                <p>Wartawan Indonesia bersikap independen, menghasilkan berita yang akurat, berimbang, dan tidak beritikad buruk.</p>
                <p><strong>Penafsiran</strong></p>
                <ol>
                <li>Independen berarti memberitakan peristiwa atau fakta sesuai dengan suara hati nurani tanpa campur tangan, paksaan, dan intervensi dari pihak lain termasuk pemilik perusahaan pers.</li>
                <li>Akurat berarti dipercaya benar sesuai keadaan objektif ketika peristiwa terjadi.</li>
                <li>Berimbang berarti semua pihak mendapat kesempatan setara.</li>
                <li>Tidak beritikad buruk berarti tidak ada niat secara sengaja dan semata-mata untuk menimbulkan kerugian pihak lain.</li>
                </ol>
                <p><strong>Pasal 2</strong></p>
                <p>Wartawan Indonesia menempuh cara-cara yang profesional dalam melaksanakan tugas jurnalistik.</p>
                <p><strong>Penafsiran</strong></p>
                <p>Cara-cara yang profesional adalah:</p>
                <ol>
                <li>menunjukkan identitas diri kepada narasumber;</li>
                <li>menghormati hak privasi;</li>
                <li>tidak menyuap;</li>
                <li>menghasilkan berita yang faktual dan jelas sumbernya;</li>
                <li>rekayasa pengambilan dan pemuatan atau penyiaran gambar, foto, suara dilengkapi dengan keterangan tentang sumber dan ditampilkan secara berimbang;</li>
                <li>menghormati pengalaman traumatik narasumber dalam penyajian gambar, foto, suara;</li>
                <li>tidak melakukan plagiat, termasuk menyatakan hasil liputan wartawan lain sebagai karya sendiri;</li>
                <li>penggunaan cara-cara tertentu dapat dipertimbangkan untuk peliputan berita investigasi bagi kepentingan publik.</li>
                </ol>
                <p><strong>Pasal 3</strong></p>
                <p>Wartawan Indonesia selalu menguji informasi, memberitakan secara berimbang, tidak mencampurkan fakta dan opini yang menghakimi, serta menerapkan asas praduga tak bersalah.</p>
                <p><strong>Penafsiran</strong></p>
                <ol>
                <li>Menguji informasi berarti melakukan check and recheck tentang kebenaran informasi itu.</li>
                <li>Berimbang adalah memberikan ruang atau waktu pemberitaan kepada masing-masing pihak secara proporsional.</li>
                <li>Opini yang menghakimi adalah pendapat pribadi wartawan. Hal ini berbeda dengan opini interpretatif, yaitu pendapat yang berupa interpretasi wartawan atas fakta.</li>
                <li>Asas praduga tak bersalah adalah prinsip tidak menghakimi seseorang.</li>
                </ol>
                <p><strong>Pasal 4</strong></p>
                <p>Wartawan Indonesia tidak membuat berita bohong, fitnah, sadis, dan cabul.</p>
                <p><strong>Penafsiran</strong></p>
                <ol>
                <li>Bohong berarti sesuatu yang sudah diketahui sebelumnya oleh wartawan sebagai hal yang tidak sesuai dengan fakta yang terjadi.</li>
                <li>Fitnah berarti tuduhan tanpa dasar yang dilakukan secara sengaja dengan niat buruk.</li>
                <li>Sadis berarti kejam dan tidak mengenal belas kasihan.</li>
                <li>Cabul berarti penggambaran tingkah laku secara erotis dengan foto, gambar, suara, grafis atau tulisan yang semata-mata untuk membangkitkan nafsu birahi.</li>
                <li>Dalam penyiaran gambar dan suara dari arsip, wartawan mencantumkan waktu pengambilan gambar dan suara.</li>
                </ol>
                <p><strong>Pasal 5</strong></p>
                <p>Wartawan Indonesia tidak menyebutkan dan menyiarkan identitas korban kejahatan susila dan tidak menyebutkan identitas anak yang menjadi pelaku kejahatan.</p>
                <p><strong>Penafsiran</strong></p>
                <ol>
                <li>Identitas adalah semua data dan informasi yang menyangkut diri seseorang yang memudahkan orang lain untuk melacak.</li>
                <li>Anak adalah seorang yang berusia kurang dari 16 tahun dan belum menikah.</li>
                </ol>
                <p><strong>Pasal 6</strong></p>
                <p>Wartawan Indonesia tidak menyalahgunakan profesi dan tidak menerima suap.</p>
                <p><strong>Penafsiran</strong></p>
                <ol>
                <li>Menyalahgunakan profesi adalah segala tindakan yang mengambil keuntungan pribadi atas informasi yang diperoleh saat bertugas sebelum informasi tersebut menjadi pengetahuan umum.</li>
                <li>Suap adalah segala pemberian dalam bentuk uang, benda atau fasilitas dari pihak lain yang mempengaruhi independensi.</li>
                </ol>
                <p><strong>Pasal 7</strong></p>
                <p>Wartawan Indonesia memiliki hak tolak untuk melindungi narasumber yang tidak bersedia diketahui identitas maupun keberadaannya, menghargai ketentuan embargo, informasi latar belakang, dan off the record sesuai dengan kesepakatan.</p>
                <p><strong>Penafsiran</strong></p>
                <ol>
                <li>Hak tolak adalak hak untuk tidak mengungkapkan identitas dan keberadaan narasumber demi keamanan narasumber dan keluarganya.</li>
                <li>Embargo adalah penundaan pemuatan atau penyiaran berita sesuai dengan permintaan narasumber.</li>
                <li>Informasi latar belakang adalah segala informasi atau data dari narasumber yang disiarkan atau diberitakan tanpa menyebutkan narasumbernya.</li>
                <li>Off the record adalah segala informasi atau data dari narasumber yang tidak boleh disiarkan atau diberitakan.</li>
                </ol>
                <p><strong>Pasal 8</strong></p>
                <p>Wartawan Indonesia tidak menulis atau menyiarkan berita berdasarkan prasangka atau diskriminasi terhadap seseorang atas dasar perbedaan suku, ras, warna kulit, agama, jenis kelamin, dan bahasa serta tidak merendahkan martabat orang lemah, miskin, sakit, cacat jiwa atau cacat jasmani.</p>
                <p><strong>Penafsiran</strong></p>
                <ol>
                <li>Prasangka adalah anggapan yang kurang baik mengenai sesuatu sebelum mengetahui secara jelas.</li>
                <li>Diskriminasi adalah pembedaan perlakuan.</li>
                </ol>
                <p><strong>Pasal 9</strong></p>
                <p>Wartawan Indonesia menghormati hak narasumber tentang kehidupan pribadinya, kecuali untuk kepentingan publik.</p>
                <p><strong>Penafsiran</strong></p>
                <ol>
                <li>Menghormati hak narasumber adalah sikap menahan diri dan berhati-hati.</li>
                <li>Kehidupan pribadi adalah segala segi kehidupan seseorang dan keluarganya selain yang terkait dengan kepentingan publik.</li>
                </ol>
                <p><strong>Pasal 10</strong></p>
                <p>Wartawan Indonesia segera mencabut, meralat, dan memperbaiki berita yang keliru dan tidak akurat disertai dengan permintaan maaf kepada pembaca, pendengar, dan atau pemirsa.</p>
                <p><strong>Penafsiran</strong></p>
                <ol>
                <li>Segera berarti tindakan dalam waktu secepat mungkin, baik karena ada maupun tidak ada teguran dari pihak luar.</li>
                <li>Permintaan maaf disampaikan apabila kesalahan terkait dengan substansi pokok.</li>
                </ol>
                <p><strong>Pasal 11</strong></p>
                <p>Wartawan Indonesia melayani hak jawab dan hak koreksi secara proporsional.</p>
                <p><strong>Penafsiran</strong></p>
                <ol>
                <li>Ha\koreksi adalah hak setiap orang untuk membetulkan kekeliruan informasi yang diberitakan oleh pers, baik tentang dirinya maupun tentang orang lain.</li>
                <li>Proporsional berarti setara dengan bagian berita yang perlu diperbaiki.</li>
                <li>Penilaian akhir atas pelanggaran kode etik jurnalistik dilakukan Dewan Pers. Sanksi atas pelanggaran kode etik jurnalistik dilakukan oleh organisasi wartawan dan atau perusahaan pers.</li>
                </ol>
                <p>Jakarta, Selasa, 14 Maret 2006</p>
                <p>Kode Etik Jurnalistik ditetapkan Dewan Pers melalui Peraturan Dewan Pers <strong>Nomor: 6/Peraturan-DP/V/2008</strong> Tentang Pengesahan Surat Keputusan Dewan Pers <strong>Nomor 03/SK-DP/III/2006</strong> Tentang Kode Etik Jurnalistik Sebagai Peraturan Dewan Pers.</p>',
            'pedoman_media_siber' => '<p>Kemerdekaan berpendapat, kemerdekaan berekspresi, dan kemerdekaan pers adalah hak asasi manusia yang dilindungi Pancasila, Undang-Undang Dasar 1945, dan Deklarasi Universal Hak Asasi Manusia PBB. Keberadaan media siber di Indonesia juga merupakan bagian dari kemerdekaan berpendapat, kemerdekaan berekspresi, dan kemerdekaan pers.</p>
                <p>Media siber memiliki karakter khusus sehingga memerlukan pedoman agar pengelolaannya dapat dilaksanakan secara profesional, memenuhi fungsi, hak, dan kewajibannya sesuai Undang-Undang Nomor 40 Tahun 1999 tentang Pers dan Kode Etik Jurnalistik. Untuk itu Dewan Pers bersama organisasi pers, pengelola media siber, dan masyarakat menyusun Pedoman Pemberitaan Media Siber sebagai berikut:</p>
                <p><strong>1. Ruang Lingkup</strong></p>
                <p>a. Media Siber adalah segala bentuk media yang menggunakan wahana internet dan melaksanakan kegiatan jurnalistik, serta memenuhi persyaratan Undang-Undang Pers dan Standar Perusahaan Pers yang ditetapkan Dewan Pers.</p>
                <p>b. Isi Buatan Pengguna (User Generated Content) adalah segala isi yang dibuat dan atau dipublikasikan oleh pengguna media siber, antara lain, artikel, gambar, komentar, suara, video dan berbagai bentuk unggahan yang melekat pada media siber, seperti blog, forum, komentar pembaca atau pemirsa, dan bentuk lain.</p>
                <p><strong>2. Verifikasi dan Keberimbangan Berita</strong></p>
                <p>a. Pada prinsipnya setiap berita harus melalui verifikasi.</p>
                <p>b. Berita yang dapat merugikan pihak lain memerlukan verifikasi pada berita yang sama untuk memenuhi prinsip akurasi dan keberimbangan.</p>
                <p>c. Ketentuan dalam butir (a) di atas dikecualikan, dengan syarat:</p>
                <p>1) Berita benar-benar mengandung kepentingan publik yang bersifat mendesak;</p>
                <p>2) Sumber berita yang pertama adalah sumber yang jelas disebutkan identitasnya, kredibel dan kompeten;</p>
                <p>3) Subyek berita yang harus dikonfirmasi tidak diketahui keberadaannya dan atau tidak dapat diwawancarai;</p>
                <p>4) Media memberikan penjelasan kepada pembaca bahwa berita tersebut masih memerlukan verifikasi lebih lanjut yang diupayakan dalam waktu secepatnya. Penjelasan dimuat pada bagian akhir dari berita yang sama, di dalam kurung&nbsp; dan menggunakan huruf miring.</p>
                <p>d. Setelah memuat berita sesuai dengan butir (c), media wajib meneruskan upaya verifikasi, dan setelah verifikasi didapatkan, hasil verifikasi dicantumkan pada berita pemutakhiran (update) dengan tautan pada berita yang belum terverifikasi.</p>
                <p><strong>3. Isi Buatan Pengguna (User Generated Content)</strong></p>
                <p>a. Media siber wajib mencantumkan syarat dan ketentuan mengenai Isi Buatan Pengguna yang tidak bertentangan dengan Undang-Undang No. 40 tahun 1999 tentang Pers dan Kode Etik Jurnalistik, yang ditempatkan secara terang dan jelas.</p>
                <p>b. Media siber mewajibkan setiap pengguna untuk melakukan registrasi keanggotaan dan melakukan proses log-in terlebih dahulu untuk dapat mempublikasikan semua bentuk Isi Buatan Pengguna. Ketentuan mengenai log-in akan diatur lebih lanjut.</p>
                <p>c. Dalam registrasi tersebut, media siber mewajibkan pengguna memberi persetujuan tertulis bahwa Isi Buatan Pengguna yang dipublikasikan:</p>
                <p>1) Tidak memuat isi bohong, fitnah, sadis dan cabul;</p>
                <p>2) Tidak memuat isi yang mengandung prasangka dan kebencian terkait dengan suku, agama, ras, dan antar golongan (SARA), serta menganjurkan tindakan kekerasan;</p>
                <p>3) Tidak memuat isi diskriminatif atas dasar perbedaan jenis kelamin dan bahasa, serta tidak merendahkan martabat orang lemah, miskin, sakit, cacat jiwa, atau cacat jasmani.</p>
                <p>d. Media siber memiliki kewenangan mutlak untuk mengedit atau menghapus Isi Buatan Pengguna yang bertentangan dengan butir (c).</p>
                <p>e. Media siber wajib menyediakan mekanisme pengaduan Isi Buatan Pengguna yang dinilai melanggar ketentuan pada butir (c). Mekanisme tersebut harus disediakan di tempat yang dengan mudah dapat diakses pengguna.</p>
                <p>f. Media siber wajib menyunting, menghapus, dan melakukan tindakan koreksi setiap Isi Buatan Pengguna yang dilaporkan dan melanggar ketentuan butir (c), sesegera mungkin secara proporsional selambat-lambatnya 2 x 24 jam setelah pengaduan diterima.</p>
                <p>g. Media siber yang telah memenuhi ketentuan pada butir (a), (b), (c), dan (f) tidak dibebani tanggung jawab atas masalah yang ditimbulkan akibat pemuatan isi yang melanggar ketentuan pada butir (c).</p>
                <p>h. Media siber bertanggung jawab atas Isi Buatan Pengguna yang dilaporkan bila tidak mengambil tindakan koreksi setelah batas waktu sebagaimana tersebut pada butir (f).</p>
                <p><strong>4. Ralat, Koreksi, dan Hak Jawab</strong></p>
                <p>a. Ralat, koreksi, dan hak jawab mengacu pada Undang-Undang Pers, Kode Etik Jurnalistik, dan Pedoman Hak Jawab yang ditetapkan Dewan Pers.</p>
                <p>b. Ralat, koreksi dan atau hak jawab wajib ditautkan pada berita yang diralat, dikoreksi atau yang diberi hak jawab.</p>
                <p>c. Di setiap berita ralat, koreksi, dan hak jawab wajib dicantumkan waktu pemuatan ralat, koreksi, dan atau hak jawab tersebut.</p>
                <p>d. Bila suatu berita media siber tertentu disebarluaskan media siber lain, maka:</p>
                <p>1) Tanggung jawab media siber pembuat berita terbatas pada berita yang dipublikasikan di media siber tersebut atau media siber yang berada di bawah otoritas teknisnya;</p>
                <p>2) Koreksi berita yang dilakukan oleh sebuah media siber, juga harus dilakukan oleh media siber lain yang mengutip berita dari media siber yang dikoreksi itu;</p>
                <p>3) Media yang menyebarluaskan berita dari sebuah media siber dan tidak melakukan koreksi atas berita sesuai yang dilakukan oleh media siber pemilik dan atau pembuat berita tersebut, bertanggung jawab penuh atas semua akibat hukum dari berita yang tidak dikoreksinya itu.</p>
                <p>e. Sesuai dengan Undang-Undang Pers, media siber yang tidak melayani hak jawab dapat dijatuhi sanksi hukum pidana denda paling banyak Rp500.000.000 (Lima ratus juta rupiah).</p>
                <p><strong>5. Pencabutan Berita</strong></p>
                <p>a. Berita yang sudah dipublikasikan tidak dapat dicabut karena alasan penyensoran dari pihak luar redaksi, kecuali terkait masalah SARA, kesusilaan, masa depan anak, pengalaman traumatik korban atau berdasarkan pertimbangan khusus lain yang ditetapkan Dewan Pers.</p>
                <p>b. Media siber lain wajib mengikuti pencabutan kutipan berita dari media asal yang telah dicabut.</p>
                <p>c. Pencabutan berita wajib disertai dengan alasan pencabutan dan diumumkan kepada publik.</p>
                <p><strong>6. Iklan</strong></p>
                <p>a. Media siber wajib membedakan dengan tegas antara produk berita dan iklan.</p>
                <p>b. Setiap berita/artikel/isi yang merupakan iklan dan atau isi berbayar wajib mencantumkan keterangan &rdquo;advertorial&rdquo;, &rdquo;iklan&rdquo;, &rdquo;ads&rdquo;, &rdquo;sponsored&rdquo;, atau kata lain yang menjelaskan bahwa berita/artikel/isi tersebut adalah iklan.</p>
                <p><strong>7. Hak Cipta</strong></p>
                <p>Media siber wajib menghormati hak cipta sebagaimana diatur dalam peraturan perundang-undangan yang berlaku.</p>
                <p><strong>8. Pencantuman Pedoman</strong></p>
                <p>Media siber wajib mencantumkan Pedoman Pemberitaan Media Siber ini di medianya secara terang dan jelas.</p>
                <p><strong>9. Sengketa</strong></p>
                <p>Penilaian akhir atas sengketa mengenai pelaksanaan Pedoman Pemberitaan Media Siber ini diselesaikan oleh Dewan Pers.</p>
                <p><strong>Jakarta, 3 Februari 2012</strong></p>',
            'disclaimer' => '<p>Selamat datang di PONTIANAK KERAS, dengan mengakses dan menggunakan situs ini, Anda dianggap telah membaca, memahami, dan sesuai dengan ketentuan disclaimer.</p>
                <p><strong>1. Informasi Umum</strong></p>
                <p>PONTIANAK KERAS adalah portal berita digital yang berfokus menyajikan informasi Kriminal dan Peristiwa Kota Pontianak dan Kalimantan Barat.</p>
                <p>Semua konten yang disajikan di platform ini bertujuan untuk memberikan informasi, edukasi, dan hiburan kepada pembaca.</p>
                <p><strong>2. Akurasi Informasi</strong></p>
                <p>Kami berusaha menyajikan informasi yang akurat, terkini, dan faktual. Namun, PONTIANAK KERAS tidak memberikan jaminan atas kelengkapan, keakuratan, keandalan, kesesuaian, atau ketersediaan informasi yang dipublikasikan. Penggunaan informasi dari portal ini sepenuhnya menjadi tanggung jawab pembaca.</p>
                <p><strong>3. Sumber Berita</strong></p>
                <p>Berita yang ditampilkan di PONTIANAK KERAS berasal dari berbagai sumber termasuk:</p>
                <ul>
                <li>Liputan langsung jurnalis kami</li>
                <li>Keterangan resmi institusi pemerintah</li>
                <li>Konferensi pers</li>
                <li>Sumber terpercaya yang diverifikasi</li>
                <li>Keterangan dari pihak terkait</li>
                </ul>
                <p><strong>4. Opini dan Tanggung Jawab Redaksi</strong></p>
                <p>Opini yang ditampilkan dalam artikel opini, kolom, atau tajuk rencana mewakili pandangan pribadi penulis dan tidak selalu mencerminkan sikap resmi redaksi PONTIANAK KERAS .</p>
                <p><strong>5. Hak Cipta</strong></p>
                <p>Seluruh materi yang terdapat di PONTIANAK KERAS (teks, gambar, grafik, video, dan logo) dilindungi oleh hak cipta. Penggunaan ulang, reproduksi, atau distribusi tanpa izin tertulis dari Pontianak Keras dilarang.</p>
                <p><strong>6. Konten Pihak Ketiga</strong></p>
                <p>PONTIANAK KERAS&nbsp; dapat menampilkan tautan, iklan, atau konten dari pihak ketiga. Kami tidak bertanggung jawab atas ketersediaan, keakuratan, atau konten dari sumber eksternal tersebut.</p>
                <p><strong>7. Perubahan Informasi</strong></p>
                <p>Informasi di portal ini dapat berubah tanpa pemberitahuan sebelumnya. PONTIANAK KERAS&nbsp; berhak untuk mengubah, memperbarui, atau menghapus konten kapan saja sesuai kebijakan redaksi.</p>
                <p><strong>8. Batasan Tanggung Jawab</strong></p>
                <p>PONTIANAK KERAS&nbsp; dan stafnya tidak bertanggung jawab atas:</p>
                <p>Kerugian atau kerusakan yang timbul dari penggunaan informasi dari portal ini</p>
                <p>Keterlambatan, kesalahan, atau kelalaian dalam penyajian informasi</p>
                <p>Keputusan yang diambil berdasarkan informasi dari portal ini</p>
                <p><strong>9. Koreksi dan Klarifikasi</strong></p>
                <p>Jika terdapat kesalahan faktual dalam pemberitaan kami, silakan hubungi redaksi melalui email: pontianakkeras12@gmail.com untuk permintaan koreksi atau klarifikasi.</p>
                <p><strong>10. Hukum yang Berlaku</strong></p>
                <p>Disclaimer ini tunduk pada hukum Republik Indonesia. Segala sengketa yang timbul akan diselesaikan secara musyawarah, dan jika tidak tercapai kesepakatan, akan diselesaikan melalui pengadilan di Kota Pontianak.</p>
                <p><strong>Terakhir diperbarui</strong>: 4 Februari 2026</p>'
        ];

        foreach ($datas as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
