<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div>
	<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" size="15" />
	<input type="submit" id="searchsubmit" value="搜索" />
	<input type="reset" id="searchreset" value="重置" />
</div>
</form>