@extends('layouts.app')
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Secado Termico prueba</title>



        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
          <link rel="stylesheet" type="text/css" href="css/partial/welcome.css">
          <link rel="stylesheet" type="text/css" href="public/css/partial/messagesession.css">



    </head>
    <body>

            <div class="content">
                <img src="/images/global_omnium.png"class="global" alt=""/>
                <div class="title-median">
                    Secado Térmico

                </div>


                @if (!Auth::guest())
                  @include('partials.messagesession')

                @endif
                @if (Auth::guest())
                  @include('partials.login')
                @endif

            </div>
        </div>
    </body>
</html>
