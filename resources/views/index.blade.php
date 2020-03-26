@extends('app')

@section('content')
    <div class="col-lg-3">

        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
            @foreach($categories as $category)
                <a href="/?category_id={{ $category->id }}" class="list-group-item">{{ $category->name }}</a>
            @endforeach
        </div>

    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($banners as $banner)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $banner->id }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">

                @foreach($banners as $banner)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img class="d-block img-fluid" src="{{ Storage::url($banner->path) }}" alt="Slide-{{ $banner->id }}">
                    </div>
                @endforeach
            </div>


            @if(count($banners) > 1)
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
            @endif
        </div>

        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('products.show', $product->id) }}">
                            <img class="card-img-top" src="{{ $product->photo ? Storage::url($product->photo) : Storage::url('photos/default.png') }}" alt="img-{{ $product->id }}">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                            </h4>
                            <h5>${{ $product->price }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <hr />
                            Category: {{ $product->category->name }}
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
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
                </div>
            @endforeach

        </div>
        <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->
@endsection('content')
