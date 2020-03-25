@extends('app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">Banner</h1>

        <div><strong>Name</strong>: {{ $banner->name }}</div>
        <div><strong>Description</strong>: {{ $banner->description }}</div>
        <br />
        <div>
            <img class="card-img" src="{{ $banner->path ? Storage::url($banner->path) : Storage::url('banners/default.png') }}"
                 alt="img-{{ $banner->id }}">
        </div>
        <br />
    </div>
    <!-- /.col-lg-12 -->
@endsection
