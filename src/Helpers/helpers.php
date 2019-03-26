<?php

if (!function_exists('frontend_asset')) {
    function frontend_asset($path, $secure = null)
    {
        return route('frontend.assets').'?path='.urlencode($path);
    }
}