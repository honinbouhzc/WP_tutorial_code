<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<!-- <?php //bloginfo(’stylesheet_url’); ?> 是一个 PHP 函数，它能取得 style.css 文件所在的路径，这样主题就能使用 style.css 文件来样式化页面上的所有元素。 -->

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_get_archives('type=monthly&format=link'); ?>

	<?php //comments_popup_script(); // off by default ?>

	<?php wp_head(); ?>

</head>
<body>
<div id="wrapper">

<!-- 文章头部 -->
<div id="header">
	<h1><a name="toc-3"></a><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
	<!-- bloginfo() 函数是调用博客的信息的，其中参数 name 代表了它调用的是博客的标题。这个名字是在后台 > 设置 > 常规 中设置的 站点标题。 -->
	<!-- bloginfo(‘url’) – 调用博客基本信息，具体是首页的的地址或者 URL -->

	<?php bloginfo('description'); ?>
	<!-- bloginfo(‘description’) – 调用博客信息，这里的是描述 -->
</div>