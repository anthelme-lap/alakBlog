<!DOCTYPE html>
<html lang="en">
  <head>
    @include('../partials/admin/link')
  </head>
  <body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('../partials/admin/sideBar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('../partials/admin/nav')
        
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content-admin')
                </div>
            <!-- content-wrapper ends -->
            @include('../partials/admin/footer')
            </div>
            <!-- main-panel ends -->
        </div>
      <!-- page-body-wrapper ends -->

    </div>
    <!-- container-scroller -->

    @include('../partials/admin/scriptJs')
  </body>
</html>