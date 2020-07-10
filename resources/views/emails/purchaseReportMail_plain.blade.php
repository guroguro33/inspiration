{{ __('Purchase notification') }}

{{ __('Hello!!')}} {{ $user->name }}{{ __('!')}}
@if($isBuyer === true)
{{ __('I will inform you that you have purchased Inspiration.')}}
@else
{{ __('We would like to inform you that the customer has purchased the inspiration.')}}
@endif
--------------------------------------------
{{ $idea->idea_title }}

{{ number_format($idea->idea_price) }}{{ __('yen') }}

{{ $idea->idea_description }}
--------------------------------------------

{{ __('For details of inspiration, please see this page')}} 
https://inspiration.com/idea/{{ $idea->id }}/show/

{{ __('Contact Us') }}:
Inspiration
Phone: 03-1234-5678
email: info@inspiration.com