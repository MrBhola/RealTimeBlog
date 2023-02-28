@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post Detail</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            <span>{{$post->auther->name}}</span>
                            <h2>{{ $post->title }}</h2>
                            <hr>
                            <p>{{ $post->content }}</p>
                            <div class="d-flex">
                                {{ $post->likes_count }}
                                <form method="POST" action="{{ route('like.store') }}">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <button style="margin-left: 6px" type="submit">Like</button>
                                </form>
                            </div>
                            <div>
                                <h3>Comments</h3>
                                <hr>
                                @foreach ($post->comments as $comment)
                                    <div
                                        style="border: 1px solid green; border-radius: 10px; padding: 10px; margin: 10px 0">
                                        <p>{{ $comment->user->name }}</p>
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
