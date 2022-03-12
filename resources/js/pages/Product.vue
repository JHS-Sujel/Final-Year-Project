<template>
  <div class="app-content content ecommerce-application">
    <navbar :cart="cart" :categories="categories"></navbar>
    <div class="content-wrapper">
      <div class="content-body">
        <section class="app-ecommerce-details" v-if="product">
          <div class="card">
            <div class="card-body">
              <div class="row mb-5 mt-2">
                <div
                  class="
                    col-12 col-md-5
                    d-flex
                    align-items-center
                    justify-content-center
                    mb-2 mb-md-0
                  "
                >
                  <div class="d-flex align-items-center justify-content-center">
                    <img
                      :src="product.image_original"
                      class="img-fluid"
                      alt="product image"
                    />
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <h5>
                    {{ product.title }}
                  </h5>
                  <p class="text-muted">by {{ product.brand.name }}</p>
                  <div class="ecommerce-details-price d-flex flex-wrap">
                    <p class="text-primary font-medium-3 mr-1 mb-0">
                    <h6 class="item-price d-flex align-items-center"><taka style="width: 11px;margin-right: 0px" /><span>{{ product.price }}</span></h6>
                    </p>
                  </div>
                  <hr />
                  <p>
                    {{ product.sub_title }}
                  </p>
                  <p class="font-weight-bold mb-25">
                    <i class="feather icon-truck mr-50 font-medium-2"></i>Free
                    Shipping
                  </p>
                  <hr />
                  <p>Available - <span :class="[product.stock && product.stock.quantity > 0 ? 'text-success' : 'text-warning']">
                    {{ product.stock && product.stock.quantity > 0 ? 'In stock' : 'No' }}
                  </span></p>

                  <div class="d-flex flex-column flex-sm-row" v-if="auth && product.stock && product.stock.quantity > 0">
                    <button @click="addToCart(product.id)" class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0">
                      <i class="feather icon-shopping-cart mr-25"></i>ADD TO
                      CART
                    </button>
                  </div>
                  <div class="d-flex flex-column flex-sm-row" v-if="!product.stock || product.stock.quantity == 0">
                    <button class="btn bg-gradient-warning mr-0 mr-sm-1 mb-1 mb-sm-0">
                      Out of stock
                    </button>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12" v-html="product.details"></div>
              </div>
            </div>
            <div class="card-body">
              <div class="mt-4 mb-2 text-center">
                <h2>RELATED PRODUCTS</h2>
                <p>People also search for this items</p>
              </div>
              <div
                class="swiper-responsive-breakpoints swiper-container px-4 py-2"
              >
                <div
                  class="swiper-wrapper"
                  v-if="products && products.data && products.data.length > 0"
                >
                  <div
                    class="swiper-slide rounded swiper-shadow"
                    v-for="(item, key) in products.data"
                    :key="key"
                  >
                    <div class="item-heading">
                      <p class="text-truncate mb-0">
                        {{ item.title }}
                      </p>
                      <p>
                        <small>by</small>
                        <small>{{ item.brand.name }}</small>
                      </p>
                    </div>
                    <div class="img-container w-50 mx-auto my-2 py-75">
                      <img
                        :src="item.product_image"
                        class="img-fluid"
                        alt="image"
                      />
                    </div>
                    <div class="item-meta">
                      <p class="text-primary mb-0">{{ item.price }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>

<script>
import Taka from "../components/Taka";
export default {
  components: {Taka},
  data: function () {
    return {
      auth: window.auth ?? null,
      product: null,
      cart: [],
      products: null,
      categories: [],
    };
  },
  methods: {
    fetchProduct: async function (slug) {
      const { data } = await axios.get(`/api/products/${slug}`);
      if (data) {
        this.product = data;
        this.fetchProducts();
      }
    },
    addToCart: async function (product_id) {
      const { data } = await axios.post("/cart/add", {
        product_id,
        user_id: window.auth.id,
        quantity: 1,
      });
      if (data) {
        this.fetchCartInfo();
      }
    },
    fetchCartInfo: async function () {
      const { data } = await axios.post("/cart-info");
      if (data) {
        this.cart = data;
      }
    },
    fetchProducts: async function () {
      let url = `/api/products/?category=${this.product.product_type_id}&per_page=5`;
      const { data } = await axios.get(url);
      if (data) {
        this.products = data;
      }
    },
    fetchCategories: async function () {
      const { data } = await axios.get("/api/categories");
      if (data) {
        this.categories = data;
      }
    },
  },
  created() {
    this.fetchCartInfo();
    this.fetchCategories();
    let url = window.location.href;
    let arr = url.split("/");
    let slug = arr[arr.length - 1];
    this.fetchProduct(slug);
  },
};
</script>
