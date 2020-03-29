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

        <h1 class="my-4">Categories</h1>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">New Category</a>
        <br /><br />

        <table class="table">
            <thead>
                @if(count($categories))
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                @endif
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>

                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline">
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
