
<?php if( have_posts()):the_post() ;?>

	<div class="arcive_container">
		
		<?php if( has_category()): ?>
			<span class="arcive_cat">
				<?php echo the_category( '' ); ?>
			</span>		
		<?php endif; ?>

		<span class="arcive_date">
			<time><?php echo get_the_date( 'Y/m/d' ); ?></time>
		</span>

		<h1><?php the_title(); ?></h1>
	
	<?php else: ?>
		
		<p>まだ投稿はありません</p>
	
	<?php endif; ?>


	</div>











