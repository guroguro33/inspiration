@extends('layouts.app')

@section('content')
<div class="l-container l-sidebar--reverse">

  @component('components.mypageSidebar')
    @slot('user', $user);
  @endcomponent

  <section class="l-sidebar__mypage">
    <h1 class="p-mypage__title u-pb-m">プロフィール編集</h1>
    <form action="{{ route('mypage.update') }}" method="POST" class="c-form">
      @csrf
      <div class="u-mb-xxl">
        <div class="p-mymenu__img u-pb-m">
          @if($user->user_img)
          <img src="{{ $user->user_img }}" alt="ユーザーのアイコン">
          @else
          <img src="{{ asset('./img/no-img2.svg') }}" alt="ユーザーのアイコン">
          @endif
        </div>
        <input type="file" name="user_img" class="c-form__file @error('user_img') is-invalid @enderror" value="ファイルを選択">
      </div>
      <ul>
        <li class="c-form__item u-pb-l">
          <label class="c-form__item__name">
            {{ __('Name') }}{{ __('Required') }}
            <input type="text" name="name" class="c-form__item__input u-mb-s @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" placeholder="{{ __('Please Enter')}}" required>
          </label>
          @error('name')
          <span class="c-form__item--alert">{{ $message }}</span>
          @enderror
        </li>
        <li class="c-form__item u-pb-l">
          <label class="c-form__item__name">
            {{ __('E-Mail Address') }}{{ __('Required') }}
            <input type="email" name="email" class="c-form__item__input u-mb-s @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" placeholder="{{ __('Please Enter')}}" required>
          </label>
          @error('email')
          <span class="c-form__item--alert">{{ $message }}</span>
          @enderror
        </li>
        <li class="c-form__item u-pb-l">
          <label class="c-form__item__name">
            {{ __('Password')}}{{ __('Required') }}<span>※{{ __('8 characters or more')}}</span>
            <input type="password" name="password" class="c-form__item__input u-mb-s @error('password') is-invalid @enderror" placeholder="{{ __('Please Enter')}}" required>
          </label>
          @error('password')
          <span class="c-form__item--alert">{{ $message }}</span>
          @enderror
        </li>
        <li class="c-form__item u-pb-l">
          <label class="c-form__item__name">
            {{ __('Confirm Password') }}
            <input type="password" name="password_confirmation" class="c-form__item__input u-mb-s" placeholder="{{ __('Please Enter')}}">
          </label>
        </li>
        <li class="c-form__item u-pb-l">
          <label class="c-form__item__name">
            {{ __('Self Introduction') }}
            <textarea name="user_introduce" class="c-form__item__text" cols="20" rows="10" placeholder="{{ __('Please Enter')}}">{{ old('user_introduce', $user->user_introduce) }}</textarea>
          </label>
          @error('user_introduce')
          <span class="c-form__item--alert">{{ $message }}</span>
          @enderror
        </li>
      </ul>
      <input type="submit" class="c-form__btn c-btn__main--gray1 u-mb-xxl" value="{{ __('Registration') }}">
    </form>

  </section>
</div>
@endsection