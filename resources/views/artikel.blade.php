<x-layout>
    <div style="max-width: 800px; margin: 40px auto; padding: 20px; font-family: 'Poppins', sans-serif;">
        
        <a href="/daftarartikel" style="text-decoration: none; color: #ff9fb5; font-weight: bold; font-size: 14px; display: inline-block; margin-bottom: 20px;">
            ← Kembali ke Daftar Artikel
        </a>

        <div style="margin-bottom: 30px;">
            <span style="background: rgba(255, 159, 181, 0.1); color: #ff9fb5; padding: 5px 15px; border-radius: 50px; font-size: 12px; font-weight: 800; text-transform: uppercase;">
                {{ $artikel->kategori }}
            </span>
            <h1 style="color: #2d3436; margin-top: 15px; font-size: 2.5rem; line-height: 1.2; font-weight: 800;">
                {{ $artikel->judul }}
            </h1>
            <p style="color: #636e72; font-size: 14px; margin-top: 10px;">
Diterbitkan pada: {{ date('d M Y', strtotime($artikel->created_at)) }}            </p>
        </div>

        <div style="width: 100%; height: 450px; border-radius: 30px; overflow: hidden; margin-bottom: 40px; box-shadow: 0 15px 35px rgba(255, 159, 181, 0.2);">
            <img src="{{ $artikel->gambar }}" style="width: 100%; height: 100%; object-fit: cover;" alt="{{ $artikel->judul }}">
        </div>

        <div style="color: #2d3436; line-height: 1.8; font-size: 1.15rem; text-align: justify; background: white; padding: 10px; border-radius: 15px;">
            {!! nl2br(e($artikel->konten)) !!}
        </div>

        <div style="margin-top: 60px; padding: 40px; background: linear-gradient(135deg, #f1f2f6, #ffffff); border-radius: 30px; text-align: center; border: 2px dashed #ff9fb5;">
            <h3 style="color: #2d3436; margin-bottom: 15px; font-weight: 800;">Sudah Cek BMI Kamu Hari Ini?</h3>
            <p style="color: #636e72; margin-bottom: 25px;">Pastikan berat badanmu tetap ideal dengan rutin mengecek skor BMI di Famina.</p>
            <a href="/bmi" style="display: inline-block; padding: 15px 35px; background: #ff9fb5; color: white; text-decoration: none; border-radius: 15px; font-weight: bold; box-shadow: 0 10px 20px rgba(255, 159, 181, 0.3);">
                Cek BMI Sekarang
            </a>
            
        </div>


    </div>

    
</x-layout>