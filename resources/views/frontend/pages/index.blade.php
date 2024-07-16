@extends('frontend.layout.layout')

@section('content')

<div class="content-wrapper">
  <h1 class="mt-5 text-center">Destek Talebleri Veri Analizi Özetleri</h1>
  <section class="content mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$all}} Adet Destek Talebi</h3>

              <p>{{$user->name}} Toplam Destek Talebiniz</p>
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

              <p>{{$user->name}} Toplam Açık Destek Talebiniz</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('destek.list.active')}}" class="small-box-footer">Görüntüle<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$hanger}} Adet Askıda Olan Destek Talebi</h3>

              <p>{{$user->name}} Toplam Askıya Alınan Destek Talebleriniz</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('destek.list.askı')}}" class="small-box-footer">Görüntüle <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$terminated}} Adet Sonlandırılan Destek Talebi</h3>

              <p>{{$user->name}} Toplam Sonlandırılan Destek Talebleriniz</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection