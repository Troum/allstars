<?php
namespace App\Library;

class Translator {

    public $lang;

    public $api;

    public function __construct($lang)
    {
        $this->lang = $lang;
        $this->api = file_get_contents(base_path().'/public/documents/api.txt');
    }

    public function translate ($text) {
        $translate = "https://translate.yandex.net/api/v1.5/tr.json/translate?key=".$this->api."&text=".urlencode($text)."&lang=".$this->lang;
        return json_decode(file_get_contents($translate))->text{0};
    }
}
