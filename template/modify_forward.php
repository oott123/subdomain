<?php $title="修改转发"; include dirname(__FILE__).'/header.php';?>
	<h1>正在修改<?=htmlspecialchars($domain);?>...</h1>
	<hr />
	<form method="POST">
		转发地址：<br />
		<input name="url" value="<?=$data['u'];?>" style="width:580px;" ></input><br />
		转发方式：<br />
		<input type="radio" name="hide" value="0" <?=$data['h']?'':'checked';?> /> 显式转发
		<input type="radio" name="hide" value="1" <?=$data['h']?'checked':'';?> /> 隐藏转发<br />
		网页标题：<br />
		<input name="title" value="<?=$data['t'];?>" style="width:580px;" ></input><br />
		<input type="submit" />
	</form>
</body>
</html>