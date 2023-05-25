<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    @include('admin.include.style')
  </head>
  <body>   
      <!-- partial:partials/_navbar.html -->
      @include('admin.include.header')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.include.sidebar')
        <!-- partial -->
        @yield('content')
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!-- @include('admin.include.footer') -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.include.script')
    @stack('script')
    <!-- End custom js for this page -->
  </body>
</html>