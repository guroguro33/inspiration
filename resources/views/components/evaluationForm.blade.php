<div>
  @if(empty($review))
    <p class="p-checkout__review__heading u-pb-xxl">{{ __('Please write review') }}</p>
  @else
  <p class="p-checkout__review__heading u-pb-xxl">{{ __('Revise the review?') }}</p>
  @endif
  <label class="p-checkout__review__point-area">
    <p class="u-pb-m">{{ __('5-step evaluation') }}</p>
    <select name="five_rank" class="p-checkout__review__point">
      <option value="1" @if(old('five_rank', !empty($review)? $review->five_rank : '') == "1") selected @endif>1</option>
      <option value="2" @if(old('five_rank', !empty($review)? $review->five_rank : '') == "2") selected @endif>2</option>
      <option value="3" @if(old('five_rank', !empty($review)? $review->five_rank : '') == "3") selected @endif>3</option>
      <option value="4" @if(old('five_rank', !empty($review)? $review->five_rank : '') == "4") selected @endif>4</option>
      <option value="5" @if(old('five_rank', !empty($review)? $review->five_rank : '') == "5") selected @endif>5</option>
    </select>
  </label>
  <label class="p-checkout__review__comment-area">
    <p class="u-pb-m">{{ __('Review') }}</p>
    <textarea name="idea_review" cols="18" rows="10" class="p-checkout__review__comment u-mb-m @error('idea_review') is-invalid @enderror" placeholder="{{ __('Please write review') }}"  autocomplete="off" required>{{ old('idea_reivew', !empty($review)? $review->idea_review : '') }}</textarea>
  </label>
  @error('idea_review')
  <span class="c-form__item--alert u-pb-l">{{ $message }}</span>
  @enderror
  <input type="submit" class="c-btn__main--gray2 u-m-0auto" value="{{ __('Registration') }}">
</div>