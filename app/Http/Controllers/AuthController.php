<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
class AuthController extends Controller
{

    /**
     * Fetches user
     *
     * @param  [string] page
     * @param  [string] per_page
     * @return [string] message
     */
    public function users(Request $request)
    {
        if(count($request->all()) > 0) {
            $users = User::paginate(intval($request->per_page));
        } else {
            $users = User::all();
        }
        return response()->json([
            'message' => "Successfully fetched users",
            'meta' => $users
        ], 200);
    }

    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            // 'password' => 'required|string|confirmed'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => "test123",
        ]);
        $user->save();
        return response()->json([
            'message' => "Successfully created user!"
        ], 200);
    }

    /**
     * Update user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function update(Request $request, $data)
    {
        $user = User::find($data);
        if(!User::find($data)) {
            return response()->json([
                'message' => "No user was found!"
            ], 404);
        }
        if($user->email != $request->email) {
            $request->validate([
                'email' => 'string|email|unique:users',
            ]);
        }
        $user->fill($request->input())->save();
        return response()->json([
            'message' => "Successfully updated user!"
        ], 200);
    }
    /**
     * Update user password
     *
     * @param  [string] id
     * @param  [string] password
     * @return [string] message
     */
    public function updatePassword(Request $request, $data) {
        $user = User::find($data);
        if(!User::find($data)) {
            return response()->json([
                'message' => "No user was found!"
            ], 404);
        }
        $request->validate([
            'password' => 'required',
            'new_password' => 'different:password',
        ]);
        $user->password = $request->new_password;
        $user->update();
        return response()->json([
            'message' => "Successfully updated user password!"
        ], 200);
    }

    /**
     * Delete user
     *
     * @param  [string] id
     * @return [string] message
     */
    public function delete($data)
    {
        if(!User::find($data)) {
            return response()->json([
                'message' => "No user was found!"
            ], 404);
        }
        $id = User::find( $data );
        $id->delete();
        return response()->json([
            'message' => "Successfully deleted user!"
        ], 200);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'user' => $user,
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
