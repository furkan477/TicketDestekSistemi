@extends('frontend.layout.layout')

@section('content')
<br><br><br>
<div class="site-wrap main-header">
    <div class="site-section">
        <div class="container-fluid">
            <h1 class="text-center">Sonlandırılmış Destek Talebleriniz </h1><br><br><br>
            <div class="card bg-dark">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Latest Orders</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ad Soyad</th>
                                    <th>Kategori</th>
                                    <th>Oluşturulma Tarihi</th>
                                    <th>Konu</th>
                                    <th>Destek Açıklama</th>
                                    <th>Seviye</th>
                                    <th>Durum</th>
                                    <th>Dosya</th>  
                                    <th>İncele</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($support) && $support->count() > 0)
                                    @foreach($support as $sp)
                                        <tr>
                                            <td><a>{{$sp->id}}</a></td>
                                            <td>{{$sp->user->name}}</td>
                                            <td>{{$sp->category->name}}</td>
                                            <td><div class="sparkbar" data-color="#00a65a" data-height="20">{{$sp->created_at}}</div></td>
                                            <td>{{$sp->subject}}</td>
                                            <td>{{$sp->description}}</td>
                                            <td><span class="badge badge-{{$sp->level == 'Düşük' ? 'warning' : 'info'}}">{{$sp->level}}</span></td>
                                            <td><span class="badge badge-{{$sp->status == 'Açık' ? 'success' : 'danger'}}">{{$sp->status}}</span></td>
                                            <td><a href="pages/examples/invoice.html">{{$sp->file}}</a></td>
                                            <td>
                                                <a href="{{route('destek.about',$sp->id)}}"><i class="fa-solid fa-magnifying-glass"></i></a>
                                                <a href="{{route('destek.delete',$sp->id)}}"><i class="fa-solid fa-trash" style="margin-left: 8.0%;" ></i></a>
                                                <a href="{{route('destek.update',$sp->id)}}"><i class="fa-solid fa-pen-to-square" style="margin-left: 8.0%;"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div><br>
                <div class="card-footer clearfix">
                    <a href="{{route('destek.show')}}" class="btn btn-sm btn-info float-left">Yeni Destek Oluşturunuz</a>
                    <a href="{{route('destek.list.active')}}" class="btn btn-sm btn-success float-left" style="margin-left: 0.3%;">Devam Eden Desteklerim</a>
                </div>
                @if(!empty($support) && $support->count() == 0)
                <h1 class="text-center">Sonlandırılmış Destek Talebiniz Bulunamamaktadır ! <i class="fa-solid fa-triangle-exclamation"></i></h1>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection