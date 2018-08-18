@extends('./layouts/master')

@section('slider')
    @include('./partials/slider')
@endsection

@section('content')
    <div>
    {{-- {{ $newProducts }} --}}
    <home-catalog-body :items="{{ json_encode($newProducts) }}" :categories="{{ json_encode($categories) }}"/>
    </div>
    <div class="row mt-4">
        <div class="col-4 mx-auto">
            {{ $newProducts->render() }}
        </div>
    </div>
@endsection
