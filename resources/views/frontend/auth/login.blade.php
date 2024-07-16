<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Destek Blog | Giriş</title>
  <link rel="stylesheet" href="{{asset('temaa/skydash-free-bootstrap-admin-template-main/template/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('temaa/skydash-free-bootstrap-admin-template-main/template/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('temaa/skydash-free-bootstrap-admin-template-main/template/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('temaa/skydash-free-bootstrap-admin-template-main/template/css/vertical-layout-light/style.css')}}">
  <link rel="shortcut icon" href="{{asset('temaa/skydash-free-bootstrap-admin-template-main/template/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="{{asset('temaa/skydash-free-bootstrap-admin-template-main/template/images/logo.svg')}}" alt="logo">
              </div>
              <h4>Hadi Başlayalım Destek Blog</h4>
              <h6 class="font-weight-light">Giriş yapınız ve devam ediniz</h6>
              @if ($errors)
                    @foreach ($errors->all() as $error)
                      <div class="alert alert-danger">
                          {{$error}}
                      </div>
                    @endforeach
                @endif
                @if (session()->get('success'))
                  <div class="alert alert-success">
                      {{session()->get('success')}}
                  </div>
                @endif

                @if (session()->get('error'))
                  <div class="alert alert-danger">
                      {{session()->get('error')}}
                  </div>
                @endif

              <form class="pt-3" action="{{route('login')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for=""><h5>E-posta</h5></label>
                  <input type="email" class="form-control form-control-lg" name="email" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for=""><h5>Şifreniz</h5></label>
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="">Giriş Yap</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Hesabınız Yok mu ? <a href="{{route('register.show')}}" class="text-primary">Kayıt Olun</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('temaa/skydash-free-bootstrap-admin-template-main/template/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{ asset('temaa/skydash-free-bootstrap-admin-template-main/template/js/off-canvas.js')}}"></script>
  <script src="{{ asset('temaa/skydash-free-bootstrap-admin-template-main/template/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('temaa/skydash-free-bootstrap-admin-template-main/template/js/template.js')}}"></script>
  <script src="{{ asset('temaa/skydash-free-bootstrap-admin-template-main/template/js/settings.js')}}"></script>
  <script src="{{ asset('temaa/skydash-free-bootstrap-admin-template-main/template/js/todolist.js')}}"></script>
</body>

</html>
