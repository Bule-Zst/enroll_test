<?php
    namespace Home\Controller;
    use Think\Controller;
    class UserController extends Controller{
    	public function __initialize(){
    		//初始化函数
    	}

    	public function index(){
                $this->display();
    	}

        public function login(){
            // return "aaaaa";
            if(!isset($_SESSION)){
                session_start();
            }
            // $_SESSION['login_uid'] = 1;
            // $_SESSION['login_username'] = 'test';
            if( $_SESSION['login_uid'] ){

               $Common = D('Common');
                if($Common->isAdmin()){

                    $this->success('登录成功', U('Vote/index'));
                }
                else $this->success('登录成功', U('Vote/votepage'));

            }
            else{
                $this->assign("user",$_SESSION['status']);
                $this->assign('username',$_SESSION['tempname']);
                $this->display();
            }
        }


        //Readme
        //input:
        //  username
        //  password
        //output:
        //  true: login success
        //  u: username doesn't exist
        //  p: password is wrong
        //
        public function login_check(){
 
            $username = I('post.username');
            $password = I('post.password');
 
            $result = D('registration')
                -> where( "username = '%s'",$username )
                -> getField( 'password' );
            $_SESSION['status']=0;
            if( $result ){
                if( $result === hash("sha256", $password.'HowToUseBcryptInTP?')){
                    if(!isset($_SESSION)){
                        session_start();
                    }
                    $_SESSION['login_uid'] = 1;
                    $_SESSION['login_username']=$username;
                    $power = D('registration')
                        -> where(  "username = '%s'",$username  )
                        -> getField( 'power' );
 
                     
 
                    if($power === hash('sha256', 'admin')) {
                            $this->redirect('Vote/index');
                         }
                    else {
                        $this->redirect('Vote/votepage');
                    }
 
                   }
                else{
                    $_SESSION['status']=1;
                    $_SESSION['tempname']=$username;
                    $this->redirect('User/login');
                    
                }
                
            }
            else{
                  $_SESSION['status']=1;
                  $_SESSION['tempname']=$username;
                   $this->redirect('User/login');
                 }
 
         
            
 
        }

        public function register_index(){
            $this -> display('User/register');
        }
        public function newadmin(){
            $this -> display('User/adregister');
        }
    	public function logout(){
    		$_SESSION = array();
    		session_destroy();
    		$this->success('退出登录', U('User/index'));
    	}
        public function adregister(){
            $username     =     I('post.username');
            $password     =     I('post.password');
            $repassword   =     I('post.repassword');
            $adminpwd     =     I('post.adminpwd');
            $phone_number =     I('phone_number');
            $email        =     I('email');
            $data = [
                    "username"     =>   $username,
                    "password"     =>   $password,
                    "repassword"   =>   $repassword,
                    'phone_number' =>   $phone_number,
                    'email'        =>   $email,
                    'power'        =>   ''
            ];
    $rules = array(
     array('username','require','用户名必须！'), // 用户名必须
     array('username','','帐号名称已经存在！',1,'unique',1), // 验证用户名是否已经存在
     array('username','4,30','用户名长度不正确',0,'length'),
     array('email','email','Email格式错误！',2), // 如果输入则验证Email格式是否正确
     array('password','6,64','密码长度不正确',0,'length'), // 验证密码是否在指定长度范围
     array('repassword','password','确认密码不一致',0,'confirm'), // 验证确认密码是否和密码一致     
   );

                $adminpwd=  hash("sha256", $adminpwd.'HowToUseBcryptInTP?');
                $isadmin =  D( 'Common' ) -> isAdmin();
                $adname  =  $_SESSION['login_username'];
                $adpass  =  D('registration')
                             -> where( "username = '%s'",$adname )
                             -> getField( 'password' );
                $check   =   $adminpwd===$adpass;
        if( $isadmin && $check ){
                $power = hash( "sha256", 'admin' );
                $registration=M("registration");
                
            if(!$registration->validate($rules)->create($data)){
                   // exit($registration->getError());
                   $statue=$registration->getError();
                    $this->assign('statue',$statue);
                    $this->assign('data',$data);
                    $this->display();
                 }
            else{
                  $data['password']=hash("sha256", $password.'HowToUseBcryptInTP?');
                  $data['power']=$power;
                  $registration->add($data);
                  if(!isset($_SESSION)){
                     session_start();
                    }
                 $_SESSION['login_uid'] = 1;
                 $_SESSION['login_username'] =$username;
                 $this->redirect('Vote/index');
               }
    
             }
        else{ $this->assign('statue','当前管理员用户名或密码错误');  
              $this->assign('data',$data);
              $this->display(); 
          }
           
        }
        public function register(){
            $username     =     I('post.username');
            $password     =     I('post.password');
            $repassword   =     I('post.repassword');
            $phone_number =     I('phone_number');
            $email        =     I('email');
             
          //  $result = D('registration')
            //    -> where( "username = '%s'",$username )
              //  -> find();
           // if( $result ){
             //       $_SESSION['status']=2;
               //     $this->redirect('User/register_index');
           // }
       //     else{
     $rules = array(
     array('username','require','用户名必须！'), // 用户名必须
     array('username','','帐号名称已经存在！',1,'unique',1), // 验证用户名是否已经存在
     array('username','4,30','用户名长度不正确',0,'length'),
     array('email','email','Email格式错误！',2), // 如果输入则验证Email格式是否正确
     array('password','6,64','密码长度不正确',0,'length'), // 验证密码是否在指定长度范围
     array('repassword','password','确认密码不一致',0,'confirm'), // 验证确认密码是否和密码一致     
   );
                $registration=M("registration");
                $data = [
                    "username"     =>   $username,
                    "password"     =>   $password,
                    "repassword"   =>   $repassword,
                    'phone_number' =>   $phone_number,
                    'email'        =>   $email
                ];
                if(!$registration->validate($rules)->create($data)){
                   // exit($registration->getError());
                   $statue=$registration->getError();
                    $this->assign('statue',$statue);
                    $this->assign('data',$data);
                    $this->display();
                 }
                 else{
                    $data['password']=hash("sha256", $password.'HowToUseBcryptInTP?');
                    $registration->add($data);
                    if(!isset($_SESSION)){
                     session_start();
                    }
                 $_SESSION['login_uid'] = 1;
                 $_SESSION['login_username'] =$username;
                     $this->redirect('Vote/votepage');
                 }
           //           -> add( $data );
         //        if(!isset($_SESSION)){
           //          session_start();
          //          }
          //       $_SESSION['login_uid'] = 1;
             //    $_SESSION['login_username'] =$username;
           //       
                  
           //     $this -> ajaxReturn( 'user' );
                 
          //  }
        }
    }