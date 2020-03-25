@extends('app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">Edit Banner</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            Name:
            <br />
            <input type="text" name="name" value="{{ $banner->name }}" class="form-control" />
            <br />

            Description:
            <br />
            <textarea name="description" class="form-control">{{ $banner->description }}</textarea>
            <br />

            Photo:
            <br />
            <input type="file" name="photo" />
            <br /><br />

            <input type="submit" class="btn btn-primary" value="Save" />
            <br /><br />
        </form>

    </div>
    <!-- /.col-lg-12 -->
@endsection
