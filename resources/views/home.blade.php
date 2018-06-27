@extends('./layouts/master')



@section('content')
    <div>
    {{-- {{ $newProducts }} --}}
    <main-content :items="{{ json_encode($newProducts) }}"/>
    </div>
@endsection
