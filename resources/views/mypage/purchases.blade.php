@extends('layouts.app')

@section('content')
<div class="l-container l-sidebar--reverse">
  
  @component('components.mypageSidebar')
    @slot('user', $user);
  @endcomponent

  <section class="l-sidebar__mypage">
    <h1 class="p-mypage__title u-pb-m">購入したヒラメキ</h1>
    <div class="u-mb-xxl">
      
      <div id="app">

        <purchases-component :user-data="{{ $user_data }}"></purchases-component>

      </div>

    </div>

  </section>

</div>

@endsection