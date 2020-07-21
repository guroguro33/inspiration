<section class="l-sidebar__mypage">
  @if(empty($idea))
    <h1 class="p-mypage__title u-pb-m">{{ __('Sell ​​Hirameki') }}</h1>
    <form action="{{ route('ideas.store') }}" method="POST" class="c-form">
  @else
    <h1 class="p-mypage__title u-pb-m">{{ __('Edit ​Hirameki') }}</h1>
    <form action="{{ route('ideas.update', $idea->id) }}" method="POST" class="c-form u-pb-0">
  @endif
    @csrf

    <div class="c-form__item u-pb-l">
      <label class="c-form__item__name u-pb-s">
        {{ __('Title') }}（{{ __("Required") }}）
      <input type="text" name="idea_title" class="c-form__item__input u-mb-s @error('idea_title') is-invalid @enderror" value="{{ old('idea_title', !empty($idea)? $idea->idea_title : '')}}" placeholder="{{ __('Please enter') }}" required autocomplete="off">
      </label>
      @error('idea_title')
      <span class="c-form__item--alert" role="alert">{{ $message }}</span>
      @enderror
    </div>

    <div class="c-form__item u-pb-l">
      <p class="c-form__item__name u-pb-s">{{ __('Category') }}（{{ __("Required") }}）</p>
      <select name="category_id" class="c-form__item__select @error('category_id') is-invalid @enderror" required>
        <option value="">{{ __('Please select') }}</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" @if(old('category_id', !empty($idea)? $idea->category_id : '') == $category->id) selected @endif>{{ $category->category_name }}</option>
        @endforeach
      </select>
      @error('category_id')
        <span class="c-form__item--alert" role="alert">{{ $message }}</span>
      @enderror
    </div>

    <div class="c-form__item u-pb-l">
      <p class="c-form__item__name u-pb-s">{{ __('Description(display before purchase)')}}（{{ __("Required") }}）</p>
      <textarea name="idea_description" class="c-form__item__text js-count-desc @error('idea_description') is-invalid @enderror" cols="20" rows="8" placeholder="{{ __('Please enter') }}" autocomplete="off" required>{{ old('idea_description', !empty($idea)? $idea->idea_description : '') }}</textarea>
      <p class="c-form__item__counter"><span class="js-counter-desc">0</span>/2000{{ __('characters')}}</p>
      @error('idea_description')
      <span class="c-form__item--alert">{{ $message }}</span>
      @enderror
    </div>

    <div class="c-form__item u-pb-l">
      <p class="c-form__item__name u-pb-s">{{ __('Detail(display after purchase)') }}（{{ __("Required") }}）</p>
      <textarea name="idea_detail" class="c-form__item__text js-count-detail @error('idea_detail') is-invalid @enderror" cols="20" rows="12" placeholder="{{ __('Please enter') }}" autocomplete="off" required>{{ old('idea_detail', !empty($idea)? $idea->idea_detail : '') }}</textarea>
      <p class="c-form__item__counter"><span class="js-counter-detail">0</span>/4000{{ __('characters')}}</p>
      @error('idea_detail')
      <span class="c-form__item--alert">{{ $message }}</span>
      @enderror
    </div>
    
    <div class="c-form__item u-pb-l">
      <p class="c-form__item__name u-pb-s">{{ __("Price") }}（{{ __("Required") }}）</p>
      <input type="number" name="idea_price" class="c-form__item__price u-mb-s @error('idea_price') is-invalid @enderror" value="{{ old('idea_price', !empty($idea)? $idea->idea_price : '') }}" placeholder="{{ __('Please enter') }}" autocomplete="off" required>{{ __('yen') }}
      @error('idea_price')
      <span class="c-form__item--alert">{{ $message }}</span>
      @enderror
    </div>

    @if(empty($idea))
    <input type="submit" class="c-form__btn c-btn__main--gray1 u-mb-xxl" value="{{ __('Register') }}">
    @else
    <input type="submit" class="c-form__btn c-btn__main--gray1" value="{{ __('Registration') }}">
    @endif
  </form>
  @if(!empty($idea))
  <form action="{{ route('ideas.delete', $idea->id) }}" method="post">
  @csrf
    <input type="submit" class="c-form__btn c-btn__main--red u-mb-xxl" value="{{ __('Delete') }}">
  </form>
  @endif

</section>