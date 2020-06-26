@extends('layouts.app')

@section('content')
<div class="l-container l-sidebar--reverse">

  @component('components.mypageSidebar')
    @slot('user', $user);
  @endcomponent
  
  @component('components.ideaForm')
    @slot('categories', $categories);
  @endcomponent
  
</div>

@endsection
