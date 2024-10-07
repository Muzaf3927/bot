@extends('admin.app')

@section('content')
    <div class="container my-4">
        <h1>{{ $news->title }}</h1>
        <p>{{ $news->content }}</p>

        <a href="{{ route('news.index') }}" class="btn btn-secondary mt-3">Ortga qaytish</a>
    </div>
@endsection
