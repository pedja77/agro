@extends('./layouts/master')

@section('content')
    {{-- {{ json_encode($categories) }} --}}
    <main-content :items="{{ json_encode($categories) }}"/>
@endsection
