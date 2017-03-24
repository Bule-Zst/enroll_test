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

                if($_SESSION['login_username']==='admin'){

                    $this->success('登录成功', U('Vote/index'));
                }
                else $this->success('登录成功', U('Vote/votepage'));

            }
            else{
                $this->display();
            }
    	}

        //Readme========================
        //input:
        //  username
        //  password
        //output:
        //  true: login success
        //  u: username doesn't exist
        //  p: password is wrong
        //===============================
        public function login_check(){
            // $this -> ajaxReturn( 10 );
            $username = $_POST['username'];
            $password = $_POST['password'];
            $result = D('registration')
                -> where( "username = '%s'",$username )
                -> getField( 'password' );
            // $a = "bbb" == $result;
            // $this -> ajaxReturn( $a );
            if( $result ){
                if( $result === hash("sha256", $password.'HowToUseBcryptInTP?')){
                    if(!isset($_SESSION)){
                        session_start();
                    }
                    $_SESSION['login_uid'] = 1;
                    $_SESSION['login_username']=$username;
                    $power = D('registration')
                        -> where( 'username ='." '$username'" )
                        -> getField( 'power' );
                    if($power==hash('sha256', 'admin')) {$this -> ajaxReturn('admin'); }
                    else {$this -> ajaxReturn('user');}
                }
                else{
                    $this -> ajaxReturn('p');
                }
            }
            $this -> ajaxReturn('u');
        }

        public function register_index(){
            $this -> display('User/register');
        }

    	public function logout(){
    		$_SESSION = array();
    		session_destroy();
    		$this->success('退出登录', U('User/index'));
    	}

        public function register(){
            $username     =     $_POST['username'];
            $password     =     $_POST['password'];
            $password     =     hash("sha256", $password.'HowToUseBcryptInTP?');
            $phone_number =     $_POST['phone_number'];
            $email        =     $_POST['email'];
            // information judge
                // empty
            if( $username == '' ){
                $this -> ajaxReturn( "e0" );
            }
            if( $password == '' ){
                $this -> ajaxReturn( "e1" );
            }
            if( $phone_number == '' ){
                $this -> ajaxReturn( "e3" );
            }
            if( $email == '' ){
                $this -> ajaxReturn( "e4" );
            }
                // length
            if( strlen( $username) < 4 ){
                $this -> ajaxReturn( "lu" );
            }
            if( strlen( $password ) < 6 ){
                $this -> ajaxReturn( "lp" );
            }
                // valid
            $reg = '^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+[0-9]{8})$';
            if( !ereg( $reg, $phone_number ) ){
                $this -> ajaxReturn( 'p' );
            }
            $reg = '^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$';
            if( !ereg( $reg, $email ) ){
                $this -> ajaxReturn( "e" );
            }

            $result = D('registration')
                -> where( "username = '%s'",$username )
                -> find();
            if( $result ){
                $this -> ajaxReturn( 'u_repeat' );
            }
            if( D( 'Common' ) -> isAdmin() ){
                $power = hash( "sha256", 'admin' );
                $data = [
                    "username"     =>   $username,
                    "password"     =>   $password,
                    'phone_number' =>   $phone_number,
                    'email'        =>   $email,
                    'power'        =>   $power
                ];
            }
            else{
                $data = [
                    "username"     =>   $username,
                    "password"     =>   $password,
                    'phone_number' =>   $phone_number,
                    'email'        =>   $email
                ];
            }
            D('registration')
                -> add( $data );
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['login_uid'] = 1;
            $_SESSION['login_username'] =$username;
            if( $power ){
                $this -> ajaxReturn( 'admin' );
            }
            else{
                $this -> ajaxReturn( 'user' );
            }
        }
    }