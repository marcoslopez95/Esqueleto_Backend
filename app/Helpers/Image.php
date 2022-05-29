<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

if(function_exists('create_image')){

/**
 *Crear imagen
 */
function custom_image($img)
{
    try{
        $route_web = env('CUSTOM_URL') . '/images/';
        $now = Carbon::now()->format('Y-m-d');
        $ext = get_extension($img);
        $img = str_replace('data:image/'.$ext.';base64,', '', $img);
        $data = base64_decode($img);
        $var_for = uniqid().'-'.$now. '.'.$ext;
        $image = $route_web . $var_for;
        //$success = file_put_contents($file, $data);
        $success = Storage::put('public/'.$var_for, $data);
        return $success ? $image: false;
    }catch (\Exception $e){
        custom_error($e);
        return null;
    }

}
}

if(function_exists('get_extension')){
function get_extension($string)
{
    $extension="";
    if(!empty($string)){
        if(substr($string,0,4)=='http'){
            return $extension=3;
        }else {
            $data = $string;
            $pos = strpos($data, ';');
            $type = explode(':', substr($data, 0, $pos))[1];
            $extension = preg_split("[/]", $type);
            return $extension[1];
        }
    }else{
        return null;
    }
}
}
