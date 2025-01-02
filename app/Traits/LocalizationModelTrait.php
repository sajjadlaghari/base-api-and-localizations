<?php

namespace App\Traits;

trait LocalizationModelTrait
{
    protected $default_lang = "ar";

    public function collectLocalization($entity = '', $lang_key = '')
    {

        $lang_key = $lang_key == '' ? app()->getLocale() : $lang_key;

        // server lang 
        $server_lang  = $_SERVER['HTTP_LANG'] ?? null;

        $server_final_lang  = $_SERVER['HTTP_FINAL_LANG'] ?? null;

        if ($server_lang != null && in_array($server_lang, ["en", "ar"])) $lang_key = $server_lang;

        if ($server_final_lang != null && in_array($server_final_lang, ["en", "ar"])) $lang_key = $server_final_lang;

        $localization = $this->localization->whereIn('lang_key', $lang_key)->first();
        
        return $localization != null && $localization->$entity ? $localization->$entity :  $this->$entity ?? $this->attributes[$entity] ?? $this->attributes[$entity];
    }
}
