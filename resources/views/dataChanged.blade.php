@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                        <h3>Twoje dane zostały zmienione!</h3>        
                        <br/>
                        <a href="{{ route('data') }}" class="btn btn-secondary" title="powrot"> Powrót do Twoich danych </a>          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
