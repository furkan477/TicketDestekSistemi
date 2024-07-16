<option value="{{ $category->id }}">{{$space}} {{$category->name}}</option>
    @if($category->subcategory->isNotEmpty())
        @foreach($category->subcategory as $altcat)
            @include('frontend.subcategoriescreate',['category' => $altcat , 'space' => $space .'-'])
        @endforeach
    @endif