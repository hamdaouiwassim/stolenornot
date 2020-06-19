@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                Verification du propriete du telephone 
                <span style="color:blue;font-weight:bold">{{ $propriete->telephone->Modele }}</span>
                <br />
                <br />
                <div class="alert alert-warning">
                    Noter bien que la verification ca sera assurer par l'adminstrateur ...
                </div>
            </div>

                <div class="card-body">
                   <form action="/facture/adddb" method="post" enctype="multipart/form-data">
                    @csrf

                        <input type="hidden" name="idtelephone" value="{{ $propriete->telephone->id }}" >
                        <div class="form-group">
                            <label for="">Nom facture </label>
                            <input class="form-control" type="text" name="facture" required>
                        </div>



                        <div class="form-group">
                            <label for="">facture en pdf </label>
                            <input class="form-control" type="file" name="document" required >
                        </div>


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