<?php
// PerchUtil::output_debug();

// Lang
$lang = PerchSystem::get_var('lang');

$isGet = '?';
if(isset($_GET)){            
    foreach($_GET as $key => $value){
        if($key != 'lang')
            $isGet .= $key . '=' . $value . '&';
    }
}

?>


</body>
</html>