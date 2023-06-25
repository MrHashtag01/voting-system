@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Edit Poll
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('polls.update', $polls->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control mt-2 mb-2" name="title" value="{{$polls->title}}" />
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control mt-2" name="slug" value="{{$polls->slug}}" />
                        </div>
                        <button type="submit" class="btn btn-block btn-primary mt-3">Update Poll</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection