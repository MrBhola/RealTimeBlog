@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post List</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            @forelse( $posts as $post)
                                <a href="{{route('post.show', $post->id)}}" >
                                    <span>{{$post->auther->name}}</span>
                                    <h2>{{$post->title}}</h2>
                                    <p>{{$post->content}}</p>
                                </a>
                                <hr>
                            @empty
                                <div>
                                    No post
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
