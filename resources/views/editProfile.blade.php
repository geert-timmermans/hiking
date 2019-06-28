@extends('layouts.app')

@section('title', 'Edit Profile')
@section('body_class', 'body_editProfile')

@section('content')
<div class="container">
    <div class="row">
        <form class="form mt-4 col-10 offset-1 col-md-8 offset-md-2" action="" method="post" id="editProfileForm">
            @csrf
            <div class="form-group">
                <div class="col-md-6 offset-md-3">
                    <h5>
                        <label for="name">{{ __('Name') }}</label>
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
                <div class="col-12 d-flex justify-content-center my-3">
                    <br>
                    <a href="{{ URL::previous() }}" class="btn btn-outline-primary col-5 col-md-2 offset-md-1 text-white btnBackEditProfile">Back</a>
                    <button type="submit" class="btn btn-outline-success col-5 col-md-2 offset-1 offset-md-0 text-white btnEditProfile" name="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection