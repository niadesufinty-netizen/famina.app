<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FamiHealth | Hitung BMI</title>
    <link rel="manifest" href="/manifest.json">
    
    <link rel="icon" type="image/png" href="{{ asset('img/log.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-body: #F7FBFC;
            --bg-card: #FFFFFF;
            --text-main: #4A4A4A;
            --warna-aksen: #ff9fb5; 
            --accent-blue: #b8edf3; 
            --input-bg: #F0F4F8;
            --shadow: rgba(0,0,0,0.05);
            --nav-inactive: #A0AEC0; 
            --nav-active: #2D3748;   
        }

        [data-theme="dark"] {
            --bg-body: #121826;
            --bg-card: #1E293B;
            --text-main: #E2E8F0;
            --accent-blue: #2D3748;
            --input-bg: #334155;
            --shadow: rgba(0,0,0,0.3);
            --nav-inactive: #718096;
            --nav-active: #FFFFFF;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: background 0.3s ease;
            padding-bottom: 80px; 
        }

        header {
            background-color: var(--bg-card);
            padding: 10px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
            gap: 10px;
            transition: transform 0.3s ease-in-out, background 0.3s ease;
        }

        .header-hidden { transform: translateY(-100%); }
        .header-left { display: flex; align-items: center; gap: 10px; flex-shrink: 0; }
        .logo-wrapper { display: flex; align-items: center; gap: 8px; text-decoration: none; }
        .temp-logo-svg { width: 30px; height: 30px; object-fit: contain; }
        .logo-text { font-size: 1.2rem; font-weight: 800; letter-spacing: -0.5px; color: var(--text-main); }
        .logo-text span { color: var(--warna-aksen); }

        .nav-center { flex: 1; display: flex; justify-content: center; }
        .search-wrapper { width: 100%; max-width: 450px; display: flex; justify-content: flex-end; position: relative; }
        .search-box { display: flex; align-items: center; background: var(--input-bg); border-radius: 20px; padding: 5px 10px; transition: all 0.3s ease; width: 40px; overflow: hidden; }
        .search-box input { border: none; background: none; outline: none; padding: 5px; color: var(--text-main); width: 0; font-size: 14px; transition: width 0.3s ease; }
        .search-btn { background: none; border: none; cursor: pointer; color: var(--text-main); display: flex; align-items: center; padding: 5px; flex-shrink: 0; }

        .nav-right { display: flex; align-items: center; gap: 10px; flex-shrink: 0; }
        .btn-masuk { background-color: var(--warna-aksen); color: #fff; padding: 7px 15px; border-radius: 20px; text-decoration: none; font-weight: 600; font-size: 12px; transition: 0.3s; }

        .nav-profile-img {
            width: 32px; height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--warna-aksen);
            transition: 0.3s;
        }

        .dropdown-container { position: relative; }
        .hamburger-btn { background: none; border: none; font-size: 22px; cursor: pointer; color: var(--text-main); display: flex; align-items: center; }
        .dropdown-menu {
            display: none; position: absolute; left: 0; top: 40px;
            background: var(--bg-card); min-width: 200px;
            border-radius: 12px; box-shadow: 0 10px 25px var(--shadow);
            overflow: hidden; border: 1px solid rgba(0,0,0,0.05);
        }
        .dropdown-menu a, .dropdown-menu button {
            display: block; width: 100%; padding: 10px 18px;
            text-decoration: none; color: var(--text-main);
            font-size: 13px; text-align: left; background: none; border: none; cursor: pointer;
        }
        .dropdown-menu a:hover { background: var(--accent-blue); color: #333; }
        .show { display: block !important; }

        .mobile-nav {
            position: fixed; bottom: 15px; left: 50%; transform: translateX(-50%);
            width: 90%; max-width: 400px; height: 65px;
            background-color: var(--bg-card); display: flex;
            justify-content: space-around; align-items: center;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1); z-index: 1001; 
            border-radius: 30px; border: 1px solid rgba(0,0,0,0.05);
        }

        .nav-item { display: flex; flex-direction: column; align-items: center; text-decoration: none; color: var(--nav-inactive); font-size: 10px; font-weight: 600; transition: 0.3s; }
        .nav-item svg { width: 22px; height: 22px; margin-bottom: 4px; fill: none; stroke: var(--nav-inactive); stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; transition: 0.3s; }
        
        .nav-item.active { color: var(--nav-active); }
        .nav-item.active svg { stroke: var(--warna-aksen); stroke-width: 2.5; }

        @media (max-width: 600px) {
            .search-box.active { width: 100%; }
            .search-box.active input { width: 100%; padding: 5px 10px; }
            .nav-user-name { display: none; }
        }
        @media (min-width: 601px) {
            .search-box { width: 100%; }
            .search-box input { width: 100%; padding: 5px 10px; }
        }

        main { flex: 1; width: 100%; max-width: 1200px; margin: 0 auto; padding: 20px; }
        .wave-container { width: 100%; line-height: 0; margin-top: 50px; }
        .wave-container svg { position: relative; display: block; width: calc(100% + 1.3px); height: 70px; }
        .wave-fill { fill: var(--bg-card); }

        .search-suggestions {
            position: absolute; top: 100%; left: 0; right: 0;
            background: var(--bg-card); border-radius: 10px;
            box-shadow: 0 4px 12px var(--shadow); display: none;
            z-index: 999999; margin-top: 5px; overflow: hidden;
            border: 1px solid rgba(0,0,0,0.05);
        }
        .suggestion-item { padding: 10px 15px; font-size: 13px; cursor: pointer; border-bottom: 1px solid rgba(0,0,0,0.05); color: var(--text-main); }
        .suggestion-item:hover { background: var(--accent-blue); }
        
        footer { background-color: var(--bg-card); padding: 40px 5%; margin-bottom: 80px; }
        .footer-content { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 30px; max-width: 1200px; margin: 0 auto; }
        .footer-section h4 { color: var(--warna-aksen); margin-bottom: 15px; font-size: 16px; }
        .footer-section p { font-size: 12px; opacity: 0.8; line-height: 1.6; }
        .footer-section a { display: block; color: var(--text-main); text-decoration: none; font-size: 13px; margin-bottom: 8px; opacity: 0.7; }
        .footer-section a:hover { opacity: 1; color: var(--warna-aksen); }
        .footer-bottom { max-width: 1200px; margin: 30px auto 0; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05); text-align: center; font-size: 11px; opacity: 0.6; }
    </style>
</head>
<body>

    <header id="mainHeader">
        <div class="header-left">
            <div class="dropdown-container">
                <button class="hamburger-btn" onclick="toggleMenu()">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                </button>
                <div class="dropdown-menu" id="myDropdown">
                    <button onclick="toggleTheme()">○ Ganti Mode</button>
                    <a href="/">— Beranda</a>
                    <a href="/profil">— Profil</a>
                    <a href="/daftarartikel">— Artikel</a> 
                    <hr style="opacity: 0.1;">
                    <a href="{{ url('/info#syarat') }}">Syarat dan Privasi</a>
                    <a href="{{ url('/info#tentang') }}">Tentang Kami</a>
                    <a href="{{ url('/info#kontak') }}">Kontak</a>
                    <a href="https://saweria.co/Famihealth" target="_blank" style="color: #e5a00d;">— Dukung Kami</a>
                    <hr style="opacity: 0.1;">
                    @if(session('userName'))
                        <a href="/logout" style="color: #FF4D4D;">✕ Keluar</a>
                    @else
                        <a href="/daftar">+ Daftar Akun</a>
                    @endif
                </div>
            </div>
            <a href="/" class="logo-wrapper">
                <img src="{{ asset('img/log.png') }}" alt="Logo" class="temp-logo-svg">
                <div class="logo-text">Fami<span>Health</span></div>
            </a>
        </div>

        <div class="nav-center">
            <div class="search-wrapper">
               <form action="/cari" method="GET" class="search-box" id="searchBox">
                <input type="text" name="q" placeholder="Cari info..." id="searchInput" autocomplete="off">
                <div id="searchSuggestions" class="search-suggestions"></div>
                <button type="button" class="search-btn" onclick="toggleSearch()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
               </form>
            </div>
        </div>

        <div class="nav-right">
            @if(session('userName'))
                <a href="/profil" style="display: flex; align-items: center; gap: 8px; text-decoration: none;">
                    <span class="nav-user-name" style="font-size: 11px; font-weight: 600; color: var(--text-main);">{{ session('userName') }}</span>
                    <img src="{{ session('userFoto') ? asset('storage/' . session('userFoto')) : 'https://ui-avatars.com/api/?name='.urlencode(session('userName')).'&background=FFB7C5&color=fff' }}" class="nav-profile-img" id="navAvatar">
                </a>
            @else
                <a href="/login" class="btn-masuk">Masuk</a>
            @endif
        </div>
    </header>

    <nav class="mobile-nav">
        <a href="/" class="nav-item" id="nav-home">
            <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            <span>Home</span>
        </a>
        <a href="/daftarartikel" class="nav-item" id="nav-artikel"> 
            <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
            <span>Artikel</span>
        </a>
        <a href="/bmi" class="nav-item" id="nav-bmi">
            <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line><line x1="12" y1="8" x2="12" y2="16"></line></svg>
            <span>BMI</span>
        </a>
        <a href="/profil" class="nav-item" id="nav-profil">
            <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <span>Profil</span>
        </a>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <div class="wave-container">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V0C41.4,17.48,84.15,35.62,127,47.88,181.55,63.49,239.36,69.57,321.39,56.44Z" class="wave-fill"></path>
        </svg>
    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>FamiHealth</h4>
                <p>Platform monitoring kesehatan keluarga mandiri. Pantau BMI dan dapatkan tips hidup sehat setiap hari.</p>
            </div>
            <div class="footer-section">
                <h4>Layanan</h4>
                <a href="/bmi">Kalkulator BMI</a>
                <a href="/daftarartikel">Artikel Sehat</a>
                <a href="/profil">Riwayat</a>
            </div>
            <div class="footer-section">
                <h4>Bantuan</h4>
                <a href="{{ url('/info#kontak') }}">Kontak Kami</a>
                <a href="https://saweria.co/Famihealth" target="_blank">Donasi Saweria</a>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2026 <strong>FamiHealth</strong> | Powered by Famina Team
        </div>
    </footer>

    <script>
        function sinkronkanWarna() {
            const warna = localStorage.getItem('warna_tema_bmi');
            if (warna) {
                document.documentElement.style.setProperty('--warna-aksen', warna);
                const fotoNavbar = document.getElementById('navAvatar');
                if (fotoNavbar) fotoNavbar.style.borderColor = warna;
            }
        }
        sinkronkanWarna();

        function handleActiveBottomNav() {
            const currentPath = window.location.pathname;
            document.querySelectorAll('.mobile-nav .nav-item').forEach(nav => nav.classList.remove('active'));
            if (currentPath === '/') document.getElementById('nav-home').classList.add('active');
            else if (currentPath.includes('artikel')) document.getElementById('nav-artikel').classList.add('active');
            else if (currentPath.includes('bmi')) document.getElementById('nav-bmi').classList.add('active');
            else if (currentPath.includes('profil')) document.getElementById('nav-profil').classList.add('active');
        }

        window.addEventListener('DOMContentLoaded', () => {
            handleActiveBottomNav();
            sinkronkanWarna();
        });

        let lastScrollTop = 0;
        const header = document.getElementById("mainHeader");
        window.addEventListener("scroll", function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop && scrollTop > 80) header.classList.add("header-hidden");
            else header.classList.remove("header-hidden");
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        });

        function toggleSearch() {
            const searchBox = document.getElementById("searchBox");
            const searchInput = document.getElementById("searchInput");
            if (window.innerWidth <= 600) {
                if (!searchBox.classList.contains("active")) {
                    searchBox.classList.add("active");
                    searchInput.focus();
                } else if (searchInput.value.trim() !== "") searchBox.submit();
                else searchBox.classList.remove("active");
            } else {
                if(searchInput.value.trim() !== "") searchBox.submit();
                else searchInput.focus();
            }
        }

        function toggleMenu() { document.getElementById("myDropdown").classList.toggle("show"); }

        function toggleTheme() {
            const html = document.documentElement;
            if (html.hasAttribute('data-theme')) {
                html.removeAttribute('data-theme');
                localStorage.setItem('theme', 'light');
            } else {
                html.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        (function() {
            const savedTheme = localStorage.getItem('theme'); 
            if (savedTheme === 'dark') document.documentElement.setAttribute('data-theme', 'dark');
        })();

        window.onclick = function(event) {
            if (!event.target.closest('.dropdown-container')) {
                const d = document.getElementById("myDropdown");
                if (d && d.classList.contains('show')) d.classList.remove('show');
            }
        }

        const searchInput = document.getElementById('searchInput');
        const suggestionsBox = document.getElementById('searchSuggestions');
        const dataSehat = ["Tips Hidup Sehat", "Makanan Sehat untuk Diet", "Cara Menjaga Jantung Sehat", "Pola Makan Sehat Anak", "Gaya Hidup Sehat 2026"];

        searchInput.addEventListener('input', function() {
            const value = this.value.toLowerCase();
            suggestionsBox.innerHTML = ''; 
            if (value.length > 0) {
                const filtered = dataSehat.filter(item => item.toLowerCase().includes(value));
                if (filtered.length > 0) {
                    suggestionsBox.style.display = 'block';
                    filtered.forEach(text => {
                        const div = document.createElement('div');
                        div.classList.add('suggestion-item');
                        div.textContent = text;
                        div.onclick = () => {
                            searchInput.value = text;
                            suggestionsBox.style.display = 'none';
                            document.getElementById('searchBox').submit();
                        };
                        suggestionsBox.appendChild(div);
                    });
                } else suggestionsBox.style.display = 'none';
            } else suggestionsBox.style.display = 'none';
        });

        document.addEventListener('click', (e) => {
            if (!e.target.closest('.search-wrapper')) suggestionsBox.style.display = 'none';
        });
    </script>
</body>
</html>