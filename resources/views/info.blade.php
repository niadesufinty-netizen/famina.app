<x-layout>
    <div class="info-page-container" style="font-family: 'Poppins', sans-serif; scroll-behavior: smooth;">
        
        <!-- Menu Navigasi Internal -->
        <div class="nav-sticky">
            <a href="#tentang">Tentang Kami</a>
            <a href="#kontak">Kontak</a>
            <a href="#syarat">Syarat & Ketentuan</a>
        </div>

        <!-- Section: Tentang Kami -->
        <section id="tentang" class="info-section">
            <h2 class="accent-title">Tentang Famina</h2>
            <div class="title-line"></div>
            <p class="description">

Kami adalah platform digital yang menyediakan layanan perhitungan Body Mass Index (BMI) untuk membantu pengguna memahami kondisi kesehatan tubuh secara sederhana dan cepat.

Aplikasi ini dibuat dengan tujuan meningkatkan kesadaran masyarakat tentang pentingnya menjaga berat badan ideal demi kesehatan yang lebih baik. Dengan fitur perhitungan BMI yang akurat dan riwayat data, pengguna dapat memantau perkembangan kondisi tubuh mereka dari waktu ke waktu.

Kami berkomitmen untuk memberikan layanan yang mudah digunakan, informatif, dan bermanfaat bagi semua kalangan, khususnya pelajar dan masyarakat umum.

Kami percaya bahwa langkah kecil seperti mengetahui BMI dapat menjadi awal menuju gaya hidup yang lebih sehat. Selain itu kami juga memberikan beberapa tips dan info kesehatan yang dapat dimanfaarkan oleh pengguna agar pola hidup mereka lebih sehat

Terima kasih telah menggunakan layanan kami.            </p>
            <div class="grid-box">
                <div class="info-card">
                    <h3>Visi</h3>
                    <p>Menjadi pendamping kesehatan digital yang terpercaya bagi seluruh keluarga Indonesia.</p>
                </div>
                <div class="info-card">
                    <h3>Misi</h3>
                    <p>Menyediakan edukasi dan alat ukur kesehatan yang mudah digunakan, aman, dan edukatif.</p>
                </div>
            </div>
        </section>

        <!-- Section: Kontak -->
        <section id="kontak" class="info-section alternate-bg">
            <div class="container-narrow">
                <h2 class="section-title">Hubungi Kami</h2>
                <div class="contact-grid">
                    <div class="contact-item">
                        <div class="icon">📍</div>
                        <h4>Alamat</h4>
                        <p>Laboratorium PPLG, Gedung Famina Hub, Semarang.</p>
                    </div>
                    <div class="contact-item">
                        <div class="icon">📧</div>
                        <h4>Email</h4>
                        <p>support@famina.test</p>
                    </div>
                    <div class="contact-item">
                        <div class="icon">📞</div>
                        <h4>Telepon</h4>
                        <p>+62 812 3456 7890</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Syarat & Ketentuan -->
        <section id="syarat" class="info-section">
            <h2 class="section-title">Syarat & Ketentuan</h2>
            <p>Dengan menggunakan aplikasi ini, Anda menyatakan telah membaca, memahami, dan menyetujui seluruh ketentuan yang berlaku.
               </p>
            <div class="legal-box">
                <div class="legal-item">
                    <h4>1. Penggunaan Layanan</h4>
                    <p> Aplikasi ini digunakan sebagai sarana informasi dan edukasi terkait perhitungan BMI, dan tidak menggantikan saran medis profesional dari dokter atau ahli gizi.</p>
                </div>
                <div class="legal-item">
                    <h4>2. Keakuratan Data</h4>
                    <p>   Pengguna bertanggung jawab atas kebenaran data yang dimasukkan. Hasil BMI bergantung pada data tersebut.
                         </p>
                </div>
                <div class="legal-item">
                    <h4>3. Privasi dan data</h4>
                    <p>Kami berkomitmen menjaga keamanan dan kerahasiaan data pengguna.
</p>
                </div>
                <div class="legal-item">
                    <h4>4. Batasan Tanggung Jawab</h4>
                    <p>Keputusan yang diambil berdasarkan hasil aplikasi menjadi tanggung jawab pengguna.

</p>             <div class="legal-item">
                    <h4>5. Perubahan Layanan</h4>
                <p>Kami dapat melakukan pembaruan untuk meningkatkan kualitas layanan.
</p>
                <div class="legal-item">
                    <h4>6. Ketentuan Pengguna</h4>
                    <p>   Aplikasi harus digunakan secara bijak dan tidak melanggar hukum.
</p>
             <div class="legal-item">
                    <h4>7.  Kontak </h4>
                    <p>Saran atau pertanyaan dapat disampaikan melalui email:

   <a href="mailto:williamspallehrino@gmail.com">famina@gmail.com</a> </p>

</h4>
                </div>
                <p class="update-text">Terakhir diperbarui: 14 April 2024</p>
            </div>
        </section>


    <style>
        /* Variabel Warna supaya nyambung ke Dark Mode */
        :root {
            --info-bg: var(--bg-color, #ffffff);
            --info-text: var(--text-color, #2d3436);
            --info-muted: var(--text-muted, #636e72);
            --info-card-bg: var(--card-bg, #fdfdfd);
            --info-accent: #ff9fb5;
        }

        .info-page-container {
            background-color: var(--info-bg);
            color: var(--info-text);
            transition: background 0.3s ease, color 0.3s ease;
        }

        .nav-sticky {
            background: var(--info-bg);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .nav-sticky a {
            margin: 0 15px;
            text-decoration: none;
            color: var(--info-muted);
            font-weight: 600;
            font-size: 14px;
            transition: color 0.3s;
        }

        .nav-sticky a:hover {
            color: var(--info-accent);
        }

      
        .info-section {
    scroll-margin-top: 80px; 
}

html {
    scroll-behavior: smooth;
}

        .alternate-bg {
            background: rgba(0,0,0,0.02);
            max-width: 100% !important;
        }

        .accent-title {
            color: var(--info-accent);
            font-weight: 800;
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .section-title {
            font-weight: 800;
            font-size: 2.2rem;
            text-align: center;
            margin-bottom: 40px;
        }

        .title-line {
            width: 80px;
            height: 5px;
            background: var(--info-accent);
            margin: 0 auto 30px;
            border-radius: 50px;
        }

        .description {
            line-height: 1.8;
            color: var(--info-muted);
            font-size: 1.1rem;
            text-align: center;
        }

        .grid-box {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .info-card {
            background: rgba(255, 159, 181, 0.1);
            padding: 30px;
            border-radius: 20px;
            text-align: center;
        }

        .info-card h3 { color: var(--info-accent); margin-bottom: 10px; }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            text-align: center;
        }

        .contact-item .icon { font-size: 30px; margin-bottom: 10px; }
        .contact-item p { color: var(--info-muted); font-size: 14px; }

        .legal-box {
            background: var(--info-card-bg);
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid rgba(0,0,0,0.05);
        }

        .legal-item h4 { color: var(--info-accent); margin-bottom: 10px; }
        .legal-item p { color: var(--info-muted); font-size: 14px; line-height: 1.6; margin-bottom: 20px; }

        .update-text {
            font-size: 12px;
            color: var(--info-muted);
            font-style: italic;
            margin-top: 30px;
            border-top: 1px solid rgba(0,0,0,0.05);
            padding-top: 20px;
        }

    
        .container-narrow { max-width: 800px; margin: 0 auto; }

        
    </style>
</x-layout>