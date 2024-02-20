<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Str;
use Validator;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request){
        $request->validated();

        $data = $request->all();
        $data['birthDate'] = Carbon::createFromFormat('d-m-Y', $data["birthDate"]);
        $data['password'] = bcrypt($data["password"]);
        $user = new User($data);
        $user->save();
        $success['token'] = $user->createToken('auth_token')->plainTextToken;
        $success['name']= $user->name;
        return response()->json(['success'=>true,'message'=>"registrasi berhasil", 'data'=>$success], 201);

    }


    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(['status'=>true, 'message'=>"Logout success"], 200);
    }


    private function setCredentials($input){
        if (Str::contains($input['username'], '@')) {
            $credentials = array("email"=>$input['username'], "password"=>$input['password']);
            return $credentials;
        }
        $credentials = ["username"=>$input['username'], "password"=>$input['password']];
        return $credentials;
    }


    public function login(UserLoginRequest $request){
        $data = $request->validated();

        $credentials = $this->setCredentials($data);

        if (Auth::attempt($credentials)) {
            $auth = Auth::user();
            $success = [
                "api_token"=>$auth->createToken('auth_token')->plainTextToken,
                "name"=>$auth->name,
                "email"=>$auth->email,
            ];
            return response()->json(['success'=>true,'message'=>"login success", 'data'=>$success], 200);
        }
        throw new HttpResponseException(response([
            "errors" => [
                "message" => ["username or password wrong"]
            ]
        ],401));
    }
    public function getuser(){
        $user = Auth::user();
        return response()->json(['success'=>true,'data'=>$user], 200);
    }

    public function changepassword(Request $request){
        $rules = ["oldpassword"=>'required', "newpassword"=>"required|min:8"];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $user = Auth::user();
        if (!Hash::check($request->input("oldpassword"), $user["password"])) {
            return response()->json(["status"=>false, "message"=>"Password lama salah"], 401);
        }
        if ($request->input("oldpassword") == $request->input("newpassword")) {
            return response()->json(["status"=>false, "message"=>"password baru tidak boleh sama dengan password lama"], 401);
        }
        $user->update(["password" => bcrypt($request->input("newpassword"))]);
        return response()->json(["success"=>true, "message"=>"Berhasil merubah password"], 200);
    }
    public function newpassword(Request $request){
        $rules = ["password"=>'required|min:8'];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $user = Auth::user();
        $data = ["password"=>$request->input("password")];
        $user->update($data);
        return response()->json(["success"=>true, "message"=>"Berhasil menambahkan password"], 200);

    }
    public function updateprofile(UserUpdateRequest $req){
        $request = $req->validated();
        $user = Auth::user();
        if ($req->hasFile('profilePicture')) {
            $path = $req->file('profilePicture')->store('public');
            $urlImage = url('/')."/storage"."/".$path;
            $request["profilePicture"] = $urlImage;
        }
        $user->update($request);
        return response()->json(["success"=>true, "message"=>"user berhasil diubah", "data"=>[
            "username"=>$user["username"]
        ]],200);

    }
}
