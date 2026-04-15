<x-layout>
    <style>
        .hero-container {
            min-height: calc(100vh - 150px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            font-family: 'Poppins', sans-serif;
        }

        .hero-card {
            background-color: var(--bg-card);
            padding: 40px 30px;
            border-radius: 35px;
            text-align: center;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 10px 30px var(--shadow);
            border: 1px solid rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .hero-card img {
            width: 100%;
            max-width: 450px;
            height: auto;
            border-radius: 20px;
            margin-bottom: 25px;
            object-fit: cover;
        }

        .hero-card h1 {
            font-size: 1.6rem;
            margin-bottom: 10px;
            color: var(--text-main);
            font-weight: 800;
        }

        .hero-card p {
            color: var(--text-main);
            opacity: 0.6;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .bmi-stats-container {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .stat-box {
            padding: 20px;
            border-radius: 22px;
            flex: 1;
            min-width: 160px;
            text-decoration: none;
            color: var(--text-main);
            display: flex;
            flex-direction: column;
            gap: 5px;
            transition: all 0.3s ease;
            text-align: left;
            background-color: var(--input-bg);
            border: 1px solid rgba(0,0,0,0.03);
        }

        .stat-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px var(--shadow);
        }

        .stat-label {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.5;
        }

        .stat-value {
            font-size: 20px;
            font-weight: 900;
            color: var(--text-main);
        }

        .stat-hint {
            font-size: 9px;
            font-weight: 600;
            text-transform: uppercase;
            opacity: 0.4;
        }

        @media (max-width: 480px) {
            .hero-card { padding: 30px 20px; }
            .bmi-stats-container { flex-direction: column; }
        }
    </style>

    <div class="hero-container">
        <div class="hero-card animate__animated animate__fadeInUp">
            <img src="{{ asset('img/hh.png') }}" alt="FamiHealth Welcome">
            
            <h1>Selamat Datang</h1>
            <p>Pantau kesehatan tubuh Anda secara berkala <br> melalui perhitungan BMI yang akurat.</p>
            
            <div class="bmi-stats-container">
                <a href="/bmi" class="stat-box">
                    <span class="stat-label">Skor BMI</span>
                    <span class="stat-value">
                        {{ session('last_bmi') ?? '0.0' }}
                    </span>
                    <span class="stat-hint">Klik untuk hitung</span>
                </a>

                <div class="stat-box">
                    <span class="stat-label">Status</span>
                    <span class="stat-value" style="font-size: 14px;">
                        {{ session('bmi_status') ?? 'Belum ada data' }}
                    </span>
                    <span class="stat-hint">Terupdate otomatis</span>
                </div>
            </div>
        </div>
    </div>
</x-layout>