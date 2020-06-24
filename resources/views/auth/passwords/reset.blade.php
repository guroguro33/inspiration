@extends('layouts.app')

@section('content')
<div class="l-container">
  <form action="{{ route('password.update') }}" method="POST" class="l-auth">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <h3 class="c-form__title u-pb-xl">{{ __('Reset Password') }}</h3>
    <ul>
      <li class="c-form__item u-pb-l">
        <label class="c-form__item__name">
          {{ __('E-Mail Address') }}{{ __('Required') }}
          {{-- @error('name') is-invalid @enderrorを保留 --}}
          <input type="email" name="email" class="c-form__item__input u-border u-mb-s"  value="{{ $email ?? old('email') }}" placeholder="{{ __('Please Enter')}}" required autocomplete="email">
        </label>
        @error('email')
        <span class="c-form__item--alert" role="alert">{{ $message }}</span>
        @enderror
      </li>

      <li class="c-form__item u-pb-l">
        <label class="c-form__item__name">
          {{ __('Password')}}{{ __('Required') }}<span>※{{ __('8 characters or more')}}</span>
          {{-- @error('name') is-invalid @enderrorを保留 --}}
          <input type="password" name="password" class="c-form__item__input u-border u-mb-s" placeholder="{{ __('Please Enter')}}" required autocomplete="new-password" autofocus>
        </label>
        @error('password')
        <span class="c-form__item--alert" role="alert">{{ $message }}</span>
        @enderror
      </li>

      <li class="c-form__item u-pb-xxl">
        <label class="c-form__item__name">
          {{ __('Confirm Password') }}
          {{-- @error('name') is-invalid @enderrorを保留 --}}
          <input type="password" name="password_confirmation" class="c-form__item__input u-border u-mb-s"
            placeholder="{{ __('Please Enter')}}" required autocomplete="new-password">
        </label>
      </li>

      <input type="submit" class="c-form__btn c-btn__main--gray1 u-mb-xxl" value="{{ __('Reset Password') }}">
    </ul>
  </form>
</div>
@endsection
