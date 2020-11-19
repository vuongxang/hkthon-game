<?php

namespace App\Helpers;

/**
 * Response Class helper
 */
class Helper
{

    public static function dataError($message = 'Forbidden', $status = 403)
    {
        return self::data([], 0, $message, $status);
    }

    public static function data($data = [], $total = 0, $message = 'Successfully', $status = 200)
    {
        return [
            'status' => $status,
            'message' => $message,
            'data' => [
                'status' => $status,
                'message' => $message,
                'data' => $data,
                'total' => $total
            ]
        ];
    }

    public  static function checkBtnStatus($status)
    {
        if ($status != 'on') {
            return 0;
        }
        return 1;
    }
}
