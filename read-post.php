<?php 

include 'head.php';

?>
<body>
<?php include 'header.php'; ?>
<?php
    $bid = clean($_GET['pid']) ;
    $sql = runQuery("SELECT * FROM dblog  WHERE bid='$bid'");                
    if($sql->num_rows>0){
        $row=fetchAssoc($sql)
?>

<!-- Section Post Content -->
<section class="post-wrap p-large contact">
	<div class="container">
		<div class="row">


			<div class="col-xl-1 col-md-12 post-author"> </div>
			<div class="col-xl-10 post-content">

                <div class="title" style="margin-top: 20px;">
					<h1 style="color: #000;"><?php echo $row['dtitle']; ?></h1>
				</div>
				<div class="blog-meta pb-5">
					<span class="blog-meta-date"><i class="fas fa-calendar-alt"></i> <?php echo formatDate($row['ddate']); ?></span>
					<span class="blog-meta-tags"><i class="fas fa-folder-open"></i>
                    By <?php echo $row['dby']; ?>
					</span>
				</div>


        <img style="max-width: 100%;" src="cover/<?php echo $row['dimg']; ?>.jpg" alt="">
                <?php echo $row['ddesc'] ?>

                <hr>
                <?php
                $com = runQuery("SELECT * FROM dcomment WHERE pid='$bid' AND dstatus='active' ORDER BY id DESC LIMIT 10");
                if($com->num_rows>0){?>
                <h5>Read Comment(s)</h5>
                        <hr>
                        <?php
                    while($come=fetchAssoc($com)):
                        ?>
                <div class="comment" style="margin-left: 20px;">
                    <div class="comment-content">
                        
                        <h6><?php echo ucwords($come['dname']); ?></h6>
                        <p><?php echo $come['dcomment']; ?></p>
                        <hr>
                    </div>
                </div>

                <?php endwhile; } ?>

                <div class="row" id="comment">
                    <div class="col-md-8">
                    <form action="comment-process" method="post" >
                        <input type="hidden" name="pid" value="<?php echo $bid ?>">
                    <?php if(isset($_SESSION['sms'])) echo $_SESSION['sms'] ?>
                    
                        <div class="group">
                            <input type="text" required name="name" id="name">
                            <span class="highlight"></span><span class="bar"></span>
                            <label for="name">Name</label>
                        </div>

                        <div class="group">
                            <textarea name="desc" required id="message"></textarea>
                            <span class="highlight"></span><span class="bar"></span>
                            <label for="message">Type Comment here..</label>
                        </div>
                        

                        <button type="submit" name="post" class="btn-lead button">Post</button>
                    </form>
                    </div>
                </div>

                <hr>
			</div>
			<!-- More Posts -->
			<div class="col-xl-12 more-articles" style="margin-top: 20px;">
				<h3 style="margin-bottom: 20px;">Latest News</h3>
				<div class="articles wow fadeInUp" data-wow-delay="0.2s">
					
                <?php blogPost(3, $bid); ?>
				</div>
			</div>
		</div>
	</div>
</section>


<?php } include 'footer.php' ?>
<?php include 'script.php'; unset($_SESSION['sms']); ?>
</body>

</html>
