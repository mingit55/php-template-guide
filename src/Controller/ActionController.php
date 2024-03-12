<?php
namespace Controller;

use App\DB;

class ActionController {
    function init(){
        $exist = DB::who("admin");
        if(!$exist) {
            DB::query("INSERT INTO users (user_id, password, user_name, type) VALUES (?, ?, ? ,?)", [
                "admin", "1234", "관리자", "admin"
            ]);
        }

        $exist = DB::who("manager");
        if(!$exist) {
            DB::query("INSERT INTO users (user_id, password, user_name, type) VALUES (?, ?, ? ,?)", [
                "manager", "1234", "담당자", "manager"
            ]);
        }
    }

    function signIn(){
        checkEmpty();
        extract($_POST);

        $user = DB::who($user_id);
        if(!$user) back("아이디와 일치하는 회원이 존재하지 않습니다.");
        if($user->password !== $password) back("비밀번호가 일치하지 않습니다.");

        $_SESSION['user'] = $user;

        go("/", "로그인 되었습니다.");
    }

    function signUp(){
        checkEmpty();
        extract($_POST);
        
        DB::query("INSERT INTO users(user_id, password, user_name) VALUES (?, ?, ?)", [
            $user_id, $password, $user_name, $filename, $type
        ]);

        go("/", "회원가입 되었습니다.");
    }

    function signOut(){
        unset($_SESSION['user']);
        go("/", "로그아웃 되었습니다.");
    }
}