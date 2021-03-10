@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                        <h3>Brak dostępnych egzemplarzy!</h3>       
                        <h4>Poczekaj, aż ktoś zwróci wybraną książkę</h4> 
                        <br/>
                        <a href="/search" class="btn btn-secondary" title="powrot"> Szukaj dalej </a>           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection