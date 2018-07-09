@extends('./layouts/master')

@section('content')
    <div class="container mt-5 pt-5">
        <div class="text-center mt-5 pt-5">
            <h2 >{{ $product->TIP_EN }} {{ $product->ZIS_OZNAKA }}</h2>
            {{-- <h3>{{ $product->PODTIP_EN }}</h3> --}}
        </div>
        {{-- <h2 class="text-center">{{ $product->TIP_EN }} {{ $product->ZIS_OZNAKA }}</h2>
        <h3>{{ $product->PODTIP_EN }}</h3> --}}
        <div class="row mb-4 pb-4">
            <div class="col-4">
                <filters />
                <sidebar-menu :categories="{{ json_encode($categories) }}"/>
            </div>
            <div class="col-5">
                <img src="{{ url('/images/products/' . $product->SIFRA_PROIZVODA . '-01.jpg') }}" alt="" width="80%"/>
                <img src="{{ url('/images/drawings/' . $product->CRTEZ_BROJ . '.jpg') }}" alt="" width="80%"/>
            </div>
            <div class="col-3">
                <price-list :product="{{ json_encode($product) }}" />
            </div>
        </div>
    </div>
@endsection
