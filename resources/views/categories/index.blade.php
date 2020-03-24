@extends('app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">Categories</h1>

        <a href="{{ route('categories.create') }}" class="btn btn-primary">New Category</a>
        <br /><br />

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th></th>
                </tr>
                @foreach($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->name }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('categories.edit', $categorie->id) }}">Edit</a>

                            <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" style="display: inline">
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
