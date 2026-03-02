<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $settings['name'] ?? null }}</title>
    <link rel="shortcut icon" href="{{ asset('storage/'.($settings['icon_dark'] ?? null))}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #ffffff;
            font-family: 'Inter', sans-serif;
            color: #475569;
            /* slate-600 */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 360px;
            width: 100%;
            text-align: center;
        }

        /* Heading */
        h1 {
            font-weight: 700;
            font-size: 20px;
            color: #0f172a;
            /* slate-900 */
            margin: 0 0 6px 0;
        }

        /* Form Card */
        form {
            background: #fff;
            box-shadow: 0 8px 40px rgba(33, 33, 33, 0.15);
            border-radius: 16px;
            padding: 32px 28px;
            text-align: left;
        }

        /* Label */
        label {
            display: block;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            color: #94a3b8;
            /* slate-400 */
            margin-bottom: 8px;
            letter-spacing: 0.1em;
        }

        /* Input group */
        .input-group {
            position: relative;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
        }

        /* Icon on left inside input */
        .input-group i {
            position: absolute;
            left: 14px;
            color: #94a3b8;
            font-size: 16px;
            pointer-events: none;
        }

        /* Inputs */
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 16px 12px 40px;
            /* left padding for icon */
            border-radius: 12px;
            border: none;
            background-color: #e7f0ff;
            /* Light blue */
            font-size: 14px;
            color: #0f172a;
            outline-offset: 2px;
            outline-color: transparent;
            transition: outline-color 0.2s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline-color: black;
            background-color: #f0f6ff;
        }

        /* Button */
        button[type="submit"] {
            width: 100%;
            background-color: black;
            color: #fff;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 14px;
            border: none;
            border-radius: 12px;
            padding: 14px 0;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #5c5c5c;
        }

        /* Arrow icon inside button */
        button[type="submit"] i {
            font-size: 16px;
        }

    </style>
</head>

<body>
    <div class="container" role="main" aria-label="Login">
        <img src="{{ asset('storage/'.($settings['logo_dark'] ?? null)) }}" alt="{{ $settings['name'] ?? null }}" style="max-width:200px; max-height:40px; margin-bottom:10px">

        <h1 style="margin-bottom: 10px">{{ $settings['name'] ?? null }}</h1>

        <form action="{{ route('login.proses') }}" method="POST" autocomplete="off" novalidate>
            @csrf
            <label for="email">Email</label>
            <div class="input-group">
                <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                <input autocomplete="off" type="email" id="email" name="email" placeholder="Masukkan Email" required autocomplete="username" aria-describedby="emailHelp" aria-label="Email" />
            </div>

            <label for="password">Kata Sandi</label>
            <div class="input-group">
                <i class="fa-solid fa-lock" aria-hidden="true"></i>
                <input autocomplete="off" type="password" id="password" name="password" placeholder="Masukkan Kata Sandi" required autocomplete="current-password" aria-label="Kata Sandi" />
            </div>

            <button type="submit" aria-label="Masuk">
                Masuk <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>
    </div>
</body>

</html>
