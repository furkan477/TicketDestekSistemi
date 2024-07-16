<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Destek Blog | Kayıt</title>
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
              <h4>Nasıl Destek Alabilirim ?</h4>
              <h5 class="">Üyemiz değilseniz üyelik oluşturabilirsiniz ve giriş yapabilirsiniz</h6>
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

              <form class="pt-3" action="{{route('register')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for=""><h5>Ad Soyad</h5></label>
                  <input type="text" class="form-control form-control-lg" name="name"  placeholder="Username">
                </div>
                <div class="form-group">
                    <label for=""><h5>E-posta</h5></label>
                  <input type="email" class="form-control form-control-lg"  name="email"  placeholder="email">
                </div>
                <div class="form-group">
                    <label for=""><h5>Telefon</h5></label>
                  <input type="text" class="form-control form-control-lg"  name="phone"  placeholder="phone">
                </div>
                <div class="form-group">
                    <label for=""><h5>Meslek</h5></label>
                  <input type="text" class="form-control form-control-lg" name="job"   placeholder="job">
                </div>
                <div class="form-group">
                    <label for=""><h5>Şirket</h5></label>
                  <input type="text" class="form-control form-control-lg" name="company"   placeholder="company">
                </div>
                <div class="form-group">
                    <label for=""><h5>Şifre</h5></label>
                  <input type="password" class="form-control form-control-lg" name="password"  placeholder="password">
                </div>
                <div class="form-group">
                    <label for=""><h5>Şifreyi Doğrulayın</h5></label>
                  <input type="password" class="form-control form-control-lg" name="password_confirmation"  placeholder="password">
                </div><br>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Kayıt Olmak</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Hesabınız varmı ? <a href="{{route('login.show')}}" class="text-primary">Giriş Yapın</a>
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
