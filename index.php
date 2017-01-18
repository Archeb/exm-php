<?php
if (!isset($_GET['_pjax'])) {
	include "header.php";
}
?>
<br>
<br>
<br>
<br>

<div style="display:none">
	<div class="col s12" id="view-par">
		<div class="card horizontal view-item">
			<div class="card-image">
				<a id="book-img-url" href="view.php">
					<img id="book-img" src="img/3.jpg">
				</a>
			</div>
			<div class="card-stacked">
				<div class="card-content">
					<p>
						<h5 id="book-title">Book Title</h5>
					</p>
					<p>
						<!--<div class="chip red white-text">R18</div>-->
						<div id="book-category" class="chip">
							Category
						</div>
					</p>
				</div>
				<div class="card-action">
					<p id="book-tags"></p>
					<p>
						<a id="book-read-url" href="view.php" class="light-blue waves-effect waves-light view-btn btn">
							<i class="material-icons tiny left">play_arrow</i>开始阅读&nbsp;
						</a>
						&nbsp;&nbsp;
						<a href="#" class="orange waves-effect waves-light view-btn btn">
							<i class="material-icons tiny left">file_download</i>点击下载&nbsp;
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
<?php
if (!isset($_GET['_pjax'])) {
	include "footer.php";
}
?>
<script>
var nowpage = 0;
//ajax获取列表
$(document).ready(function() {
	console.log('index load');
	showlist("", nowpage);
});</script>