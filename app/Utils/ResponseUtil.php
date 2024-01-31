<?php

namespace App\Utils;

use Illuminate\Http\JsonResponse;

/**
 * Class ResponseUtil
 *
 * @package App\Utils
 */
class ResponseUtil
{
    /**
     * This method can be used to send error response
     *
     * @param string $code
     * @param int $status
     *
     * @return JsonResponse
     */
    public static function error($code = "", $status = 400): JsonResponse
    {
        return response()->json(['code' => $code], $status);
    }


    /**
     * This method can be used to send error response with message
     *
     * @param string $message
     * @param string $code
     * @param int $status
     *
     * @return JsonResponse
     */
    public static function errorWithMessage($message, $code = "", $status = 400): JsonResponse
    {
        return response()->json(['message' => $message, 'code' => $code], $status);
    }


    /**
     * This method can be used to send error response with message bag
     *
     * @param array $errors
     * @param string $code
     * @param int $status
     *
     * @return JsonResponse
     */
    public static function errorWithMessageBag(array $errors, $code = "", $status = 400): JsonResponse
    {
        return response()->json(['errors' => $errors, 'code' => $code], $status);
    }


    /**
     * This method can be used to send success response
     *
     * @param string $code
     * @param int $status
     *
     * @return JsonResponse
     */
    public static function success($code = "data_fetched", $status = 200): JsonResponse
    {
        return response()->json(['code' => $code], $status);
    }


    /**
     * This method can be used to send success response with message
     *
     * @param string $message
     * @param string $code
     * @param int $status
     *
     * @return JsonResponse
     */
    public static function successWithMessage($message, $code = "data_fetched", $status = 200): JsonResponse
    {
        return response()->json(['message' => $message, 'code' => $code], $status);
    }


    /**
     * This method can be used to send success response with message
     *
     * @param string $message
     * @param string $code
     * @param int $status
     *
     * @return JsonResponse
     */
    public static function saveWithSuccessMessage($message, $code = "data_saved", $status = 200): JsonResponse
    {
        return response()->json(['message' => $message, 'code' => $code], $status);
    }

    /**
     * This method can be used to send success response with data
     *
     * @param $data
     * @param string $code
     * @param int $status
     *
     * @return JsonResponse
     */
    public static function successWithData($data, $code = 'data_fetched', $status = 200)
    {
        return response()->json(['code' => $code, 'result' => $data], $status);
    }

    /**
     * This method can be used to send success response with data and message
     *
     * @param $data
     * @param $message
     * @param string $code
     * @param int $status
     *
     * @return JsonResponse
     */
    public static function successWithMessageData($data, $message, $code = 'data_saved', $status = 200)
    {
        return response()->json(['code' => $code, 'message' => $message, 'result' => $data], $status);
    }


    public static function validationErros($errors, $status = 400)
    {
        return response()->json([
            'errors' => $errors,
            'code' => 'validation_errors'
        ], $status);
    }

    /**
     * This method can be used to send success response with warning message
     *
     * @param string $message
     * @param string $code
     * @param int $status
     *
     * @return JsonResponse
     */
    public static function successWithWarningMessage($message, $code = "warning", $status = 299): JsonResponse
    {
        return response()->json(['message' => $message, 'code' => $code], $status);
    }

    /**
     * This method can be used to send success response with warning message bag
     *
     * @param array $warnings
     * @param string $code
     * @param int $status
     *
     * @return JsonResponse
     */
    public static function successWithWarningMessageBag(array $warnings, $code = "warning", $status = 299): JsonResponse
    {
        return response()->json(['warnings' => $warnings, 'code' => $code], $status);
    }
}
