<x-layout>
    <style>
        .modal-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            backdrop-filter: blur(4px);
            font-family: 'Poppins', sans-serif;
        }

        .register-card {
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 15px;
            width: 100%;
            max-width: 380px;
            position: relative;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            max-height: 95vh;
            overflow-y: auto;
        }

        .close-link {
            position: absolute;
            top: 20px; left: 20px;
            text-decoration: none;
            color: #999;
            font-size: 18px;
        }

        h2 { font-size: 20px; font-weight: 600; margin-bottom: 5px; color: #222; }
        p { font-size: 13px; color: #777; margin-bottom: 20px; }

        .form-group {
            margin-bottom: 12px;
            position: relative;
        }

        .form-group label {
            display: block;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            color: #666;
            margin-bottom: 2px;
        }

        .form-group input {
            width: 100%;
            padding: 6px 0;
            border: none;
            border-bottom: 1px solid #ddd;
            outline: none;
            font-size: 13px;
            background: transparent;
        }

        .form-group small {
            font-size: 10px;
            color: #999;
            display: block;
            margin-top: 4px;
        }

        .custom-file-upload {
            border: 1px dashed #ccc;
            display: inline-block;
            padding: 8px;
            cursor: pointer;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #777;
            border-radius: 5px;
            margin-top: 5px;
        }

        .eye-icon {
            position: absolute;
            right: 0; bottom: 8px;
            cursor: pointer; color: #ccc; font-size: 14px;
        }

        .btn-submit {
            width: 100%; padding: 10px;
            background-color: #222; color: #fff;
            border: none; border-radius: 5px;
            font-size: 14px; font-weight: 500;
            cursor: pointer; margin-top: 10px; transition: 0.3s;
        }

        .btn-submit:hover { background-color: #444; }

        .divider {
            text-align: center; margin: 15px 0;
            position: relative; font-size: 11px; color: #bbb;
        }

        .divider::before, .divider::after {
            content: ""; position: absolute;
            top: 50%; width: 35%; height: 1px; background: #eee;
        }
        .divider::before { left: 0; }
        .divider::after { right: 0; }

        .btn-google {
            width: 100%; padding: 8px;
            background-color: #fff; color: #555;
            border: 1px solid #ddd; border-radius: 5px;
            font-size: 13px; font-weight: 500;
            cursor: pointer; display: flex;
            align-items: center; justify-content: center;
            gap: 10px; text-decoration: none; transition: 0.3s;
        }

        .footer-text { text-align: center; margin-top: 15px; font-size: 11px; color: #888; }
        .footer-text a { color: #222; text-decoration: none; font-weight: 600; }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="modal-overlay">
        <div class="register-card">
            <a href="/" class="close-link">✕</a>
            <h2>Daftar Akun</h2>
            <p>Masukkan data diri Anda.</p>

            <form id="regForm" action="/daftar" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="emailInput" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" id="passInput" minlength="8" required>
                    <small>Buat kata sandi baru minimal 8 digit</small>
                    <span class="eye-icon" onclick="togglePass()">👁</span>
                </div>

                <div class="form-group">
                    <label>Foto Profil</label>
                    <label for="file-upload" class="custom-file-upload">
                        <span id="file-name">Upload Foto</span>
                    </label>
                    <input id="file-upload" type="file" name="foto_profil" style="display:none;" onchange="updateFileName(this)">
                </div>

                <button type="button" onclick="confirmSubmit()" class="btn-submit">Daftar</button>
            </form>

            <div class="divider">atau</div>

            <a href="{{ url('auth/google') }}" class="btn-google">
                <img src="https://www.gstatic.com/images/branding/product/1x/gsa_512dp.png" alt="Google Logo" style="width:16px;">
                Daftar dengan Google
            </a>

            <div class="footer-text">
                Sudah punya akun? <a href="/login">Masuk</a>
            </div>
        </div>
    </div>

    <script>
        function togglePass() {
            const x = document.getElementById("passInput");
            x.type = x.type === "password" ? "text" : "password";
        }

        function updateFileName(input) {
            const fileName = input.files[0].name;
            document.getElementById("file-name").innerText = fileName;
        }

        @if ($errors->has('email'))
        Swal.fire({
            title: 'Email Terdaftar!',
            text: 'Email ini sudah terdaftar, ayo login kembali!',
            imageUrl: 'https://media.giphy.com/media/h8b3qCZZFWwEz81PCN/giphy.gif',
            imageWidth: 200,
            confirmButtonText: 'Ke Halaman Login',
            confirmButtonColor: '#222',
            target: document.querySelector('.modal-overlay')
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/login";
            }
        });
        @endif

        function confirmSubmit() {
            const name = document.querySelector('input[name="name"]').value;
            const email = document.querySelector('input[name="email"]').value;
            const password = document.getElementById('passInput').value;

            if (!name || !email || !password) {
                Swal.fire({
                    title: 'Waduh!',
                    text: 'Nama, Email, dan Password harus diisi semua ya, Bang!',
                    icon: 'warning',
                    confirmButtonColor: '#222',
                    target: document.querySelector('.modal-overlay')
                });
                return;
            }

            if (password.length < 8) {
                Swal.fire({
                    title: 'Password Kurang!',
                    text: 'Minimal 8 digit ya!',
                    icon: 'error',
                    confirmButtonColor: '#222',
                    target: document.querySelector('.modal-overlay')
                });
                return;
            }

            Swal.fire({
                title: 'Yakin Daftar?',
                text: "Pastikan data sudah benar ya!",
                imageUrl: 'https://media.giphy.com/media/ehyP3Z5TE8EfG5oilm/giphy.gif',
                imageWidth: 200,
                showCancelButton: true,
                confirmButtonColor: '#222',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Daftar!',
                cancelButtonText: 'Cek Lagi',
                target: document.querySelector('.modal-overlay')
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('regForm').submit();
                }
            })
        }
    </script>
</x-layout>