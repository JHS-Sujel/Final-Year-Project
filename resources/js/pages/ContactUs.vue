<template>
  <div class="app-content content ecommerce-application">
    <navbar :cart="cart" :categories="categories"></navbar>
    <div class="content-wrapper">
      <div class="content-body d-flex">
        <div class="ecommerce">
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <div class="card">
                <div class="card-body">
                  <form @submit.prevent="store">
                    <div class="row from-group mb-2">
                      <div class="col-md-6 col-sm-12">
                        <label>Name</label>
                        <input
                          type="text"
                          v-model="form.name"
                          placeholder="Your Name"
                          class="form-control"
                        />
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <label>Email</label>
                        <input
                          type="text"
                          v-model="form.email"
                          placeholder="Your Email Address"
                          class="form-control"
                        />
                      </div>
                    </div>
                    <div class="form-group">
                      <textarea
                        v-model="form.message"
                        rows="6"
                        class="form-control"
                        placeholder="Your Message"
                      ></textarea>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-success" type="submit">
                        Send Now
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      auth: window.auth ?? null,
      form: {
        name: "",
        email: "",
        message: "",
      },
      cart: [],
      categories: [],
    };
  },
  methods: {
    store: async function () {
      const { data } = await axios.post("/api/messages", this.form);
      if (data) {
        window.location.reload();
      }
    },
    fetchCategories: async function () {
      const { data } = await axios.get("/api/categories");
      if (data) {
        this.categories = data;
      }
    },
    fetchCartInfo: async function () {
      const { data } = await axios.post("/cart-info");
      if (data) {
        this.cart = data;
      }
    },
  },
  created() {
    this.fetchCartInfo();
    this.fetchCategories();
  },
};
</script>