<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Auth\Events\Registered;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AuthRequest;
use App\Models\User;

class RegisterController extends Controller
{
    private const SUCCESS_MESSAGE = 'Account has been successfully registered, please check your email to verify your account.';
    private const FAILED_MESSAGE = 'Your account failed to register.';

    /**
     * Обработка регистрации пользователя.
     *
     * @param AuthRequest  $request
     * @return JsonResponse
     */
    public function __invoke(AuthRequest $request): JsonResponse
    {
        if ($user = User::create($request->validatedDataRegister())) {
            event(new Registered($user));

            return response()->json(wrapMeta([
                'code' => Response::HTTP_CREATED,
                'message' => self::SUCCESS_MESSAGE,
            ]), Response::HTTP_CREATED);
        }

        return response()->json(wrapMeta([
            'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message' => self::FAILED_MESSAGE
        ]), Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
