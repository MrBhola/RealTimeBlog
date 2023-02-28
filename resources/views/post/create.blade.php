@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Post</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            <form action="{{route('post.store')}}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" required>
                                </div>
                                <div class="mt-2 form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" name="content" id="content" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="mt-3 btn btn-success">Publish</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
