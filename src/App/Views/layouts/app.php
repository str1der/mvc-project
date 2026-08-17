<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        /* Navbar Temel Ayarları */
        .navbar {
            background-color: #2c3e50;
            color: #ecf0f1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        /* Logo / Marka Kısmı */
        .navbar-brand a {
            color: #fff;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Menü Linkleri */
        .navbar-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 20px;
        }

        .navbar-menu li a {
            color: #bdc3c7;
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .navbar-menu li a:hover {
            color: #3498db;
        }

        /* Kullanıcı Karşılama Kısmı */
        .navbar-user {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .welcome-text {
            font-size: 1rem;
            font-weight: 500;
        }

        .logout-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <main>
         <!-- Navbar Başlangıcı -->
        <nav class="navbar">
            @include('partials/navbar')
        </nav>
        <!-- Navbar Bitişi -->
        @yield('content')
    </main>
</body>
</html>