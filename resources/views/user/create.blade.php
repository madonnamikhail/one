<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
<div class="container mx-auto">
    <div class="row">
        <div class="col-12">
            <h1 style="text-align: center;">You can Insert new provider</h1>
        </div>
        <div class="col-6 offset-2">
            @if (Session()->has('Success'))
                <div class="alert alert-success">{{ Session()->get('Success') }}</div>
                @php
                    Session()->forget('Success');
                @endphp
            @endif
            @if (Session()->has('Error'))
                <div class="alert alert-danger">{{ Session()->get('Error') }}</div>
                @php
                    Session()->forget('Error');
                @endphp
            @endif
            <form method="post" action="{{ route('create.user') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('Name') }}</label>
                        <input type="name" name="name" class="form-control" value="{{ old('name') }}"
                            id="exampleInputEmail1" placeholder="Enter name">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('Username') }}</label>
                        <input type="text" name="username" value="{{ old('username') }}" class="form-control"
                            id="exampleInputEmail1" placeholder="Enter username">
                    </div>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('Email') }}</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                            id="exampleInputEmail1" placeholder="Enter Email">
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('Password') }}</label>
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control"
                            id="exampleInputEmail1" placeholder="Enter Password">
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit"
                        class="btn btn-primary">{{ 'Submit' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
</html>