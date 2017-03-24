	(function(window){
		var that = this;

		that.repeat_judge = 'hidden';
		that.show_repeat = function(){
			if( repeat_judge == 'hidden' ){
				$('.password_repeat').attr({
					'type':'text',
				});
				repeat_judge = 'show';
			}
			else{
				$('.password_repeat').attr({
					'type':'password',
				});
				repeat_judge = 'hidden';
			}
		}

		that.pwd_judge = 'hidden';
		that.show_pwd = function(){
			if( pwd_judge == 'hidden' ){
				$('.password').attr({
					'type':'text',
				});
				pwd_judge = 'show';
			}
			else{
				$('.password').attr({
					'type':'password',
				});
				pwd_judge = 'hidden';
			}
		}
		that.adregister = function(){
			$('.feedback').html('');
			//define
			var username = $('.username').val();
			var password = $('.password').val();
			var password_repeat = $('.password_repeat').val();
			var adminpwd = $('.adminpwd').val();
			var phone_number = $('.phone_number').val();
			var email = $('.email').val();
			var input = $('.box .input');
			//verify===================================================
				//empty
			for( var i = 0; i < input.length; i++ ){
				if( input.eq(i).val() == '' ){
					// console.log(i);
					$('.feedback').eq(i).html('信息不能为空！');
					return false;
				}
			}
				//length
			if( username.length < 4 ){
				$('.feedback').eq(0).html('用户名至少四个字节！');
				// console.log(1);
				return false;
			}
			if( password.length < 6 ){
				$('.feedback').eq(1).html('密码至少六个字节！');
				return false;
			}
				//equal
			if( password != password_repeat ){
				$('.feedback').eq(2).html('与密码输入不一致！');
				return false;
			}
				//valid
			var reg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
			// console.log(phone_number);
			if(!reg.test(phone_number)) { 
			    $('.feedback').eq(3).html('请输入有效手机号！');
			    return false;
			}

			reg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
			if(!reg.test(email)){
				$('.feedback').eq(4).html('请输入有效邮箱地址！');
				return false;
			}
            // console.log(path);
            //ajax=======================================================
            var url = "/enroll_test/index.php"
            $.ajax({  
            	url: url + '/User/adminregist',  
            	type: 'POST',  
            	data:{
            		'username':username,
            		'password':password,
            		'adminpwd':adminpwd,
            		'phone_number':phone_number,
            		'email':email
            	},
            	success: function(msg){
            		if( msg == 'powererr' ){
            			$('.feedback').eq(0).html('管理员用户名或密码错误');
            		}
            		else{
            			if( msg == 'admin' ){
            				location.href = url + "/Vote/index";
            			}
            			else{
            				if( msg == 'u_repeat' ){
            			               $('.feedback').eq(0).html('用户名已存在！');
            		                             }
            		            else  {$('.feedback').eq(0).html('未知错误');}
            			}
            		}
            	}   
            })  

		}
	})(window)