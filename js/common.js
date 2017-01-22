//初始化用户设定
if($.cookie('replaceimg')=="1"){
	$('#speedupctl').attr('checked','');
}else{
	$('#speedupctl').attr('checked',false);
}
if($.cookie('widescreen')=="1"){
    $('#pjax-container').removeClass('container');
    $('.nav-wrapper').removeClass('container');
	$('#widescreen').attr('checked','');
}else{
	$('#widescreen').attr('checked',false);
}
//滑动效果
$(".view-item").each(function() {
	$(this).addClass("animated fadeIn");
});
//自适应
$(window).resize(autoSize);

function autoSize() {
	if($(window).width() < 600) {
		$(".view-item").each(function() {
			$(this).removeClass("horizontal");
			//$(this).addClass("large");
		});
	} else {
		$(".view-item").each(function() {
			//$(this).removeClass("large");
			$(this).addClass("horizontal");
		});
	}

}
autoSize();
$(".button-collapse").sideNav();

//模态框
$('.modal').modal();

//pjax
$(document).pjax('a', '#pjax-container')

function showlist(search, page, cleanlist = true) {
	$('#sidenav-overlay').show();
	var example;
	example = $("#view-par");
	var thelist;
	thelist = $("#pjax-container");
	$.ajax({
		url: 'https://' + apidomain + '/api/eh_list.php?&f_search=' + search + '&page=' + page,
		type: 'GET',
		async: true,
		timeout: 10000,
		dataType: 'json',
		success: function(data, textStatus, jqXHR) {
			if(data['status'] == "success") {
				//清空当前列表
				if(cleanlist == true) {
					$('.isvalued').remove();
				}
				console.log("load list success, now page:" + nowpage);
				data = data["result"]; //截取结果部分
				for(var id in data) {
					var p;
					p = example.clone();
					p.appendTo(thelist);
					p.addClass("isvalued");
					data[id].img = ReplaceImgURL(data[id].img);
					p.find("#book-title").text(data[id].title);
					p.find("#book-img").attr("src", (data[id].img));
					p.find("#book-category").text(data[id].category);
					p.find("#book-read-url").attr("href", "view.php?" + (data[id].url));
					p.find("#book-img-url").attr("href", "view.php?" + (data[id].url));
				}
				$(".loadmore").show();
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
	})

}

function loadmore() {
	$(".loadmore").hide();
	nowpage++;
	showlist($('#search').val(), nowpage, false);
}

function ChangeBookPage(page) {
    if(window.location.search.indexOf('?p=')!=-1){
        var ehurl = window.location.search.substring(0,window.location.search.indexOf('?p=')-1)
    }else{
        var ehurl = window.location.search;
    }
	ehurl = ehurl.substr(2) + "/?p=" + (page-1);
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
				//clean preview box
				$(".imgcon").remove();
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
				//分页设置
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
				$(".active").removeClass("active");
				$("#pgi" + page).addClass("active");
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
	})
}

function ReplaceImgURL(url) {
	if($.cookie('replaceimg') == "1") {
		url = url.substr(6);
		url = "https://speed1.xn--gr1a.cc" + url;
		return url;
	} else {
		return url;
	}
}

function savesetting(setitem){
	if($.cookie(setitem) == "1") {
		$.removeCookie(setitem);
		$.cookie(setitem, '0', { expires: 365 });
	} else {
		$.removeCookie(setitem);
		$.cookie(setitem, '1', { expires: 365 });
	}
}
