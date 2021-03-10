@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                        <h3>Aby usunąć konto musisz oddać wszystkie książki!</h3>        
                        <br/>
                        <a href="/data" class="btn btn-secondary" title="powrot"> Powrót do Twojego konta </a>       
                        <br/>
                        <br/>
                        <a href="/show" class="btn btn-secondary" title="powrot"> Oddaj książki </a>     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
