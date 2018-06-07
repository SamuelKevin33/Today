<?php
namespace Home\Controller;
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
  public function tuihuo(){
    $listid=I('listid');
    // echo $listid;
    $fruitlistModel=new \Home\Model\IndexModel('client_buylist');
    $data=array(
      'liststatus' => 2,
    );
     if(!($fruitlistModel->where(array('listid' => $listid))->save($data))){
      $this.error('更改失败');
    }else{
       $data1 = array(  
        'info' => 'ok',  
                // 'sessonname' => $user['username']
      );
      $this->ajaxReturn($data1); 
    }
  }
  public function initbuy(){
    $phone=I('phone');
    if(!empty($phone)){
    $fruitlistModel=new \Home\Model\IndexModel('client_buylist');
    $rows=$fruitlistModel->where(array('listphone' => $phone))->order('listid desc')->select();
    $this->ajaxReturn($rows); 
    }
  }
  public function initlist(){
    $fruitlistModel=new \Home\Model\IndexModel('fruit');
    $rows=$fruitlistModel->select();
    $this->ajaxReturn($rows); 
  }
  public function upclientinfo(){
    $name=I('name');
    $phone=I('phone');
    $Ophone=I('oldphone');
    $birth=I('birth');
    $place=I('place');
    if(!empty($name)){
     $model=new \Home\Model\IndexModel('client_information');
     $data=array(
      'clientphone' => $phone,
      'clientname' => $name,
      'clientbirth' => $birth,
      'clientplace' => $place,
    );
     if(!($model->where(array('clientphone' => $Ophone))->save($data))){
      $this.error('更改失败');
    }
    else{
      $data1 = array(  
        'info' => 'ok,changed',  
                // 'sessonname' => $user['username']
      );
      $this->ajaxReturn($data1); 
    }
  }
}
public function selectpwd(){
  $phone=I('phone');
  if(!empty($phone)){
   $model=new \Home\Model\IndexModel('client_information');
   $res=$model->where(array('clientphone' => $phone))->field('clientpwd')->select();
   $data1 = array(  
    'info' => $res[0]['clientpwd'],  
                // 'sessonname' => $user['username']
  );
   $this->ajaxReturn($res[0]['clientpwd']); 
 }
}
public function selectaddress(){
  $phone=I('phone');
  $model=new \Home\Model\IndexModel('client_adresses');
  $res=$model->where(array('clientid' => $phone))->select();
  $this->ajaxReturn($res); 
}
public function upclientpwd(){
  $phone=I('phone');
  $password=I('password');
  if(!empty($phone)){
   $model=new \Home\Model\IndexModel('client_information');
   $data=array(
    'clientpwd' => $password,
  );
   if(!($model->where(array('clientphone' => $phone))->save($data))){
    $this.error('更改失败');
  }
  else{
    $data1 = array(  
      'info' => 'ok,changed',  
                // 'sessonname' => $user['username']
    );
    $this->ajaxReturn($data1); 
  }
}
}
public function dofankui(){
  $phone=I('phone');
  $content=I('content');
  if(!empty($phone)){
   $model=new \Home\Model\IndexModel('fankui');
   $data = array(  
    'clientphone' => $phone,  
    'clientcontent' => $content,
    'fankuistatu' =>1,
  );
   if(!($model->add($data))){
    $this->error('注册失败');
  }
  else{
    $data1 = array(  
      'info' => 'OK',  
    );
    $this->ajaxReturn($data1);  }
  }
}
public function selectmon(){
  $phone=I('phone');
  if(!empty($phone)){
   $model=new \Home\Model\IndexModel('client_money');
   $res=$model->where(array('phone' => $phone))->select();
   $data1 = array(  
    'info' => $res[0]['nowmoney'], 
    'info2' => $res[0]['money'],   
    'info3' => 'ok'
                // 'sessonname' => $user['username']
  );
   $this->ajaxReturn($data1); 
 }
}
//               $res=$model->where(array('phone' => $phone))->field('money')->select();
// if($res){
//     $num=$res[0]['fruitnum']+$num;
//      $data3=array(
//             'fruitnum' =>$num,
//         );
public function addbuylist(){
  $phone=I('phone');
  $friendphone=I('friendphone');
  $sum=I('sum');
  $date=I('date');
  $status=I('status');
  $address=I('address');
  $id=I('id');
  $fruitid=I('fruitid');
  $fruitnum=I('fruitnum');
  if(!empty($phone)){
   $model=new \Home\Model\IndexModel('client_buylist');
   $data = array(  
    'listphone' => $phone,  
    'listprice' => $sum,
    'listtime' => $date,
    'liststatus' => $status,
    'listaddress' => $address,
    'listid' => $id,
    'fruitid' => $fruitid,
    'friendphone' => $friendphone,
                // 'sessonname' => $user['username']
  );
   if(!($model->add($data))){
    $this->error('注册失败');
  }
  else{
    $model3=new \Home\Model\IndexModel('client_money');
    $res=$model3->where(array('clientphone' => $phone))->field('nowmoney')->select();
   $money=$res[0]['nowmoney']-$sum;
    $data3 = array(  
    'nowmoney' => $money,
                // 'sessonname' => $user['username']
  );
   if(!($model3->where(array('phone' => $phone))->save($data3))){
    $this->error('注册失败');
  }
  else{
    $model1=new \Home\Model\BackModel('car');
        if(!($model1->where(array('listphone' => $phone,'fruitid' => $fruitid))->delete())){
          $this.error('删除失败');
        }
        else{
          $model6=new \Home\Model\IndexModel('fruit');
          $res6=$model6->where(array('fruitid' => $fruitid))->field('fruitleft')->select();
   $left=$res6[0]['fruitleft']-$fruitnum;
   $data6 = array(  
    'fruitleft' => $left,
                // 'sessonname' => $user['username']
  );
   if(!($model6->where(array('fruitid' => $fruitid))->save($data6))){
    $this->error('删除失败');
  }else{
          $data1 = array(  
            'info' => 'ok',  
                // 'sessonname' => $user['username']
          );
           $this->ajaxReturn($data1); 
       }
}
}
}
}
}
public function addmoney(){
  $phone=I('phone');
  $money=I('money');
  $date=I('time');
  $status=I('status');
  $nowmoney=I('nowmoney');
  if(!empty($phone)){
   $model=new \Home\Model\IndexModel('client_money');
   $res=$model->where(array('clientphone' => $phone))->field('money')->select();
   $money=$res[0]['money']+$money;
   $data = array(  
    'phone' => $phone,  
    'money' => $money,
    'date' => $date,
    'status' => $status,
    'nowmoney' => $nowmoney,
                // 'sessonname' => $user['username']
  );
   if(!($model->add($data))){
    $this->error('注册失败');
  }
  else{
    $data1 = array(  
      'info' => '成功加入购物车',  
                // 'sessonname' => $user['username']
    );
    $this->ajaxReturn($data1);  }
  }
}
public function upmoney(){
  $phone=I('phone');
  $money=I('money');
  $date=I('time');
  $status=I('status');
  $nowmoney=I('nowmoney');
  if(!empty($phone)){
   $model=new \Home\Model\IndexModel('client_money');
   $res=$model->where(array('phone' => $phone))->field('money')->select();
   $money=$res[0]['money']+$money;
   $data = array(  
    'money' => $money,
    'date' => $date,
    'status' => $status,
                // 'sessonname' => $user['username']
  );
   if(!($model->where(array('phone' => $phone))->save($data))){
    $this->error('注册失败');
  }
  else{
    $data1 = array(  
      'info' => '开始充值',  
                // 'sessonname' => $user['username']
    );
    $this->ajaxReturn($data1);  }
  }
}
public function deleteadd(){
  $friendphone = I('friendphone');
  $phone=I('phone');
  $friendplace=I('friendplace');
  $model=new \Home\Model\BackModel('client_adresses');
  if(!($model->where(array('clientid' => $phone,'friendphone' => $friendphone,'friendplace' => $friendplace))->delete())){
    $this.error('删除失败');
  }
  else{
    $data1 = array(  
      'info' => 'ok,deleted',  
                // 'sessonname' => $user['username']
    );
    $this->ajaxReturn($data1); 
  }
}
public function deletethiscar(){
  $phone=I('phone');
  $fruitid=I('fruitid');
  if(!empty($phone)){
  $model=new \Home\Model\BackModel('car');
  if(!($model->where(array('clientid' => $phone,'fruitid' => $fruitid,))->delete())){
    $this.error('删除失败');
  }
  else{
    $data1 = array(  
      'info' => 'delete',  
                // 'sessonname' => $user['username']
    );
    $this->ajaxReturn($data1); 
  }
  }
}
public function upclientadd(){
  $name = I('addname');
  $phone=I('phone');
  $addphone=I('addphone');
  $addaddress=I('addadress');
  if(!empty($phone)){
   $model=new \Home\Model\BackModel('client_adresses');
   $data=array(
    'clientid' =>$phone,
    'clientfriend' =>$name,
    'friendphone' =>$addphone,
    'friendplace' =>$addaddress, 
  );
   if(!($model->add($data))){
    $this->error('注册失败');
  }
  else{
    $res=$model->where(array('clientid' => $phone))->select();
    $data1 = array(  
      'info' => 'oksummer',  
      'list' => $res
                // 'sessonname' => $user['username']
    );
  }
}
$this->ajaxReturn($data1); 
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
        'name' => $name,
        'res' => 'oksign'
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