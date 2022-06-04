<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Online shopping System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
 
   @include('user.partials.head')

</head>
<body>
   <!-- ======= Header ======= -->
  @include('user.partials.header')
  <!-- =======END Header ======= -->
   
  <!-- ======= Sidebar ======= --> 
  @include('user.partials.sidebar')
  <!-- =======END Sidebar ======= -->

  <main id="main" class="main">
 
    @yield('content')  

  </main><!-- End #main --> 


<!-- ======= Footer ======= --> 
 @include('user.partials.footer')
 @include('user.partials.footer-scripts')
 <!-- =======END Footer ======= -->
   
</body>
</html>