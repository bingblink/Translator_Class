<?php
include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php');
include($_SERVER['DOCUMENT_ROOT'].'/translator/helpers/Translator_Class.php');


if(!isset($_SESSION)) { session_start(); } 
$lang ='';
$pageTitle = perch_pages_title(true);

if(perch_get('lang')){
    switch(perch_get('lang')) {
        case 'en':
            $lang = 'en';
            break;
        case 'fr':
            $lang = 'fr';
            setlocale(LC_TIME, 'fr_FR');
            $pageTitle = perch_page_attribute('pageTitle_fr', array(), true);
            break;
        default:
            if (isset($_SESSION['lang'])) {
                $lang = $_SESSION['lang'];
            }
            break;
    }
    $_SESSION['lang'] = $lang;
}
else{
    if(isset($_SESSION['lang']))
        $lang = $_SESSION['lang'];
    else 
        $lang = 'en';
}

    
PerchSystem::set_vars([
    'lang' => $lang,
    'pageTitle' => $pageTitle,
]);


$t = new Translation();
$t->setLang($lang);
$t_module = new Translation();
$t_module->setLang($lang);
$t_module->setPackage('Module');

$lang = PerchSystem::get_var('lang');

?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <title>TTM Djembe Academy - <?php echo PerchSystem::get_var('pageTitle'); ?></title>
	
    <style type="text/css">
        *{transition: all 0.2s ease-out; box-sizing: border-box;}
        html{font-size:10px;}
        body{font-size: 1.9rem; font-family: 'Helvetica',sans-serif; line-height: 1.5em;margin:0;padding:0;}
        h1{font-size: 4.8rem;}
        a{color:tomato;}
        article,header{
            padding-left: calc((100vw - 966px) / 2);
            padding-right: calc((100vw - 966px) / 2);
            padding-top: 3rem;
            padding-bottom: 5rem;
        }
        pre{display: inline;color:darkturquoise;}
        div{padding:2rem 0;}
    </style>
</head>
<body>