<?php
if (! function_exists('toast')) {
    /**
     * Toastr helper function
     *
     * @return \LuisHuh\Toastr\Toast
     */

    function toast()
    {
        return app('laravel-toastr');
    }
    
}