@extends('./layouts/master')

@section('slider')
    @include('./partials/slider')
@endsection

@section('content')
    <div>
    {{-- {{ $newProducts }} --}}
    <home-catalog-body :items="{{ json_encode($newProducts) }}" :categories="{{ json_encode($categories) }}"/>
    </div>
@endsection
