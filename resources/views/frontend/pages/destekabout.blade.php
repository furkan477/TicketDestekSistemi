@extends('frontend.layout.layout')

@section('content')
<br><br><br>
<h1 class="text-center">{{$support->user->name}} Destek Talebi Detayı</h1>
<br><br><br>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice p-3 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> Blog Destek | 7/24
                                    </h4>
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <div class="col-sm-6 invoice-col">

                                    <strong> Sayın {{$support->user->name}} , Merhaba</strong><br><br>
                                    <b>Destek Talebinin Kategorisi: </b> {{$support->category->name}}<br>
                                    <b>Destek Talebinin Konusu: </b> {{$support->subject}}<br>
                                    <b>Destek Talebinin Açıklaması: </b> {{$support->description}}<br>
                                    <b>Destek Talebinin Seviyesi: </b> {{$support->level}}<br>
                                    <b>Destek Talebinin Durumu: </b> {{$support->status}}<br>
                                    <b>Destek Talebinin Dosyası: </b> {{$support->file}}<br>

                                </div>
                                <div class="col-sm-6 invoice-col">
                                    <b>Destek Talebi Gönderilme Tarihi: </b>{{$support->created_at}}<br>
                                    <br>
                                    <b>Name:</b> {{$support->user->name}}<br>
                                    <b>E-mail:</b> {{$support->user->email}}<br>
                                    <b>job:</b> {{$support->user->job}}<br>
                                    <b>company:</b> {{$support->user->company}}<br>
                                    <b>phone:</b> {{$support->user->phone}}<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 14.0%;">
                    @if(!empty($message))
                    @foreach($message as $msg)
                    <div class="col-10">
                        <div class="invoice p-3 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fa-solid fa-user"></i> Kullanıcı : {{$msg->user->name}}
                                        <p class="text-right">{{$msg->created_at}}</p>
                                    </h4>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-12">
                                    <textarea disabled name="message" cols="190" rows="3">{{$msg->message}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="row" style="margin-left: 14.0%;">
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
                    @if($support->status == 'Açık' || $support->status == 'Kapalı')
                    <form action="{{route('destek.message.create',$support->id)}}" method="post">
                        @csrf
                        <div class="col-10">
                            <div class="invoice p-3 mb-3">
                                <label for="">Destek Talebine Mesaj Gönderin</label>
                                <div class="row invoice-info">
                                    <div class="row">
                                        <div class="col-12">
                                            <textarea {{$support->status == 'Askıda' ? 'disabled' : ''}} name="message" cols="190" rows="3"></textarea>
                                        </div>
                                        <div class="col-10"><br>
                                            <button type="submit" class="btn btn-primary btn-sm col-12" style="margin-left: 10.0%;">Mesajı Gönder</button>
                                        </div><br><br><br><br><br>
                                        <div class="col-8">
                                            <a href="{{route('destek.status.terminated',$support->id)}}" type="submit" class="btn btn-danger">Desteği Sonlandır</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br><br>
                        </div>
                    </form>
                    @endif
                    
                </div>
            </div>
        </section>
    </div>
</div>

@endsection