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
                    <form action="/contrat/adddb" method="post" enctype="multipart/form-data">
                        @csrf
    
    
                            <div class="form-group">
                                <label for="">Nom d'acheteur </label>
                                <input class="form-control" type="text" name="nom" >
                            </div>
    
                            
                            <div class="form-group">
                                <label for="">Email acheteur </label>
                                <input class="form-control" type="email" name="email" >
                            </div>
    
    
                            <div class="form-group">
                                <label for="">Specifier une mot de passe pour l'acheteur </label>
                                <input class="form-control" type="password" name="pw" >
                            </div>
    
                            <div class="form-group">
                                <label for="">Fichier de contrat </label>
                                <input class="form-control" type="file" name="document" >
                            </div>
    
                        <input class="form-control" type="hidden" name="idtelephone" value="{{ $telephone->id }}" >
    
    
                            <div class="form-group">
                               
                                <input class="btn btn-success btn-block"  type="submit"  >
                            </div>
    
                       </form>
    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
