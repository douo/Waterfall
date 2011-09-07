<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<title>
<?php wp_title('|', true, 'right'); ?>
<?php bloginfo('name'); ?>
</title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_popup_script(); // off by default ?>
<link rel="canonical" href="<?php bloginfo('url');?>" /> 
<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/lib/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/lib/jquery.plugins.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/javascript.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<!--[if lt IE 7]>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/ie6.js"></script>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie6.css" type="text/css" media="screen" />
<![endif]-->
</head>
<body style="height:100%; width:100%; position:relative;">
<div id="loading" style="position:fixed !important;position:absolute;top:0;left:0;height:100%; width:100%; z-index:199999; background:#000 url(<?php bloginfo('stylesheet_directory'); ?>/img/load.gif) no-repeat center center; opacity:0.6; filter:alpha(opacity=60);font-size:14px;line-height:20px;" onclick="javascript:turnoff('loading')"><p id="loading-one" style="color:#fff;position:absolute; top:50%; left:50%; margin:20px 0 0 -50px; padding:3px 10px; text-shadow:none;" onclick="javascript:turnoff('loading')">页面载入中..</p></div>
<script type="text/javascript">
//<![CDATA[
  function turnoff(obj){
    document.getElementById(obj).style.display="none";
  }
//]]>
</script>
<div id="scroll"><a href="#" title="回到页首" class="back-to-top">回到页首</a><a href="#sidebar" title="回到页尾" class="back-to-bottom">回到页尾</a></div>
<div id="nav">
  <div class="inner">
    <ul>
        <li class="page_item <?php if(is_home()){echo 'current_page_item';}?>"><a href="<?php bloginfo('url');?>"><?php bloginfo('name');?></a></li>
        <?php wp_list_pages('depth=&title_li=');?>      
    </ul>
    <div id="nav_buttons">
        <a id="nav_rss" href="http://feed.interjc.net/" title="订阅本站">RSS</a>
        <a id="nav_email" href="mailto:<?php bloginfo('admin_email');?>" title="Email">Email</a>
        <a id="nav_t" href="http://t.qq.com/interjc7" title="腾讯微博">Twitter</a>
        <a id="nav_twitter" href="http://twitter.com/interjc" title="Twitter">Twitter</a>
        <a id="nav_facebook" href="http://facebook.com/interjc" title="Facebook">Facebook</a>
        <a id="nav_inter" href="http://interjc.net/tags/inter" title="我是正宗的内拉祖里">我是内拉祖里</a>
        <a id="nav_comment" href="http://interjc.net/contact" name="<?php if(!is_single() && !is_page()){ echo 'go-gbook';} else {echo 'go-comment';} ?>" title="我有话想说，直接带我去吧～">评论</a>
    </div>
  </div>
</div>
<div id="wrap">
<div id="header">
    <div id="header_title">
        <h1><a href="<?php bloginfo('url');?>">
            <?php bloginfo('name');?>
            </a></h1>
        <p>
            <?php //bloginfo('description');?>
        </p>
    </div>
</div>
<!--[if IE 6]>
<div id="anti_ie6" <?php if($_COOKIE['closeAnti']==true){echo 'class="hidden"';}?>><p>尊敬的用户，您正在使用<a href="http://interjc.net/a/anti-ie6">老掉牙的IE 6.0</a>，我们强烈推荐您升级为<a target="_blank"  href="http://docs.google.com/View?id=dg5phkpq_78cd6t5gf8">符合Web标准的浏览器</a>，更快，更好，更安全！<a href="http://www.microsoft.com/china/windows/internet-explorer/">IE8下载</a><strong>    <a href="#" style="color:red;">X</a></strong></p></div>
<![endif]-->