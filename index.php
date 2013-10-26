<?php
	define('ROOT_PATH',dirname(__FILE__).'/');
	require ROOT_PATH.'/include/config.inc.php';
	require ROOT_PATH.'include/data.class.php';	//数据类
	$domain = strtolower($_SERVER['HTTP_HOST']);	//访问域名
	$request = $_SERVER['QUERY_STRING'];	//查询字符串
	$db = new SimpleData(DATA_PATH);	//数据文件

	if($data = $db->read($domain)){
		//已存在数据
		if($request == $data['p']){
			if(isset($_POST['url'])){
				$url = $_POST['url'];
				$password = $data['p'];
				$hide = ($_POST['hide']==0)?0:1;
				$title = htmlspecialchars($_POST['title']);
				$data = array(
					'u' => $url,
					'p' => $password,
					'h' => $hide,
					't' => $title,
					);
				$db->write($domain,$data);
				include TEMPLATE_PATH.'set_success.php';
			}else{
				//显示修改页面
				include TEMPLATE_PATH.'modify_forward.php';
			}
		}else{
			//进行转发
			if($data['h']){
				//隐藏转发
				include TEMPLATE_PATH.'hide_forward.php';
			}else{
				header("HTTP/1.1 301 Moved Permanently");
				header("Location:".$data['u']);
			}
		}
	}else{
		//新建转发
		if(isset($_POST['url']) && (isset($_POST['password'])?$_POST['password']:'') == ADD_PASSWORD){
			//转发密码提交正确
			$url = $_POST['url'];
			$password = uniqid();
			$hide = ($_POST['hide']==0)?0:1;
			$title = htmlspecialchars($_POST['title']);
			$data = array(
				'u' => $url,
				'p' => $password,
				'h' => $hide,
				't' => $title,
				);
			$db->write($domain,$data);
			include TEMPLATE_PATH.'set_success.php';
		}else{
			//转发需要密码
			$error = isset($_POST['password'])?'密码输入错误，请重试。':'';
			include TEMPLATE_PATH.'set_forward.php';
		}
	}
