<?php
    //<errors>
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
    //</errors>
    require 'engine/classes/profile.php';
    require 'engine/classes/user.php';
    require 'engine/template.php';
    require 'engine/MySQL_Class.php';
    require 'config.php';
    require 'api/API.php';
    
    $mysql = new MySQL_Class();
    
    $error = array(
        'title' => "Ошибка такая-то",
        'content' => "Косяк в том-то"
    );
        
    $test = array(
        'name' => "user",
        'surname' => "userov"
    );
        
    $tpl->main = $test;
    
    $tpl->title = $config["title"];

    $do = "main";
    $type = "";

    //Получаемые параметры
	if ($api->issetParam("do")) $do = $api->getParam("do");
			
	//Кухня
    if($do == "main") {
        $tpl->content = $tpl->render('main');

        $profileObject = new Profile();
        echo $profileObject->login;
        $profileObject->login();
        echo $profileObject->login;
        
        $userObject = new User();
        $userObject->test();
        echo $userObject->login;
        echo $profileObject->login;
    }
	
    if($do == "auth") {
		$tpl->content = $tpl->render('auth');
    
        
        if ($api->issetParam("type")) $type = $api->getParam("type");
        
        if( $type == "login" ) {

            if ($api->issetParam("login")) $login = $api->getParam("login");
            if ($api->issetParam("password")) $password = $api->getParam("password");
            
            $password = md5(md5($password));
            $uid = $mysql->check_login($login, $password);
            
            if($uid == 0) {

                $error['title'] = "Ошибка с профилем";
                $error['content'] = "Такой пары пользователь/пароль не существует";
                $tpl->error = $error;
                $tpl->system_messages = $tpl->render('error');
            }
            else {

                $tpl->ul_login = $login;
                $tpl->ul_password = $password;
                $tpl->content = $tpl->render('user_login');
            }
        }
        if( $type == "registration" ) {
                $tpl->content = $tpl->render('login_extra');
        }
        
        if( $type == "device_login" ) 
        {
            $login = "Guest";
            $pin = "000000";
                        
            if ($api->issetParam("login")) $login = $api->getParam("login");
            //сделать проверку логина
            if ($api->issetParam("pin")) $pin = $api->getParam("pin");
            
            $uid = $mysql->get_uid($login);
            
            if($uid == 0)
            {
                $error['title'] = "Ошибка с профилем";
                $error['content'] = "Такого пользователя не существует.";
                $tpl->error = $error;
                $tpl->system_messages = $tpl->render('error');
            }
            else 
            {
                $pinsize = $config["pin_size"];
                                
                $answ = $api->check_pin($uid, $pin, $pinsize);
                $status = $json_class->get_data($answ);
                               
                if($status["status"] == "0") {
                    $secret = "Here's some secret data!";
                    $tpl->secret = $secret;
                }
                else {
                    $error['title'] = "Ошибка проверки подлинности";
                    $error['content'] = "Ввёденные вами данные являются неверными!";
                    $tpl->error = $error;
                    $tpl->system_messages = $tpl->render('error');
                }
                
                $tpl->content = $tpl->render('device_login');
            }     
        }
	}
    
    if($do == "registration") {
		$tpl->content = $tpl->render('user_register');
        
        $type = "";
        
        if ($api->issetParam("type")) $type = $api->getParam("type");
        
        
        // /index.php?do=registration&type=user_registration&login=mrB4el&password1=123456&password2=123456
        if($type == "user_registration") {
            $login = "Guest";
            $password1 = "";
            $password2 = "";
            
            if ($api->issetParam("login")) $login = $api->getParam("login");
            //сделать проверку логина
            if ($api->issetParam("password1")) $password1 = $api->getParam("password1");
            if ($api->issetParam("password2")) $password2 = $api->getParam("password2");
            
            if( !empty($password1) AND !empty($password2) AND !empty($login) )
            {
            
                if ($password1 == $password2)
                {
                    $mysql->register($login, $password1, "admin@admin.com");
                }
                else {
                    $error['title'] = "Ошибка с паролями";
                    $error['content'] = "Пароли не совпадают";
                    $tpl->error = $error;
                    $tpl->system_messages = $tpl->render('error');
                }
            }
            else {
                $error['title'] = "Упс";
                $error['content'] = "Поля регистрации не могут быть пустыми";
                $tpl->error = $error;
                $tpl->system_messages = $tpl->render('error');
            }
        }
        // /index.php?do=registration&type=device_registration&login=mrB4el&password=e10adc3949ba59abbe56e057f20f883e
        if($type == "device_registration") {
        
            
            if ($api->issetParam("type")) $type = $api->getParam("type");
            if ($api->issetParam("login")) $login = $api->getParam("login");
                //сделать проверку логина
            if ($api->issetParam("password")) $password = $api->getParam("password");
            
            $password = md5($password);
            
            $uid = $mysql->check_login($login, $password);

            if($uid == 0)
            {
                $error['title'] = "Ошибка с профилем";
                $error['content'] = "Такой пары пользователь/пароль не существует";
                $tpl->error = $error;
                $tpl->system_messages = $tpl->render('error');
            }
            else {
                $qr_url = $api->token_generate($login, $password);
                $qr_url_clear = $qr_url;
                
                $qr_url = base64_encode($qr_url);
                
                $qr_url = "<img src=\"qr/index.php?cont=".$qr_url."\" alt=\"Киви на овале\" class=\"QR\"/>";

                //$qr_url = "<object data=\"qr/index.php?cont=".$qr_url.".svg\" type=\"image/svg+xml\"></object>">
                
                $tpl->drm_qr = $qr_url;
                $tpl->drm_qrc = $qr_url_clear;

            }
            $tpl->content = $tpl->render('device_register_message');
        }
        
	}
    
    if($do == "cabinet") {
        $tpl->content = $tpl->render('device_registration');
    }
    
    echo $tpl->render('index');
    
?>