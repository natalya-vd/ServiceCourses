<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\API\AuthRequest;
use App\Models\User;

class LoginController extends Controller
{
    private const LOGIN_SUCCESS = 'Successful login.';
    private const PASSWORD_FAILED = 'Invalid credentials.';
    private const LOGOUT_SUCCESS = 'Successful logout';

    /**
     * Обработка входа пользователя.
     *
     * @param AuthRequest $request
     * @return JsonResponse
     */
    public function login(AuthRequest $request): JsonResponse
    {
        $user = $this->getUserByLogin($request->validated('login'));

        if (!$user || !Hash::check($request->validated('password'), $user->password))
            throw ValidationException::withMessages([
                'login' => self::PASSWORD_FAILED
            ]);

        $user = (new UserResource($user))
            ->additional(['token' => $user->createToken('auth-token', [$user->role])->plainTextToken])
            ->response()
            ->getData(true);


        return $this->wrapResponse(Response::HTTP_OK, self::LOGIN_SUCCESS, $user);
    }

    /**
     * Обработка выхода пользователя.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        if ($request->user()->tokens()->delete()) return $this->wrapResponse(Response::HTTP_OK, self::LOGOUT_SUCCESS);
    }

    /**
     * Ответ в json формате.
     *
     * @param  int $code
     * @param  string $message
     * @param  array $resource
     * @return JsonResponse
     */
    private function wrapResponse(int $code, string $message, ?array $resource = []): JsonResponse
    {
        $result = [
            "meta" => [
                'code' => $code,
                'message' => $message
            ]
        ];

        if (count($resource)) {
            $result['meta']['token'] = $resource['token'];
            $result = array_merge(
                $result,
                [
                    'data' => $resource['data']
                ]
            );
        }

        return response()->json($result);
    }

    /**
     * Получить пользователя по логину
     *
     * @param  string $login
     * @return User|null
     */
    private function getUserByLogin(string $login): ?User
    {
        return User::where('login', $login)
            ->first();
    }
}
