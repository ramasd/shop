@extends('app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">Categories</h1>

        <a href="{{ route('categories.create') }}" class="btn btn-primary">New Category</a>
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
                            <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Edit</a>

                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')" />
                            </form>
                        </td>
                    </tr>
                @endforelse
            </thead>
        </table>

    </div>
    <!-- /.col-lg-12 -->
@endsection
