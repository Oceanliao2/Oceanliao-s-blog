<?php
	import('ORG.Util.Session');
	class MainAction extends Action {
	    public function index()
	    {
			$this->display();
		}

		public function Eindex()
	    {
	    	$message=M('message');
	    	$data2=$message->order('id DESC')->select();

	    	for($i=0;$i<sizeof($data2);$i++)
			{
				$str = $data2[$i]['message'];
				preg_match_all('/[\x{4e00}-\x{9fff}]+/u', $str, $matches);//过滤非汉字的字符
				$data2[$i]['message'] = implode('', $matches[0]);
				$data[$i]=$data2[$i];
			}

	    	$this->assign('data',$data);
			$this->display();
		}

		public function admin()
		{
			$this->display();
		}

		public function oceanliao()
		{
			$message=M('message');
	    	$data=$message->order('id DESC')->select();
	    	$this->assign('data',$data);
			$this->display();
		}

		public function del()
		{
			$id = $_GET['id'];
			$message = M("message");
		    $result = $message->where(" id = '$id' ")->delete();

		    if($result !== false){
		        $this->success('删除 ' . $result . ' 条数据');
		    }else{
		        $this->error('删除数据失败');
		    }
		}


		public function update_page()
		{
			$message=M('message');
			$id = $_GET['id'];
			Session::set('id',$id);
	    	$data=$message->where("id = '$id'")->select();
	    	$this->assign('data',$data);
			$this->display();
		}

		public function update()
		{
		    $message = M("message");
		    // 需要更新的数据
		    $data['message'] = $_POST['message'];
		    $data['title'] = $_POST['title'];
		    // 更新的条件
		    $condition['id'] = $_SESSION['id'];

		    $result = $message->where($condition)->save($data);

			if($result !== false){
		        $this->success('数据更新成功','oceanliao');
		    }else{
		        $this->error('数据更新失败');
		    }
		}

		public function about()
	    {
			$this->display();
		}

		public function all()
	    {
	    	$message=M('message');
	    	$data2=$message->order('id DESC')->select();

	    	for($i=0;$i<sizeof($data2);$i++)
			{
				$str = $data2[$i]['message'];
				preg_match_all('/[\x{4e00}-\x{9fff}]+/u', $str, $matches);//过滤非汉字的字符
				$data2[$i]['message'] = implode('', $matches[0]);
				$data[$i]=$data2[$i];
			}

	    	$this->assign('data',$data);
			$this->display();
		}

		public function heart()
	    {
			$this->display();
		}

		public function add()
		{
			if($_POST["passcode"]== 'oceanliao')
			{
				$Message = M("message");
		        $Message->create();
				$Message->add();
				$this->success("添加成功","Eindex");
			}

			else
			{
				$this->error("哼！敢冒充主人，才不给你添加呢");
			}

		}

		public function message_more()
		{
			$id=$_GET['id'];
			Session::set('message_id',$id);
			$message=M('message');
			$data=$message->where("id='$id'")->select();
			$leave_message = M('leave_message')->where("message_id='$id'")->order('id DESC')->select();
			$this->assign('leave_message',$leave_message);
			$this->assign('data',$data);
			$this->display();
		}

		public function message()
		{
			$data = M("leave_word")->order('id DESC')->select();
			$this->assign('data',$data);
			$this->display();
		}

		public function leave_word()//我的留言
		{
			$Message = M("leave_word");
	        $Message->create();
			$Message->add();
			$this->success("添加成功");
		}

		public function leave_message()
		{
			$Message = M("leave_message");
	        $Message->create();
	        $Message->message_id=$_SESSION['message_id'];
			$Message->add();
			$this->success("添加成功");
		}

		public function img_upload()
		{
				import('ORG.Net.UploadFile');//引入上传类
				$upload = new UploadFile();// 实例化上传类
				$upload->maxSize  = 3145728 ;// 设置附件上传大小
				$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->savePath =  './Uploads/';// 设置附件上传目录
				// $upload->thumb= ture; //设置缩略图
				// $upload->thumbPrefix = 'thumb2_,thumb_';//生产2张缩略图
				// $upload->thumbMaxWidth      = '200,200'; //设置缩略图最大宽度
				// $upload->thumbMaxHeight     = '200,200';//设置缩略图最大高度
				$upload->upload();
				$info =  $upload->getUploadFileInfo();
				$data ='http://119.29.135.20/ocean/Uploads/'.$info[0]['savename'];
				$this->ajaxReturn($data);
		}
}

