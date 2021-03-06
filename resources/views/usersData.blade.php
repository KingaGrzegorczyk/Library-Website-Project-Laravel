<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wyniki wyszukiwania</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
            
        <style>
            body {
                font-family: 'Nunito';
            }
       
            body{
                background-color: #e8e8e8;
            }
            thead{
                font-weight: bold;
            }
            tbody{
                font-style: italic;
            }
            .title{
                text-align: center;
                background-color: transparent
            }
            .table-container{
                background-color: white;
                max-width: 900px;
                margin: 0 auto;
            }   
            .box {
                display: flex;
                justify-content: center;
            }
            .box-footer{
                float: right;
            }
        </style>
</head>
<body class="antialiased">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Strona g????wna
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/search') }}">
                    Szukaj
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Zaloguj') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Zarejestruj') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('data') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('data').submit();">
                                        {{ __('Twoje konto') }}
                                    </a>

                                    <form id="data" action="{{ route('data') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ route('show') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('show').submit();">
                                        {{ __('Twoje ksi????ki') }}
                                    </a>

                                    <form id="show" action="{{ route('show') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Wyloguj') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    </div>
                </div>
        </nav>
<div class='container'>
    <div class="card my-4">
    @auth
    <div class="title"> <h3>Zmie?? dane</h3></div>
    <table data-toggle="table">
       <thead>
            <tr>
                <td>Imi??</td>
                <td>Adres e-mail</td>
                <td>Has??o (wymagane, aby zaktualizowa?? dane)</td>
                <td>Zapisz</td>
            </tr>
        </thead> 
        <tbody>
        <form role="form" id="comment-form" method="post" enctype="multipart/form-data" action="{{ route('update') }}"> 
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        @foreach($users as $user)
        <tr>
            <td>
                <input type="text" name="name" id="name" placeholder="{{$user->name}}" required> 
            </td>
            <td> 
                <input type="text" name="email" id="email" placeholder="{{$user->email}}" required> 
            </td>
            <td> 
                <input type="password" name="password" id="password" placeholder="Wprowad?? has??o" required> 
            </td>
            <td>
                <button type="submit" class="btn btn-success">Zapisz</button>
            </td>
        </tr>  
        @endforeach
        </form>
        </tbody>
    </table>
    <br/><br/>
      
    <div class="title"> <h3>Zmie?? has??o</h3></div>
    <table data-toggle="table">
       <thead>
            <tr>
                <td>Obecne has??o</td>
                <td>Nowe has??o</td>
                <td>Powt??rz nowe has??o</td>
             
            </tr>
        </thead> 
        <tbody>
        <form role="form" id="comment-form" method="post" enctype="multipart/form-data" action="{{ route('changePassword') }}"> 
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        @foreach($users as $user) 
        <tr>
            <td>
                <input type="password" name="oldPassword" id="oldPassword" placeholder="Obecne has??o" required> 
            </td>
            <td> 
                <input type="password" name="newPassword1" id="newPassword1" placeholder="Nowe has??o" required> 
            </td>
            <td> 
                <input type="password" name="newPassword2" id="newPassword2" placeholder="Nowe has??o" required> 
            </td>
            <td>
                <button type="submit" class="btn btn-success">Zapisz</button>
            </td>    
        </tr>
        @endforeach
        </form>
    </tbody>
    </table>  
    <br/><br/>
  
    <form>
    <a href="{{ route('deleteAccount') }}" class="btn btn-danger btn-xs" onclick="return confirm('Jeste?? pewien, ??e chcesz usun???? konto?')" title="Usu??">
            <i class="fa fa-trash-o"></i> Usu?? konto </a>  
    </form>
</div>     
</div>
    @endauth
    @guest
    <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">         
            <div class="card-body">
                    <h3>Zaloguj si?? lub zarejestruj, aby zobaczy?? zawarto???? strony!</h3>                  
            </div>
            </div>
        </div>
    </div>
    @endguest
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>   
   
</body>
</html>
