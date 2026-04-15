<x-layout>
    <style>
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Diturunkan sedikit agar di bawah Swal */
            backdrop-filter: blur(4px);
            font-family: 'Poppins', sans-serif;
        }

        .login-card {
            background: #ffffff;
            padding: 50px;
            border-radius: 15px;
            width: 100%;
            max-width: 380px;
            position: relative;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .close-link {
            position: absolute;
            top: 20px;
            left: 20px;
            text-decoration: none;
            color: #999;
            font-size: 18px;
            font-weight: 300;
        }

        h2 {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #222;
        }

        p {
            font-size: 14px;
            color: #777;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
            color: #666;
        }

        .form-group input {
            width: 100%;
            padding: 10px 0;
            border: none;
            border-bottom: 1px solid #ddd;
            outline: none;
            font-size: 14px;
            background: transparent;
        }

        .form-group input:focus {
            border-bottom-color: #FFB6C1; /* Diubah ke pink pastel biar nyambung */
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #222;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background-color: #444;
        }

        .footer-text {
            text-align: center;
            margin-top: 25px;
            font-size: 12px;
            color: #888;
        }

        .footer-text a {
            color: #222;
            text-decoration: none;
            font-weight: 600;
        }

        /* Z-Index Fix buat SweetAlert */
        .swal2-container {
            z-index: 1000000 !important;
        }
    </style>

    <div id="auth-modal" class="modal-overlay">
        <div class="login-card animate__animated" id="login-card">
            <a href="/" class="close-link">✕</a>

            <h2>Masuk Akun</h2>
            <p>Silakan masuk ke akun Famina Anda.</p>

            <form action="/login" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required autofocus>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>

                <button type="submit" class="btn-submit">Masuk</button>
            </form>

            <div class="footer-text">
                Belum punya akun? <a href="/daftar">Daftar sekarang</a>
            </div>
        </div>
    </div>

    @if(session('error_login'))
    <script>
        // Sembunyikan form login segera setelah ada error login
        const modalOverlay = document.getElementById('auth-modal');
        modalOverlay.style.display = 'none';

        Swal.fire({
            title: 'Waduh...',
            text: "{{ session('error_login') }}",
            imageUrl: 'https://media.giphy.com/media/5gT80CMLC3HcxEPPOy/giphy.gif',
            imageWidth: 200,
            imageHeight: 200,
            imageAlt: 'Custom GIF',
            showCancelButton: true,
            confirmButtonColor: '#FFB6C1', // Pink Pastel
            cancelButtonColor: '#B0E0E6',  // Biru Pastel
            confirmButtonText: 'Daftar Sekarang!',
            cancelButtonText: 'Coba Lagi',
            allowOutsideClick: false,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Otw Halaman Daftar...',
                    imageUrl: 'https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExNHJueXN4bmpxYnZ6Z3R6Z3R6Z3R6Z3R6Z3R6Z3R6Z3R6JmVwPXYxX2ludGVybmFsX2dpZl9ieV9pZCZjdD1z/uIJBFZoOaifHf22Ohm/giphy.gif',
                    imageWidth: 100,
                    timer: 1500,
                    showConfirmButton: false,
                    showCloseButton: true,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });
                
                setTimeout(() => {
                    window.location.href = "/daftar";
                }, 1500);
            } else {
                // Munculkan kembali modal login jika batal
                modalOverlay.style.display = 'flex';
                document.getElementById('login-card').classList.add('animate__fadeInUp');
            }
        });
    </script>
    @endif
</x-layout>  