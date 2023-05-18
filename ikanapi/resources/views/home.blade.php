@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <form action="{{ route('generate.token') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Generate API Token</button>
            </form>

            <h1 class="mt-4">Your API token is:</h1>
            @if(isset($tokens) && count($tokens) > 0)
                <div class="card">
                    <div class="card-body">
                        @foreach($tokens as $token)
                            @if(isset($token['api_token']))
                                <p class="mb-0">{{ $token['api_token'] }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection








