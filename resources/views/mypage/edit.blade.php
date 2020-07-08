@extends('layouts.app')

@section('content')
<div class="l-container l-sidebar--reverse">

  @component('components.mypageSidebar')
    @slot('user', $user);
    @slot('isImage', $isImage);
  @endcomponent

  <section class="l-sidebar__mypage">
    <h1 class="p-mypage__title u-pb-m">{{ __('Edit profile') }}</h1>
    <form action="{{ route('mypage.update') }}" method="POST" class="c-form" enctype="multipart/form-data">
      @csrf
      <div class="u-mb-xxl">
        <div class="p-mymenu__img u-mb-m">
          @if($isImage)
          <img src="{{ asset('/storage/user_images/' . $user->user_img) }}" class="js-preview" alt="{{ __('Icon of User') }}">
          @else
          <img src="{{ asset('./img/no-img2.svg') }}" class="js-preview" alt="{{ __('Icon of User') }}">
          @endif
        </div>
        <input type="file" name="user_img" class="c-form__file" value="{{ __('Select files') }}">
        @error('user_img')
          <span class="c-form__item--alert">{{ $message }}</span>
        @enderror
      </div>
      <ul>
        <li class="c-form__item u-pb-l">
          <label class="c-form__item__name">
            {{ __('Name') }}{{ __('Required') }}
            <input type="text" name="name" class="c-form__item__input u-mb-s @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" placeholder="{{ __('Please Enter')}}" required autocomplete="name">
          </label>
          @error('name')
          <span class="c-form__item--alert">{{ $message }}</span>
          @enderror
        </li>
        <li class="c-form__item u-pb-l">
          <label class="c-form__item__name">
            {{ __('E-Mail Address') }}{{ __('Required') }}
            <input type="email" name="email" class="c-form__item__input u-mb-s @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" placeholder="{{ __('Please Enter')}}" required autocomplete="email">
          </label>
          @error('email')
          <span class="c-form__item--alert">{{ $message }}</span>
          @enderror
        </li>
        <li class="c-form__item u-pb-l">
          <label class="c-form__item__name">
            {{ __('New Password')}}<span>※{{ __('8 characters or more')}}</span>
            <input type="password" name="new_password" class="c-form__item__input u-mb-s @error('new_password') is-invalid @enderror" placeholder="{{ __('Please Enter')}}" autocomplete="off">
          </label>
          @error('new_password')
          <span class="c-form__item--alert">{{ $message }}</span>
          @enderror
        </li>
        <li class="c-form__item u-pb-l">
          <label class="c-form__item__name">
            {{ __('Confirm Password') }}
            <input type="password" name="new_password_confirmation" class="c-form__item__input u-mb-s" placeholder="{{ __('Please Enter')}}" autocomplete="off">
          </label>
        </li>
        <li class="c-form__item u-pb-l">
          <label class="c-form__item__name">
            {{ __('Self Introduction') }}
            <textarea name="user_introduce" class="c-form__item__text" cols="20" rows="10" placeholder="{{ __('Please Enter')}}" autocomplete="off">{{ old('user_introduce', $user->user_introduce) }}</textarea>
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