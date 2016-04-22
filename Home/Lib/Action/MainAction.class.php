<?php
	// 本类由系统自动生成，仅供测试用途
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


		public function admin()
		{
			$this->display();
			
		}

		public function add()
		{
			if($_POST["slect"]== 1)
			{
				$Message = M("day");
		        $Message->create();
				$Message->add();
				$this->success("日记添加成功","Eindex");
			}

			else
			{
				$Message = M("message");
		        $Message->create();
				$Message->add();
				$this->success("添加成功","Eindex");
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

		public function search()
		{
			import('ORG.Util.Kmp');
		//	kmp::displayVar();

			$a  = new  Kmp ();
 			$a -> displayVar ();


 			$b=2.4444;
 		//	printf("%2"$b);

 			//import("ORG.Util.AjaxPage");// 导入分页类  注意导入的是自己写的AjaxPage类
		//	$p = new AjaxPage($count, $limitRows,"user"); //第三个参数是你需要调用换页的ajax函数名
		}
}

