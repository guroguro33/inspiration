@extends('layouts.app')

@section('title'){{ __('Edit ​Hirameki') }}@endsection

@section('description')
{{ __('It is the edit page of Himeraki.')}}{{ __("Inspiration is a market site for buying and selling ideas. If you have an idea but can't shape it, why not sell that inspiration? If you can't think of an idea for a web service at all, why not buy inspiration for another person? It is a service that matches such people.")}}
@endsection

@section('content')
<div class="l-container l-sidebar--reverse">
  
  @component('components.mypageSidebar')
    @slot('user', $user);
    @slot('isImage', $isImage);
  @endcomponent

  @component('components.ideaForm')
  @slot('categories', $categories);
  @slot('idea', $idea);
  @endcomponent
  
</div>

@endsection
