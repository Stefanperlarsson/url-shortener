@extends('layout')

@section('content')
    <h1> URL Shortener</h1>
    <div class="card">
        <div class="card-header">
            <form method="POST" action="{{ route('index.post') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="link" class="form-control" placeholder="URLを入力してください" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">作成</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">

            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            <table class="table table-bordered table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>ショートコード</th>
                    <th>リンク</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($links as $link)
                        <tr>
                            <td>{{ $link->id }}</td>
                            <td><a href="{{ route('shorten.link', $link->code) }}" target="_blank">{{ route('shorten.link', $link->code) }}</a></td>
                            <td>{{ $link->link }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
