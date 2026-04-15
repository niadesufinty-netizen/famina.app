<x-layout>
    <style>
        .bmi-wrapper {
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            font-family: 'Poppins', sans-serif;
        }

        .bmi-container {
            background-color: var(--bg-card);
            color: var(--text-main);
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 10px 30px var(--shadow);
            border: 1px solid rgba(0,0,0,0.05);
        }

        .famina-title {
            text-align: center;
            color: var(--text-main);
            margin-bottom: 30px;
            font-size: 1.5rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .gender-selection {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 25px;
        }

        .gender-item {
            cursor: pointer;
            text-align: center;
            transition: 0.3s;
            opacity: 0.4;
            filter: grayscale(1);
        }

        .gender-item img {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            border: 4px solid transparent;
            margin-bottom: 10px;
            background: var(--input-bg);
        }

        .gender-radio:checked + .gender-item {
            opacity: 1;
            filter: grayscale(0);
        }

        .gender-radio:checked + .gender-item img {
            border-color: var(--accent-pink);
            transform: scale(1.05);
        }

        .gender-radio { display: none; }

        .famina-form label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-main);
            font-weight: 600;
            font-size: 13px;
        }

        .famina-input {
            width: 100%;
            padding: 12px 18px;
            margin-bottom: 20px;
            background-color: var(--input-bg);
            color: var(--text-main);
            border: 2px solid transparent;
            border-radius: 15px;
            box-sizing: border-box;
            transition: 0.3s;
        }

        .famina-input:focus {
            outline: none;
            border-color: var(--accent-pink);
        }

        .btn-group {
            display: flex;
            gap: 12px;
        }

        .famina-button {
            flex: 2;
            padding: 15px;
            background-color: var(--accent-pink);
            color: white;
            border: none;
            border-radius: 15px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-reset {
            flex: 1;
            padding: 15px;
            background-color: var(--input-bg);
            color: var(--text-main);
            border-radius: 15px;
            text-decoration: none;
            text-align: center;
            font-size: 14px;
        }

        .result-card {
            margin-top: 35px;
            padding-top: 30px;
            border-top: 1px solid rgba(128,128,128,0.2);
            text-align: center;
            scroll-margin-top: 20px;
        }
        

        .result-gif {
            width: 120px;
            height: auto;
            margin-bottom: 15px;
            border-radius: 12px;
        }

        .bmi-score {
            font-size: 3rem;
            font-weight: 900;
            display: block;
        }

        .bmi-bar-bg {
            width: 100%;
            background-color: var(--input-bg);
            height: 12px;
            border-radius: 10px;
            margin: 20px 0;
            overflow: hidden;
        }

        .bmi-bar-fill { height: 100%; transition: width 1s ease; }
        .bar-low { background: #AEC6CF; width: 30%; }
        .bar-ideal { background: #B2D8B2; width: 60%; }
        .bar-high { background: #FFB3B3; width: 100%; }

        .btn-back-home {
            display: block;
            text-align: center;
            margin-top: 25px;
            font-size: 12px;
            color: var(--text-main);
            opacity: 0.5;
            text-decoration: none;
        }
    </style>

    <div class="bmi-wrapper">
        <div class="bmi-container">
            <h1 class="famina-title">Famina BMI</h1>

            <form action="/hitung-bmi" method="POST" class="famina-form" id="bmiForm">
                @csrf 
                
                <label style="text-align: center; margin-bottom: 20px;">Pilih Jenis Kelamin</label>
                <div class="gender-selection">
                    <input type="radio" name="gender" value="Laki-laki" id="male" class="gender-radio" {{ old('gender') == 'Laki-laki' ? 'checked' : '' }}>
                    <label for="male" class="gender-item">
                        <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Sara" alt="L">
                        <span style="display:block; font-size:12px; font-weight:700;">Laki-laki</span>
                    </label>

                    <input type="radio" name="gender" value="Perempuan" id="female" class="gender-radio" {{ old('gender') == 'Perempuan' ? 'checked' : '' }}>
                    <label for="female" class="gender-item">
                        <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Oliver" alt="P">
                        <span style="display:block; font-size:12px; font-weight:700;">Perempuan</span>
                    </label>
                </div>

                <label>Berat Badan (kg)</label>
                <input type="number" name="berat" id="inputBerat" class="famina-input" step="0.1" min="10" max="250" value="{{ old('berat') }}">

                <label>Tinggi Badan (cm)</label>
                <input type="number" name="tinggi" id="inputTinggi" class="famina-input" step="0.1" min="50" max="250" value="{{ old('tinggi') }}">

                <div class="btn-group">
                    <button type="submit" class="famina-button">Hitung & Simpan</button>
                    <a href="/bmi" class="btn-reset">Reset</a>
                </div>
            </form>

            @if(session('skor'))
                @php
                    $skor = session('skor');
                    if($skor < 18.5) {
                        $barClass = 'bar-low';
                        $gifSource = 'https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExNHJndXh3eXF4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4JmVwPXYxX2ludGVybmFsX2dpZl9ieV9pZCZjdD1n/Tgydfib4aU8Jt4ZS9v/giphy.gif';
                    } elseif($skor < 25) {
                        $barClass = 'bar-ideal';
                        $gifSource = 'https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExNXN4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4JmVwPXYxX2ludGVybmFsX2dpZl9ieV9pZCZjdD1n/VgBitY2D2dCSZst6k0/giphy.gif';
                    } else {
                        $barClass = 'bar-high';
                        $gifSource = 'https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExNHJndXh3eXF4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4JmVwPXYxX2ludGVybmFsX2dpZl9ieV9pZCZjdD1n/Tgydfib4aU8Jt4ZS9v/giphy.gif';
                    }
                @endphp

                <div class="result-card" id="hasil-bmi">
                    <img src="{{ $gifSource }}" alt="Status" class="result-gif">
                    <span class="bmi-score">{{ $skor }}</span>
                    <div class="bmi-bar-bg">
                        <div class="bmi-bar-fill {{ $barClass }}"></div>
                    </div>
                    <p style="font-weight:800; text-transform:uppercase;">{{ session('status') }}</p>
                </div>
            @endif
              
            <a href="/" class="btn-back-home">Kembali ke Beranda</a>
        </div>
    </div>
    <div style="text-align: center; margin-top: 30px;">
    <a href="/daftarartikel" style="text-decoration: none; color: #636e72; font-size: 14px; font-weight: 600;">
        Lihat Semua Tips Kesehatan →
    </a>
</div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('bmiForm').addEventListener('submit', function(e) {
            const gender = document.querySelector('input[name="gender"]:checked');
            const berat = document.getElementById('inputBerat').value;
            const tinggi = document.getElementById('inputTinggi').value;

            if (!gender) {
                e.preventDefault();
                Swal.fire({
                    title: 'Oops!',
                    text: 'Pilih jenis kelamin terlebih dahulu ya!',
                    imageUrl: 'https://media.giphy.com/media/iiOxDxa0KNYZnsqP3n/giphy.gif',
                    imageWidth: 200,
                    showCloseButton: true,
                    confirmButtonColor: '#ff9fb5'
                });
                return;
            }

            if (!berat || !tinggi) {
                e.preventDefault();
                Swal.fire({
                    title: 'Data Belum Lengkap!',
                    text: 'Isi berat dan tinggi badan kamu dulu ya!',
                    imageUrl: 'https://media.giphy.com/media/SvjrBlIFVcTawAASSP/giphy.gif',
                    imageWidth: 200,
                    showCloseButton: true,
                    confirmButtonColor: '#ff9fb5'
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const target = document.getElementById('hasil-bmi');
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    </script>
</x-layout>