<template>
  <div>
    <form action="" method="" class="p-mypage__heading u-pb-m u-mb-l">
      <h2 class="p-mypage__heading__text"></h2>
      <select name="" class="p-mypage__heading__select" v-model="sort">
        <option value="1">{{ $t('new order') }}</option>
        <option value="2">{{ $t('old order') }}</option>
      </select>
    </form>

    <div class="u-mb-3l">
      <div v-for="purchase in getItems" :key='purchase.id' class="p-mypage__item u-pb-l u-mb-m">
        <div class="p-mypage__sub">
          <p class="p-mypage__sub__date">{{ purchase.created_at | date }} </p>
          <p class="p-mypage__sub__date">{{ purchase.created_at | time }}</p>
          <p class="p-mypage__sub__cat">{{ purchase.idea.category.category_name}}</p>
        </div>
        <div class="p-mypage__desc c-desc">
          <h3 class="c-desc__title">{{ purchase.idea.idea_title | substr32 }}</h3>
          <div class="c-desc__info u-pb-s">
            <img src="/img/star.svg" alt="Icon of Star" class="c-desc__star">
            <span class="c-desc__point">{{ avgFive_rank(purchase.idea) }} ({{ purchase.idea.evaluations.length }}{{ $t('case') }})</span>
            <span class="c-desc__price">{{ purchase.idea.idea_price.toLocaleString() }}{{ $t('yen') }}</span>
          </div>
          <p class="c-desc__text u-pb-m">{{ purchase.idea.idea_description | substr42 }}</p>
          <div class="p-mypage__link">
            <a :href="'/ideas/' + purchase.idea.id +'/show'" class="c-btn__main--blue">{{ $t('view the details') }}</a>
          </div>
        </div>
      </div>
    </div>

    <paginate
      v-if="userData.purchases != ''"
      :page-count="getPageCount"
      :page-range="3"
      :margin-pages="2"
      :click-handler="clickCallback"
      :prev-text="'＜'"
      :next-text="'＞'"
      :container-class="'c-pagination'"
      :page-class="'c-pagination__page-item js-scrollTop'"
      :prev-class="'c-pagination__prev js-scrollTop'"
      :next-class="'c-pagination__next js-scrollTop'">
    </paginate>

    <p v-else>{{ $t('Nothing yet') }}</p>
    
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
      const date = new Date(val.replace(/-/g, "/"));

      const year = date.getFullYear();
      const month = date.getMonth() + 1;
      const day = date.getDate();

      const formatDay = year + "/" + month + "/" + day;
      return formatDay;
    },
    // 時間を取り出して表示
    time(val) {
      const date = new Date(val.replace(/-/g, "/"));

      let hour = date.getHours();
      hour = ("0" + hour).slice(-2);

      let minute = date.getMinutes();
      minute = ("0" + minute).slice(-2);

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
  computed: {
    // 購入済みリスト
    purchasedLists: function() {
      // ソート機能
      if (this.sort === 1) {
        return this.userData.purchases;
      } else {
        return this.userData.purchases.reverse();
      }
    },
    // 評価の平均点
    avgFive_rank: function() {
      return function(idea) {
        if (!idea.avg_five_rank[0]) {
          return "-";
        } else {
          return Math.round(idea.avg_five_rank[0].average * 10) / 10;
        }
      };
    },
    // ページネーションで現在のページで表示するリストを抽出
    getItems: function() {
      let current = this.currentPage * this.parPage;
      let start = current - this.parPage;
      return this.purchasedLists.slice(start, current);
    },
    // ページネーションの全ページ数を計算
    getPageCount: function() {
      return Math.ceil(this.purchasedLists.length / this.parPage);
    }
  },
  methods: {
    // ページネーション
    clickCallback: function(pageNum) {
      this.currentPage = Number(pageNum);
    }
  }
};
</script>
