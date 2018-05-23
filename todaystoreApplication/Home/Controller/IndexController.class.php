<?php
// namespace Home\Controller;
use \Think\Controller;
use \Think\Model;

class IndexController extends Controller {
    public function initcarlist(){
        $phone=I('phone');
       $demo=M();
      $rows=$demo->table('car a, fruit b')->where('a.fruitid = b.fruitid')->where(array('clientid' => $phone))->field('a.fruitid as fruitid, a.fruitnum as fruitnum, b.fruitname as fruitname,a.clientid as clientid,b.fruitprice as fruitprice')->select();
      $this->ajaxReturn($rows); 
    }
    public function index(){
        $this->redirect('tdindex');
    }
    public function initlist(){
        $fruitlistModel=new \Home\Model\IndexModel('fruit');
      $rows=$fruitlistModel->select();
      $this->ajaxReturn($rows); 
    }
    public function upcar(){
        $num=I('num');
        $fruitid=I('fruitid');
        $phone=I('phone');
        $model=new \Home\Model\IndexModel('car');
       $data=array(
            'fruitnum' =>$num,
            'clientid' =>$phone,
            'fruitid' =>$fruitid,
        );
        $where=array(
            'clientid' =>$phone,
            'fruitid' =>$fruitid,
        );
        $res=$model->where($where)->field('fruitnum')->select();
if($res){
    $num=$res[0]['fruitnum']+$num;
     $data3=array(
            'fruitnum' =>$num,
        );
     if(!($model->where($where)->save($data3))){
          $this.error('更改失败');
        }
        else{
          $data1 = array(  
            'info' => 'ok,changed',  
            'info2' => 'fine'
                // 'sessonname' => $user['username']
          );
  $this->ajaxReturn($data1);
   }
}
else {
  if(!($model->add($data))){
            $this->error('注册失败');
        }
        else{
        $data1 = array(  
                'info' => '成功加入购物车',  
                'info2' => 'fine'
                // 'sessonname' => $user['username']
            );
        $this->ajaxReturn($data1);  }
}
       }
       public function logit(){
        $phone=I('phone');
        $password=I('password');
        if(empty($phone)){
            $this->error('12');
        }
        $model=new \Home\Model\IndexModel('client_information');
    $user = $model->where(array('clientphone' => $phone))->find();
    if (empty($user) || $user['clientpwd'] != $password)
    {
      $this->error('账号或密码错误');
    }
    $data1 = array(  
                'info' => $phone,  
                'name' => $user['clientname']
                // 'sessonname' => $user['username']
            );
        $this->ajaxReturn($data1);  
    }
    public function signit(){   
		$name=I('name');
    	$phone=I('phone');
    	$password=I('password');

    	if(empty($name)){
    		$this->error('12');
    	}

    	$model=new \Home\Model\IndexModel('client_information');
    	$data=array(
    		'clientname' =>$name,
    		'clientphone' =>$phone,
    		'clientpwd' =>$password
    	);
    	if(!($model->add($data))){
    		$this->error('注册失败');
    	}
    	else{
    	$data1 = array(  
                'info' => $phone,  
                'name' => $name
                // 'sessonname' => $user['username']
            );
    	$this->ajaxReturn($data1);  }

    }
    public function signjump(){
      // $managerModel=new \Home\Model\ManagerModel('manager');
      // $rows=$managerModel->select();
      // $this->assign('rows',$rows);
      // $this->display('index');
      $this->redirect('sign');
    }
}