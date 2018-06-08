@extends('./layouts/master')

@section('content')
    <ul>
        @foreach(array_keys($categories) as $category)
            <li>{{ $category }}</li>
        @endforeach
    </ul>
@endsection
