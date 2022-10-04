<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    function register(Request $request)
    {
//        return response()->json($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => '|required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->toArray(),
            ], 422);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            $imageFile = $request->file('image'),
            $imageName = $request->name . '-' . time() . '.' . $imageFile->getClientOriginalExtension(),
//            $storagePath = Storage::disk('local')->put('/', $imageFile),
//        $storagePath = $imageFile->store('avatars'),
            $imagePath = public_path('avatars'),
            $imageFile->move($imagePath, $imageName),
            'image' => $imageName,
            'admin' => $request->admin
        ];
        $user = User::create($data);
        if ($user) {
//                $token = $user->createToken('__register_token')->plainTextToken;
            return response()->json([
                'status' => 'success',
                'message' => 'Успешно зарегистрировано',
//                    'data' => 'token: ' . $token . ' ',
//            'data' => $token,
            ], 201);
        }
//            $user->assignRole('user');
        return response()->json([
            'status' => 'error',
            'message' => 'Непредвиденная ошибка'
        ], 409);
    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email',
            'password' => '|required|string|min:6',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user === null) {
            return response()->json([
                "message" => "Ползователь не найден"
            ], 401);
        }
        if ($user) {
            if (!Auth::attempt($attr)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Неправильный пароль'
                ], 401);
            }
        }
        $token = auth()->user()->createToken($request->deviceName)->plainTextToken;
        $user = $this->isAuth($token);
        return response()->json([
            'status' => 'success',
            'message' => 'Успешно вошли в систему',
            'token' => $token,
            'data' => $user
        ], 201);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Успешно вышли',
        ], 204);
    }

    public function isAuth()
    {
        $userAllInfo = \auth()->user();
        $user['name'] = $userAllInfo['name'];
        $user['email'] = $userAllInfo['email'];
        $user['image'] = $userAllInfo['image'];
        $user['admin'] = $userAllInfo['admin'];
        return $user;
    }

    public function getFile($file)
    {
        return response()->file($file);
    }
}
