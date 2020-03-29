@extends('app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">Category edit</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @method('PUT')
            @csrf

            Name:
            <br />

            <input type="text" name="name" value="{{ $category->name }}" class="form-control" />
            <br />

            <input type="submit" class="btn btn-primary" value="Update" />
            <br /><br />
        </form>

    </div>
    <!-- /.col-lg-12 -->
@endsection
