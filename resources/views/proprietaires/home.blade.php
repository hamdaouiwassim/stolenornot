@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/telephone/ajouter" class="btn btn-primary">Ajouter un nouveau telephone</a>
                    <hr>
                    <div class="alert alert-warning">
                        Noter bien il faut valider la propriete des telephone ajoutees ...
                    </div>
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Modele</th>
                            <th scope="col">Marque</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date Achat</th>
                            <th scope="col">Actions</th>
                            <th scope="col">Etat</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($proprietes as $Propriete)
                                <tr>
                                    <td>1</td>
                                    <th scope="row">{{ $Propriete->telephone->Modele }}</th>
                                    <td>{{ $Propriete->telephone->Marque }}</td>
                                    <td>{{ $Propriete->telephone->Description }}</td>
                                    <td>{{ $Propriete->telephone->date_achat }}</td>
                                    <td>
                                     @if (  $Propriete->etat == "Non Verifie" || $Propriete->etat == "Refusee")
                                     <a href="{{ route('Addfacture',['id'=>$Propriete->id])}}" class="btn btn-secondary">valider propriete</a>
                                     @elseif($Propriete->etat == "Verifie")
                                     <a href="" class="btn btn-info">venter</a>
                                     <a onclick="return confirm('Votre telephone a ete vraiment voler')" href="{{ route('voler',['id' => $Propriete->id_telephone ])}}" class="btn btn-danger">declarer comme volé</a>
                                     @else
                                     Aucun Action permis
                                     @endif   
                                    </td>
                                    <td>
                                        <h2 class="btn @if($Propriete->etat == "Verifie")  btn-success  @elseif($Propriete->etat == "Non Verifie")  btn-warning @else btn-danger @endif ">{{ $Propriete->etat }}</h2>
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