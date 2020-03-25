@extends('app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">Products</h1>

        <a href="{{ route('products.create') }}" class="btn btn-primary">New Product</a>
        <br /><br />

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></td>
                        <td>${{ $product->price }}</td>
                        <td>
                            <img src="{{ $product->photo ? Storage::url($product->photo) : 'http://placehold.it/700x400' }}" alt="img-{{ $product->id }}" height="50">
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </thead>
        </table>

    </div>
    <!-- /.col-lg-12 -->
@endsection
