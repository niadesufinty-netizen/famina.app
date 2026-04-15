<x-layout>
    <style>
        :root {
            --warna-bingkai: #ff9fb5; /* Default */
            --bg-kartu: #ffffff;
            --teks-utama: #333333;
            --bg-input: #f8f9fa;
        }

        /* Tema Gelap Khusus Jika Pilih Hitam */
        [data-mode="dark"] {
            --bg-kartu: #1e1e1e;
            --teks-utama: #f5f5f5;
            --bg-input: #2d2d2d;
        }

        .container-profil { max-width: 450px; margin: 30px auto; padding: 20px; font-family: 'Poppins', sans-serif; }
        .kartu-profil { background: var(--bg-kartu); border-radius: 20px; padding: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); color: var(--teks-utama); text-align: center; }
        
        /* Foto Profil */
        .bingkai-foto { 
            width: 120px; height: 120px; margin: 0 auto 15px; border-radius: 50%; 
            border: 4px solid var(--warna-bingkai); padding: 5px; position: relative; 
        }
        .foto-asli { width: 100%; height: 100%; border-radius: 50%; object-fit: cover; }
        
        /* Input & Teks */
        .input-nama { font-size: 20px; font-weight: bold; border: none; background: transparent; text-align: center; color: var(--teks-utama); width: 100%; outline: none; }
        .label-kecil { display: block; text-align: left; font-size: 11px; font-weight: bold; color: #888; margin: 15px 0 5px; }
        .box-input { width: 100%; padding: 12px; border-radius: 10px; border: none; background: var(--bg-input); color: var(--teks-utama); }

        /* Riwayat */
        .item-riwayat { 
            background: var(--bg-input); border-radius: 12px; padding: 12px; margin-bottom: 10px; 
            border-left: 5px solid var(--warna-bingkai); text-align: left; cursor: pointer;
        }
        .detail-bmi { max-height: 0; overflow: hidden; transition: 0.3s; opacity: 0; font-size: 13px; }
        .item-riwayat.active .detail-bmi { max-height: 80px; opacity: 1; margin-top: 10px; padding-top: 10px; border-top: 1px dashed #999; }

        .btn-simpan { background: var(--warna-bingkai); color: white; border: none; width: 100%; padding: 12px; border-radius: 12px; font-weight: bold; margin-top: 20px; cursor: pointer; }
        .btn-hapus-akun { background: none; color: #ff4d6d; border: 1px solid #ff4d6d; padding: 8px; border-radius: 10px; font-size: 12px; margin-top: 30px; cursor: pointer; }

        /* Modal Tengah */
        .layar-modal { position: fixed; inset: 0; background: rgba(0,0,0,0.7); display: none; align-items: center; justify-content: center; z-index: 1000; padding: 20px; }
        .kotak-modal { background: var(--bg-kartu); padding: 20px; border-radius: 15px; width: 100%; max-width: 300px; text-align: center; }
    </style>

    <div class="container-profil">
        <div class="kartu-profil">
            <form action="/update-profil" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="bingkai-foto">
                    <img id="img-preview" src="{{ session('userFoto') ? asset('storage/' . session('userFoto')) : 'https://ui-avatars.com/api/?name='.urlencode(session('userName')) }}" class="foto-asli">
                    <label for="pilih-foto" style="position:absolute; bottom:0; right:0; background:var(--warna-bingkai); color:white; width:28px; height:28px; border-radius:50%; display:flex; align-items:center; justify-content:center; cursor:pointer; border:2px solid var(--bg-kartu);">📷</label>
                    <input type="file" id="pilih-foto" name="foto_profil" hidden onchange="preview(this)">
                </div>

                <input type="text" name="name" value="{{ session('userName') }}" class="input-nama">
                
                <div style="text-align: left;">
                    <label class="label-kecil">BIO</label>
                    <textarea name="bio" class="box-input" rows="2">{{ session('userBio') }}</textarea>

                    <label class="label-kecil">PILIH TEMA BINGKAI</label>
                    <select name="border_color" id="pilihWarna" class="box-input" onchange="gantiTema(this.value)">
                        <option value="#ff9fb5">🌸 Sakura Pink</option>
                        <option value="#74ebd5">🌊 Ocean Blue</option>
                        <option value="#FFD700">✨ Gold</option>
                        <option value="#333333">🌙 Midnight Black</option>
                    </select>

                    <label class="label-kecil">RIWAYAT BMI</label>
                    @forelse($riwayat as $item)
                        <div class="item-riwayat" onclick="this.classList.toggle('active')">
                            <div style="display:flex; justify-content:space-between;">
                                <span><b>{{ $item->status }}</b><br><small>{{ $item->created_at->format('d/m/Y') }}</small></span>
                                <b style="color: var(--warna-bingkai)">{{ $item->skor_bmi }}</b>
                            </div>
                            <div class="detail-bmi">
                                <div style="display:flex; justify-content:space-between; align-items:center;">
                                    <span>TB: {{ $item->tinggi_badan }}cm | BB: {{ $item->berat_badan }}kg</span>
                                    <button type="button" onclick="event.stopPropagation(); bukaModal('riwayat-{{ $item->id }}')" style="background:none; border:none; cursor:pointer;">🗑️</button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p style="font-size: 12px; color: #999; text-align: center;">Belum ada data.</p>
                    @endforelse
                </div>

                <button type="submit" class="btn-simpan">Simpan Perubahan</button>
            </form>

            <button type="button" class="btn-hapus-akun" onclick="bukaModal('form-hapus-akun')">Hapus Akun Permanen</button>
        </div>
    </div>

    <div class="layar-modal" id="modalHapus">
        <div class="kotak-modal">
            <h3 style="margin-bottom: 10px;">Hapus Data?</h3>
            <p style="font-size: 12px; color: #888; margin-bottom: 20px;">Tindakan ini permanen.</p>
            <div style="display:flex; gap:10px;">
                <button onclick="tutupModal()" style="flex:1; padding:10px; border-radius:8px; border:none; background:#eee;">Batal</button>
                <button id="gasHapus" style="flex:1; padding:10px; border-radius:8px; border:none; background:#ff4d6d; color:white; font-weight:bold;">Hapus</button>
            </div>
        </div>
    </div>

    <div style="display:none;">
        @foreach($riwayat as $item)
            <form id="riwayat-{{ $item->id }}" action="/hapus-riwayat/{{ $item->id }}" method="POST">@csrf @method('DELETE')</form>
        @endforeach
        <form id="form-hapus-akun" action="/hapus-akun" method="POST">@csrf @method('DELETE')</form>
    </div>

    <script>
        let targetFormId = null;

        function bukaModal(id) {
            targetFormId = id;
            document.getElementById('modalHapus').style.display = 'flex';
        }

        function tutupModal() {
            document.getElementById('modalHapus').style.display = 'none';
        }

        document.getElementById('gasHapus').onclick = function() {
            if(targetFormId) document.getElementById(targetFormId).submit();
        }

        function gantiTema(warna) {
            document.documentElement.style.setProperty('--warna-bingkai', warna);
            localStorage.setItem('tema_user', warna);
            
            // Mode Gelap Jika Hitam
            if(warna === '#333333') {
                document.documentElement.setAttribute('data-mode', 'dark');
            } else {
                document.documentElement.removeAttribute('data-mode');
            }

            // Langsung coba ubah navbar jika ada di halaman ini
            const nav = document.querySelector('.nav-profile-img');
            if(nav) nav.style.borderColor = warna;
        }

        function preview(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => document.getElementById('img-preview').src = e.target.result;
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const saved = localStorage.getItem('tema_user') || '#ff9fb5';
            document.getElementById('pilihWarna').value = saved;
            gantiTema(saved);
        });
    </script>
</x-layout>