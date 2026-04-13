
<x-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            main {
            flex: 1;
            padding: 50px 5%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-card {
            background-color: var(--bg-card);
            padding: 40px;
            border-radius: 35px;
            text-align: center;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 15px 35px var(--shadow);
        }

        .hero-card h1 {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .hero-card p {
            opacity: 0.8;
            font-size: 15px;
            line-height: 1.6;
        }
        </style>
    </head>
    <body>
     <main>
        <div class="hero-card">
            <div style="text-align: center; margin-bottom: 20px;">
           <img src="{{ asset('img/hh.png') }}" alt="" style="width: 500px; height: 300px; border-radius: 15px;">

        </div>
            <h1>Halo, Selamat datang</h1>
            <p> <b>FamiHealth</b> Siap melayani anda. <br>Ayo hitung BMI mu.</p>
            <div style="margin-top: 25px; display: flex; gap: 10px; justify-content: center;">
                <div style="padding: 15px; background: var(--accent-blue); border-radius: 15px; flex: 1; color: #333;">
                    <b>BMI Kamu</b>
                    <a href="/bmi"><br>Cek BMI
                </div>
                <div style="padding: 15px; background: var(--accent-pink); border-radius: 15px; flex: 1; color: #333;">
                    <b>Status</b><br>Menunggu Data
                </div>
            </div>
        </div>
    </main>
        
    </body>
    </html>

</x-layout>