<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS | Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/style.css', 'resources/js/script.js'])
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo">
                <a href="/"><img src="{{ asset('storage/images/logo.png') }}" alt="Logo"></a>
            </div>
            <div class="navbar">
                <nav class="nav">
                    <ul class="menu">
                        <li class="menu-item"><x-nav-link href="{{ route('home') }}" :active="request()->is('/')">Home</x-nav-link></li>
                        <li class="menu-item"><x-nav-link href="{{ route('about') }}" :active="request()->is('over-ons')">Over ons</x-nav-link></li>
                        <li class="menu-item"><x-nav-link href="{{ route('contact') }}" :active="request()->is('contact')">Contact</x-nav-link></li>

                        @guest
                            <li class="menu-item"><x-nav-link href="{{ route('register') }}" :active="request()->is('registreren')">Registreren</x-nav-link></li>
                            <li class="menu-item"><x-nav-link href="{{ route('login') }}" :active="request()->is('inloggen')">inloggen</x-nav-link></li>      
                        @endguest

                        @auth
                            <li class="menu-item"><x-nav-link href="{{ route('dashboard') }}" :active="request()->is('dashboard')">Dashboard</x-nav-link></li>
                        @endauth

                        @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="logout-btn" type="submit">Uitloggen</button>
                        </form>                            
                        @endauth

                        <li class="menu-toggle"><i class="fa-solid fa-bars"></i></li>                                          
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="right sidebar" id="right-sidebar">
        <div class="close-toggle"><i class="fa-solid fa-xmark close"></i></i></div>
        <nav class="nav">
            <ul class="menu">
                <li class="menu-item"><x-nav-link href="{{ route('home') }}" :active="request()->is('/')">Home</x-nav-link></li>
                <li class="menu-item"><x-nav-link href="{{ route('about') }}" :active="request()->is('over-ons')">Over ons</x-nav-link></li>
                <li class="menu-item"><x-nav-link href="{{ route('contact') }}" :active="request()->is('contact')">Contact</x-nav-link></li>

                @guest
                    <li class="menu-item"><x-nav-link href="{{ route('register') }}" :active="request()->is('registreren')">Registreren</x-nav-link></li>
                    <li class="menu-item"><x-nav-link href="{{ route('login') }}" :active="request()->is('inloggen')">inloggen</x-nav-link></li>      
                @endguest

                @auth
                    <li class="menu-item"><x-nav-link href="{{ route('dashboard') }}" :active="request()->is('dashboard')">Dashboard</x-nav-link></li>
                @endauth                

                @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="logout-btn" class="uitloggen" type="submit">Uitloggen</button>
                </form>                            
                @endauth
            </ul>
        </nav>
    </div>
		
    <main class="main">
        {{ $slot }}
    </main>

</body>
</html>