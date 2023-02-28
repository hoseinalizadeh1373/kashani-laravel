<!DOCTYPE html>
<html lang="fa">
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    @yield("content")
  </body>
</html>