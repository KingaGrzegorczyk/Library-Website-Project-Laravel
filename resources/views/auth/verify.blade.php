@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Zweryfikuj adres e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link do weryfikacji został wysłany na Twój adres e-mail.') }}
                        </div>
                    @endif

                    {{ __('Sprawdź skrzynkę mailową w celu weryfikacji hasła.') }}
                    {{ __('Jeśli nie otrzymałeś wiadomości') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('kliknij tutaj, aby otrzymać kolejną') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
