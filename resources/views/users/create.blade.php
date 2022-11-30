@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="card w-100">
            <div class="card-header text-center mb-bg-pink-light">
              <h3>User Information</h3>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('register-user-information') }}">
                @csrf
                <div class="mb-3">
                  <label for="fname">First name:</label>
                  <input type="text" id="fname" name="fname" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="mname">Middle Name:</label>
                  <input type="text" id="mname" name="mname" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="lname">Last Name:</label>
                  <input type="text" id="lname" name="lname" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="birthdate">Birthdate:</label>
                  <input type="date" id="birthdate" name="birthdate" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="phone_number">Phone Number:</label>
                  <input type="text" id="phone_number" name="phone_number" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="street">Street:</label>
                  <input type="text" id="street" name="street" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="barangay">Barangay:</label>
                  <input type="text" id="barangay" name="barangay" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="municipality">Municipality/City:</label>
                  <input type="text" id="municipality" name="municipality" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="province">Province:</label>
                  <input type="text" id="province" name="province" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="zip_code">Zip Code:</label>
                  <input type="text" id="zip_code" name="zip_code" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="zip_code">Role:</label>
                  <select name="role" class="form-control">
                      <option value="1">Administrator</option>                              
                      <option value="2">Staff</option>                              
                  </select>
                </div>
                <div class="mb-3">
                  <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class=" mb-3">
                  <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
              
                <div class="text-center">
                  <button class="btn btn-md mb-btn" type="submit">Submit</button>
                  <a class="btn btn-md mb-btn" href="{{ route('user-list') }}">Back</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
    
@section('after-content')
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
@endsection
