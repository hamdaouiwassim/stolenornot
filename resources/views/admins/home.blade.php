@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Type de verification</th>
                            <th scope="col">Voir</th>
                            <th scope="col">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($verifications as $verification)
                            <tr>
                                <td>#</td>
                                <td>{{ $verification->type }}</td>
                                <td><a href="" class="btn btn-primary">consulter le dossier</a></td>
                                <td>
                                    <a href="/verification/{{$verification->id }}/valider" class="btn btn-success">Valider</a>
                                    <a href="/verification/{{$verification->id }}/refuser" class="btn btn-danger">Refuser</a>
                                </td>
                                
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
