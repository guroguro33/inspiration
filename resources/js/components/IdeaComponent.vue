<template>
  <div>
    <form action="" method="" class="p-mypage__heading u-pb-m u-mb-l">
      <h2 class="p-mypage__heading__text"></h2>
      <select name="" class="p-mypage__heading__select" v-model="sort">
        <option value="1">新しい順</option>
        <option value="2">古い順</option>
      </select>
    </form>

    <div class="u-mb-3l">
      <div v-for="like in getItems" :key='like.id' class="p-mypage__item u-pb-l u-mb-m">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date" ref="time">{{ like.created_at | date }} </p>
          <p class="p-mypage__sub__date">{{ like.created_at | time }}</p>
          <p class="p-mypage__sub__cat">{{ like.idea.category.category_name}}</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">{{ like.idea.idea_title | substr32 }}</h3>
          <div class="c-desc__info u-pb-s">
            <img src="/img/star.svg" alt="星のアイコン" class="c-desc__star">
            <span class="c-desc__point">3.5({{ like.idea.evaluations.length }}件)</span>
            <span class="c-desc__price">{{ like.idea.idea_price.toLocaleString() }}円</span>
          </div>
          <p class="c-desc__text u-pb-m">{{ like.idea.idea_description | substr42 }}</p>
          <div class="p-mypage__link">
            <a @click="toggleLike(like)" :class="['c-btn__main--gray2', notLike_id.includes(like.idea.id) ? 'is-notlike' : '']">気になるを解除</a>
            
            <a :href="'/ideas/' + like.idea.id +'/show'" class="c-btn__main--blue">詳細を見る</a>
          </div>
        </div>
      </div>
    </div>

    <paginate
    :page-count="getPageCount"
    :page-range="3"
    :margin-pages="2"
    :click-handler="clickCallback"
    :prev-text="'＜'"
    :next-text="'＞'"
    :container-class="'c-pagination'"
    :page-class="'c-pagination__page-item'"
    :prev-class="'c-pagination__prev'"
    :next-class="'c-pagination__next'">
  </paginate>
    
  </div>
</template>

<script>
export default {
  props: ["userData"],
  data: function() {
    return {
      sort: 1,
      parPage: 5,
      currentPage: 1,
      notLike_id: []
    };
  },
  filters: {
    // 年月日を取り出して表示
    date(val) {
      const date = new Date(val);

      const year = date.getFullYear();
      const month = date.getMonth() + 1;
      const day = date.getDate();

      const formatDay = year + "/" + month + "/" + day;
      return formatDay;
    },
    // 時間を取り出して表示
    time(val) {
      const date = new Date(val);

      const hour = date.getHours();
      const minute = date.getMinutes();

      const formatTime = hour + ":" + minute;
      return formatTime;
    },
    // 32文字以降を省略し、「…」を加える
    substr32(val) {
      if (val.length > 32) {
        return val.slice(0, 32) + "…";
      }
      return val;
    },
    // 42文字以降を省略し、「…」を加える
    substr42(val) {
      if (val.length > 42) {
        return val.slice(0, 42) + "…";
      }
      return val;
    }
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
    },
    getItems: function() {
      let current = this.currentPage * this.parPage;
      let start = current - this.parPage;
      return this.likeLists.slice(start, current);
    },
    getPageCount: function() {
      return Math.ceil(this.likeLists.length / this.parPage);
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
          // 配列notLike_idにお気に入りから外れたideaのidを加える
          if (this.notLike_id.includes(val.idea.id)) {
            this.notLike_id = this.notLike_id.filter(n => {
              return n !== val.idea.id;
            });
          } else {
            this.notLike_id.push(val.idea.id);
          }
          console.log(this.notLike_id);
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
    },
    // ページネーション
    clickCallback: function(pageNum) {
      this.currentPage = Number(pageNum);
    }
  }
};
</script>
