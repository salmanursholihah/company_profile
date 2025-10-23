<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - UCTA</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #dfe6f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 850px;
            height: 450px;
            background: white;
            border-radius: 8px;
            display: flex;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .left-panel {
            width: 40%;
            background: linear-gradient(to bottom, #2f5fa7, #1d4077);
            color: white;
            padding: 50px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        .left-panel h2 {
            margin-bottom: 10px;
            font-size: 24px;
        }

        .left-panel p {
            font-size: 14px;
            margin-bottom: 30px;
        }

        .left-panel a button {
            padding: 10px 30px;
            border: none;
            background: white;
            color: #1d4077;
            cursor: pointer;
            border-radius: 4px;
            font-weight: bold;
        }

        .right-panel {
            width: 60%;
            padding: 40px;
        }

        .right-panel h2 {
            color: #2f5fa7;
            margin-bottom: 5px;
            margin-top: 50px;
        }

        .input-box {
            margin-top: 15px;
        }

        .input-box input {
            width: 100%;
            padding: 10px;
            border: 1px solid #aaa;
            border-radius: 4px;
        }

        .btn {
            background: #2f5fa7;
            color: white;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        small {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Panel kiri -->
        <div class="left-panel">
            <h2>WELCOME BACK!</h2>
            <p>Belum punya akun? Klik di bawah untuk daftar.</p>
            <a href="{{ route('register') }}"><button>SIGN UP</button></a>
        </div>

        <!-- Panel kanan -->
        <div class="right-panel">
            <h2>Login</h2>
            <small>Gunakan email dan password Anda</small>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                    @error('email')
                        <span style="color:red;font-size:12px">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    @error('password')
                        <span style="color:red;font-size:12px">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn">LOGIN</button>
            </form>
        </div>
    </div>

</body>

</html>
