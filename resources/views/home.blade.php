@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div class="mt-4 mb-4 d-flex align-items-center justify-content-between">
                <h5 class="m-0">Polls</h5>
                <button type="button" class="btn btn-primary">New Poll +</button>
            </div>
                <div>   
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Otto</td>
                        <td>Otto</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>Otto</td>
                        <td>Otto</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                        <td>Otto</td>
                        <td><div><button type="button" class="btn btn-primary">E</button>  <button type="button" class="btn btn-danger">D</button></div></td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        
        </div>
    </div>
</div>
@endsection
