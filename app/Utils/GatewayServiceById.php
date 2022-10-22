<?php

namespace App\Utils;

use App\Services\Api\V1\Gateway\GatewayCommon;
use App\Traits\ConvertVariable;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Facade;
use Symfony\Component\HttpFoundation\Response;

class GatewayServiceById extends Facade
{
    use ConvertVariable;

    /**
     * @throws \Exception
     */
    public static function get(int $id): GatewayCommon
    {
        try {
            return (new self)->convertVariableToModelName(
                'Gateway' . $id . 'Service',
                ['App', 'Services', 'Api', 'V1', 'Gateway']
            );
        } catch (\Exception $exception) {
            throw new HttpResponseException(
                response()->json(['success' => false, 'errors' => $exception->getMessage()], Response::HTTP_NOT_FOUND)
            );
        }

    }
}
