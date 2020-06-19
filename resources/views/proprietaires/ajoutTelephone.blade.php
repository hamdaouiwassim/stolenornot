@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                   <form action="/telephone/adddb" method="post">
                    @csrf


                        <div class="form-group">
                            <label for="">Modele </label>
                            <input class="form-control" type="text" name="modele" >
                        </div>

                        
                        <div class="form-group">
                            <label for="">marque </label>
                            <input class="form-control" type="text" name="marque" >
                        </div>


                        <div class="form-group">
                            <label for="">Description </label>
                            <textarea class="form-control" name="description" ></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Date d'achat </label>
                            <input class="form-control" type="date" name="dateachat" >
                        </div>

                        <div class="form-group">
                            <label for="">IMEI </label>
                            <input class="form-control" type="text" minlength="16"  name="imei" >
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