<?php
session_start();
if(empty($_SESSION['rank_name'])&&empty($_POST)){
	header('Location: login.html');
	exit;
}
if($_POST['name']=="admin"&&$_POST['password']=="hnustacm117"){
	$_SESSION['rank_name'] = "admin";
	exit("success");
}else if(empty($_SESSION['rank_name'])){
	exit;
}
?>
<!DOCTYPE html>
<html lang="zh-cn" ng-app="myapp">
  <head>
    <meta charset="utf8">
    <title>湖南科技大学ACM集训队队员刷题榜</title>
    <meta name="description" content="湖南科技大学ACM集训队队员刷题榜">
    <meta name="author" content="王克纯 &lt;hi@hi-hi.cn&gt;">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="./favicon.ico">
    <link rel="stylesheet" type="text/css" href="./bower_components/bootstrap/dist/css/bootstrap.min.css">
    <script src="./bower_components/jquery/dist/jquery.min.js"></script>
   	<style>
   .preloader {
		position:fixed;
		left: 0;
		right:0;
		width: 100%;
		height: 100%;
		z-index: 9999;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		-webkit-flex-flow: row nowrap;
		-ms-flex-flow: row nowrap;
		flex-flow: row nowrap;
		-webkit-justify-content: center;
		-ms-flex-pack: center;
		justify-content: center;
		-webkit-align-items: center;
		-ms-flex-align: center;
		align-items: center;
		background: none repeat scroll 0 0 rgba(0, 0, 0, 0.45);
	}
	.sk-spinner-wordpress.sk-spinner {
		background-color: #36C;
		width: 30px;
		height: 30px;
		border-radius: 30px;
		position: relative;
		-webkit-animation: sk-innerCircle 1s linear infinite;
		        animation: sk-innerCircle 1s linear infinite; 
	}
	.sk-spinner-wordpress .sk-inner-circle {
		display: block;
		background-color: #fff;
		width: 8px;
		height: 8px;
		position: absolute;
		border-radius: 8px;
		top: 5px;
		left: 5px; 
	}
	@-webkit-keyframes sk-innerCircle {
	  0% {
	    -webkit-transform: rotate(0);
	            transform: rotate(0); 
	    }
	  100% {
	    -webkit-transform: rotate(360deg);
	            transform: rotate(360deg);
	     } 
	 }
    </style>
    <script>
	    function Updata(){
	    	var name = $("#name").val().trim();
	    	var id = $("#id").val().trim();
	    	var hdu = $("#hdu").val().trim();
	    	var hn = $("#hn").val().trim();
	    	var bnuoj = $("#bnuoj").val().trim();
	    	var poj = $("#poj").val().trim();
	    	var acdream = $("#acdream").val().trim();
	    	var cf = $("#cf").val().trim();
	    	var bestcoder = $("#bestcoder").val().trim();
	    	var codechef = $("#codechef").val().trim();
	    	var other = $("#other").val().trim();	    	
	    	if(name==""||id==""){
	    		alert("名字和学号不能为空！");
	    	}else if(other==""){
	    		alert("通用oj账号不能为空！");
		    }else{
		    	$('.preloader').show();
	    		$.ajax({
	    	        type: "POST",
	    	        url:"data.php",
	    	        data: { name:name ,id:id,hdu:hdu,hn:hn,bnuoj:bnuoj,poj:poj,acdream:acdream,cf:cf,bestcoder:bestcoder,codechef:codechef,other:other },
	    	        success: function (data) {      	   
	        	        if(data=="success"){
	        	        	$('.preloader').hide();      	      
	            	    	alert("添加成功！"); 
	            	    	window.location.href ="index.php"; 	            	    	 	        	        	
	            	    }
	    	        }
	    	    });	
	    	}	
	    }
    </script>  
  </head>
<body>
<!-- 加载显示 -->
<div class="preloader" style="display:none">
    <div class="sk-spinner sk-spinner-wordpress">
       <span class="sk-inner-circle"></span>
     </div>
</div>
<h3 class="text-center" style="padding-top: 80px;margin-top: 0px;margin-bottom: 60px;">
	<strong>湖南科技大学ACM集训队刷题榜人员添加</strong>
</h3>
<form class="form" role="form">
  <div class="form-group">
    <label for="firstname" class="col-sm-1 control-label">名字</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="name" name="name" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-1 control-label">学号</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="id" name="id" placeholder="">
    </div>
  </div> 
  <div class="form-group">
    <label for="lastname" class="col-sm-1 control-label">hdu</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="hdu" name="hdu" placeholder="">
    </div>
  </div>
  <div class="form-group" style="padding-bottom: 50px;">
    <label for="lastname" class="col-sm-1 control-label">hn</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="hn" name="hn" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-1 control-label">bnuoj</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="bnuoj" name="bnuoj" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-1 control-label">poj</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="poj" name="poj" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-1 control-label">acdream</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="acdream" name="acdream" placeholder="">
    </div>
  </div>
  <div class="form-group" style="padding-bottom: 50px;">
    <label for="lastname" class="col-sm-1 control-label">cf</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="cf" name="cf" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-1 control-label">bestcoder</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="bestcoder" name="bestcoder" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-1 control-label">codechef</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="codechef" name="codechef" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-1 control-label">other</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="other" name="other" placeholder="默认通用的">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-1">
      <button type="button" class="btn btn-default" onclick="Updata()">提交</button>
    </div>
  </div>
</form>
</body>
</html>