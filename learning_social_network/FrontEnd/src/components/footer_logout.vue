<template>
<footer class="footer">
		<div class="footer_content">
			<div class="footer_content_logo">
				<img src="../img/logo_footer.png">
				<p>Copyright © NTQ Solution 2018</p>
			</div>
			<div class="footer_content_contact">
				<h3>CONTACT US</h3>
				<i class="fab fa-facebook-square"></i>
				<i class="fab fa-skype"></i>
				<i class="fab fa-google-plus-g"></i>
				<i class="fab fa-youtube"></i>
			</div>	
			<div class="footer_content_news">
				<h3>NTQ NEW'S</h3>
				<p><i class="fas fa-arrow-right"></i>Chương trình Indoorgame tháng 7.</p>
				<p><i class="fas fa-arrow-right"></i>Một số lưu ý khi tham gia chương trình tổng kết s1.</p>
				<p><i class="fas fa-arrow-right"></i>Tạp chí nội bộ nhà tôi quý II/2018.</p>
				<p><i class="fas fa-arrow-right"></i>Chương trình NTQ Imuzik thứ 4 - 25/7.</p>
				<p><i class="fas fa-arrow-right"></i>Thông báo kế hoạch gặt thảm.</p>
			</div>
		</div>
	</footer>
</template>

<script>
export default {
  name: 'app',
  data () {
    return {
      
    }
  }
}
</script>

<style>
/* style for footer */
.footer {
	width: 100%;
	background-color: #1c2632;
	height: auto;
	color: wheat;
}
.footer_content{
	width:1158px;
	margin:auto;
	display: flex;
	padding-top: 50px;
	justify-content: space-between;
}

.footer_content_logo img {
    padding-bottom: 15px;
    cursor: pointer;
}
.footer_content_contact h3,.footer_content_news h3 {
    font-size: 30px;
    padding-bottom: 25px;
}
.footer_content_contact i {
    font-size:  35px;
    margin-right: 15px;
    cursor: pointer;
}
.footer_content_news  p{
    padding-bottom: 15px;
    cursor: pointer;
    margin: 0;
}
.footer_content_news i{
	font-size: 17px;
	margin-right: 15px;
}
/*End style for footer */
</style>
