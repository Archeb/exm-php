<?php
if (!isset($_GET['_pjax'])) {
	include "header.php";
}
?>
<br>
<br>
<br>
<br>
<div class="col s12 isvalued" id="view-par">
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

<div class="col s12 isvalued">
	<div class="card-panel view-item">
		<div id="post-preview" class="row post-preview-box">

		</div>

		<center>
			<ul class="pagination" id="pagination"></ul>
		</center>
	</div>
</div>

</div>
<?php
if (!isset($_GET['_pjax'])) {
	include "footer.php";
}
?>
<script type="text/javascript">
(typeof nowpage == "undefined") ? nowpage = 0: console.log('now page:' + nowpage);
var ehurl = window.location.search;
ehurl = ehurl.substr(2);
$('#sidenav-overlay').show();
$.ajax({
	url: 'https://' + apidomain + '/api/eh_gallery.php?url=' + ehurl,
	type: 'GET',
	async: true,
	timeout: 10000,
	dataType: 'json',
	success: function(data, textStatus, jqXHR) {
		if(data['status'] == "success") {
			data = data["result"]; //截取结果部分
			var p;
			p = $("#view-par");
			p.find("#book-title").text(data.title);
			p.find("#book-category").text(data.category);
			p.find("#book-read-url").attr("href", "page-view.php?" + (data.urls[0]));
			p.find("#book-img-url").attr("href", "page-view.php?" + (data.urls[0]));
			for(var imgid in data.imgs) {
				data.imgs[imgid] = ReplaceImgURL(data.imgs[imgid]);
				var previmgdiv = document.createElement("a");
				previmgdiv.setAttribute("class", "imgcon")
				previmgdiv.setAttribute("href", "page-view.php?" + data.urls[imgid])
				var previmg = document.createElement("img");
				previmg.setAttribute("src", data.imgs[imgid])
				previmgdiv.appendChild(previmg);
				$("#post-preview").append(previmgdiv);
			}
			p.find("#book-img").attr("src", (data.imgs[0]));
			//添加分页
			$('#pagination').append('<li id="prevpage" class="disabled"><a><i class="material-icons">chevron_left</i></a></li>');
			for(var pg = 1; pg <= data.pagecount; pg++) {
				$('#pagination').append('<li class="waves-effect" id="pgi' + pg + '"><a onclick="ChangeBookPage(' + pg + ')">' + pg + '</a></li>');
			}
			$('#pagination').append('<li id="nextpage" class="waves-effect"><a onclick="ChangeBookPage(2)"><i class="material-icons">chevron_right</i></a></li>');
			//设置active
			var page=parseInt(window.location.search.substring(window.location.search.indexOf('?p=')+3))+1;
			$('#pgi' + page).addClass('active');
			if(page > 1){
				    $('#prevpage').removeClass('disabled');
				    $('#prevpage').addClass('waves-effect');
				    $('#prevpage').children('a').attr('onclick','ChangeBookPage(' + (page-1) + ')');
				}else{
				    $('#prevpage').addClass('disabled');
				    $('#prevpage').removeClass('waves-effect');
				}
				if(page >= data.pagecount){
				    $('#nextpage').addClass('disabled');
				    $('#nextpage').removeClass('waves-effect');
				    $('#nextpage').children('a').attr('onclick',false);
				}else{
				    $('#nextpage').removeClass('disabled');
				    $('#nextpage').addClass('waves-effect');
				    $('#nextpage').children('a').attr('onclick','ChangeBookPage(' + (page+1) + ')');
				}
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