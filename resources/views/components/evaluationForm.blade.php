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
  @error('five_rank')
  <span class="c-form__item--alert u-pb-l">{{ $message }}</span>
  @enderror
  <label class="p-checkout__review__comment-area">
    <p class="u-pb-m">{{ __('Review') }}</p>
    <textarea name="idea_review" cols="18" rows="10" class="p-checkout__review__comment js-count-evaluation @error('idea_review') is-invalid @enderror" placeholder="{{ __('Please write review') }}"  autocomplete="off" required>{{ old('idea_review', !empty($review)? $review->idea_review : '') }}</textarea>
  </label>
  <p class="c-form__item__counter  u-mb-m"><span class="js-counter-evaluation">0</span>/1000{{ __('characters')}}</p>
  @error('idea_review')
  <span class="c-form__item--alert u-pb-l">{{ $message }}</span>
  @enderror
  <input type="submit" class="c-btn__main--gray2 u-m-0auto" value="{{ __('Registration') }}">
</div>