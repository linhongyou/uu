
<script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
<style>
* {
	padding: 0;
	margin: 0;
}

#wrap {
	position: relative;
	zoom: 1;
	margin: 0px auto;
}

#wrap li {
	width: 250px;
	float: left;
	list-style: none;
}

.boxCont {
	position: relative;
	margin: 15px;
	border: 1px solid #ccc;
	background: #eee;
	background: -webkit-gradient(linear, 0% 20%, 0% 92%, from(#fff),
		to(#f3f3f3), color-stop(.1, #fff) );
	background: -webkit-linear-gradient(0 0 270deg, #f3f3f3, #f3f3f3 10%, #fff);
	background: -moz-linear-gradient(0 0 270deg, #f3f3f3, #f3f3f3 10%, #fff);
	background: -o-linear-gradient(0 0 270deg, #f3f3f3, #f3f3f3 10%, #fff);
	-webkit-border-radius: 60px/5px;
	-moz-border-radius: 60px/5px;
	border-radius: 60px/5px;
	-webkit-box-shadow: 0px 0px 35px rgba(0, 0, 0, 0.1) inset;
	-moz-box-shadow: 0px 0px 35px rgba(0, 0, 0, 0.1) inset;
	box-shadow: 0px 0px 35px rgba(0, 0, 0, 0.1) inset;
}

.boxCont:before {
	content: '';
	width: 50px;
	height: 50px;
	top: 0;
	right: 0;
	position: absolute;
	display: inline-block;
	z-index: -1;
	-webkit-box-shadow: 10px -10px 8px rgba(0, 0, 0, 0.2);
	-moz-box-shadow: 10px -10px 8px rgba(0, 0, 0, 0.2);
	box-shadow: 10px -10px 8px rgba(0, 0, 0, 0.2);
	-webkit-transform: rotate(2deg) translate(-14px, 20px) skew(-20deg);
	-moz-transform: rotate(2deg) translate(-14px, 20px) skew(-20deg);
	-o-transform: rotate(2deg) translate(-14px, 20px) skew(-20deg);
	transform: rotate(2deg) translate(-14px, 20px) skew(-20deg);
}

.boxCont:after {
	content: '';
	width: 100px;
	height: 100px;
	top: 0;
	left: 0;
	position: absolute;
	z-index: -1;
	display: inline-block;
	-webkit-box-shadow: -10px -10px 10px rgba(0, 0, 0, 0.2);
	-moz-box-shadow: -10px -10px 10px rgba(0, 0, 0, 0.2);
	box-shadow: -10px -10px 10px rgba(0, 0, 0, 0.2);
	-webkit-transform: rotate(2deg) translate(20px, 25px) skew(20deg);
	-moz-transform: rotate(2deg) translate(20px, 25px) skew(20deg);
	-o-transform: rotate(2deg) translate(20px, 25px) skew(20deg);
	transform: rotate(2deg) translate(20px, 25px) skew(20deg);
}
</style>
<ul id="wrap"></ul>
<script type="text/javascript">
  var $id = function(o){ return document.getElementById(o) || o};
  function sort(el){
  var h = [];
  var box = el.getElementsByTagName("li");
  var minH = box[0].offsetHeight,
  boxW = box[0].offsetWidth,
  boxH,
  n = document.documentElement.offsetWidth / boxW | 0; //计算页面能排下多少Pin
  n = (n>4)?4:n;
  el.style.width = n * boxW + "px";
  
  for(var i = 0; i < box.length; i++) {
  boxh = box[i].offsetHeight; //获取每个Pin的高度
  if(i < n) { //第一行Pin以浮动排列，不需绝对定位
  h[i] = boxh;
  box[i].style.position = '';
  } else {
  minH = Math.min.apply({},h); //取得各列累计高度最低的一列
  minKey = getarraykey(h, minH);
  h[minKey] += boxh ; //加上新高度后更新高度值
  box[i].style.position = 'absolute';
  box[i].style.top = minH + 'px';
  box[i].style.left = (minKey * boxW) + 'px';
  }
  }
  };
  /* 返回数组中某一值的对应项数 */
  function getarraykey(s, v) {
  for(k in s) {
  if(s[k] == v) {
  return k;
  }
  }
  };
  /* 随机创建Pin */
  function createPin(){
	  var pin = '';
	  for(i = 0; i < 30; i++) {
	  height = Math.floor(Math.random()*200 + 200);
	  pin += '<li><div class="boxCont" style="height:' + height + 'px;"></div></li>';
	  };
	  $("#wrap").append(pin);
	  sort($id("wrap"));
  }
  window.onload = window.onresize = function() {
  sort($id("wrap"));
  };
  createPin();
  
var h = $(document).height()-$(window).height();
window.onscroll = function(){
	if($(document).height()-$(window).height()-$(document).scrollTop()<100)
	{
		  createPin();
	}
}
  </script>