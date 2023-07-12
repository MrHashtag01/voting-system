@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Poll
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
                    <form method="post" action="{{ route('polls.vote', $polls->id) }}">
                        @csrf
                        <div class="text-center">
                            Please Give Your Vote    
                        </div>
                        <div class="mb-2 mt-2">
                        {{ $polls->title }}
                        </div>
                        <div>

                        </div>
                        <div class="form-check">                
                            <input class="form-check-input" type="radio" name="vote" id="flexRadioDefault1" value="yes" {{ $selectedVote && $selectedVote->vote === 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault1">Yes</label>
                        </div>
                        <div class="form-check">                
                            <input class="form-check-input" type="radio" name="vote" id="flexRadioDefault2" value="no" {{ $selectedVote && $selectedVote->vote === 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault2">No</label>
                        </div>
                        
                        <button type="submit" class="btn btn-block btn-primary mt-3">Vote</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection