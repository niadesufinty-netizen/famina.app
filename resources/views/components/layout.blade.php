<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Health | Digital Health Center</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
        
        :root {
            --bg-body: #F7FBFC;
            --bg-card: #FFFFFF;
            --text-main: #4A4A4A;
            --accent-pink: #ff9fb5; 
            --accent-blue: #b8edf3; 
            --input-bg: #F0F4F8;
            --shadow: rgba(0,0,0,0.05);
        }

        
        [data-theme="dark"] {
            --bg-body: #121826;
            --bg-card: #1E293B;
            --text-main: #E2E8F0;
            --accent-pink: #6B46C1; 
            --accent-blue: #2D3748;
            --input-bg: #334155;
            --shadow: rgba(0,0,0,0.3);
        }

        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }


        header {
            background-color: var(--bg-card);
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

      
        .nav-left .btn-masuk {
            background-color: var(--accent-pink);
            color: #333;
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(255, 209, 220, 0.5);
        }

        .nav-left .btn-masuk:hover {
            transform: translateY(-2px);
            filter: brightness(0.9);
        }

        
        .nav-center {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            flex: 1;
            max-width: 500px;
        }

        .logo-text {
            font-size: 1.2rem;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .logo-text span {
            color: #FFB7C5;
        }

        .search-box {
            width: 100%;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 10px 20px;
            border-radius: 20px;
            border: none;
            background-color: var(--input-bg);
            color: var(--text-main);
            font-size: 14px;
            outline: none;
            border: 1px solid transparent;
        }

        .search-box input:focus {
            border: 1px solid var(--accent-pink);
            background-color: var(--bg-card);
        }

      
        .nav-right {
            position: relative;
        }

        .hamburger-btn {
            background: none;
            border: none;
            font-size: 28px;
            cursor: pointer;
            color: var(--text-main);
            padding: 5px;
        }

      
        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 50px;
            background-color: var(--bg-card);
            min-width: 200px;
            border-radius: 15px;
            box-shadow: 0 10px 25px var(--shadow);
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .dropdown-menu a, .dropdown-menu button {
            display: block;
            width: 100%;
            padding: 12px 20px;
            text-decoration: none;
            color: var(--text-main);
            font-size: 14px;
            text-align: left;
            background: none;
            border: none;
            cursor: pointer;
        }

        .dropdown-menu a:hover, .dropdown-menu button:hover {
            background-color: var(--accent-blue);
            color: #333;
        }

        
        footer {
            padding: 30px;
            text-align: center;
            font-size: 13px;
            opacity: 0.6;
            border-top: 1px solid rgba(0,0,0,0.05);
        }

        .show { display: block !important; }
        .nav-link-home {
          text-decoration: none;
          color: var(--text-main);
          font-size: 14px;
          font-weight: 600;
          padding: 5px 10px;
          border-radius: 10px;
        }

        .nav-link-home:hover {
          background-color: var(--accent-blue);
          color: #333;
        }
       

    </style>
</head>
<body>

    <header>
        <div class="nav-left">
      
            <a href="/daftar" class="btn-masuk">Daftar</a>
            
        </div>

        <div class="nav-center">
            <div class="logo-text">Fami<span>Health</span></div>
            <div class="search-box">
                <input type="text" placeholder="Cari info kesehatan...">
            </div>
        </div>

        <div class="nav-right" style="display: flex; align-items: center; gap: 20px;">

          <a href="/" class="nav-link-home">Home</a>
          <a href="/artikel" class="nav-link-home">Artikel</a> 


          <div style="position: relative;">
            <button class="hamburger-btn" onclick="toggleMenu()">☰</button>
            
            <div class="dropdown-menu" id="myDropdown">
                <button onclick="toggleTheme()"> Ganti Mode</button>
                <a href="/">Beranda</a>
                <a href="#">Profil</a>
                <a href="#">Riwayat BMI</a>
                <a href="#"> Tentang Kami</a>
                <a href="#">Privasi</a>
                <a href="">Kontak</a>
                <hr style="opacity: 0.1;">
                <a href="#" style="color: #FF4D4D;"> Keluar</a>
            </div>
        </div>
</div>
    </header>
 
  <main>
        {{ $slot }}
    </main>

    <footer>
        &copy; 2026 <strong>FamiHealth</strong> | Orisinal Desain oleh Famina Team
    </footer>

    <script>
    
        function toggleMenu() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

  
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
            if (savedTheme === 'dark') {
                document.documentElement.setAttribute('data-theme', 'dark');
            }

        })();

      
        window.onclick = function(event) {
            if (!event.target.matches('.hamburger-btn')) {
                const dropdowns = document.getElementsByClassName("dropdown-menu");
                for (let i = 0; i < dropdowns.length; i++) {
                    let openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
  

</body>
</html>