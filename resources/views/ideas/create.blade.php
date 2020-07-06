@extends('layouts.app')

@section('content')
<div class="l-container l-sidebar--reverse">

  @component('components.mypageSidebar')
    @slot('user', $user);
    @slot('isImage', $isImage);
  @endcomponent
  
  @component('components.ideaForm')
    @slot('categories', $categories);
  @endcomponent
  
</div>

@endsection
