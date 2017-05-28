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

				<?php the_content(); ?>
				<!-- 使用了 PHP 函数 the_content() 函数调用了 日志的内容 -->

				<?php link_pages('<p><strong>Pages:</strong>', '</p>', 'number'); ?>
				<!-- 编码页面的分页链接的代码 -->

				<!-- 日志元数据:（Postmetadata）：日期（date），分类（categories），作者（author），评论数（number of comments），以及其他和日志有关系的信息。 -->
				<p class="postmetadata">
				<?php _e('Filed under&#58;'); ?>
				<!-- _e(‘Filed under:’); – &#58; 是调用冒号“:”的代码； -->

				<?php the_category(', ') ?> 
				<!-- the_category() 是用来调用日志的在的所有类别的 PHP 函数。如果你把 Filed under: 和 the_category() 放在一起，你可以得到：Filed under: Name of category 1, Name of category 2。the_category() 中的逗号是用来区分类别名。 -->

				<?php _e('by'); ?> 
				<!-- 如果你创建的是私人用的的主题， by 外面的 _e() 不是必须的。_e() 是用来创建可以翻译的主题，如果主题被来自不同国家的上百人使用的话，这是非常重要的。如果你是创建公共使用的主题，最后加上 _e() 以便你的主题可翻译化。 -->

				<?php  the_author(); ?>
				<!-- 它是输出当前日志作者的名字。 -->

	

				<?php edit_post_link('Edit', ' &#124; ', ''); ?>
				<!--  这个只有当我们以管理员或者作者身份登录的的时候才可见。 edit_post_link() 只是简单显示一个可以用来编辑当前日志的编辑链接，这样就可以让我们不必去管理界面搜寻该日志就能直接编辑。edit_post_link() 有三个参数。第一个是用来确定哪个词你将用在编辑链接的链接标题。如果你使用 Edit post，那么将显示 Edit post 而不是 Edit。第二个参数是用来显示在链接前面的字符，在这里是竖线 |，代码就是&124;。第三个参数是用于显示在编辑链接后面的字符，在这里没有使用。登录 WordPress 之后，再返回到首页就可以看到“Edit”的链接和一条竖线。 -->

				</p>
				</div>

				<div class="comments-template">
					<?php comments_template(); ?>
					<!-- comments_template() 这个函数是用来从 comments.php 文件调用评论模板。 comments.php 文件然后就会根据它的模板（或者代码）去显示评论列表。列表中的每个条目是一条评论。 -->
				</div>

			</div>

		<?php endwhile; ?><!-- 这里用于关闭 while() -->	
		
		<div class="navigation">
			<?php previous_post_link('%link'); ?>
			<?php  next_post_link('%link'); ?>
			<!-- 调用前一篇日志和后一篇日志的链接。 -->
		</div>
		

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