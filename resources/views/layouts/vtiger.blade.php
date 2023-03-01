<!DOCTYPE html>
<html lang="fa">
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="/css/persianDatepicker-default.css" />
    <link rel="stylesheet" href="/css/formn.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
    <title>فرم استخدام مرکز پرستاری ثمین</title>
    <style>
      @import url("/css/formFix.css");
   </style>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-3.6.0.min.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">ثمین</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">صفحه اصلی</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li> --}}
          </ul>
        
        </div>
      </div>
    </nav>
    @yield("content")
  </body>
</html>