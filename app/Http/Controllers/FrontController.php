<?php

namespace App\Http\Controllers;

use View;

use App\User;

use Auth;
use Config;
use DB;
use File;
use Hash;
use Mail;
use Redirect;
use Request;
use Response;
use Session;
use Storage;
use URL;
use Validator;


class FrontController extends Controller
{

    public function getIndex(){
        $user =  User::get();
        return View::make('app.index', compact('user'));
    }



    public function getItem($id){
        $user =  User::findOrFail($id);
        return View::make('app.item', compact('user'));
    }

    public function getDelete($id){
        $user =  User::findOrFail($id)->delete();
        return Redirect::back();
    }

}