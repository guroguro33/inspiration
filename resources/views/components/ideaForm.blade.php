<section class="l-sidebar__mypage">
  @if(empty($idea))
    <h1 class="p-mypage__title u-pb-m">ヒラメキを出品する</h1>
    <form action="{{ route('ideas.store') }}" method="POST" class="c-form">
  @else
    <h1 class="p-mypage__title u-pb-m">ヒラメキを編集する</h1>
    <form action="{{ route('ideas.update', $idea->id) }}" method="POST" class="c-form">
  @endif
    @csrf

    <div class="c-form__item u-pb-l">
      <label class="c-form__item__name u-pb-s">
        タイトル（必須）
      <input type="text" name="idea_title" class="c-form__item__input u-mb-s @error('idea_title') is-invalid @enderror" value="{{ old('idea_title', !empty($idea)? $idea->idea_title : '')}}" placeholder="入力してください" required autocomplete="off">
      </label>
      @error('idea_title')
      <span class="c-form__item--alert" role="alert">{{ $message }}</span>
      @enderror
    </div>

    <div class="c-form__item u-pb-l">
      <p class="c-form__item__name u-pb-s">カテゴリ（必須）</p>
      <select name="category_id" class="c-form__item__select @error('category_id') is-invalid @enderror" required>
        <option value="">選択してください</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" @if(old('category_id', !empty($idea)? $idea->category_id : '') == $category->id) selected @endif>{{ $category->category_name }}</option>
        @endforeach
      </select>
      @error('category_id')
        <span class="c-form__item--alert" role="alert">{{ $message }}</span>
      @enderror
    </div>

    <div class="c-form__item u-pb-l">
      <p class="c-form__item__name u-pb-s">概要（購入前に表示されます）（必須）</p>
      <textarea name="idea_description" class="c-form__item__text @error('idea_description') is-invalid @enderror" cols="20" rows="8" placeholder="入力してください" autocomplete="off" required>{{ old('idea_description', !empty($idea)? $idea->idea_description : '') }}</textarea>
      @error('idea_description')
      <span class="c-form__item--alert">{{ $message }}</span>
      @enderror
    </div>

    <div class="c-form__item u-pb-l">
      <p class="c-form__item__name u-pb-s">詳細（購入後に表示されます）（必須）</p>
      <textarea name="idea_detail" class="c-form__item__text @error('idea_detail') is-invalid @enderror" cols="20" rows="12" placeholder="入力してください" autocomplete="off" required>{{ old('idea_detail', !empty($idea)? $idea->idea_detail : '') }}</textarea>
      @error('idea_detail')
      <span class="c-form__item--alert">{{ $message }}</span>
      @enderror
    </div>
    
    <div class="c-form__item u-pb-l">
      <p class="c-form__item__name u-pb-s">価格（必須）</p>
      <input type="number" name="idea_price" class="c-form__item__price u-mb-s @error('idea_price') is-invalid @enderror" value="{{ old('idea_price', !empty($idea)? $idea->idea_price : '') }}" placeholder="入力してください" autocomplete="off" required>円
      @error('idea_price')
      <span class="c-form__item--alert">{{ $message }}</span>
      @enderror
    </div>

    @if(empty($idea))
    <input type="submit" class="c-form__btn c-btn__main--gray1 u-mb-xxl" value="{{ __('Register') }}">
    @else
    <input type="submit" class="c-form__btn c-btn__main--gray1 u-mb-xxl" value="{{ __('Registration') }}">
    @endif
  </form>

</section>