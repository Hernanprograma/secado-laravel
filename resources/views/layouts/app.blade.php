<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/micss.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/clockpicker.css">
    <link rel="stylesheet" type="text/css" href="/css/standalone.css">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

    <!--Datapicker-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

    <!--Timepicker-->


    <link href="//www.fuelcdn.com/fuelux/3.13.0/css/fuelux.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">



    <!-- Scripts -->


    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]);?>
    </script>




</head>



<body>
    <div id="app">
    
       @yield('content')
    </div>


    <!-- Scripts -->
    <script src="/js/app.js"></script>

</body>

</html>

<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<script>
//esta funcion la usamos para para seleccionar la fecha de diferente manera segun el navegador que usemos;en chrome se usara el selector nativo mientras que otros navegadores usaran jquery.
var isDateInputSupported = function(){
    var elem = document.createElement('input');
    elem.setAttribute('type','date');
    elem.value = 'foo';
    return (elem.type == 'date' && elem.value != 'foo');
}

if (!isDateInputSupported())  // or.. !Modernizr.inputtypes.date
  $('input[type="date"]').datepicker();
</script>

<script type="text/javascript" src="/js/clockpicker.js"></script>
<script type="text/javascript">
//esta funcion la usamos para para seleccionar la hora de diferente manera segun el navegador que usemos;en chrome se usara el selector nativo mientras que otros navegadores usaran jquery.
    var isTimeInputSupported = function(){
        var elem = document.createElement('input');
        elem.setAttribute('type','time');
        elem.value = 'foo';
        return (elem.type == 'time' && elem.value != 'foo');
    }

    if (!isTimeInputSupported())  // or.. !Modernizr.inputtypes.date
        $('input[type="time"]').clockpicker({ donetext: 'OK'});
</script>






</script>
