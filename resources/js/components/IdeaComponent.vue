<template>
  <div>
    <form action="" method="" class="p-mypage__heading u-pb-m u-mb-l">
      <h2 class="p-mypage__heading__text"></h2>
      <select name="" class="p-mypage__heading__select" v-model="sort">
        <option value="1">新しい順</option>
        <option value="2">古い順</option>
      </select>
    </form>

    <div v-for="like in likeLists" :key='like.id' class="p-mypage__item u-pb-l u-mb-m">
      <div class="p-mypage__sub">
        <p class="p-mypage__sub__date" ref="time">{{ like.created_at }} </p>
        <!-- <p class="p-mypage__sub__date">23:59</p> -->
        <p class="p-mypage__sub__cat">{{ like.idea.category.category_name}}</p>
      </div>
      <div class="p-mypage__desc c-desc">
        <h3 class="c-desc__title">{{ like.idea.idea_title.slice(0, 32)}}</h3>
        <div class="c-desc__info u-pb-s">
          <img src="/img/star.svg" alt="星のアイコン" class="c-desc__star">
          <span class="c-desc__point">3.5({{ like.idea.evaluations.length }}件)</span>
          <span class="c-desc__price">{{ like.idea.idea_price.toLocaleString() }}円</span>
        </div>
        <p class="c-desc__text u-pb-m">{{ like.idea.idea_description.slice(0, 42) }}…</p>
        <div class="p-mypage__link">
          <a v-if="'isActive' + like.id" @click="toggleLike(like)" class="c-btn__main--gray2">気になるを解除</a>
          <a v-else @click="toggleLike(like)" class="c-btn__main--gray2">気になるを追加</a>
          <a :href="'/ideas/' + like.idea.id +'/show'" class="c-btn__main--blue">詳細を見る</a>
        </div>
      </div>
    </div>
    
  </div>
</template>

<script>
export default {
  props: ["userData"],
  data: function() {
    return {
      sort: 1
    };
  },
  mounted() {
    console.log(this.sort);
  },
  computed: {
    // お気に入りリスト
    likeLists: function() {
      // ソート機能
      if (this.sort === 1) {
        return this.userData.likes;
      } else {
        return this.userData.likes.reverse();
      }
    }
  },
  methods: {
    // お気に入り着脱
    toggleLike(val) {
      let that = this;
      axios
        .post("/ideas/like", {
          id: val.idea.id
        })
        .then(res => {
          console.log("axios成功");
          // isActiveを反映
          console.log(res.data.isActive);
        })
        .catch(function(error) {
          if (error.response) {
            // The request was made and the server responded with a status code
            // that falls out of the range of 2xx
            console.log(error.response.data);
            console.log(error.response.status); // 例：400
            console.log(error.response.statusText); // Bad Request
            console.log(error.response.headers);
          } else if (error.request) {
            // The request was made but no response was received
            // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
            // http.ClientRequest in node.js
            console.log(error.request);
          } else {
            // Something happened in setting up the request that triggered an Error
            console.log("Error", error.message);
          }
          console.log(error.config);
        });
    }
  }
};
</script>
