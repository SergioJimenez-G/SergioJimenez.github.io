<?php
$name    = '';
$email   = '';
$phone   = '';
$message = '';
$captcha = '';
?>
<!DOCTYPE html>

<html>
	<head>

        <!-- Website Title & Description for Search Engine purposes -->
        <title>Seacret - Sergio Jimenez</title>

        <meta name="title" content="Seacret - Sergio Jimenez - Contact Us" />
        <meta name="description" content="If you any questions or concerns, please send us a message using the contact form. We will get back to you as soon as possible. Thanks!" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="skype_toolbar" content="skype_toolbar_parser_compatible" />
        <meta http-equiv="pragma" content="no-cache" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta name="revisit-after" content="30 days" />
        <meta name="distribution" content="web" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <meta name="author" content="" />
        <meta name="copyright" content="" />
        <meta name="application-name" content="" />

        <!-- for Facebook -->
        <meta property="og:title" content="Seacret - Sergio Jimenez - Contact Us" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="" />
        <meta property="og:url" content="" />
        <meta property="og:description" content="If you any questions or concerns, please send us a message using the contact form. We will get back to you as soon as possible. Thanks!" />

        <!-- for Twitter -->
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Seacret - Sergio Jimenez - Contact Us" />
        <meta name="twitter:description" content="If you any questions or concerns, please send us a message using the contact form. We will get back to you as soon as possible. Thanks!" />
        <meta name="twitter:image" content="" />

        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" /><!-- bootstrap -->
        <link rel="stylesheet" href="css/font-awesome.min.css" /><!-- fontAwesome icons tipography based -->
        <link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css" /><!-- open emergent windows -->
        <link rel="stylesheet" href="css/slicknav.css" /><!-- responsive css -->
        <link rel="stylesheet" href="css/global.css"><!-- global css -->

    </head>
	<body id="top" class="contact-form">

        <!-- wrapper start -->
        <div id="wrapper">

            <a class="anchor" id="back-to-top" href="#top"><i class="fa fa-arrow-up"></i></a>

            <!-- nav starts -->
            <div id="header">
                <div class="container clearfix">
                    <a id="logo" href="index.html">Seacretdirect</a>
                    <div id="nav-container">
                        <ul class="nav nav-pills" id="nav">
                            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                            <li><a href="https://seacretdirect.com/sj/en/us/pc/signup/" target="blank" >SHOP</a></li>
                            <li><a href="why.html">WHY</a></li>
                            <li><a href="tools.html">TOOLS</a></li>
                            <li><a href="videos.html">VIDEOS</a></li>
                            <li><a href="https://seacretdirect.com/sj/en/us/join/us/signup/?" target="blank">JOIN</a></li>
                            <li><a href="beforeAfterPics.html">RESULTS</a></li>
                            <li><a href="motivational.html">MOTIVATIONAL</a></li>
                            <li><a href="events.html">EVENTS</a></li>
                            <li class="active"><a href="contact.php">CONTACT</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- nav ends -->

            <!-- content starts -->
    		<div id="main">

                <div id="bg-content" class="bg-contact"></div>

                <div class="callout">
                    <div class="container">
                        <h1>Contact Us</h1>
                    </div>
                </div>

                <?php
                if(isset($_GET['error']) && !empty($_GET['error']) && $_GET['error'] != '')
                {
                    $fields = '';

                    if($_GET['error'] == 'fields')
                    {
                        $the_error = '<p>Sorry!, There are fields required. Try it again!</p>';
                    }
                    elseif($_GET['error'] == 'captcha')
                    {
                        $the_error = '<p>Sorry!, The Captcha is not correct. Try it again!</p>';
                    }
                    else
                    {
                        $the_error = '<p>Sorry!, The is an error. Contact with the Webmaster !</p>';
                    }

                    if(isset($_GET['fields']) && !empty($_GET['fields']) && $_GET['fields'] != '')
                    {
                        $fields = $_GET['fields'];
                        $fields = base64_decode($fields);
                        $fields = unserialize($fields);

                        if($fields['name'] != '')   { $name     = $fields['name'];      } else { $the_error .= '<p>- Name field is required</p>';   }
                        if($fields['email'] != '')  { $email    = $fields['email'];     } else { $the_error .= '<p>- Email field is required</p>';  }
                        if($fields['phone'] != '')  { $phone    = $fields['phone'];     } else { $the_error .= '<p>- Phone field is required</p>';  }
                        if($fields['message'] != ''){ $message  = $fields['message'];   } else { $the_error .= '<p>- Message field is required</p>';}
                    }

                    echo '<div class="container"><div class="alert alert-danger">'.$the_error.'</div></div>';
                }

                if(isset($_GET['success']))
                {
                    echo '  <div class="container">
                                <div class="alert alert-success">
                                    <p>Thank You!, I will get back to you very soon!</p>
                                </div>
                            </div>';
                }
                ?>

                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">

                            <!-- contact form start -->
                            <form action="mail.php" method="post" id="form_settings">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <div class="has-feedback">
                                                <input name="name" type="text" required="required" aria-required="true" class="form-control" id="name" tabindex="1" maxlength="30" value="<?php echo $name; ?>" />
                                                <span aria-hidden="true" class="form-control-feedback"><i class="fa fa-user"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <div class="has-feedback">
                                                <input name="email" type="email" required="required" aria-required="true" class="form-control" id="email" tabindex="2" maxlength="30" value="<?php echo $email; ?>" />
                                                <span aria-hidden="true" class="form-control-feedback"><i class="fa fa-envelope"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <div class="has-feedback">
                                                <input name="phone" type="tel" required="required" aria-required="true" class="form-control" id="phone" tabindex="3" maxlength="30" value="<?php echo $phone; ?>" />
                                                <span aria-hidden="true" class="form-control-feedback"><i class="fa fa-phone"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Your message</label>
                                            <div class="has-feedback">
                                                <textarea name="message" cols="40" rows="10" maxlength="1000" required="required" class="form-control" id="your_message" tabindex="4" placeholder="your_message"><?php echo $message; ?></textarea>
                                                <span aria-hidden="true" class="form-control-feedback"><i class="fa fa-file-text"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group captcha">
                                            <label>Please, type only the red characters</label><br />
                                            <div class="captcha-container" style="display:inline-block; padding: 2px; border: 1px solid #999; border-radius: 5px">
                                                <img src="captcha.php" alt="" style="border:1px solid #ccc; border-radius: 3px;" id="captcha-image" />
                                                <div class="input-group" style="margin-top:2px;">
                                                    <input type="text" name="captcha" id="captcha" required="required" tabindex="5" class="form-control" />
                                                    <span aria-hidden="true" class="input-group-btn" id="reload-captcha">
                                                        <button class="btn btn-default" type="button"><i class="fa fa-refresh"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <input name="contact_submitted" type="submit" class="btn btn-primary" id="contact_submitted" value="Send Message" />
                                            <input type="reset" class="btn btn-danger pull-right" id="contact_submitted" value="Reset Message" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- contact form end -->
                        </div>
                    </div>
                </div>

            </div>
            <!-- content ends -->

            <!-- footer starts -->
    		<div id="footer">
    			<div class="container">
    				<div class="row">
                        <div class="footer-content">
                           <h6 class="pull-left">Copyright &copy; 2016 -  Sergio Jimenez</h6>
                           <div class="pull-right social-icons">
                                <a href="https://www.facebook.com/sjhappyman" target="blank" class="facebook"><i class="fa fa-facebook-square"></i> <span class="hidden-ms">facebook</span></a>
                                <a href="https://twitter.com/sjhappyman" target="blank" class="twitter"><i class="fa fa-twitter-square"></i> <span class="hidden-ms">Twitter</span></a>
                            </div>
                        </div>
                    </div>
                </div>
    		</div>
            <!-- footer ends -->

        </div>
        <!-- wrapper end -->

    	<!-- All Javascript at the bottom of the page for faster page loading -->
        <!-- ALL JS MUST BE TOGETHER -->
       <script type="text/javascript" src="http://www.sergiojimenez.com/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="http://www.sergiojimenez.com/js/jquery.bxslider.min.js"></script>
        <script type="text/javascript" src="http://www.sergiojimenez.com/js/jquery.fancybox-1.3.4.pack.js"></script>
        <script type="text/javascript" src="http://www.sergiojimenez.com/js/modernizr-2.6.2.min.js"></script>
        <script type="text/javascript" src="http://www.sergiojimenez.com/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://www.sergiojimenez.com/js/jquery.slicknav.min.js"></script>
        <script type="text/javascript" src="http://www.sergiojimenez.com/js/js.js"></script>
        <script>
        $('#reload-captcha').bind('click', function()
        {
            $('#captcha-image').attr('src',$('#captcha-image').attr('src')+'?t=1');
        })
        </script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-73340400-1', 'auto');
          ga('send', 'pageview');

        </script>
	</body>
</html>