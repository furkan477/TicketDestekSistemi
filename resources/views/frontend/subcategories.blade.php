<option value="{{ $category->id }}" {{ $support->id ='selected'}}>{{$space}} {{$category->name}}</option>
    @if($category->subcategory->isNotEmpty())
        @foreach($category->subcategory as $altcat)
            @include('frontend.subcategories',['category' => $altcat , 'space' => $space .'-'])
        @endforeach
    @endif