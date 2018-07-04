@extends('./layouts/master')

@section('content')
    {{-- {{ json_encode($categories) }} --}}
    {{-- <main-content :items="{{ json_encode($categories) }}"/> --}}
    <div>
    {{-- {{ $newProducts }} --}}
        <home-catalog-body  :categories="{{ json_encode($categories) }}" :items="{{ json_encode($products) }}"/>
    </div>
@endsection

{{-- :items="{{ json_encode($newProducts) }}"      belongs to HomeCatalogBody --}}
