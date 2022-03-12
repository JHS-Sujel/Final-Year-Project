<template>
  <nav
    class="
      header-navbar
      navbar-expand-lg navbar navbar-with-menu
      floating-nav
      navbar-light navbar-shadow
    "
  >
    <div class="navbar-wrapper">
      <div class="navbar-container content">
        <div class="navbar-collapse" id="navbar-mobile">
          <div
            class="
              mr-auto
              float-left
              bookmark-wrapper
              d-flex
              align-items-center
            "
          >
            <ul class="nav navbar-nav">
              <li class="nav-item mobile-menu d-xl-none mr-auto">
                <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="/"
                  ><i class="ficon feather icon-menu"></i
                ></a>
              </li>
            </ul>

            <ul class="nav navbar-nav">
              <li class="nav-item d-none d-lg-block">
                <a class="nav-link nav-link-expand" href="/">
                  <span>Home</span>
                </a>
              </li>
              <li
                v-for="(category, key) in categories"
                :key="key"
                class="nav-item d-none d-lg-block"
              >
                <a
                  class="nav-link nav-link-expand"
                  :href="`/categories-wise-products/${category.id}`"
                >
                  <span>{{ category.name }}</span>
                </a>
              </li>

              <li class="nav-item d-none d-lg-block">
                <a href="/about-us" class="nav-link nav-link-expand">
                  <span>About Author</span>
                </a>
              </li>
              <li class="nav-item d-none d-lg-block">
                <a href="/contact-us" class="nav-link nav-link-expand">
                  <span>Contact Us</span>
                </a>
              </li>
            </ul>
          </div>
          <ul class="nav navbar-nav float-right">
            <li v-if="auth" class="nav-item">
              <a class="nav-link" href="/checkout" style="position: relative">
                <i
                  class="feather icon-shopping-cart"
                  style="font-size: 18px"
                ></i>
                <span class="badge rounded-pill bg-danger badge-up">{{
                  cart ? cart.length : ""
                }}</span>
              </a>
            </li>
            <li
              v-if="auth"
              class="dropdown dropdown-user nav-item"
              @click.prevent="toggleProfileDropdown"
            >
              <a
                class="dropdown-toggle nav-link dropdown-user-link"
                href="#"
                data-toggle="dropdown"
              >
                <div class="user-nav d-sm-flex d-none">
                  <span class="user-name text-bold-600">{{ auth.name }}</span>
                </div>
                <span
                  ><img
                    class="round"
                    src="/images/portrait/small/avatar-s-11.jpg"
                    alt="avatar"
                    height="40"
                    width="40"
                /></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                :style="{
                  display: isProfileDropdownVisible,
                }"
              >
                <a class="dropdown-item" href="/profile"
                  ><i class="feather icon-user"></i> Profile</a
                >
                <a class="dropdown-item" href="/orders"
                  ><i class="feather icon-mail"></i> My Orders</a
                >

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" @click="logout"
                  ><i class="feather icon-power"></i> Logout</a
                >
              </div>
            </li>
            <li v-if="!auth" class="nav-item">
              <a href="/login" class="btn btn-success btn-md mr-2"> Log In </a>
            </li>
            <li v-if="!auth" class="nav-item">
              <a href="/register" class="btn btn-primary btn-md"> Sign Up </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</template>


<script>
export default {
  props: {
    cart: {
      type: Array,
      default: function () {
        return [];
      },
    },
    categories: {
      type: Array,
      default: function () {
        return [];
      },
    },
  },
  data: function () {
    return {
      auth: window.auth ?? null,
      isProfileDropdownVisible: "none",
    };
  },
  methods: {
    fetchAuthInfo: async function () {
      const { data } = await axios.get("/api/user");
      if (data) {
        this.auth = data;
      }
    },
    toggleProfileDropdown: function () {
      this.isProfileDropdownVisible =
        this.isProfileDropdownVisible == "block" ? "none" : "block";
    },
    logout: async function () {
      const {data} = await axios.post('/api/logout');
      if(data) {
        location.reload();
      }
    }
  },
  created() {},
};
</script>