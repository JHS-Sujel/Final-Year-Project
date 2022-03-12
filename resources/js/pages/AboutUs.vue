<template>
  <div class="app-content content ecommerce-application">
    <navbar :cart="cart" :categories="categories"></navbar>
    <div class="content-wrapper">
      <div class="content-body d-flex">
        <div class="ecommerce">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="card">
                <div class="card-body">
                  <div class="profile">
                    <img src="/images/1.jpg" alt="" style="height: 200px" />
                    <div>
                      <h4 class="mb-0">Hi,</h4>
                      <p>
                        I'm <strong>RAYHAN AHMED</strong>. Student of CSE dept.
                        Metropolitan University, Sylhet. I'm interested to do
                        something different like which not made now. That's why
                        I made this website. I hope this website has been useful
                        for the time being. People are just wrong, if you are
                        dissatisfied with the service of my website, if
                        something new is actually better etc., it is not a bad
                        thing to express your opinion, but it is the best. If
                        there is anything on my website that you need to say,
                        feel free to tell me on my Mail/Facebook
                        Messenger/Contact Number
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="card">
                <div class="card-body">
                  <div class="profile">
                    <img src="/images/2.png" alt="" style="height: 200px" />
                    <div>
                      <h4 class="mb-0">Hello Everyone,</h4>
                      <p>
                        It's me <strong>Jabed Hussain Sujel</strong>. I am a
                        Full Stack Web-developer. I love to develop Websites
                        with new features and previously I have worked on
                        various web development projects. This website now you
                        are visiting is related with my academic course. RJ
                        Fashion represents an online shop that I made for my
                        Final Year Project Submission and I have plan to add new
                        features to this site in near future. I am a very
                        positive person and welcome new ideas from people. So,
                        If you have any suggestions that you may think will add
                        new dimension to my site then feel free to send an
                        e-mail at : sr@rj-fashion.com I would love to work on
                        your suggestions to make my website performance more
                        effective and convenient to our users. Thank you!!!
                      </p>
                    </div>
                  </div>
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
      cart: [],
      categories: [],
    };
  },
  methods: {
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

<style>
.profile {
  display: flex;
  flex-direction: column;
  align-items: center;
}
</style>