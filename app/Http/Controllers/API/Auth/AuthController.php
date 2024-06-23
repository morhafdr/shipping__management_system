<?php

namespace App\Http\Controllers\API\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\loginClientRequest;
use App\Http\Requests\Auth\RegisterClientRequest;
use App\Models\User;
use App\Models\ResetCodePassword;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail ;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Mail\SendCodeResetPassword;


class AuthController extends Controller
{
    use ApiResponse;
   public function register(RegisterClientRequest $request){
       $user = User::create([
           'email' => $request->email,
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
           'father_name' => $request->father_name,
           'mother_name' => $request->mother_name,
           'national_number' => $request->national_number,
           'phone' => $request->phone,
           'password' => bcrypt($request->password),
       ]);
       $clientRole=Role::query()->where('name','client')->first();
       $user->assignRole($clientRole);
//       $permissions=$clientRole->permissions()->pluck('name')->toArray();
//       $user->givePermissionTo($permissions);

       $token = $user->createToken('authToken')->plainTextToken;

       $data=[];
       $data['user']=$user;
       $data['token']=$token;
       return   $this->success($data,'user created successfully',200);

   }

   public function login(loginClientRequest $request){
       if(!Auth::attempt($request->only(['email','password']))){
           $this->error("",'email and password soes not math',400);
        }
       $user=User::query()->where('email',$request['email'])->first();
       $token = $user->createToken('authToken')->plainTextToken;

       $data=[];
       $data['user']=$user;
       $data['token']=$token;
       return $this->success($data,'user loged in successfuly',200);
   }

   public function logout(){
 /**@var \App\Models\MyUserModel */
 $user = Auth::user();
       $user->currentAccessToken()->delete();
       return $this->success([],'user loged out successfully');
   }

 ////////////////////////////////////    forget password     //////////////////////////////////
    public function ForgetPassword (Request $request) {

        $data = $request->validate(['email' => 'required|email']);

        // Delete all old code that user send before.
        ResetCodePassword::where('email', $request->email)->delete();

        // Generate random code
        $data['code'] = mt_rand(100000, 999999);

        // Create a new code
        $codeData = ResetCodePassword::create($data);

        // Send email to user
        Mail::to($request->email)->send(new SendCodeResetPassword($codeData->code));

        return response(['message' => trans('we send code to your email')], 200);
    }


    public function ResetPassword (Request $request) {
        $request->validate([
            'code' => 'required|string|exists:reset_code_passwords',
            'password' => 'required|min:8|confirmed',
        ]);
        //find the code
        $passwordReset = ResetCodePassword::query()->firstWhere('code' ,$request['code']);
        //check if it is nor expired the time is one hour
        if ($passwordReset['created_at'] > now() ->addHour()){
            $passwordReset->delete();
            return response()->json(['message' => trans('passwords.code_is_expire')  ],422);
        }
//  else if ($passwordReset == null){

//     return response()->json(['message' => trans('the code is not true')  ],422);
//  }
// find user email
        $user = User::query()->firstWhere('email' , $passwordReset['email']);

        //update user password
        $input['password'] = bcrypt($request['password']); //

        $user -> update([
            'password' => $input['password'],
        ]); $user->save();


        // delete current code we can use DB   or use this $passwordReset->delete();

        DB::table('reset_code_passwords')->where('email' ,$passwordReset['email'])->delete();
        return response()->json(['message' => 'password  has been successsfully reset']);

    }

}
