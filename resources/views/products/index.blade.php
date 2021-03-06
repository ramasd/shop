@extends('app')

@section('content')
    <div class="col-lg-12">
        @if (session('success'))
            <div class="alert  alert-success alert-dismissible fade show" style="margin-top: 10px;" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <h1 class="my-4">Products</h1>

        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">New Product</a>
        <br /><br />

        <table class="table">
            <thead>
                @if(count($products))
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                @endif
                @forelse($products as $product)
                    <tr>
                        <td><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></td>
                        <td>${{ $product->price }}</td>
                        <td>
                            @if($product->category)
                                {{ $product->category->name }}
                            @endif
                        </td>
                        <td>
                            <img src="{{ $product->photo ? Storage::url($product->photo) : Storage::url('photos/default.png') }}" alt="img-{{ $product->id }}" height="50">
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.products.edit', $product->id) }}">Edit</a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')" />
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td>No categories found.</td></tr>
                @endforelse
            </thead>
        </table>

    </div>
    <!-- /.col-lg-12 -->
@endsection
