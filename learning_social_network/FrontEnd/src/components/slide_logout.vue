<template>
<section class="slide2">
		<div class="slide_content2">
			<div class="slide_calendar2">
				<i class="far fa-calendar-alt"></i>
				<i class="fas fa-angle-right"></i>
			</div>
			<div class="slide_title2">
				<p>WELCOME </p>
				<p>TO LEARNING SOCIAL NETWORK</p>
			</div>
			<div class="slide_search2">
				<i class="fas fa-search"></i>
				<span>Search</span>
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
/* style for slider */
.slide2 {
	width: 100%;
	/* margin-top: 50px; */
	background-image: url("../assets/banner.jpg");
	background-position: center center;
	background-repeat: no-repeat;
	background-size: cover;
	height: 545px;
}

.slide_content2 {
	width: 1158px;
	margin: auto;
	color: #ffffff85;
	display: flex;
	align-items: center;
	justify-content: center;
	/* border: 1px solid red; */
	height: 100%;
	position: relative;
}

.slide_calendar2 {
	position: absolute;
	top: 60px;
	left: 0;
	font-size: 35px;
	cursor: pointer;
}
.slide_calendar2:hover{
  color:white
}
.slide_title2 {
	font-size: 35px;
	font-weight: bold;
	text-align: center;
	line-height: 75px;
}

.slide_search2 {
	position: absolute;
	top: 7px;
	left: 90%;
	font-size: 22px;
	cursor: pointer;
}
.slide_search2:hover{
  color:white
}
.slide_search_menu{
	display:flex;
	position: absolute;
	top:0
	!important;
	width:100%;
}
/* style for slider */
</style>
