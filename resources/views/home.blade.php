<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <v-app id="app">
  <home-app>
  </home-app>
  </v-app>
  
</body>
<script src="{{asset('js/app.js')}}"></script>
</html>