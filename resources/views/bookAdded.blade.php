@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                        <h3>Twoja książka została zarezerowana!</h3>        
                        <br/>
                        <a href="{{ route('book') }}" class="btn btn-secondary" title="kontynuuj"> Kontynuuj przegląd książek </a>
                        <br/><br/>
                        <a href="{{ route('show') }}" class="btn btn-secondary" title="zobacz"> Zobacz swoje książki </a>           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
