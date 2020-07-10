@extends('layouts.app')

@section('content')
<div class="l-container l-sidebar--reverse">

  @component('components.mypageSidebar')
    @slot('user', $user);
    @slot('isImage', $isImage);
  @endcomponent

  <section class="l-sidebar__mypage">
    <h1 class="p-mypage__title u-pb-m">{{ __('Reviews from buyers') }}</h1>
    <div class="u-mb-xxl">
      
      <reviews-component :evaluations="{{ $evaluations }}"></reviews-component>
      
    </div>
  </section>

</div>

@endsection