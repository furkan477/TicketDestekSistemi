@extends('frontend.layout.layout')

@section('content')

<div class="content-wrapper">
  <h1 class="mt-5 text-center">Kullanıcıların Destek Talebleri Veri Analizi Özetleri</h1>
  <section class="content mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$all}} Adet Destek Talebi</h3>

              <p>Kullanıcıların Oluşturduğu Toplam Destek Talebleri</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$active}} Adet Açık Destek Talebi</h3>

              <p>Kullanıcıların Oluşturduğu Toplam Açık Destek Talebleri</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('admin.destek.active')}}" class="small-box-footer">Görüntüle<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$hanger}} Adet Askıda Olan Destek Talebi</h3>

              <p>Kullanıcıların Oluşturduğu Toplam Askıya Alınan Destek Talebleri</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('admin.destek.hanger')}}" class="small-box-footer">Görüntüle <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$terminated}} Adet Sonlandırılan Destek Talebi</h3>

              <p>Kullanıcıların Oluşturduğu Toplam Sonlandırılan Destek Talebleri</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('admin.destek.terminated')}}" class="small-box-footer">Görüntüle <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection