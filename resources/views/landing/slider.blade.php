<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/im1.jpg') }}" class="d-block w-100 h-20"  alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/im2.jpg') }}" class="d-block w-100 h-20" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/im1.jpg') }}" class="d-block w-100 h-20" alt="...">
    </div>
  </div>
</div>
     <h1 class="text-info text-center">  </h1>

    <div class="container">
       <h1 class="text-info text-center">  @yield("title")  </h1>

    <div class="container">
       @yield('content')
    </div>

    @yield("footer")
    </div>

   
</body>