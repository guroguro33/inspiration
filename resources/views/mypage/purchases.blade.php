@extends('layouts.app')

@section('title'){{ __('Purchased inspirations') }}@endsection

@section('description')
{{ __('This is a list of the purchased inspirations.')}}{{ __("Inspiration is a market site for buying and selling ideas. If you have an idea but can't shape it, why not sell that inspiration? If you can't think of an idea for a web service at all, why not buy inspiration for another person? It is a service that matches such people.")}}
@endsection

@section('content')
<div class="l-container l-sidebar--reverse">
  
  @component('components.mypageSidebar')
    @slot('user', $user);
    @slot('isImage', $isImage);
  @endcomponent

  <section class="l-sidebar__mypage">
    <h1 class="p-mypage__title u-pb-m">{{ __('Purchased inspirations') }}</h1>
    <div class="u-mb-xxl">
      
      {{-- <div id="app"> --}}

        <purchases-component :user-data="{{ $user_data }}"></purchases-component>

      {{-- </div> --}}

    </div>

  </section>

</div>

@endsection