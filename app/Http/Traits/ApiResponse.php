<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponse
{
    /**
     * Return a standard success response.
     */
    protected function success(mixed $data = null, string $message = '', int $code = 200): JsonResponse
    {
        $response = ['success' => true];
        if ($message) $response['message'] = $message;
        if (!is_null($data)) $response['data'] = $data;
        return response()->json($response, $code);
    }

    /**
     * Return a standard error response.
     */
    protected function error(string $message, int $code = 400, array $errors = []): JsonResponse
    {
        $response = ['success' => false, 'message' => $message];
        if ($errors) $response['errors'] = $errors;
        return response()->json($response, $code);
    }

    /**
     * Return a paginated response.
     */
    protected function paginated(LengthAwarePaginator $paginator, string $message = ''): JsonResponse
    {
        $response = [
            'success' => true,
            'data'    => $paginator->items(),
            'meta'    => [
                'current_page' => $paginator->currentPage(),
                'last_page'    => $paginator->lastPage(),
                'per_page'     => $paginator->perPage(),
                'total'        => $paginator->total(),
            ],
        ];
        if ($message) $response['message'] = $message;
        return response()->json($response);
    }
}
