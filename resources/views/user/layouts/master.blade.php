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
     <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    Welcome, {{ auth()->user()->name }} <br>


    @yield('content')  

  </main><!-- End #main --> 


<!-- ======= Footer ======= --> 
 @include('user.partials.footer')
 @include('user.partials.footer-scripts')
 <!-- =======END Footer ======= -->
   
</body>
</html>