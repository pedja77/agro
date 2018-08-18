@extends('./layouts/master')

@section('content')
    <div class="mt-5 pt-5">
        <home-catalog-body  :categories="{{ json_encode($categories) }}" :items="{{ json_encode($products) }}"/>
    </div>
    <div class="row mt-4">
        <div class="col-4 mx-auto">
            {{ $products->render() }}
        </div>
    </div>
@endsection
