@extends('./layouts/master')

@section('slider')
    @include('./partials/slider')
@endsection

@section('content')
    <div>
    {{-- {{ $newProducts }} --}}
    <main-content :items="{{ json_encode($newProducts) }}"/>
    </div>
@endsection
