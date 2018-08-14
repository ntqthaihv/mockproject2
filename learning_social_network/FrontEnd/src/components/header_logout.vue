<template>
    <section class="header">
		<div class="header_content">
			<div class="header_logo">
				<img src="../img/logo.png" alt="logo">
			</div>
			<div class="menu">
				<ul>
					<li v-if="!checkLogin">
             <div class="dropdown">
            <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"><span>Following classes</span><i id="classess" class="fas fa-angle-down"></i></a>

  <!-- <button class="btn btn-light dropdown-toggle classess" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Following classes
  </button> -->
  <div class="dropdown-menu" id="drop2" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">
      <router-link to="/show" class="router">Php</router-link></a>
    <a class="dropdown-item" href="#">Java</a>
    <a class="dropdown-item" href="#">Frot-end</a>
  </div>
</div>
          </li>
					<li><a>Help</a></li>
					<li><a>Contact</a></li>
					<li><a>FAQ</a></li>
					<li>
						  <g-signin-button
						:params="googleSignInParams"
						@success="onSignInSuccess"
						@error="onSignInError"
						v-if="checkLogin">
						<i class="fas fa-sign-out-alt"></i>
						Login Google
						</g-signin-button>
              <!-- <div class="Erro" v-if="errCompany">
                lỗi không phải email công ty
              </div> -->
            </li>
						<li v-if="!checkLogin" class="last_li">
						<a><img :src="user.picture"></a>
						<span>{{user.name}}</span>
						    <ul id="sub_menu">
							    <li><a>View my profile</a></li>
							    <li><a @click="singOut">
                       <router-link to="/" class="router">Logout</router-link>
                    </a></li>
						    </ul>
					  </li>
				</ul>
			</div>
		</div>
	</section>
</template>
<script>
export default {
  name: "app",
  mounted() {
    this.getUser();
    console.log(this.user);
  },
  data() {
    return {
      user: {},
      checkLogin: true, // Hiển thị login with google
      googleSignInParams: {
        client_id:
          "394342897909-17qv4ctkk2phjteuifqqk8dj3i9ka44j.apps.googleusercontent.com"
      },
      errCompany: false
    };
  },
  methods: {
    onSignInSuccess(googleUser) {
      var id_token = googleUser.getAuthResponse().id_token;
      var domain = "ntq-solution.com.vn";
      var url = `https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=${id_token}`;
      this.$http
        .get(url)
        .then(data => {
          if (data.body.hd != domain) {
            alert("Email của bạn không được phép đăng nhập vào hệ thống");
            this.errCompany = true;
            this.checkLogin = false;
            this.singOut();
          } else {
            this.user = data.body;

            this.checkLogin = false;
            this.$http
              .post("http://localhost:8080/MockProjectPHPTeam/learning_social_network/public/api/auth/login", {
                email: this.user.email,
                full_name: this.user.name,
                family_name: this.user.family_name,
                given_name: this.user.given_name,
                avatar: this.user.picture,
                password: this.user.sub
              })
              .then(data => {
                console.log(data.body);
              });
            console.log(this.user);
            this.saveUser();
          }
        })
        .catch(err => {});
    },
    onSignInError(error) {
      // `error` contains any error occurred.
      console.log("OH NOES", error);
    },
    saveUser: function() {
      if (typeof Storage !== "undefined") {
        // Có hỗ trợ local storage
        var str = JSON.stringify(this.user);
        localStorage.setItem("user", str);
      } else {
        // Không hỗ trợ local storage
        console.log("Trình duyệt của bạn không hỗ trợ local storage");
      }
    },
    getUser: function() {
      var str = localStorage.getItem("user");
      this.user = JSON.parse(str);
      this.checkLogin = false;
      if (!this.user) {
        this.user = {};
        this.checkLogin = true;
      }
    },
    singOut: function() {
      var auth2 = gapi.auth2.getAuthInstance();
      auth2.signOut().then(function() {
        console.log("User signed out.");
      });
      this.checkLogin = !this.checkLogin;
      localStorage.clear();
    }
  },
  created() {}
};
</script>

<style>
* {
  font-family: "Quicksand", san-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html,
body {
  width: 100%;
  height: 100%;
}
/* style for header */
.header {
  width: 100%;
}
.header_content {
  width: 1158px;
  margin: auto;
  display: flex;
  justify-content: space-between;
  padding-top: 15px;
}
.menu {
  height: 100%;
  line-height: 60px;
  position: relative;
}
.menu ul {
  display: flex;
}
.menu ul li {
  margin-left: 45px;
  list-style: none;
  cursor: pointer;
  font-size: 20px;
  font-weight: bold;
  color: #000000ad;
  position: relative;
}
.g-signin-button {
  padding-left: 50px;
  list-style: none;
  cursor: pointer;
  font-size: 20px;
  font-weight: bold;
  color: #000000ad;
}
.menu ul li i {
  position: absolute;
  top: 18px;
  left: 17px;
  font-size: 25px;
}
#classess {
  position: absolute;
  top: 18px;
  left: 162px;
  font-size: 25px;
}
.menu ul li img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  position: absolute;
  top: 5px;
  left: -60px;
}
#sub_menu {
  display: flex;
  flex-direction: column;
  position: absolute;
  top: 60px;
  left: -105px;
}

#sub_menu li {
  padding: 0;
  color: #000000a8;
  width: 230px;
  height: 50px;
  background: white;
  text-align: center;
  line-height: 50px;
  border: 0.5px solid #8080807d;
  display: none;
}
.last_li:hover #sub_menu li {
  display: block;
  z-index: 5;
}
#drop2{
  /* margin-top: 0px; */
}
.router{
  text-decoration: none;
  color: #000000a8
}
</style>
