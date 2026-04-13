<x-layout>
    <div style="max-width: 450px; margin: 40px auto; background: var(--bg-card); padding: 35px; border-radius: 30px; box-shadow: 0 15px 35px var(--shadow);">
        <h2 style="text-align: center; margin-bottom: 10px;">Gabung Family Health 🌸</h2>
        <p style="text-align: center; font-size: 14px; opacity: 0.7; margin-bottom: 25px;">Mulai pantau kesehatan keluarga kamu sekarang.</p>
        
        <form action="{{ route('register.store')}}" method="POST" style="display: flex; flex-direction: column; gap: 18px;" enctype="multipart/form-data">
            @csrf
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label style="font-size: 14px; font-weight: 600;">Nama Lengkap</label>
                <input type="text" style="padding: 12px 18px; border-radius: 15px; border: 1.5px solid var(--accent-blue); background: var(--input-bg); color: var(--text-main); outline: none;">
            </div>

            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label style="font-size: 14px; font-weight: 600;">Email</label>
                <input type="email" style="padding: 12px 18px; border-radius: 15px; border: 1.5px solid var(--accent-blue); background: var(--input-bg); color: var(--text-main); outline: none;">
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label style="font-size: 14px; font-weight: 600;">Password</label>
                <input type="password"  style="padding: 12px 18px; border-radius: 15px; border: 1.5px solid var(--accent-blue); background: var(--input-bg); color: var(--text-main); outline: none;">
            </div>

             <div style="display: flex; flex-direction: column; gap: 5px;">
                <label style="font-size: 14px; font-weight: 600;">Tanggal Lahir</label>
                <input type="date"  style="padding: 12px 18px; border-radius: 15px; border: 1.5px solid var(--accent-blue); background: var(--input-bg); color: var(--text-main); outline: none;">
            </div>
            <label for="">Foto profil</label>
            <input type="file" name="foto_profil">
            

            <button type="submit" style="background: var(--accent-pink); color: #333; padding: 14px; border-radius: 15px; border: none; font-weight: 800; cursor: pointer; margin-top: 10px; font-size: 16px;">
                Daftar Sekarang ✨
            </button>
        </form>
        
        <p style="text-align: center; margin-top: 25px; font-size: 13px; opacity: 0.7;">
            Sudah punya akun? <a href="#" style="color: #805AD5; text-decoration: none; font-weight: 600;">Masuk di sini</a>
        </p>
    </div>
</x-layout>