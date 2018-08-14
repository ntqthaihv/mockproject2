<template>
  <div >
	  <slideclass></slideclass>
  <!--add content-->
	<div class="add_list_content">

		<div class="add_list_select">
			<div class="add_content">
				<p>Add content</p>
			</div>
			<div class="add_view">
				<p>or view existing content</p>
			</div>
		</div>

		<div class="add_list_textarea">
			<textarea cols="129" rows="5" placeholder="What are you thinking??"></textarea>
		</div>

<!-- /show list content/ -->

					<div  v-for="item in listContents" :key="item.id"  class="list__item">
						<div class="list__item__intro">
							<div class="item__status">
								<div class="item__status__text">
									<p v-if="!item.is_done">Learning</p>
									<p v-else>Done</p>
								</div>
								<div class="item__status__icon">
									<i class="fas fa-heart"></i>
									<span>{{item.document_id}}</span>
								</div>
							</div>
							<div class="item__content">
								<div class="item__content__avatar">
									<img src="../assets/avatar.png">
								</div>
								<div class="item__content__descript">
									<div class="item__content__name">
										<p>{{item.author}}</p>
										<p>3:00 pm, 29-10-2017</p>
									</div>
									<div class="item__content__time">
										<p>Start: {{item.start_date}}</p>
										<p>End:  {{item.end_date}}</p>
										<p>Tags: defaultTag</p>
										<p>Level: {{item.level}}</p>
									</div>
								</div>
							</div>
							<div class="item__attendance">
								<span>Take attendance</span>
							</div>
						</div>
						<div class="list__item__content">
							<div class="item__title">
								<span>{{item.thumbnail}}</span>
							</div>
							<div class="item__option">
								<!-- <i class="fas fa-ellipsis-h"></i> -->
								<p>{{item.content}}</p>
							</div>
						</div>
					</div>

		</div>

	</div>

</template>
<script>
import SlideClass from './slide_class.vue'
import ListContent from './ListContent'
export default {
  name: 'listcontent',
  components:{
	slideclass:SlideClass,
  },
  data () {
    return {
		listContents:[]
    }
  },
  created() {
	  this.$http.get("https://cors.io/?http://53c07395.ngrok.io/learning_social_network/public/api/content/list").then(data=>{
		  this.listContents=data.body;
	  })
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style >
.list_content_item {
	width: 100%;
	padding-top: 75px;
}

.add_list_content {
	width: 835px;
	position:  relative;
	padding-bottom: 35px;
	margin-left: 8%;
	margin-top: 140px;
}

.add_list_select {
	width: 100%;
	display: flex;
	background: white;
}
.add_list_textarea {
    width:  100%;
}
.add_list_textarea textarea {
    width: 100%;
}
.add_content,
.add_view {
	width: 188px;
	height: 45px;
	background: white;
	border: 1px solid #80808052;
	line-height: 45px;
	text-align: center;
	cursor: pointer;
}

.add_view {
	background: #000000b5;
	color: white;
}
/**/
/* style for list-item */

.infor_menu ul a {
    width: 100%;
    text-decoration: none;
    color: #000000a6;
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





/* style for list-item */

.list__item{
	width: 100%;
	height: 450px;
	margin-top: 55px;
	display: flex;
	justify-content: space-between;
	box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 25px 50px 0 rgba(0, 0, 0, 0.1);
}
.list__item__intro{
	background-image: url('../assets/bg.jpg');
	background-repeat: no-repeat;
	background-size: cover;
	width:30%;
	height: auto;
}
.item__status{
	width:100%;
	display: flex;
	justify-content: flex-start;
	padding-top: 31px;
}
.item__status__text{
	width: 95px;
	height:30px;
	text-align: center;
	line-height:30px;
	background:white;
	box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 25px 50px 0 rgba(0, 0, 0, 0.1);
	cursor:pointer;
	margin-left:  25px;
	margin-right: 45px;
}
.item__status__icon {
    font-size: 24px;
    color: white;
}
.item__status__icon i{
	color: #ff000078;
}
.item__content{
	display:flex;
	justify-content: space-around;
	padding-top: 30px;
}
.item__content__avatar{
	width: 50px;
	height: 50px;
	border-radius:50%;
	margin-left: 15px;
}
.item__content__avatar img{
	width:100%;
	height:100%;
}

.item__content__descript{
	width: 75%;
	color: white;
	padding-left: 13px;
	line-height: 15px;
}
.item__title span{
	font-size:30px;
}
.item__title {
    margin-top: 25px;
	margin-bottom: 25px;
}
.item__title:after {
    content: "";
    display:  block;
    border: 0.5px solid #808080b5;
    width: 33%;
    height: 0.5px;
}


/* .item__content__descript p {
    line-height: 15px;
} */
.item__content__name{
	padding-bottom: 10px;
}

.item__attendance{
	width:170px;
	height:50px;
	border:1px solid white;
	text-align: center;
	line-height: 50px;
	margin-top: 67px;
	margin-left: 33px;
	color: white;
	cursor:  pointer;
}

.list__item__content{
	width:69%;
}
/* End style for list-item */
/* End style for list-item */
</style>
