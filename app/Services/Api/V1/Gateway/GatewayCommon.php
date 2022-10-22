<?php

namespace App\Services\Api\V1\Gateway;

use App\Models\Gateway;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class GatewayCommon
{
    abstract protected function makeValidations(Gateway $gateway, Request $request);

    abstract public function updatePaymentStatus(Request $request, int $gateway_id);

    public function validate($data, $rules)
    {
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            $errors = (new ValidationException($validator))->errors();
            throw new HttpResponseException(
                response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            );
        }
    }
}
