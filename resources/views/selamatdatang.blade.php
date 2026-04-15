<x-layout>
    <style>
        .hero-container {
            min-height: calc(100vh - 150px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            font-family: 'Poppins', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .bg-blob {
            position: absolute;
            width: 400px;
            height: 400px;
            filter: blur(100px);
            border-radius: 50%;
            z-index: 0;
            opacity: 0.15;
            transition: all 0.5s ease;
        }

        .blob-1 {
            top: -100px;
            left: -100px;
            background-color: var(--accent-blue);
        }

        .blob-2 {
            bottom: -150px;
            right: -100px;
            background-color: var(--accent-pink);
        }

        .hero-card {
            background-color: var(--bg-card);
            padding: 50px 40px;
            border-radius: 40px;
            text-align: center;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 15px 40px var(--shadow);
            border: 1px solid rgba(0,0,0,0.03);
            transition: all 0.3s ease;
            position: relative;
            z-index: 10;
        }

        .welcome-gif {
            width: 120px;
            height: auto;
            border-radius: 20px;
            margin-bottom: 25px;
            opacity: 0.9;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .hero-card h1 {
            font-size: 1.8rem;
            margin-bottom: 12px;
            color: var(--text-main);
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .hero-card p {
            color: var(--text-main);
            opacity: 0.7;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 35px;
        }

        .bmi-stats-container {
            display: flex;
            gap: 18px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .stat-box {
            padding: 25px 20px;
            border-radius: 25px;
            flex: 1;
            min-width: 170px;
            text-decoration: none;
            color: var(--text-main);
            display: flex;
            flex-direction: column;
            gap: 6px;
            transition: all 0.3s ease;
            text-align: left;
            background-color: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .stat-box:hover {
            transform: translateY(-5px);
            background-color: rgba(255, 255, 255, 0.06);
            box-shadow: 0 10px 25px var(--shadow);
        }

        .stat-label {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            opacity: 0.5;
        }

        .stat-value {
            font-size: 22px;
            font-weight: 900;
            color: var(--text-main);
        }

        .stat-hint {
            font-size: 9px;
            font-weight: 600;
            text-transform: uppercase;
            opacity: 0.4;
        }

        [data-theme="dark"] .stat-box {
            background-color: rgba(0, 0, 0, 0.15);
        }

        @media (max-width: 550px) {
            .hero-card { padding: 40px 20px; }
            .bmi-stats-container { flex-direction: column; }
            .stat-box { min-width: 100%; }
        }
    </style>

    <div class="hero-container">
        <div class="bg-blob blob-1"></div>
        <div class="bg-blob blob-2"></div>

        <div class="hero-card animate__animated animate__fadeInUp">
            <img src="{{ asset('img/welcome.gif') }}" alt="Welcome" class="welcome-gif">
            
            <h1>Selamat Datang, {{ Auth::user()->name ?? 'User' }}</h1>
            <p>Pantau kesehatan tubuh Anda secara berkala <br> melalui perhitungan BMI yang akurat dan mudah dengan <strong>FamiHealth</strong></p>
            
            <div class="bmi-stats-container">
                <a href="/bmi" class="stat-box">
                    <span class="stat-label">Skor BMI</span>
                    <span class="stat-value">{{ session('last_bmi') ?? '0.0' }}</span>
                    <span class="stat-hint">Klik untuk hitung</span>
                </a>

                <div class="stat-box">
                    <span class="stat-label">Status</span>
                    <span class="stat-value" style="font-size: 15px;">{{ session('bmi_status') ?? 'Belum ada data' }}</span>
                    <span class="stat-hint">Terupdate otomatis</span>
                </div>
            </div>
        </div>
    </div>
</x-layout>