@extends('layouts.app')

@section('title', 'Edit Profile')
@section('body_class', 'body_editProfile')

@section('content')

    <form class="form mt-4 d-flex flex-column align-items-center" action="" method="post" id="editProfileForm">
        @csrf
        <div class="form-group col-md-6">
            <div class="col-md-6 offset-md-3">
                <h5>
                    <label for="name">{{ __('Username') }}</label>
                </h5>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" title="enter your username" value="{{ $user->name }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group col-md-6">
            <div class="col-md-6 offset-md-3">
                <h5>
                    <label for="email">{{ __('E-mail Address') }}</label>
                </h5>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="you@email.com" title="enter your email." value="{{ $user->email }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="col-md-6 offset-md-3">
                <h5>
                    <label for="password">{{ __('New password') }}</label>
                </h5>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="New password" title="enter your password.">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="col-md-6 offset-md-3">
                <h5>
                    <label for="confirmPasswd">{{ __('Confirm password') }}</label>
                </h5>
                <input type="password" class="form-control" name="password_confirmation" id="confirmPasswd" placeholder="Confirm password" title="enter your password2">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <br>
                <button class="btn btn-success" type="submit" id="submit" name="submit">Save</button>
            </div>
        </div>
    </form>

@endsection