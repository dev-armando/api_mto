<?php

namespace App\Http\Traits;
use Exception;
use Illuminate\Http\Request;

trait HelperTrait {

    protected function get_slug_helper($url) {
        $url = strtolower($url);

        $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
        $repl = array('a', 'e', 'i', 'o', 'u', 'n');
        $url = str_replace ($find, $repl, $url);

        $find = array(' ', '&', '\r\n', '\n', '+');
        $url = str_replace ($find, '-', $url);

        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
        $repl = array('', '-', '');
        $url = preg_replace ($find, $repl, $url);
        return $url;
    }

    protected function from_base64_to_img_helper($imgBase64 , $dir , $name_file ){


        $image_service_str = substr($imgBase64, strpos($imgBase64, ",")+1);
        $image = base64_decode($image_service_str);

        $img_extension = explode(';base64' , $imgBase64)[0];
        $img_extension = explode('/',$img_extension)[1] ?? NULL;


        $name = "{$name_file}.{$img_extension}";

        file_put_contents("{$dir}/{$name}", $image);
        return $name;
    }


}
