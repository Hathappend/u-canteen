<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    private UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(): Response
    {
        return response()->view('features.login',[
                'title' => 'Login | U-Canteen'
            ]);
    }

    public function postLogin(UserRequest $request):RedirectResponse
    {
        try {
            $validate = $request->validated();

            $result = $this->userService->login($validate['username'], $validate['password']);
            if ($result) {
                $find = User::query()->where('username', '=', $validate['username'])->first();
                $request->session()->put([
                    'name' => "$find->first_name $find->last_name",
                    'username' => $find->username
                ]);
                return redirect('/');
            }else{
                return redirect('/login')
                    ->with('error', 'Username atau password salah!');
            }
        } catch (ValidationException $exception) {
            return redirect('/login')
                ->with('validate', $exception->errors());
        }
    }
}
