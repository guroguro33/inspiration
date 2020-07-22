<template>
  <div>
    <h1 class="p-detail__title u-pb-m">
      {{ idea.idea_title }}
    </h1>

    <div class="p-detail__note u-pb-m">
      <div class="p-detail__note__info">
        <img src="/img/star.svg" alt="Icon of star" class="p-detail__note__star">
        <span class="p-detail__note__text">{{ avgFive_rank }} ({{ idea.evaluations.length }}{{ $t('case') }})</span>
        <span class="p-detail__note__text">by <a :href="'/profile/' + idea.user_id + '/'" class="p-detail__note__link u-opacity">{{ idea.user.name }}</a></span>
      </div>
      <div class="p-detail__btn">
        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="p-detail__btn--tweet u-opacity"
          data-show-count="false" target="_blank" data-size="large">
          <div class="p-detail__btn--img">
            <i class="fab fa-twitter"></i>
          </div>
          <span>Tweet</span>
        </a>
        <!-- ログイン時はお気に入りボタンが有効 -->
        <a v-if="isLogin" @click="toggleLike(idea)" class="p-detail__btn--like u-opacity">
          <div class="p-detail__btn--img">
            <i :class="[isLikeTrue === true ? 'fas fa-heart' : 'far fa-heart']"></i>
          </div>
          <span>{{ $t("Like") }}</span>
        </a>
        <!-- 非ログイン時はお気に入りボタンが無効 -->
        <a v-else class="p-detail__btn--like">
          <div class="p-detail__btn--img">
            <i class="far fa-heart"></i>
          </div>
          <span>{{ $t("Like") }}</span>
        </a>
      </div>
    </div>

    <div class="p-detail__date u-pb-xxl">
      {{ $t("Registration date") }}：{{ idea.created_at | date }}
    </div>

    <!-- 概要と詳細のタブ切り替え -->
    <div class="p-detail__tab u-mb-l">
      <a :class="['p-detail__tab__btn', (isdetail)? '' : 'u-border--bottom']" @click="isdetail = false">{{ $t("Description") }}</a>
      <a :class="['p-detail__tab__btn', (isdetail)? 'u-border--bottom' : '']" @click="isdetail = true">{{ $t("Detail") }}</a>
    </div>

    <!-- 概要表示 -->
    <div class="p-detail__text u-mb-xl" v-if="!isdetail">{{ idea.idea_description }}</div>
    <!-- 購入後、もしくは出品者の場合の詳細表示 -->
    <div class="p-detail__text u-mb-xl" v-else-if="isdetail && ( isBought || user.id == idea.user.id )">{{ idea.idea_detail}}</div>
    <!-- 購入後、詳細を表示する旨の表示 -->
    <div class="p-detail__text u-mb-xl" v-else-if="isdetail && !isBought">{{ $t('Displayed after purchase')}}</div>

  </div>
</template>

<script>
export default {
  props: ["isLogin", "idea", "likeLists", "isBought", "user"],
  data: function() {
    return {
      isdetail: false,
      isLikeTrue: this.likeLists.includes(this.idea.id) ? true : false
    };
  },
  filters: {
    // 年月日を取り出して表示
    date(val) {
      const date = new Date(val.replace(/-/g, "/"));

      const year = date.getFullYear();
      const month = date.getMonth() + 1;
      const day = date.getDate();
      let hour = date.getHours();
      hour = ("0" + hour).slice(-2);
      let minute = date.getMinutes();
      minute = ("0" + minute).slice(-2);

      const formatDay =
        year + "/" + month + "/" + day + " " + hour + ":" + minute;
      return formatDay;
    }
  },
  created() {
    // console.log("ログイン状態:" + this.isLogin);
    // console.log("購入済みかどうか:" + this.isBought);
  },
  computed: {
    // ５段階評価の平均値算出
    avgFive_rank() {
      if (!this.idea.avg_five_rank[0]) {
        return "-";
      } else {
        return Math.round(this.idea.avg_five_rank[0].average * 10) / 10;
      }
    }
  },
  methods: {
    // お気に入り着脱
    toggleLike(val) {
      let that = this;
      axios
        .post("/ideas/like", {
          id: val.id
        })
        .then(res => {
          // console.log("axios成功");
          this.isLikeTrue = !this.isLikeTrue;
        })
        .catch(function(error) {
          // if (error.response) {
          //   // The request was made and the server responded with a status code
          //   // that falls out of the range of 2xx
          //   console.log(error.response.data);
          //   console.log(error.response.status); // 例：400
          //   console.log(error.response.statusText); // Bad Request
          //   console.log(error.response.headers);
          // } else if (error.request) {
          //   // The request was made but no response was received
          //   // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
          //   // http.ClientRequest in node.js
          //   console.log(error.request);
          // } else {
          //   // Something happened in setting up the request that triggered an Error
          //   console.log("Error", error.message);
          // }
          // console.log(error.config);
        });
    }
  }
};
</script>