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

        <h1 class="my-4">Banners</h1>

        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">New Banner</a>
        <br /><br />

        <table class="table">

            <thead>
                @if(count($banners))
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                @endif
                @forelse($banners as $banner)
                    <tr>
                        <td><a href="{{ route('admin.banners.show', $banner->id) }}"><img src="{{ Storage::url($banner->path) }}" height="50"/></a></td>
                        <td>{{$banner->name}}</td>
                        <td>{{$banner->description}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.banners.edit', $banner->id) }}">Edit</a>

                            <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')" />
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td>No banners found.</td></tr>
                @endforelse
            </thead>
        </table>

    </div>
    <!-- /.col-lg-12 -->
@endsection
