@extends('./layouts/master')

@section('content')
    {{ json_encode($categories) }}
@endsection
