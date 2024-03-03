<?php

namespace App\Http\Controllers\API;

use App\Helpers\SetResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Login;
use App\Http\Requests\API\Register;
use App\Http\Resources\API\LoginResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function __construct(public SetResponse $setResponse){}
    public function register(Register $request){
        try{
            if (User::where('email',$request->email)->exists()){
                return $this->setResponse->MakeResponse([],'email exist',false,404);
            }
            $user = User::create($request->validated());
            // create token
            $token = $user->createToken('my-app')->plainTextToken;
            return $this->setResponse->MakeResponseAuth(new LoginResource($user),'success message',true,200,$token);
        }catch (\Exception $exception){
            return $this->setResponse->MakeResponse([],$exception->getMessage(),false,500);
        }
    }

    public function login(Login $request){
        try{
            $request->validated();
            $user = User::where('email',$request->email)
                ->first();
            if(!$user || !Hash::check($request->password,$user->password)){
                return $this->setResponse->MakeResponse([],'email or password not correct',false,401);
            }else{
                // create token
                $token = $user->createToken('my-app')->plainTextToken;
                return $this->setResponse->MakeResponseAuth(new LoginResource($user),'user logged',true,200,$token);
            }
        }catch (\Exception $exception){
            return $this->setResponse->MakeResponse([],$exception->getMessage(),false,500);
        }
    }
}
