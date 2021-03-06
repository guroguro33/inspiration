@extends('layouts.app')

@section('title'){{ __('Reset Password') }}@endsection

@section('description')
{{ __("Inspiration is a market site for buying and selling ideas. If you have an idea but can't shape it, why not sell that inspiration? If you can't think of an idea for a web service at all, why not buy inspiration for another person? It is a service that matches such people.")}}
@endsection

@section('content')
<div class="l-container">
  <form action="{{ route('password.email') }}" method="POST" class="l-auth">
    @csrf
    <h3 class="c-form__title u-pb-xl">{{ __('Reset Password') }}</h3>

    @if (session('status'))
      <div class="c-alert__sendMail u-pb-l" role="alert">
        {{ session('status') }}
      </div>
    @endif

    <div class="c-form__item u-pb-xl">
      <label class="c-form__item__name">
        {{ __('E-Mail Address') }}
        <input type="email" name="email" class="c-form__item__input u-border u-mb-s @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="{{ __('Please Enter')}}" required autocomplete="email" autofocus>
      </label>
      @error('email')
      <span class="c-form__item--alert" role="alert">{{ $message }}</span>
      @enderror
    </div>
    <input type="submit" class="c-form__btn c-btn__main--gray1 u-mb-xxl" value="{{ __('Send Password Reset Link') }}">
  </form>
</div>

@endsection
