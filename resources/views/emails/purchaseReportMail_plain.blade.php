購入通知

こんにちは, {{ $user->name }}さん
@if($isBuyer === true)
下記ヒラメキを購入しましたので、お知らせします。
@else
下記ヒラメキの購入がありましたので、お知らせします。
@endif
--------------------------------------------
{{ $idea->idea_title }}

{{ number_format($idea->idea_price) }}円

{{ $idea->idea_description }}
--------------------------------------------

ヒラメキの詳細はこちらのページをご覧ください 
https://inspiration.com/idea/{{ $idea->id }}/show/

連絡先:
Inspiration
Phone: 000-000-0000
email: info@inspiration.com