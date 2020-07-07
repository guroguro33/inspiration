レビュー受領通知

こんにちは, {{ $user->name }}さん
@if($isFirstReview === true)
販売したヒラメキに対してレビューを受けましたので、お知らせします。
@else
販売したヒラメキに対してレビューの更新がありましたので、お知らせします。
@endif
--------------------------------------------
{{ $evaluation->idea_review }}

評価の点数：{{ $evaluation->five_rank }}
--------------------------------------------

レビューの詳細はこちらのページをご覧ください 
https://inspiration.com/idea/{{ $evaluation->idea_id }}/show/

連絡先:
Inspiration
Phone: 000-000-0000
email: info@inspiration.com