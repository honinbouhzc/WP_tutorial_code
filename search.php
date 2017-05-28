<!-- 把 archive.php 中所有东西复制到 search.php.现在所有的，所有的搜索结果将会返回摘要。如果没有 search.php 这个模板文件，搜索选项将会使用index.php 去显示搜索结果。 -->

<?php get_header(); ?>

<!-- 博客主体 -->
<div id="container">	
	<?php if(have_posts()) :  ?>
	<!-- if(have_posts())检查博客是否有日志。 -->
		
		<?php while(have_posts()) : the_post(); ?>
		<!-- while(have_posts())  如果有日志，那么当博客有日志的时候，执行下面 the_post() 这个函数。 -->	
		<!-- the_post() : 调用具体的日志来显示。-->
			
			<div class="post" id="post-<?php the_ID(); ?>">
			<!-- class=”post” 这个 DIV 是把当前日志和其他内容区分开。 -->
			<!-- 现在我们会发现现在每篇日志都附加上了一个数字或者说是日志 ID。the_ID() 只是调用每篇日志的 ID。 -->

				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title(); ?></a></h2>
				<!-- the_permalink() 是用来调用每篇日志地址的 PHP 函数。 -->
				<!-- 如果不使用 the_title() 作为 title=””的值，那么每篇日志标题链接将会有同样的描述 -->

				<div class="entry">
				<!-- class=”entry” 这个 DIV 是把日志标题和日志内容区分开 -->

				<?php the_excerpt(); ?>
				<!-- 使用了 PHP 函数 the_content() 函数调用了 日志的内容 -->

				<!-- 日志元数据:（Postmetadata）：日期（date），分类（categories），作者（author），评论数（number of comments），以及其他和日志有关系的信息。 -->
				<p class="postmetadata">
				<?php _e('Filed under&#58;'); ?>
				<!-- _e(‘Filed under:’); – &#58; 是调用冒号“:”的代码； -->

				<?php the_category(', ') ?> 
				<!-- the_category() 是用来调用日志的在的所有类别的 PHP 函数。如果你把 Filed under: 和 the_category() 放在一起，你可以得到：Filed under: Name of category 1, Name of category 2。the_category() 中的逗号是用来区分类别名。 -->

				<?php _e('by'); ?> 
				<!-- 如果你创建的是私人用的的主题， by 外面的 _e() 不是必须的。_e() 是用来创建可以翻译的主题，如果主题被来自不同国家的上百人使用的话，这是非常重要的。如果你是创建公共使用的主题，最后加上 _e() 以便你的主题可翻译化。 -->

				<?php  the_author(); ?><br />
				<!-- 它是输出当前日志作者的名字。 -->

				<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> 
				<!-- 当弹出留言的功能激活的话，comments_popup_link() 调用一个弹出的留言窗口，如果没有激活，comments_popup_link() 则只是简单的显示留言列表。No Comments » 是在没有留言的时候显示的。1 Comment » 是用于当刚好只有1条留言时候。% Comments &187; 是用于当有多于一条留言的时候。比如：8 Comments »。百分号 % 用来显示数字。&#187; 是用来显示一个双层箭头 »。 -->

				<?php edit_post_link('Edit', ' &#124; ', ''); ?>
				<!--  这个只有当我们以管理员或者作者身份登录的的时候才可见。 edit_post_link() 只是简单显示一个可以用来编辑当前日志的编辑链接，这样就可以让我们不必去管理界面搜寻该日志就能直接编辑。edit_post_link() 有三个参数。第一个是用来确定哪个词你将用在编辑链接的链接标题。如果你使用 Edit post，那么将显示 Edit post 而不是 Edit。第二个参数是用来显示在链接前面的字符，在这里是竖线 |，代码就是&124;。第三个参数是用于显示在编辑链接后面的字符，在这里没有使用。登录 WordPress 之后，再返回到首页就可以看到“Edit”的链接和一条竖线。 -->

				</p>
				</div>
			</div>

		<?php endwhile; ?><!-- 这里用于关闭 while() -->	
		
		<div class="navigation">
			<?php posts_nav_link(); ?>
			<!-- posts_nav_link() – 调用后一页和前一页的链接 -->
		</div>
		<!-- 如何定制化 posts_nav_link()：我们也可以给这个函数3个参数，分别给链接的中间，前面和后面的设置字符，posts_nav_link('in between','befor','after'); 第1个参数是显示在后一页和前一页链接的中间。第2个参数显示在前面。第3个参数显示在后面。 -->

		<?php else : ?>
		<!-- Else 是当博客完全没有日志的时候执行的。 while() 和 endwhile; 应该嵌套在 if() 和 else :之间。 所以  else :  应该在  endwhile; 之后。 -->

			<div class="post">
			<!-- 那么 <div class=”post”> 和 </div> 用来做什么的呢？恩，我们肯定不想你的错误信息在“茫茫蛮荒之地”之间滞留，对不？我们用 <div class=”post”> 和 </div> 标签围住每篇日志。所以同样，尽管是错误信息不是真正的日志内容，但是我们其实可以把它当作日志来处理。 -->
				<h2><?php _e('Not Found'); ?></h2>
			</div>

	<?php endif; ?><!-- 关闭 if() -->	
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>