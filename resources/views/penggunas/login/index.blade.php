<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Registration Form</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('resources/css/stylesuser.css') }}">
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container" id="container">
        <div class="form-container register-container">
            <form action="{{ route('user.register') }}" method="post">
                @csrf
                <h1>Register here.</h1>
                <input type="text" name="nama_nasabah" placeholder="Nama Nasabah" required
                    value="{{ old('nama_nasabah') }}">
                <input type="text" name="nomor_telepon" placeholder="Telp" required
                    value="{{ old('nomor_telepon') }}">
                <div class="content">
                    <div class="radio">
                        <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki"
                            {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}>
                        <label for="laki-laki">Laki-laki</label>
                    </div>
                    <div class="radio">
                        <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan"
                            {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                        <label for="perempuan">Perempuan</label>
                    </div>
                </div>
                <input type="text" name="alamat" placeholder="Alamat" required value="{{ old('alamat') }}">
                <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <button type="submit">Register</button>
            </form>
        </div>

        <div class="form-container login-container">
            <form action="/client/login" method="post">
                @csrf
                <h1>Login here.</h1>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <div class="content">

                </div>
                <button type="submit">Login</button>
                <span>or use your account</span>
                <div class="social-container">
                    <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
                    <a href="#" class="social"><i class="lni lni-google"></i></a>
                    <a href="#" class="social"><i class="lni lni-linkedin-original"></i></a>
                </div>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title">Hello <br> friends</h1>
                    <p>if You have an account, login here and have fun</p>
                    <button class="ghost" id="login">Login
                        <i class="lni lni-arrow-left login"></i>
                    </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="title">Start your <br> journey now</h1>
                    <p>if you don't have an account yet, join us and start your journey.</p>
                    <button class="ghost" id="register">Register
                        <i class="lni lni-arrow-right register"></i>
                    </button>
                </div>
            </div>
        </div>

        <img src="{{ asset('img/image.gif') }}" alt="image">

    </div>

    <script src="{{ asset('resources/js/loginuser.js') }}"></script>

</body>

</html>
