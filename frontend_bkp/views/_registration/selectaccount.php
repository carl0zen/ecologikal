<?php include_once($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>
<style>
	.bigbuttons {
		width: 29%;
		height: 147px;
		background: black;
		margin: 20px 69px;
		background:url('<?php echo _IMAGES_URL_ ?>iconsmenu.png');
	}
	#memberbigbutton{
		float:left;
		background-position: -671px -13px;
	}
	#memberbigbutton:hover{
		background-position: -670px -164px;
	}
	#ecocenterbigbutton{
		float:right;
		background-position: -861px -13px;
	}
	#ecocenterbigbutton:hover{
		background-position: -861px -164px;
	}
	.or {
	line-height: 172px;
	position: absolute;
	font-weight: bold;
	text-indent: -27px;
	font-size: 40px;
	color: #AAA;
	}
	content p{
		font-size:20px;
		line-height:25px;
		margin:0 20px;
	}
</style>

<content>
	<h1>Hello <?php echo members_get_info('nombre', $_SESSION['user_id']) ?>!</h1>

	<p>You have two options now. You can choose between using your account to travel and discover amazing places or register your amazing Eco-center and enjoy other benefits</p>
<div class="buttons">
	<div id="memberbigbutton" class="bigbuttons icon tiptip" title="Register As a Single Member" onclick="location.href='<?php echo members_display_profile_url($_SESSION['user_id']) ?>&edit=1'">

	</div>
	<span class="or" >OR</span>
	<div id="ecocenterbigbutton" class="bigbuttons icon tiptip" title="Register Your EcoCenter" onclick="location.href='ecocenter_reg.php'">

	</div></div>

</content>
