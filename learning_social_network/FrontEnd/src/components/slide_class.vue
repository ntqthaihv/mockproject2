<template>
  <div >
    <section class="slide">
		<div class="slide_content">
			<div class="slide_calendar">
				<i class="far fa-calendar-alt"></i>
				<i class="fas fa-angle-right"></i>
			</div>

			<div class="slide_title">
				<p>JAVASCRIPT - 06</p>
			</div>
			<div class="slide_search">
				<i class="fas fa-search"></i>
				<span>Search</span>
			</div>
			<div class="info">
				<div class="avatar"></div>
				<div class="info_detail">
					<p>Tester 06</p>
					<select>
						<option value="Tester">Tester</option>
						<option value="Dev">Dev</option>
						<option value="PM">PM</option>
					</select>
				</div>
			</div>
			<section class="infor_menu">
				<ul>
					<router-link to="/user"><li><a>Content</a></li></router-link>
					<router-link to="/user/member"><li><a>Member</a></li></router-link>
					<router-link to="/user/attendance"><li><a>Attendance</a></li></router-link>
					<router-link to="/user/calendar"><li><a>Calendar</a></li></router-link>
					<router-link to="/user/pendingitems"><li><a>Pending Items</a></li></router-link>
				</ul>
			</section>
		</div>
	</section>
  </div>
</template>

<script>

export default {
  name: 'slideClass',
}
</script>

<style>
.list_content_item{
	width:100%;
	padding-top:75px;
}

html,
body {
	width: 100%;
	height: 100%;
	background: #8080800f;
	height: auto;
}
#app {
  font-family: 'Quicksand', san-serif;
  /*-webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;*/
}

/* style for slider */

.slide {
	width: 100%;
	background-image: url("../assets/background.jpg");
	background-position: center center;
	background-repeat: no-repeat;
	background-size: cover;
	height: 440px;
	position: relative;
}

.slide_content {
	width: 1158px;
	margin: auto;
	color: #ffffff;
	display: flex;
	align-items: center;
	justify-content: center;
	/* border: 1px solid red; */
	height: 100%;
	position: relative;
}

.slide_calendar {
	position: absolute;
	top: 60px;
	left: 0;
	font-size: 35px;
	cursor: pointer;
}

.slide_title {
	font-size: 65px;
	font-weight: bold;
	text-align: center;
	line-height: 75px;
}

.slide_search {
	position: absolute;
	top: 7px;
	left: 90%;
	font-size: 22px;
	cursor: pointer;
}

.slide_search_menu {
	display: flex;
	position: absolute;
	top: 0 !important;
	width: 100%;
}


	/* style for infor */

.info{
	position: absolute;
	top: 60%;
	left: 2%;
	display: flex;
	justify-content: space-around;
	align-items:  flex-end;
}
.avatar{
	width:150px;
	height:150px;
	background:teal;
	margin-right: 30px;
}

.info_detail{
	width: 155px;
	font-size: 20px;
}
.info_detail select{
	width: 100%;
	height: 29px;
	outline: none;
	cursor: pointer;
}
.info_detail option {
    width: 80%;
    border: none;
    outline: none;
}
	/* End style for infor */

/* End style for slider */

/* style for menu_info */
.infor_menu{
	width: 100%;
	margin:auto;
	position:  absolute;
	top: 97%;
	color:  black;
	cursor:  pointer;
}
.infor_menu ul{
	display:flex;
	justify-content: space-between;
	box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 25px 50px 0 rgba(0, 0, 0, 0.1);
}
.infor_menu ul li{
	list-style: none;
	width: 100%;
	height:50px;
	background:white;
	text-align:  center;
	line-height:  50px;
	font-size: 22px;
}
.infor_menu ul li:hover{
	background: grey;
	color: white;
	transition: 0.4s;
}

/* end style for menu_info */





</style>
