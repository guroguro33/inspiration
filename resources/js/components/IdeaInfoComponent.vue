<template>
  <div>
    <h1 class="p-detail__title u-pb-m">
      {{ idea.idea_title }}
    </h1>

    <div class="p-detail__note u-pb-m">
      <div class="p-detail__note__info">
        <img src="/img/star.svg" alt="星のアイコン" class="p-detail__note__star">
        <span class="p-detail__note__text">3.5 ({{ idea.evaluations.length }}件)</span>
        <span class="p-detail__note__text">by {{ idea.user.name }}</span>
      </div>
      <div class="p-detail__btn">
        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="p-detail__btn--tweet u-opacity"
          data-show-count="false" target="_blank" data-size="large">
          <div class="p-detail__btn--img">
            <i class="fab fa-twitter"></i>
          </div>
          <span>Tweet</span>
        </a>
        <a @click="toggleLike(idea)" class="p-detail__btn--like u-opacity">
          <div class="p-detail__btn--img">
            <i :class="[isLikeTrue === true ? 'fas fa-heart' : 'far fa-heart']"></i>
          </div>
          <span>お気に入り</span>
        </a>
      </div>
    </div>

    <div class="p-detail__date u-pb-xxl">
      登録日：{{ idea.created_at | date }}
    </div>

    <div class="p-detail__tab u-mb-l">
      <a :class="['p-detail__tab__btn', (isdetail)? '' : 'u-border--bottom']" @click="isdetail = false">概要</a>
      <a :class="['p-detail__tab__btn', (isdetail)? 'u-border--bottom' : '']" @click="isdetail = true">詳細</a>
    </div>
    <div class="p-detail__text u-mb-xl" v-if="!isdetail">{{ idea.idea_description }}</div>
    <div class="p-detail__text u-mb-xl" v-else-if="isdetail">購入後に表示されます</div>

  </div>
</template>

<script>
export default {
  props: ["idea", "likeLists"],
  data: function() {
    return {
      isdetail: false,
      isLikeTrue: this.likeLists.includes(this.idea.id) ? true : false
    };
  },
  filters: {
    // 年月日を取り出して表示
    date(val) {
      const date = new Date(val);

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
  methods: {
    // お気に入り着脱
    toggleLike(val) {
      let that = this;
      axios
        .post("/ideas/like", {
          id: val.id
        })
        .then(res => {
          console.log("axios成功");
          this.isLikeTrue = !this.isLikeTrue;
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