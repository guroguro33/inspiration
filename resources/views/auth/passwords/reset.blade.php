@extends('layouts.app')

@section('title'){{ __('Reset Password') }}@endsection

@section('description')
{{ __("Inspiration is a market site for buying and selling ideas. If you have an idea but can't shape it, why not sell that inspiration? If you can't think of an idea for a web service at all, why not buy inspiration for another person? It is a service that matches such people.")}}
@endsection

@section('content')
<div class="l-container">
  <form action="{{ route('password.update') }}" method="POST" class="l-auth">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <h3 class="c-form__title u-pb-xl">{{ __('Reset Password') }}</h3>
    <ul>
      <li class="c-form__item u-pb-l">
        <label class="c-form__item__name">
          {{ __('E-Mail Address') }}（{{ __('Required') }}）
          <input type="email" name="email" class="c-form__item__input u-border u-mb-s @error('email') is-invalid @enderror"  value="{{ $email ?? old('email') }}" placeholder="{{ __('Please Enter')}}" required autocomplete="email">
        </label>
        @error('email')
        <span class="c-form__item--alert" role="alert">{{ $message }}</span>
        @enderror
      </li>

      <li class="c-form__item u-pb-l">
        <label class="c-form__item__name">
          {{ __('Password')}}（{{ __('Required') }}）<span>※{{ __('8 characters or more')}}</span>
          <input type="password" name="password" class="c-form__item__input u-border u-mb-s @error('password') is-invalid @enderror" placeholder="{{ __('Please Enter')}}" required autocomplete="off" autofocus>
        </label>
        @error('password')
        <span class="c-form__item--alert" role="alert">{{ $message }}</span>
        @enderror
      </li>

      <li class="c-form__item u-pb-xxl">
        <label class="c-form__item__name">
          {{ __('Confirm Password') }}
          <input type="password" name="password_confirmation" class="c-form__item__input u-border u-mb-s @error('email') is-invalid @enderror"
            placeholder="{{ __('Please Enter')}}" required autocomplete="off">
        </label>
      </li>

      <input type="submit" class="c-form__btn c-btn__main--gray1 u-mb-xxl" value="{{ __('Reset Password') }}">
    </ul>
  </form>
</div>
@endsection
