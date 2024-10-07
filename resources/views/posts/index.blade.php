@extends('admin.app')

@section('content')
    <div class="container my-4">
        <h1 class="mb-4">Yangiliklar ro'yxati</h1>

        <!-- Muvaffaqiyatli xabarlar uchun -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Yangi Yangilik Qo'shish</a>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Sarlavha</th>
                <th>Mazmuni</th>
                <th>Harakatlar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($news as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->content, 50) }}</td>
                    <td>
                        <a href="{{ route('news.edit', $post->id) }}" class="btn btn-sm btn-warning">Tahrirlash</a>

                        <form action="{{ route('news.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Haqiqatdan ham o‘chirmoqchimisiz?')">O'chirish</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
