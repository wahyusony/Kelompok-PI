@extends('layouts.app')
@include('navbar')

@section('content')
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

<!-- Bootstrap JavaScript Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <form action="{{ route('generate.token') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Generate API Token</button>
            </form>

            <h1 class="mt-4">Your API token is:</h1>
@if(!Cookie::get('api_token'))
    @if(isset($tokens) && count($tokens) > 0)
        <div class="card">
            <div class="card-body">
                @foreach($tokens as $token)
                    @if(isset($token['api_token']))
                        <p class="mb-0">{{ $token['api_token'] }}</p>
                        @php
                            // Store the token in a cookie that expires after 1 month
                            Cookie::queue('api_token', $token['api_token'], 43200);
                        @endphp
                    @endif
                @endforeach
            </div>
        </div>
    @endif
@else
    <div class="card">
        <div class="card-body">
            <p class="mb-0">{{ Cookie::get('api_token') }}</p>
        </div>
    </div>
@endif




        </div>
    </div>
</div>
@endsection








