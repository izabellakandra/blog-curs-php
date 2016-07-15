<div id="banner">
	<video autoplay loop muted id="bgvid">
	  <source src="/images/banner/banner.mp4" type="video/mp4">
	</video>
	<div class="container text-center">
		<h1><?php echo $page_title; ?></h1>
		<?php if(isset($page_slogan)): ?>
			<h2><?php echo $page_slogan; ?></h2>
		<?php endif; ?>
	</div>
	<div class="overlay"></div>
</div>