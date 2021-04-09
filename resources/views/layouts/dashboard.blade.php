<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="/favicon-admin.ico" type="image/x-icon">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Inter:400,500,600,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}?ver={{ time() }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">

</head>
<body>
    @yield('content')
    <script src="{{ asset('js/app.js') }}?ver={{ time() }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js" defer></script>
    <script>
        (function(w, d, s, h, id) {
            w.roistatProjectId = id; w.roistatHost = h;
            var p = d.location.protocol == "https:" ? "https://" : "http://";
            var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init?referrer="+encodeURIComponent(d.location.href);
            var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
        })(window, document, 'script', 'cloud.roistat.com', '3471f90cb1269b9107391c11fb73fefc');
    </script>
</body>
</html>
