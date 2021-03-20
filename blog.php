<?php 

include 'head.php';

?>
<body>
<?php include 'header.php'; ?>
<section id="blog-headers" class="blog-header contact ">
	<div class="container">		
		<div class="title title-center">
			<!-- <span style="color: black;">Our Blog</span> -->
			<h1 style="color: black;">Latest News</h1>
		</div>		
	</div>
	
</section>
<!-- Section Blog -->
<section class="blog-content">
	<div class="container">
		<div class="row">
			<div id="ourHolder" class="col-xl-12">
			<?php blogPost(); ?>
			</div>
			
		</div>
	</div>
</section>


<?php include 'footer.php' ?>
<?php include 'script.php' ?>
</body>
</html>
