<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title"><h1>Usuarios</h1></div>

                <div class="usuarios">
                   @foreach( $users as $user )
                   <li>
                    Nombre: {{ $user['name'] }}
                    E-mail: {{ $user['email'] }}
                    Password: {{ $user['password'] }}

                   </li>
                    @endforeach
                </div>

            </div>
        </div>
    </body>
</html>
