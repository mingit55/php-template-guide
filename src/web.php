<?php
use App\Router;

Router::get("/init", "ActionController@init");

Router::get("/", "ViewController@main");
Router::get("/intro", "ViewController@intro");
Router::get("/roadmap", "ViewController@roadmap");

/**
 * 사용자 인증
 */
Router::get("/sign-in", "ViewController@signIn", "guest");
Router::get("/sign-up", "ViewController@signUp", "guest");

Router::post("/sign-in", "ActionController@signIn", "guest");
Router::post("/sign-up", "ActionController@signUp", "guest");
Router::get("/sign-out", "ActionController@signOut", "login");

Router::get("/api/users/{user_id}", "ApiController@getUser");

Router::start();