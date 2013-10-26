<?php $title="设置成功"; include dirname(__FILE__).'/header.php';?>
<h1><?=htmlspecialchars($domain);?>转发设置成功！</h1>
<hr />
域名：<?=htmlspecialchars($domain);?><br />
管理地址：http://<?=htmlspecialchars($domain);?>/?<?=$password;?>
</body>
</html>