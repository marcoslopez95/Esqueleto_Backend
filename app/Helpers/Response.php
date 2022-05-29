<?php


use Illuminate\Support\Facades\Log;





if (! function_exists('custom_response')){
    function custom_response(bool $success = true, string $message = '',$data = [],int $code = 200)
    {
        if (!$success) {
            if ($code == 200) {
                $code = 425;
            }
            $message = $message !== '' ? $message :'Error al ejecutar la consulta';
            $response['total'] = 0;
        }

        $response = [
            'success' => $success,
            'message' => $message,
            'data'    => $data,
        ];

        if ($message != 'index') {
            $response['total'] = 1;
        }else
        if ($message == 'index') {
            $response['total'] = count($data);
        }

        return response()->json($response, $code);
    }
}

if (! function_exists('custom_error')){
    function custom_error(\Exception $e)
    {
        $error = [
            'line'    => $e->getLine(),
            'file'    => $e->getFile(),
            'message' => $e->getMessage()
        ];

        Log::alert($error);
        return custom_response(false);
    }
}
