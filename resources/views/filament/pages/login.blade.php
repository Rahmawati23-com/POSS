<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Mainan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 90%;
            max-width: 900px;
            min-height: 600px;
            display: flex;
        }

        .login-left {
            flex: 1;
            background: linear-gradient(135deg, #ff6b6b 0%, #feca57 100%);
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }

        .login-left h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .login-left p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .toy-icon {
            font-size: 4rem;
            margin-bottom: 30px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        .login-right {
            flex: 1;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-form h2 {
            font-size: 2rem;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 15px;
            border: 2px solid #e1e1e1;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.3s;
            outline: none;
        }

        .form-group input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .remember-me input {
            margin-right: 10px;
            width: auto;
        }

        .remember-me label {
            margin-bottom: 0;
            font-weight: normal;
            cursor: pointer;
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .back-to-home {
            text-align: center;
            margin-top: 30px;
        }

        .back-to-home a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .back-to-home a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                margin: 20px;
            }
            
            .login-left {
                padding: 40px 20px;
            }
            
            .login-right {
                padding: 40px 20px;
            }
            
            .login-left h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <div class="toy-icon">🧸</div>
            <h1>Toko Mainan</h1>
            <p>Selamat datang di panel admin Toko Mainan. Kelola produk dan pesanan dengan mudah.</p>
        </div>
        
        <div class="login-right">
            <form method="POST" action="{{ route('filament.admin.auth.login') }}" class="login-form">
                @csrf
                <h2>Masuk Admin</h2>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required autofocus 
                           value="{{ old('email') }}" placeholder="admin@tokomainan.com">
                    @error('email')
                        <span style="color: red; font-size: 0.9rem;">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required 
                           placeholder="Masukkan password">
                    @error('password')
                        <span style="color: red; font-size: 0.9rem;">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Ingat saya</label>
                </div>
                
                <button type="submit" class="login-btn">Masuk</button>
                
                <div class="back-to-home">
                    <a href="{{ url('/') }}">← Kembali ke Beranda</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>