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
<div class="col s12 isvalued">
	<div class="card-panel">
		<center>
			<a id="post-view-link" href="">
				<img class="post-view" id="post-view" src=""/>
			</a>
			<ul class="pagination">
				<li class="waves-effect">
					<a id="prev" href="#!">
						<i class="material-icons">chevron_left</i>
					</a>
				</li>
				<li class="active">
					<a id="pageinfo" href="#!">
						666 / 2333
					</a>
				</li>
				<li class="waves-effect">
					<a id="next" href="#!">
						<i class="material-icons">chevron_right</i>
					</a>
				</li>
				<br>
				<li class="waves-effect" style="margin-top:5px">
					<a id="bookurl">
						<i class="material-icons" style="transform: rotate(270deg);">chevron_left</i>
					</a></a>
				</li>
			</ul>

		</center>
	</div>
</div>
</div>
<?php
if (!isset($_GET['_pjax'])) {
	include "footer.php";
}
?>
<script>
(typeof nowpage == "undefined") ? nowpage = 0: console.log('now page:' + nowpage);
var ehurl = window.location.search;
ehurl = ehurl.substr(2);
$('#sidenav-overlay').show();
$.ajax({
	url: 'https://' + apidomain + '/api/eh_single.php?url=' + ehurl,
	type: 'GET',
	async: true,
	timeout: 10000,
	dataType: 'json',
	success: function(data, textStatus, jqXHR) {
		if(data['status'] == "success") {
			data = data["result"]; //截取结果部分
			$('#post-view').attr('src', data['img']);
			$('#post-view-link').attr('href', "./page-view.php?" + data['next']);
			$('#prev').attr('href', "./page-view.php?" + data['prev']);
			$('#next').attr('href', "./page-view.php?" + data['next']);
			$('#bookurl').attr('href', "./view.php?" + data['bookurl']);
			$('#pageinfo').text(data['pageinfo']);
		} else {
			//失败了
			alert("服务器错误代码：" + data["err_info"]["code"] + "\n错误描述：" + data["err_info"]["desc"]);
			throw("ServerError " + data["err_info"]["code"] + ": " + data["err_info"]["desc"]);
		}
		$('#sidenav-overlay').hide();
	},
	error: function(xhr, textStatus) {
		$('#sidenav-overlay').hide();
		Materialize.toast("服务器错误，请联系站长", 4000);
	}
})</script>