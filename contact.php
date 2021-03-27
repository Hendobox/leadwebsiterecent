<?php

$code = date("is");
include 'head.php'; ?>
<body>

<div class="" id="Home-white" >
<?php include 'header.php'; ?>
	
    

<!-- Section Token Chart -->
<section  class="light-chartx light-content valign-center contact" >
	<div class="container">
		<div class="row">
			
            <div class="col-xl-6 col-md-6 valign-center order-1 order-md-1 mt-xs">
                <div class="title title-right ">
					<h2>Contact Us</h2>
				</div>
				<p class="description-content pb-0 wow fadeInUp spanner"  data-wow-delay="0.2s" id="live">
                    We are not trying to reinvent the wheel. We are not trying to create a new blockchain ecosystem that nobody would use. We understand the biggest problem with cryptocurrency adoption is the lack of user-friendly and beautifully-designed applications. Cryptocurrency wallets are the gateway to adoption as they are the first application that newcomers often interact with before they start interacting with other kinds of apps. We are trying to be the leader of that adoption.
                </p>
            </div>

			<div class="col-xl-6 col-md-6 order-1 order-md-2">
				
                <div class="bass wow fadeInUp" data-wow-delay="0.2s">
                    <form action="contact-process" method="post" id="demo-form">
                    <?php if(isset($_SESSION['sms'])) echo $_SESSION['sms'] ?>
                    
                        <div class="group">
                            <input type="text" required name="name" id="name">
                            <span class="highlight"></span><span class="bar"></span>
                            <label for="name">Name</label>
                        </div>

                        <div class="group">
                            <input type="email" required name="email" id="email">
                            <span class="highlight"></span><span class="bar"></span>
                            <label for="email">Email</label>
                        </div>

                        <div class="group">
                            <textarea name="sms" required id="message"></textarea>
                            <span class="highlight"></span><span class="bar"></span>
                            <label for="message">Message</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p style="color:#b11264">Anti-Spam Code <strong ><?php echo $code; ?></strong> </p>
                                <input type="hidden" name="hide" value="<?php echo $code; ?>">
                            </div>
                            <div class="col-md-6 group">
                                <input type="text" name="code" id="email" required>
                                <span class="highlight"></span><span class="bar"></span>
                                <label for="email">Enter Code Here...</label>
                            </div>
                        </div>
                        <!-- <div class="g-recaptcha" data-sitekey="6Lf1b3caAAAAAFrhy8NHEctGeu_sn9-iq_OyOqf1"></div> -->
                        <!-- <button type="submit" name="lead" >Submit</button> -->

                        <button type="submit" name="lead" class="btn-leads button">Send</button>
                    </form>
                </div>

			</div>
            
		</div>
	</div>
</section>

<!-- security: 6Lf1b3caAAAAAEbJrXO2j1Sl4KTsDRsojRzRfzqx
sitekey: 6Lf1b3caAAAAAFrhy8NHEctGeu_sn9-iq_OyOqf1 -->




<?php include 'footer.php' ?>
	
    

<?php include 'script.php'; unset($_SESSION['sms']); ?>

</body>

</html>
