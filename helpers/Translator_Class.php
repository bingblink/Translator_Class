<?php
//class Translator{
//
//    private $translations;
//
//    public function __construct(){
//        $this->translations = array(
//            'Inbox'  => array(
//                'en' => 'Inbox',
//                'fr' => 'the french word for this'
//            ),
//            'Messages' => array(
//                'en' => 'Messages',
//                'fr' => 'the french word for this'
//            )
//            //And so on...
//        );
//    }
//
//    public function translate($word,$lang){
//        echo $this->translations[$word][$lang];
//    }
//}

// https://stackoverflow.com/questions/1974505/php-simple-translation-approach-your-opinion:

class Translator {
    private $lang = array();
//    private $package = 'Global';
    private function findString($str,$lang) {
        if (array_key_exists($str, $this->lang[$lang])) {
            return $this->lang[$lang][$str];
        }
        return $str;
    }
    private function splitStrings($str) {
        return explode('=',trim($str));
    }
    public function translate($str,$lang, $package) {
        $translation_file = $_SERVER['DOCUMENT_ROOT'].'/translator/helpers/'.$lang . '_' . $package;
        if (!array_key_exists($lang, $this->lang)) {
            if (file_exists($translation_file.'.txt')) {
                $strings = array_map(array($this,'splitStrings'),file($translation_file.'.txt'));
                foreach ($strings as $k => $v) {
                    $this->lang[$lang][$v[0]] = $v[1];
                }
                return $this->findString($str, $lang);
            }
            else {
                return $str;
            }
        }
        else {
            return $this->findString($str, $lang);
        }
    }
}

class Translation extends Translator {
    private $lang = 'en';
    private $package = 'Global';
    public function setLang($param){
        $this->lang = $param;
    }
    public function setPackage($param){
        $this->package = $param;
    }
    public function __($str) {
//        return parent::__($str, $this->lang . '_' . $this->package);
        
        if (func_num_args() < 1) {
            return false;
        }
        $args = func_get_args();
        
        $str = array_shift($args);
        
        if (count($args)) {
            return vsprintf(parent::translate($str, $this->lang, $this->package),$args);
        }
        else {
            return parent::translate($str, $this->lang, $this->package);
        }
    }
}

?>