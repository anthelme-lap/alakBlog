<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('../../template/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('../../template/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <link rel="stylesheet" href="{{asset('../../template/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('../../template/assets/images/favicon.png')}}" />
  </head>
  <body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
              <div class="card col-lg-4 mx-auto">
                <div class="card-body px-5 py-5">
                  <h3 class="card-title text-left mb-3">Se connecter</h3>
                  <form method="post" action="{{route('auth.user')}}">
                    @csrf
                    @method('post')
                    @include('../alerts/alert_message')
                    <div class="form-group">
                      <label>E-mail *</label>
                      <input type="email" name="email" value="{{old('email')}}" class="form-control p_input @error('email') is-invalid @enderror">
                      @error('email') 
                        <span class="invalid-feedback">{{$message}}</span> 
                    @enderror
                    </div>
                    <div class="form-group">
                      <label>Mot de passe *</label>
                      <input type="password" name="password" class="form-control p_input @error('password') is-invalid @enderror" >
                      @error('password') 
                        <span class="invalid-feedback">{{$message}}</span> 
                    @enderror
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" name="remember" {{old('remember') ? 'checked':''}} class="form-check-input"> Se souvenir de moi </label>
                      </div>
                      <a href="#" class="forgot-pass">Mot de passe oublié</a>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-block enter-btn">Se connecter</button>
                    </div>
                    <p class="sign-up">Vous n'avez pas de compte?<a href="{{route('register')}}"> S'inscrire</a></p>
                  </form>
                </div>
              </div>
            </div>
            <!-- content-wrapper ends -->
          </div>
          <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('../../template/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('../../template/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('../../template/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('../../template/assets/js/misc.js')}}"></script>
    <script src="{{asset('../../template/assets/js/settings.js')}}"></script>
    <script src="{{asset('../../template/assets/js/todolist.js')}}"></script>
    <!-- endinject -->
  </body>
</html>