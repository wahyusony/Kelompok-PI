<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('navbar')

    <title>Halaman Token API</title>
  </head>
  <body>

    <div class="container mt-4">
      <h1>Your API token is:</h1>
      @if(!Cookie::get('api_token'))
        @if(isset($tokens) && count($tokens) > 0)
          <div class="card mt-4">
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
        <div class="card mt-4">
          <div class="card-body">
            <p class="mb-0">{{ Cookie::get('api_token') }}</p>
          </div>
        </div>
      @endif
    </div>
    <div class="row justify-content-center mt-4">
    <div class="col-md-10">
        <form action="{{ route('generate.token') }}" method="POST">
            @csrf
            
            <button type="submit" class="btn btn-primary" id="generate-button">Generate API Token</button>
        </form>
    </div>
</div>

<script>
    document.getElementById("generate-button").addEventListener("click", function() {
        alert("Silahkan Gunakan API Yang Telah Anda Generate!");
    });
</script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
