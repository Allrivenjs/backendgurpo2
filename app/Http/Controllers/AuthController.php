<?php

namespace App\Http\Controllers;

use App\Models\User;


use Illuminate\Http\Request;
use App\Enum\CodeEnum;
use App\Traits\Apitraits;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Hash;


use Illuminate\Validation\Rules;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{
    use Apitraits;
    public function login(Request $request)
    {
        //login
        if (!auth()->attempt($request->only('name','password'))){
            return $this->apiReturn([],codeEnum::ERR_EMAIL_OR_PASSWORD);
        }
        $tokenResult  = auth()->user()->createToken('authToken');
        $token = $tokenResult->token;
        $this->remember_me($token,$request);
        $token->save();
        $user=auth()->user();
        return  $this->apiReturn([$user,
            'access_token' =>$tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString(),
        ], codeEnum::SUCCESS);
    }
    protected function remember_me($token, Request $request){
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate($this->rules());
        $validatedData['password']=Hash::make($request->password);
        $user = User::create($validatedData);
        $tokenResult = $user->createToken('authToken');
        $token=$tokenResult->token;
        return $this->apiReturn([$user,
            'access_token' =>  $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString() ], codeEnum::INC_SUCCESS );
    }

    protected function rules(){
        return [
            'name'=>'required|max:255',
            'password'=> ['required', Rules\Password::defaults()],
        ];
    }
    /**
     * Cierre de sesión (anular el token)
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }


    public function reset_password(Request $request){

        $request->validate([
            'old_password'=>'required',
            'password'=> ['required', Rules\Password::defaults(), 'confirmed'],
        ]);

        if (!Hash::check($request->old_password,auth()->user()->getAuthPassword())){
            return response(['messsage'=>"Old password don't match"])->setStatusCode(Response::HTTP_FORBIDDEN);
        }
        if (Hash::check($request->password,auth()->user()->getAuthPassword())){
            return response(['messsage'=>'The password must be different from the previous one'])->setStatusCode(Response::HTTP_FORBIDDEN);
        }
        $request->user()->fill([
            'password'=>Hash::make($request->password)
        ])->save();
        return response(['messsage'=>'Password has been changed'])->setStatusCode(Response::HTTP_OK);

    }


}
