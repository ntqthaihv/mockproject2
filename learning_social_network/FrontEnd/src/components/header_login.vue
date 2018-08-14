<template>
<section class="header">
		<div class="header_content">
			<div class="header_logo">
				<img src="../img/logo.png" alt="logo">
			</div>
			<div class="menu">
				<ul>
					<li><a><span>Following classes</span><i class="fas fa-angle-right"></i></a></li>
					<li><a>Help</a></li>
					<li><a>Contact</a></li>
					<li id="list_FAQ"><a>FAQ</a></li>
					<li class="last_li">
						<a><img src=""></a>
						<span>Hoang</span>
						<ul id="sub_menu">
							<li><a>View my profile</a></li>
							<li><a>Log out</a></li>
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
  data() {
    return {};
  }
};
</script>

<style>
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
  /* padding-bottom: 15px; */
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
  padding-left: 60px;
  list-style: none;
  cursor: pointer;
  font-size: 20px;
  font-weight: bold;
  color: #000000ad;
  position: relative;
}
.menu ul li i {
  position: absolute;
  top: 20px;
  left: 246px;
  font-size: 25px;
}
.menu ul li img {
  width: 50px;
  height: 50px;
  position: absolute;
  top: 5px;
  left: 30px;
}
#list_FAQ {
  padding-right: 20px;
}
.menu ul li span {
  padding-left: 23px;
}

#sub_menu {
  display: flex;
  flex-direction: column;
  position: absolute;
  top: 60px;
  left: 12px;
}

#sub_menu li {
  padding: 0;
  color: #000000a8;
  width: 160px;
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

/* end style for header */
</style>