<form action='{{ url('login') }}' method="post">
    @csrf
<div class="container">
    <div class="row">
      <div class="col">
       
      </div>
      <div class="col">
        <div class="card">
            <div class="card-header">
             LOGIN
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username">
                  </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-primary">LOGIN</button>
            </div>
          </div>
      </div>
      <div class="col">
       
      </div>
    </div>
  </div>
</form>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Admin Login</title>
</head>
<body>
    <form method="POST" action="{{ url('admin.login') }}">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            LOGIN
                        </div>
                            <div class="card-body">
                                 <div class="mb-3">
                                   <label>Username:</label>
                                    <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                                        @error('username')
                                          <span>{{ $message }}</span>
                                        @enderror
                                 </div>
                            <div class="mb-3">
                                  <label>Password:</label>
                                   <input type="password" class="form-control" name="password">
                                       @error('password')
                                          <span>{{ $message }}</span>
                                       @enderror
                            </div>
                       </div>
                       <label>Admin Level:</label>
            <input type="text" name="admin_level" value="{{ old('admin_level') }}">
            @error('admin_level')
                <span>{{ $message }}</span>
            @enderror
        </div>
                   <div class="card-footer">
                <button type="submit" class="btn btn-primary">Login</button>
             @if($errors->any())
                 <div>
                    <span>{{ $errors->first() }}</span>
                 </div>
             @endif
        </div>
    </div>
  </div>
</div>
</div>
    </form>
</body>
</html> --}}