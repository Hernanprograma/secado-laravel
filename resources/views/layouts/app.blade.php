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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <script>"https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"</script>
      <script>"https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"</script>

    <!-- Scripts -->


    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]);?>
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#grid').DataTable();
        });
    </script>

</head>

<body>
    <div id="app">
        @include('partials.header') @yield('content') @include('partials.footer')
    </div>


    <!-- Scripts -->
    <script src="/js/app.js"></script>

</body>

</html>