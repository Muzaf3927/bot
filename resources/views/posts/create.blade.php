@extends('admin.app')

@section('content')
    <div class="container my-4">
        <h1 class="mb-4">Yangi Yangilik Qo'shish</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('news.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Sarlavha</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="content">Mazmuni</label>
                <textarea name="content" id="content" rows="5" class="form-control" required>{{ old('content') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Saqlash</button>
        </form>
    </div>
@endsection
