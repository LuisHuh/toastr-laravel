<?php
/**
 * @category PHP
 * @author   Samson Mbuthia <roksta21@gmail.com>
 */

namespace Roksta\Toastr;

use Session;

class Toastr
{
    public function success($title = "", $message = "")
    {
        $this->store($title, $message, 'success');

        return $this;
    }

    public function info($title = "", $message = "")
    {
        $this->store($title, $message, 'info');

        return $this;
    }

    public function warning($title = "", $message = "")
    {
        $this->store($title, $message, 'warning');

        return $this;
    }

    public function error($title = "", $message = "")
    {
        $this->store($title, $message, 'error');

        return $this;
    }

    private function store($title, $message, $type)
    {
        $toast = collect([
            'type' => $type,
            'title' => $title,
            'message' => $message
        ]);

        Session::put('toast', $toast);
    }

    public function timeout($t = 1000)
    {
        $toast = Session::get('toast');

        if ($toast->has('options')) {
            $toast['options']->put('timeOut', $t);
        } else {
            $toast->put('options', collect(['timeOut' => $t]));
        }

        return $this;
    }

    public function debug($bool = false){

        $toast = Session::get('toast');

        if ($toast->has('options')) {
            $toast['options']->put('debug', $bool);
        } else {
            $toast->put('options', collect(['debug' => $bool]));
        }

        return $this;
    }

    public function newestOnTop($bool = false){

        $toast = Session::get('toast');

        if ($toast->has('options')) {
            $toast['options']->put('newestOnTop', $bool);
        } else {
            $toast->put('options', collect(['newestOnTop' => $bool]));
        }

        return $this;
    }

    public function progressBar($bool = false){

        $toast = Session::get('toast');

        if ($toast->has('options')) {
            $toast['options']->put('progressBar', $bool);
        } else {
            $toast->put('options', collect(['progressBar' => $bool]));
        }

        return $this;
    }

    public function positionClass($class = "top-right"){
        $pre = "toast-";
        $toast = Session::get('toast');

        if ($toast->has('options')) {
            $toast['options']->put('positionClass', $pre.$class);
        } else {
            $toast->put('options', collect(['positionClass' => $class]));
        }

        return $this;
    }

    public function preventDuplicates($bool = false){

        $toast = Session::get('toast');

        if ($toast->has('options')) {
            $toast['options']->put('preventDuplicates', $bool);
        } else {
            $toast->put('options', collect(['preventDuplicates' => $bool]));
        }

        return $this;
    }

    public function showDuration($t = 300){

        $toast = Session::get('toast');

        if ($toast->has('options')) {
            $toast['options']->put('showDuration', $t);
        } else {
            $toast->put('options', collect(['showDuration' => $t]));
        }

        return $this;
    }

    public function hideDuration($t = 1000){

        $toast = Session::get('toast');

        if ($toast->has('options')) {
            $toast['options']->put('hideDuration', $t);
        } else {
            $toast->put('options', collect(['hideDuration' => $t]));
        }

        return $this;
    }

    public function extendedTimeOut($t = 1000){

        $toast = Session::get('toast');

        if ($toast->has('options')) {
            $toast['options']->put('extendedTimeOut', $t);
        } else {
            $toast->put('options', collect(['extendedTimeOut' => $t]));
        }

        return $this;
    }

    public function showEasing($easing = "swing"){

        $toast = Session::get('toast');

        if ($toast->has('options')) {
            $toast['options']->put('showEasing', $easing);
        } else {
            $toast->put('options', collect(['showEasing' => $easing]));
        }

        return $this;
    }

    public function hideEasing($easing = "linear"){

        $toast = Session::get('toast');

        if ($toast->has('options')) {
            $toast['options']->put('hideEasing', $easing);
        } else {
            $toast->put('options', collect(['hideEasing' => $easing]));
        }

        return $this;
    }

    public function showMethod($method = "fadeIn"){

        $toast = Session::get('toast');

        if ($toast->has('options')) {
            $toast['options']->put('showMethod', $method);
        } else {
            $toast->put('options', collect(['showMethod' => $method]));
        }

        return $this;
    }

    public function hideMethod($method = "fadeOut"){

        $toast = Session::get('toast');

        if ($toast->has('options')) {
            $toast['options']->put('hideMethod', $method);
        } else {
            $toast->put('options', collect(['hideMethod' => $method]));
        }

        return $this;
    }

    private function onclick($function = null){//en desarrollo

        $toast = Session::get('toast');

        if ($toast->has('options')) {
            $toast['options']->put('onclick', $function);
        } else {
            $toast->put('options', collect(['onclick' => $function]));
        }

        return $this;
    }

    public function options($array = array()){
        
        $toast = Session::get('toast');

        if ($toast->has('options')) {
            foreach ($array as $item => $value){
                $toast['options']->put($item, $value);
            }
        } else {
            $toast->put('options', collect($array));
        }

        return $this;
    }

    public function view()
    {
        return "@include('vendor.roksta.toastr')";
    }

}