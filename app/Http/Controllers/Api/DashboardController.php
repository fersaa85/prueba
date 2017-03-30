<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\ApiController;
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
use View;


use App\User;

/**
 * Class DashboardController
 *
 * @package App\Http\Controllers\api
 */
class DashboardController extends ApiController {


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Post(
     *     path="api/dashboard/store",
     *     description="Returns dashboard overview.",
     *     operationId="api.dashboard.store",
     *     produces={"application/json"},
     *     tags={"app"},
     *   @SWG\Parameter(
     *         name="name",
     *         in="body",
     *         description="maximum number of results to return",
     *         required=false,
     *          @SWG\Schema(
     *               type="string",
     *          )
     *     ),
     * @SWG\Parameter(
     *         name="last_name_parent",
     *         in="body",
     *         description="maximum number of results to return",
     *         required=false,
     *         type="string",
     * @SWG\Schema(
     *               type="string",
     *          )
     *     ),
     * @SWG\Parameter(
     *         name="last_name_mother",
     *         in="body",
     *         description="maximum number of results to return",
     *         required=false,
     *         type="string",
     * @SWG\Schema(
     *               type="string",
     *          )
     *     ),
     * @SWG\Parameter(
     *         name="bitrhday",
     *         in="body",
     *         description="maximum number of results to return",
     *         required=false,
     *         type="string",
     * @SWG\Schema(
     *               type="string",
     *          )
     *     ),
     * @SWG\Parameter(
     *         name="annual_income",
     *         in="body",
     *         description="maximum number of results to return",
     *         required=false,
     *         type="string",
     * @SWG\Schema(
     *               type="string",
     *          )
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Dashboard overview."
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    public function postStore(){

        $input = Request::all();

        $rules = [
            "name"              => "required|string",
            //"last_name_parent"         => "required|string",
            //"last_name_mother"         => "required|string",
            "bitrhday"         => "required|date_format:Y-m-d",
            "annual_income"         => "numeric",
        ];

        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Response::json( array("errors" => $validation->errors(), 401));
        }


        $User = new User();
        $User->name = Request::input('name', '');
        $User->last_name_parent = Request::input('last_name_parent', '');
        $User->last_name_mother = Request::input('last_name_mother', '');
        $User->email = uniqid() . "@hotmail.com";
        $User->save();

        $userinfo = [
            "user_id"   => $User->id,
            "bitrhday"         => Request::input('bitrhday', ''),
            "annual_income"         => Request::input('annual_income', ''),
        ];
        $User->userinfo()->insert($userinfo);

        $html = '<div class="row">
                    <div class="col-md-3">'.$User->name .'</div>
                    <div class="col-md-3">'.$User->userinfo->bitrhday.'</div>
                    <div class="col-md-3">'.$User->userinfo->annual_income.'</div>
                    <div class="col-md-3">
                        <a href="'. url("app/item/{$User->id}") .'" class="btn btn-sm btn-default">Ver</a>
                        <a href="'. url("app/delete/{$User->id}") .'" class="btn btn-sm btn-danger">Eliminar</a>
                    </div>
                </div><br />';
        return Response::json( array('user'=>$User, 'html'=>$html), 200);

    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *     path="api/dashboard/user",
     *     description="Returns dashboard overview.",
     *     operationId="api.dashboard.user",
     *     produces={"application/json"},
     *     tags={"app"},
     * * @SWG\Parameter(
     *         name="search",
     *         in="query",
     *         description="maximum number of results to return",
     *         required=false,
     *         type="string",
     * ),
     *     @SWG\Response(
     *         response=200,
     *         description="Dashboard overview."
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    public function getUser(){

        $search = Request::input('search');


        if(is_numeric($search)){
            $user =  User::where('id', $search)->get();
        }else{
            $user =  User::where('name', $search)->get();
        }

        if($user === null){
            return Response::json( array('errors'=>"no se encontraron resultado", 'html'=>"No se encontraron resultado"), 401);
        }

        $html = '';
        foreach($user as $value){

            $html .= '<div class="row">
                    <div class="col-md-3">'.$value->name.'</div>
                    <div class="col-md-3">'.$value->userinfo->bitrhday.'</div>
                    <div class="col-md-3">'.$value->userinfo->annual_income.'</div>
                    <div class="col-md-3">
                        <a href="'. url("app/item/{$value->id}") .'" class="btn btn-sm btn-default">Ver</a>
                        <a href="'. url("app/delete/{$value->id}") .'" class="btn btn-sm btn-danger">Eliminar</a>
                    </div>
                </div><br />';

        }

        return Response::json( array('user'=>$user, 'html'=>$html), 200);
    }











}