{{ __('Review receipt notification') }}

{{ __('Hello!!')}} {{ $user->name }}{{ __('!')}}
@if($isFirstReview === true)
{{ __('We would like to inform you that we have received reviews of the inspiration you sold.') }}
@else
{{ __('We would like to inform you that there was an update on the inspiration you sold.')}}
@endif
--------------------------------------------
{{ $evaluation->idea_review }}

{{ __('Evaluation points')}}：{{ $evaluation->five_rank }}
--------------------------------------------

{{ __('Please see this page for details of the review') }} 
https://inspiration.com/idea/{{ $evaluation->idea_id }}/show/

{{ __('Contact Us') }}:
Inspiration
Phone: 000-000-0000
email: info@inspiration.com