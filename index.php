<?php
include($_SERVER['DOCUMENT_ROOT'].'/perch/templates/layouts/global.header.translator.php');
// Mainly for use in templates
PerchSystem::set_var('template_intro_trans', $t_module->__('Template intro','<pre>','</pre>'));
PerchSystem::set_var('template_label_trans', $t_module->__('Template label'));
?>
<header>
    <a href="?lang=en">English</a> | <a href="?lang=fr">Français</a>
</header>
<article>
    <h1><?php printf($t->__('Hello world')); ?></h1>
    <div>
        <?php printf($t->__('Intro','<pre>',$lang,'</pre>','<pre>','</pre>')); ?>
    </div>
    <div>
        <?php printf($t_module->__('Module','<pre>',$lang,'</pre>')); ?>
    </div>
    <div><?php printf($t_module->__('This can be translated or not at all.')); ?></div>
    <div><?php echo PerchSystem::get_var('template_intro_trans'); ?></div>
    <div>
        <?php printf($t->__('Flexible intro')); ?>
        <ul>
            <li><?php printf($t->__('Flexible 1','<pre>','</pre>')); ?></li>
            <li><?php printf($t->__('Flexible 2','<pre>','</pre>')); ?></li>
            <li><?php printf($t->__('Flexible 3','<pre>','</pre>')); ?></li>
            <li><?php printf($t->__('Flexible 4','<pre>','</pre>','<pre>','</pre>')); ?></li>
        </ul>
    </div>
    
<?php
    
    
?>
</article>
<?php

    perch_layout('global.footer.translator');
?>