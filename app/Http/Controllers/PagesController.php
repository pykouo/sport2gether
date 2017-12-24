<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{

    public function getIndex()
    {
//        process variable data or params
//        talk to the model
//        receive from model
//        compile or process data from the model if needed
//        pass that data to the correct view
        return view('pages.welcome');
    }

    public function getRegister()
    {
        return view('auth.register');
    }
    public function getLogin()
    {
        return view('auth.login');
    }
    public function getUser()
    {
        return view('pages.user');
    }
    public function getActivity()
    {
        return view('pages.activity');
    }
    public function getNewActivity(){
        return view('pages.new-activity');
    }
    public function getActivityDetail(){
        return view('pages.activity-detail');
    }
//
//    public function getContact()
//    {
//        return view('pages.contact');
//    }
//
//    public function postContact()
//    {
//
//    }
}