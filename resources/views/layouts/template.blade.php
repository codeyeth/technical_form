<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta http-equiv="refresh" content="30"> --}}
    
    <title>{{ config('app.name') }}</title>
    
    <!-- Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
     <!-- Icon -->
     <link rel="shortcut icon" type="image/png" href="{{ asset ('npo.png')}}">
      
    @livewireStyles
    
</head>
<body class="antialiased">
    <nav id="nav">
        {{-- <div class="navigation__logo">ITU Technical Support Form</div> --}}
        
        <a class="navigation__logo" href="{{ url('/') }}">
            ITU Technical Support Form
        </a>
        
        
        <div class="navigation__user"> 
            
            
        </div>
        
        <div class="navigation__user"> 
            {{-- <a href="{{ asset ('/') }}" class="navLink">Home</a> | --}}
            <a href="{{ asset ('/requestList') }}" class="navLink">Old Requests</a> |
            @guest
            <a href="{{ route('login') }}" class="navLink">Login</a>
            @else
            <a class="navLink" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            
            {{-- <ul class="navbar-nav ">
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle drop-header" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul> --}}
            @endguest
            
        </div>
    </nav>
    
    @yield('content')
    
    @livewireScripts

    <script src="js/app.js"></script>

</body>

<style scoped>
    body {
        font-family: Avenir, Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        color: #2c3e50;
        min-height: 100vh;
        background-color: #f3f5fa;
        margin: 0px;
    }
    
    #nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 5%;
        background-color: #4682b4;
        color: white;
    }
    
    .drop-header{
        color: white;
        text-decoration: none !important;
    }
    
    #a{
        font-weight: bold !important;
        color: white !important;
        text-decoration: none !important;
    }
    
    .navigation__logo {
        font-weight: bold !important;
        font-size: 24px !important;
        color: white !important;
        text-decoration: none !important;
    }
    .navigation__user {
        font-weight: bold;
    }
    
    .navLink {
        font-weight: bold;
        color: white;
    }
    
    .user-profile {
        display: grid;
        grid-template-columns: 1fr 3fr;
        grid-gap: 50px;
        padding: 50px 5%;
    }
    
    textarea {
        resize: none;
    }
    
    .user-profile__user-panel {
        display: flex;
        flex-direction: column;
        padding: 20px;
        background-color: white;
        border-radius: 5px;
        border: 1px solid #dfe3eb;
    }
    
    h1 {
        margin: 0;
    }
    
    .user-profile__admin-badge {
        background: purple;
        color: white;
        border-radius: 5px;
        margin-right: auto;
        padding: 0 10px;
        font-weight: bold;
    }
    
    
    .user-profile__create-twoot {
        padding-top: 20px;
        display: flex;
        flex-direction: column;
    }
    
    .--exceeded {
        color: red;
        border-color: red;
    }
    
    textarea {
        border: 1px solid #dfe3e8;
        border-radius: 5px;
    }
    
    .create-twoot-panel__submit {
        display: flex;
        justify-content: space-between;
    }
    
    .create-twoot-type {
        padding: 10px 0;
    }
    
    /* .btn {
        padding: 5px 20px;
        margin: auto 0;
        border-radius: 1px;
        border: none;
        background-color: #4682b4;
        color: white;
        font-weight: bold;
        cursor: pointer;
    } */
</style>

</html>
