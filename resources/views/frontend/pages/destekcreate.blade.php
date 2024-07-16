@extends('frontend.layout.layout')

@section('content')
<br><br><br>
<div class="site-wrap">
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="h3 mb-3 text-black">Yeni Destek Talebi</h2>
                </div><br><br><br><br><br>
                <div class="col-md-12">
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
                    <form action="{{route('destek.create')}}" method="post">
                        @csrf
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">Ad Soyad <span class="text-danger">*</span></label>
                                    <input type="text" disabled class="form-control" value="{{$user->name}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">E-Posta <span class="text-danger">*</span></label>
                                    <input type="text" disabled class="form-control" value="{{$user->email}}">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="inputStatus"> Destek Kategorisi : </label>
                                <select type="submit" name="category_id" id="category" class="form-control">
                                    <option selected default></option>
                                    @foreach ($categories as $category)
                                        @include('frontend.subcategoriescreate',['category' => $category , 'space' => ''])
                                    @endforeach
                                </select>
                            </div>                   
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">Destek Seviyesi Seçiniz <span class="text-danger">*</span></label>
                                    <select type="submit" name="level"  class="form-control">
                                        <option selected default></option>
                                        <option value="Düşük">Düşük</option>
                                        <option value="Orta">Orta</option>
                                        <option value="Yüksek">Yüksek</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">Destek Durumu Seçiniz <span class="text-danger">*</span></label>
                                    <select type="submit" name="status" class="form-control">
                                        <option selected default></option>
                                        <option value="Açık">Açık</option>
                                        <option value="Kapalı">Kapalı</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_subject" class="text-black">Destek Konusu <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="subject">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_subject" class="text-black">Destek Konusu <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="file">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_message" class="text-black">Destek Sebebiniz <span class="text-danger">*</span></label>
                                    <textarea name="description" cols="30" rows="7" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Destek Talebi Oluştur</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div><br><br><br>

@endsection