<div id="sidebar-1" class="sidebar">
    <ul>
        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar(1)):else: ?>
        <li id="search" class="widget">
            <?php include(TEMPLATEPATH . '/searchform.php'); ?>
        </li>
        <li class="widget">
            <h2>存档</h2>
            <ul>
                <?php wp_get_archives('type=monthly');?>
            </ul>
        </li>
        <?php endif;?>
    </ul>
</div>
