
(function(window){
	//personal function
	var set_cookie_func = function( name, val, days ){
		var date = new Date();
		date.setTime( date.getTime() + days * 24 * 60 * 60 * 1000 );
		document.cookie = name + "=" + val + ( (days==null) ? "" : ";expires=" + date.toGMTString() );
	}
	function get_cookie_func( coo_nam ){
		var name = coo_nam + "=";
		var ca = document.cookie.split(';');
		for( var i = 0; i < ca.length; i++ ){
			var pre_coo = ca[i].trim();
			// console.log(pre_coo);
			if( pre_coo.indexOf(coo_nam) == 0 ){
				return pre_coo.substring( coo_nam.length + 1, pre_coo.length );
			}
		}
		return '';
	}

	var that = this;
	that.login = function(){
		$('.feedback').html('');
		var username = $('.username').val();
		var password = $('.password').val();
		if( !username ){
			$('.feedback').eq(0).html('用户名不能为空！');
			return;
		}
		if( !password ){
			$('.feedback').eq(1).html('密码不能为空！');
			return;
		}
		var url = "/enroll_test/index.php";
		$.ajax({  
			url: url + "/User/login_check", 
			type: 'POST',  
			data:{
				'username':username,
				'password':password
			},
			success: function(msg){
				// msg = true;
				console.log(msg);
			if( msg == 'admin'){
	                 location.href = url + "/Vote/index";
			}
			else{
				if( msg == 'user'){
	                 location.href = url + "/Vote/votepage";
				}
				else{
					if( msg == 'u' ){
						$('.feedback').eq(0).html('用户名不存在！');
					}
					else{
						$('.feedback').eq(1).html('密码错误！');
					}
				}
			}
			}   
		})  
	};

	that.pwd_judge = 'hidden';
	that.show_pwd_func = function(){
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
})(window)