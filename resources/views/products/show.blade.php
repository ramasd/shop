@extends('app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">Product</h1>

        <div><strong>Name</strong>: {{ $product->name }}</div>
        <div><strong>Description</strong>: {{ $product->description }}</div>
        <div><strong>Price</strong>: ${{ $product->price }}</div>
        <div><strong>Category</strong>: {{ $product->category->name }}</div>
        <br />
        <div>
            <img class="card-img" src="{{ $product->photo ? Storage::url($product->photo) : Storage::url('photos/default.png') }}"
                 alt="img-{{ $product->id }}">
        </div>
        <br />
    </div>
    <!-- /.col-lg-12 -->
@endsection
