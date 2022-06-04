<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

     <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Online shopping System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
 
   @include('partials.head')

</head>
<body>

  <div id="app">
  <!-- ======= Header ======= -->
  @include('partials.header')
  <!-- =======END Header ======= -->

     <main class="py-4">
        @yield('content')  
     </main>  

   </div>


<!-- ======= Footer ======= --> 
 @include('partials.footer')
 @include('partials.footer-scripts')
 <!-- =======END Footer ======= -->
   
</body>
</html>