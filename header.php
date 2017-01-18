<!DOCTYPE html>
<html>

	<head>
		<title>Ex Magic Door</title>
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" href="css/moe.css" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/animate.min.css" />
		<script src="./js/define.js"></script>
	</head>
	<div class="fixedbg"></div>

	<body>
		<nav class="light-green" style="position:fixed;z-index:3;">
			<div class="nav-wrapper container">
				<a href="#" class="brand-logo center">
					Ex Magic Door
				</a>
				<a href="#" data-activates="nav-mobile" class="button-collapse">
					<i class="material-icons">menu</i>
				</a>
				<form class="search-bar" onsubmit="showlist($('#search').val());return false;">
					<div class="input-field">
						<input id="search" type="search" required="">
						<label for="search" class=""><i class="material-icons">search</i></label>
						<ul class="right hide-on-med-and-down" style="z-index: 9;margin-top: -85px;">
							<li>
								<a class="modal-trigger" href="#setting">
									<i class="material-icons dp48">perm_identity</i>
								</a>
							</li>
							<li>
								<a class="modal-trigger" href="#about">
									<i class="material-icons dp48">info</i>
								</a>
							</li>
						</ul>
					</div>
				</form>
				<ul id="nav-mobile" class="side-nav" style="z-index:5;">
					<li>
						<a class="modal-trigger" href="#setting">
							<i class="material-icons dp48 left">perm_identity</i>个人设置
						</a>
					</li>
					<li>
						<a class="modal-trigger" href="#about">
							<i class="material-icons dp48 left">info</i>关于&公告
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<!-- 关于 -->
		<div id="about" class="modal modal-fixed-footer">
			<div class="modal-content">
				<h4>关于Ex Magic Door</h4>
				<hr />
				<h5>缘起</h5>
				<p>
					<b>Ex Magic Door（E站魔法门）</b>的前身是一个域名为萌.ga的无名网站，它由不愿意透露姓名的Archeb在2015年11月16日建立的
				</p>
				<p>
					起初只是为了方便自己在Kindle上看本子（因为发现Lofi版的e站很适合Kindle屏幕），而制作的网站，没想到在QQ空间中稍微宣传了一下之后，几天之内就达到了几千PV的浏览量
				</p>
				<p>
					<s><b>奇怪的是建站一年多了仍然没有一次破万过，稳定在几千...迷</b></s>
				</p>
				<h5>发展</h5>
				<p>
					刚刚写完这个网站的时候，我学PHP还不到几个星期，这是我写PHP以来的第二个项目（第一个项目是一个博客系统），因为有了第一个项目被太太和47挖出一大堆漏洞的经验，这次写出来的代码经过了安全的考验<s>（不过是非常难看的代码，管他呢能跑就行）</s>
				</p>
				<p>
					2015年11月到2016年1月左右是放在Hostinger的免费空间上，2016年2月到2016年9月是托管在AWS EC2上，2016年10月到2017年2月是托管在钱总的
					<a href="http://my.pfthost.com/?yqi=8">
						PftHost
					</a>
					上，这么一算也是有了3年历史的老站了呢（大雾
				</p>
				<p>
					关于广告，除了因为钱总的空间是免费给我提供的，我给加上一个友情链接以外，我并没有插入过任何其他广告，在新版本中，更加不会添加任何广告，请各位放心使用
				</p>
				<p>
					截至目前，网站已经拥有1933名注册用户，感谢大家一直以来的支持，我将一直维护与更新这个站，直到哪天我不看本子了为止(
				</p>
				<h5>未来</h5>
				<p>
					这个关于是写在我刚刚码完搜索的代码之后的，想着没啥事做就来坑一下这个（逃
				</p>
				<p>
					这次用的后端语言并不是PHP，大家可以猜一猜架构是怎样的，欢迎在群里(号码在下面)@我并告诉我你猜的是啥
				</p>
				<p>
					因为写关于的时候还没有正式部署，不过Open<b>Shit</b>已经开好了，就准备部署在Open<b>Shit</b>上了
				</p>
				<h5>感谢</h5>
				<p>
					因为这个站悠久的历史（口胡），在写和不断更新的过程中我也认识了许许多多的朋友和大佬，他们不仅对这个站，而且对我本人产生了很大的影响，给予了我许多的支持和帮助，实在是不胜感激
				</p>
				<p>
					首先需要感谢iDea Leaper的各位（太太 47 Aego 得瑟以及风鸟），没有你们我也不会走上这条<s>不归</s>路，大家互相之间的信任也让我感到十分温暖，再次感谢iL的大家
				</p>
				<p>
					然后是CodeKnitter的各位尤其是bobo酱，他们用丰富的<s>绅士</s>经验来提示我，对本站的开发工作做出了不可磨灭的贡献(怎么搞得一个本子站像世纪工程一样
				</p>
				<p>
					以及在2016年年初寒假一起陪我坑萌趣的烨煊，这算是以另一种方式把萌趣的坑填完了吧_(:з」∠)_...
				</p>
				<p>
					还要提一下某鹅，这是一位很好的绅士朋友，他的hmoe站在几个月前被水表了，我们永远怀念他23333
				</p>
				<p>
					最后还有许许多多我无法感谢到但是一直在支持的各位，包括看到这段话的你还有没有看到这段话的用户们，你们的浏览是我更新的动力，新的一年也请多多指教
				</p>
				<h5>开源</h5>
				<p>
					发扬开源精神，本站前端及后端均开源（虽然都写得很烂）
				</p>
				<p>
					本站前端以GPLv3协议开源，托管于GitHub，地址是
					<a href="https://github.com/Archeb/exm-php">
						https://github.com/Archeb/exm-php
					</a>
					<br>
					<font color="red">
						请注意，GPLv3许可证要求二次修改后发布的代码必须开源（包括商业软件）。
					</font>
				</p>
				<p>
					本站后端以Mozilla许可证开源，托管于GitHub，地址是
					<a href="https://github.com/Archeb/exm-nodejs">
						https://github.com/Archeb/exm-nodejs
					</a>
					<br>
					<font color="red">
						请注意，Mozilla许可证要求如果你二次修改了文件并发布，则应当有一份文档对修改的时间和方式进行说明，而且要求开源。
					</font>
				</p>
				<h5>最后</h5>
				<p>
					<a href="https://jq.qq.com/?_wv=1027&k=43TNwxw">
						QQ群515305094（点击加入）
					</a>
					，论坛正在搭建，近日就会开放，敬请期待
				</p>
				<p style="text-align: right;">
					不愿透露姓名的Archeb
					<br>
					写于2017年1月7日21点
				</p>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">
					我看完了
				</a>
			</div>
		</div>

		<!-- 关于 -->
		<div id="setting" class="modal modal-fixed-footer">
			<div class="modal-content">
				<h4>个人设置</h4>
				<hr />
				<div class="switch">
					<label>图片加速</label>
					<label>
						<input id="speedupctl" onclick="setspeedup()" type="checkbox">
						<span class="lever"></span>
					</label>
					<label style="color:red">此功能以后会收费</label>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">
					关闭
				</a>
			</div>
		</div>
		<div id="sidenav-overlay" style="opacity: 1;" class="">
			<div class="preloader-wrapper big active" style="margin: auto;position: absolute;top: -100px;left: 0;bottom: 0;right: 0;">
				<div class="spinner-layer spinner-white-only">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
		</div>

		<div class="container row" id="pjax-container">
