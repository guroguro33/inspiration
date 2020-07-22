@extends('layouts.app')

@section('title'){{ __('Login') }}@endsection

@section('description')
{{ __("Inspiration is a market site for buying and selling ideas. If you have an idea but can't shape it, why not sell that inspiration? If you can't think of an idea for a web service at all, why not buy inspiration for another person? It is a service that matches such people.")}}
@endsection

@section('content')
<div class="l-container">
  <form action="{{ route('login') }}" method="POST" class="l-auth">
    @csrf
    <h3 class="c-form__title u-pb-xl">{{ __('Login') }}</h3>
    <ul>

      <li class="c-form__item u-pb-l">
        <label class="c-form__item__name">
          {{ __('E-Mail Address') }}
          <input type="email" name="email" class="c-form__item__input u-border u-mb-s  @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="{{ __('Please Enter')}}" required autocomplete="email" autofocu>
        </label>
        @error('email')
        <span class="c-form__item--alert" role="alert">{{ $message }}</span>
        @enderror
      </li>

      <li class="c-form__item u-pb-l">
        <label class="c-form__item__name">
          {{ __('Password') }}
          <input type="password" name="password" class="c-form__item__input u-border u-mb-s  @error('password') is-invalid @enderror" placeholder="{{ __('Please Enter')}}" required autocomplete="current-password">
        </label>
        @error('password')
        <span class="c-form__item--alert" role="alert">{{ $message }}</span>
        @enderror
      </li>

      <label class="c-form__save u-pb-l">
        <input type="checkbox" name="form-save" class="c-form__save__box" {{ old('form-save')? 'checked' : '' }}>
        <span class="c-form__save__text">{{ __('Remember Me') }}</span>
      </label>

      <input type="submit" class="c-form__btn c-btn__main--gray1 u-mb-m" value="{{ __('Login') }}">

    <p class="c-form__remind">{{ __('If you forget your password,')}}<a href="{{ route('password.request') }}" class="c-form__remind__link u-opacity">{{ __('Click here!')}}</a></p>
    </ul>
  </form>
</div>

@endsection
