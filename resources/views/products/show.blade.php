@extends('app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">Product</h1>
        @if(Auth::check())
            <b>Rate the product</b>

            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf

                <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                <select name="rating">
                    @for ($i = 1; $i <= 5; $i++)
                        @if($product->reviews->where('user_id', auth()->id())->first())
                            <option value="{{ $i }}" {{ $i == $product->reviews->where('user_id', auth()->id())->first()->rating ? 'selected' : '' }}>{{ $i }}</option>
                        @else
                            <option value="{{ $i }}" {{ $i == 4 ? 'selected' : '' }}>{{ $i }}</option>
                        @endif
                    @endfor
                </select>
                <input type="submit" value="Rate" />
            </form>
            @if($product->reviews->where('user_id', auth()->id())->isNotEmpty())
                Your rating for this product: <b>{{ $product->reviews->where('user_id', auth()->id())->first()->rating }}</b>
            @endif
        @endif
        <hr />
        <div><strong>Name</strong>: {{ $product->name }}</div>
        <div><strong>Description</strong>: {{ $product->description }}</div>
        <div><strong>Price</strong>: ${{ $product->price }}</div>
        <div><strong>Category</strong>: {{ $product->category->name }}</div>
        <div>
            <div class="card-footer">
                <small class="text-muted">
                    <strong>Rating</strong>:
                    {{ $product->reviews->avg('rating') }}
                    @for($i=1; $i<=5; $i++)
                        @if(round($product->reviews->avg('rating')) >= $i)
                            &#9733;
                        @else
                            &#9734;
                        @endif
                    @endfor
                </small>
            </div>
        </div>
        <br />
        <div>
            <img class="card-img" src="{{ $product->photo ? Storage::url($product->photo) : Storage::url('photos/default.png') }}"
                 alt="img-{{ $product->id }}">
        </div>
        <br />
    </div>
    <!-- /.col-lg-12 -->
@endsection
