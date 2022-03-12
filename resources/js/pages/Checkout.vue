<template>
  <div class="app-content content ecommerce-application">
    <navbar :cart="cart" :categories="categories"></navbar>
    <div class="content-wrapper">
      <div class="content-body d-flex">
        <div class="ecommerce">
          <!-- Ecommerce Content Section Starts -->
          <!-- background Overlay when sidebar is shown  starts-->
          <div class="shop-content-overlay"></div>
          <!-- background Overlay when sidebar is shown  ends-->

          <div class="content-body" v-if="cart">
            <form
              action="#"
              class="icons-tab-steps checkout-tab-steps wizard-circle"
            >
              <!-- Checkout Place order starts -->
              <h6 v-if="is_cart_details_title_visible">
                <i class="step-icon step feather icon-shopping-cart"></i>Cart
              </h6>
              <fieldset
                v-if="is_cart_details_visible"
                class="checkout-step-1 px-0"
              >
                <section id="place-order" class="list-view product-checkout">
                  <div class="checkout-items" v-if="cart">
                    <div
                      class="card ecommerce-card"
                      v-for="(item, key) in cart"
                      :key="key"
                    >
                      <div class="card-content">
                        <div class="item-img text-center">
                          <a href="app-ecommerce-details.html">
                            <img
                              :src="item.associatedModel.image_medium"
                              alt="img-placeholder"
                            />
                          </a>
                        </div>
                        <div class="card-body">
                          <div class="item-name">
                            <a href="">{{ item.name }}</a>
                            <span></span>
                            <p class="item-company">
                              By
                              <span class="company-name">{{
                                item.associatedModel.brand.name
                              }}</span>
                            </p>
                            <p class="stock-status-in">In Stock</p>
                          </div>
                          <div class="item-quantity">
                            <p class="quantity-title">Quantity</p>
                            <div class="input-group quantity-counter-wrapper">
                              <input
                                type="text"
                                class="quantity-counter"
                                @change="updateQuantity(key)"
                                v-model="cart[key].quantity"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="item-options text-center">
                          <div class="item-wrapper">
                            <div class="item-rating">
                              <div class="badge badge-primary badge-md">
                                4 <i class="feather icon-star ml-25"></i>
                              </div>
                            </div>
                            <div class="item-cost">
                              <h6 class="item-price"><taka style="margin-right: -3px;width: 13px;" /> {{ item.price }}</h6>
                            </div>
                          </div>
                          <div
                            class="wishlist remove-wishlist"
                            @click="removeFromCart(key)"
                          >
                            <i class="feather icon-x align-middle"></i> Remove
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="checkout-options">
                    <div class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="price-details">
                            <p>Price Details</p>
                          </div>
                          <div class="detail">
                            <div class="detail-title">Delivery Charges</div>
                            <div class="detail-amt discount-amt">Free</div>
                          </div>
                          <hr />
                          <div class="detail">
                            <div class="detail-title detail-total">Total</div>
                            <div class="detail-amt total-amt"><taka style="margin-right: -3px;width: 13px;" /> {{ total }}</div>
                          </div>
                          <button
                            type="button"
                            @click="showAddress"
                            class="btn btn-primary btn-block place-order"
                          >
                            PLACE ORDER
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </fieldset>
              <!-- Checkout Place order Ends -->

              <!-- Checkout Customer Address Starts -->
              <h6 v-if="is_address_title_visible">
                <i class="step-icon step feather icon-home"></i>Address
              </h6>
              <fieldset v-if="is_address_visible" class="checkout-step-2 px-0">
                <section
                  id="checkout-address"
                  class="list-view product-checkout"
                >
                  <div class="card">
                    <div class="card-header flex-column align-items-start">
                      <h4 class="card-title">Add New Address</h4>
                      <p class="text-muted mt-25">
                        Be sure to check "Deliver to this address" when you have
                        finished
                      </p>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                              <label for="checkout-name">Full Name:</label>
                              <input
                                type="text"
                                id="checkout-name"
                                class="form-control required"
                                name="fname"
                                v-model="form.full_name"
                              />
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                              <label for="checkout-number"
                                >Mobile Number:</label
                              >
                              <input
                                type="number"
                                id="checkout-number"
                                class="form-control required"
                                name="mnumber"
                                v-model="form.phone"
                              />
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                              <label for="checkout-apt-number"
                                >Flat, House No:</label
                              >
                              <input
                                type="number"
                                id="checkout-apt-number"
                                class="form-control required"
                                name="apt-number"
                                v-model="form.house_no"
                              />
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                              <label for="checkout-landmark"
                                >Landmark e.g. near apollo hospital:</label
                              >
                              <input
                                type="text"
                                id="checkout-landmark"
                                class="form-control required"
                                name="landmark"
                                v-model="form.land_mark"
                              />
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                              <label for="checkout-city">Town/City:</label>
                              <input
                                type="text"
                                id="checkout-city"
                                class="form-control required"
                                name="city"
                                v-model="form.city"
                              />
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                              <label for="checkout-pincode">Zipcode:</label>
                              <input
                                type="number"
                                id="checkout-pincode"
                                class="form-control required"
                                name="pincode"
                                v-model="form.zipcode"
                              />
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                              <label for="checkout-state">State:</label>
                              <input
                                type="text"
                                id="checkout-state"
                                class="form-control required"
                                name="state"
                                v-model="form.state"
                              />
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                              <label for="add-type">Address Type:</label>
                              <select
                                class="form-control"
                                id="add-type"
                                v-model="form.address_type"
                              >
                                <option value="Home">Home</option>
                                <option value="Work">Work</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-6 offset-md-6">
                            <button
                              type="button"
                              @click="updateShippingAddress"
                              class="
                                btn btn-primary
                                delivery-address
                                float-right
                              "
                            >
                              SAVE AND DELIVER HERE
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="customer-card">
                    <div class="card" v-if="auth.shipping_address">
                      <div class="card-header">
                        <h4 class="card-title">
                          {{ auth.shipping_address.full_name }}
                        </h4>
                      </div>
                      <div class="card-content">
                        <div class="card-body actions">
                          <p class="mb-0">
                            {{ auth.shipping_address.house_no }},
                            {{ auth.shipping_address.address_type }}
                          </p>
                          <p>{{ auth.shipping_address.land_mark }}</p>
                          <p>
                            {{ auth.shipping_address.city }},
                            {{ auth.shipping_address.state }},
                            {{ auth.shipping_address.zipcode }}
                          </p>
                          <p>{{ auth.shipping_address.phone }}</p>
                          <hr />
                          <button
                            type="button"
                            @click="placeOrder"
                            v-if="auth.shipping_address"
                            class="btn btn-primary btn-block delivery-address"
                          >
                            DELIVER TO THIS ADDRESS
                          </button>
                          <div v-else>ADD YOUR ADDRESS FIRST</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </fieldset>

              <!-- Checkout Customer Address Ends -->
            </form>
          </div>
          <!-- Ecommerce Checkout Ends -->
        </div>
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
      cart: [],
      categories: [],
      total: 0,
      is_cart_details_title_visible: true,
      is_cart_details_visible: true,
      is_address_title_visible: false,
      is_address_visible: false,
      auth: window.auth ?? null,
      form: {
        full_name: "",
        phone: "",
        house_no: "",
        land_mark: "",
        city: "",
        zipcode: "",
        state: "",
        address_type: "",
      },
    };
  },
  methods: {
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
        this.totalPrice(data);
      }
    },
    totalPrice: async function (cart) {
      let total = await cart.reduce(function (sum, row) {
        return (sum += row.price * row.quantity);
      }, 0);

      this.total = parseFloat(total).toFixed(2);
    },
    updateQuantity: async function (key) {
      const { data } = await axios.post("/cart/update", {
        quantity: this.cart[key].quantity,
        id: this.cart[key].id,
      });
      if (data) {
        this.fetchCartInfo();
      }
    },
    removeFromCart: async function (key) {
      const { data } = await axios.post("/cart/remove", {
        id: this.cart[key].id,
      });
      if (data) {
        this.fetchCartInfo();
      }
    },
    showAddress: function () {
      this.is_cart_details_title_visible = false;
      this.is_cart_details_visible = false;
      this.is_address_title_visible = true;
      this.is_address_visible = true;
    },
    updateShippingAddress: async function () {
      const { data } = await axios.post("/shipping-address/update", this.form);
      if (data) {
        this.auth.shipping_address = data;
        this.form.full_name = "";
        this.form.phone = "";
        this.form.house_no = "";
        this.form.land_mark = "";
        this.form.city = "";
        this.form.zipcode = "";
        this.form.state = "";
        this.form.address_type = "";
      }
    },
    placeOrder: async function () {
      const { data } = await axios.post("/orders/store", {
        user_id: this.auth.id,
        total: this.total,
      });
      if (data) {
        this.fetchCartInfo();
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
  },
};
</script>
