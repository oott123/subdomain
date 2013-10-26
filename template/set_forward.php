<?php $title="设置转发"; include dirname(__FILE__).'/header.php';?>
	<h1><?=htmlspecialchars($domain);?>还没有设置转发...</h1>
	<hr />
	<form method="POST">
<?php if(ADD_PASSWORD):?>
		创建密码：<font color="#f00"><?=$error;?></font><br />
		<input type="password" name="password"></input><br />
<?php endif;?>
		转发地址：<br />
		<input name="url" value="<?=(isset($_POST['url'])?htmlspecialchars($_POST['url']):'http://');?>" style="width:580px;" ></input><br />
		转发方式：<br />
		<input type="radio" name="hide" value="0" /> 显式转发
		<input type="radio" name="hide" value="1" /> 隐藏转发<br />
		网页标题：<br />
		<input name="title" value="<?=(isset($_POST['title'])?htmlspecialchars($_POST['title']):'');?>" style="width:580px;" ></input><br />
		<input type="submit" />
	</form>
</body>
</html>