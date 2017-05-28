<!--侧边栏 -->
<div id-"sidebar">
	<ul>

	<?php if(function_exists('dynamic_sidebar')&& dynamic_sidebar()) : else : ?>
		<!-- 到 WordPress 后台 => 外观 => Widget 就可以把 Widget 拖到侧边栏了 -->

		<!-- 搜索框 -->
		<li id="search">
			<?php include(TEMPLATEPATH .'/searchform.php'); ?>
			<!-- 导入任何你想导入的文件。这和使用 WordPress 模板函数去调用模板文件是不同的，因为 include() 只是简单导入已经存在的文件。这里是调用在 searhform.php 文件中的代码。被导入的信息应该在一个博客上基本不会被改变的。 
			TEMPLATEPATH – 主题文件夹的位置，这里是：wp-content/themes/tutorial  -->
		</li>

		<!-- 日历 -->
		<li id="calendar">
			<h2><?php _e('Calendar'); ?></h2>
			<?php get_calendar(); ?>
			<!-- 使用 get_calendar() 这个 WP 函数调用日历 -->
		</li>

		<!-- 静态页目录提示 -->
		<?php wp_list_pages('depth=3&title_li=<h2>Pages</h2>'); ?>
		<!-- 添加 ‘title_li=<h2>Pages</h2>’ 到 wp_list_pages() 作为参数。Pages”这个列表标题和“Categories”这个分类链接标题的大小一样. title_li 是一个用来定制化页面链接列表的标题的参数。<h2>Pages</h2> 是 title_li 这个参数的值.
		我添加了 depth=3& 而不是仅仅 depth=3。这个 & 在这儿用于把 depth 和 title_li 这两个参数区分开-->
		
		<li>
			<!-- 文章分类 -->
			<h2><?php _e('Categories'); ?></h2>
			<!-- 输出字符 Categories -->
			<ul><!-- wp_list_cats() 这个函数调用链接列表函数的时候，他会自动附加上一组<li> -->
				<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>				
				<!-- wp_list_cats(); 调用分类链接列表:
				sort_column=name – 把分类按字符顺序排列
				optioncount=1 – 显示每个分类含有的日志数
				hierarchial=0 – 不按照层式结构显示子分类，这就解释了为什么子分类链接是列在列表中第一级。
				& – 每次增加另一个参数的时候，需在它之前要输入 & 用来把和现有的参数区分开。如 & – 在 sort_column 和 optioncount之间。 -->
			</ul>
		</li>

		<li>
		<!-- 归档文件 -->
			<h2><?php _e('Archives'); ?></h2>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
				<!-- wp_get_archives(’type=monthly’): 按月调用存档列表链接，并把每个链接放入 <li> 和 </li> 标签中。 -->
			</ul>
		</li>

		<?php get_links_list(); ?>
		<!-- 存档链接列表 -->

		<!-- 显示元数据 -->
		<li>
			<h2><?php _e('Meta'); ?></h2>
			<ul>
				<?php wp_register(); ?>
				<!-- wp_register() 这个函数能产生一组 <li> 和 </li> 标签，如果你没有登陆，它显示注册（Register）链接，如果登录了，它显示的是 站点管理（Site Admin）的链接。 -->

				<li><?php wp_loginout(); ?></li>
				<!-- wp_loginout() 不会产生列表元素标签，所以需要我们手工输入列表元素标签，当你没有登录的时候，得到的是 登录（Login） 的链接，当已经登录的时候，得到的是登出（Logout）链接。 -->

				<?php wp_meta(); ?>
				<!-- 到目前为止，wp_meta() 没有做任何事情，他在网页上和源代码中都不会产生东西，现在不要考虑 wp_meta()，实际上你已经在使用它了。 -->
			</ul>
		</li>
	<?php endif; ?>	
	</ul>

</div><!-- end of sidebar -->