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

				<!-- 显示页面的分页链接 -->
				<?php link_pages('<p><strong>Pages:</strong>','<p>','number'); ?>

				<!-- 显示可以用来编辑静态页面的编辑链接。 -->
				<?php edit_post_link('Edit','<p>','</p>'); ?>
				
				</div>
			</div>

		<?php endwhile; ?><!-- 这里用于关闭 while() -->	
	

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