@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Add User
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
                    <form method="post" action="{{ route('polls.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control mt-2 mb-2" name="title" />
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control mt-2" name="slug" />
                        </div>
                        <button type="submit" class="btn btn-block btn-primary mt-3">Create Poll</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
