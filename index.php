<?php
include("includes/config.php");
$club_details = $db->selectAll("clubs", "*");
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
      <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <![endif]-->
      <meta name="description" content="">
      <meta name="author" content="ScriptsBundle">
      <title>Events</title>
      <!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
    
      <!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
      <link rel="stylesheet" href="css/bootstrap.css">
      <!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
      <link rel="stylesheet" href="css/style.css">
      <!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
      <link rel="stylesheet" href="css/font-awesome.css" type="text/css">
      <!-- =-=-=-=-=-=-= Flat Icon =-=-=-=-=-=-= -->
      <link href="css/flaticon.css" rel="stylesheet">
      <!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
      <link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">
      <!-- =-=-=-=-=-=-= Menu Drop Down =-=-=-=-=-=-= -->
      <link rel="stylesheet" href="css/forest-menu.css" type="text/css">
      <!-- =-=-=-=-=-=-= Animation =-=-=-=-=-=-= -->
      <link rel="stylesheet" href="css/animate.min.css" type="text/css">
      <!-- =-=-=-=-=-=-= Select Options =-=-=-=-=-=-= -->
      <link href="css/select2.min.css" rel="stylesheet" />
      <!-- =-=-=-=-=-=-= noUiSlider =-=-=-=-=-=-= -->
      <link href="css/nouislider.min.css" rel="stylesheet">
      <!-- =-=-=-=-=-=-= Listing Slider =-=-=-=-=-=-= -->
      <link href="css/slider.css" rel="stylesheet">
      <!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
      <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
      <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
      <!-- =-=-=-=-=-=-= Check boxes =-=-=-=-=-=-= -->
      <link href="skins/minimal/minimal.css" rel="stylesheet">
      <!-- =-=-=-=-=-=-= Responsive Media =-=-=-=-=-=-= -->
      <link href="css/responsive-media.css" rel="stylesheet">
      <!-- =-=-=-=-=-=-= Template Color =-=-=-=-=-=-= -->
      <link rel="stylesheet" id="color" href="css/colors/defualt.css">
      <!-- =-=-=-=-=-=-= For Style Switcher =-=-=-=-=-=-= -->
      <link rel="stylesheet" id="theme-color" type="text/css" href="#" />
      <!-- JavaScripts -->
      <script src="js/modernizr.js"></script>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <?php include("includes/header.php"); ?>
    
      
      <!-- =-=-=-=-=-=-= Home Banner 2 =-=-=-=-=-=-= -->
      
      <!-- =-=-=-=-=-=-= Home Banner 2 End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <section class="slider-section">
             <?php
             $slide = $db->query("select * from slider where status=1 order by id asc");
             $slider = $slide->fetchAll(PDO::FETCH_OBJ);
               ?>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
              <?php
              $i = 0;
              foreach($slider as $sliders){
                 ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" <?php if($i == 0){ ?> class="active"<?php } ?>></li>
               <?php $i++; } ?>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
              <?php
                            $i = 0;
                            foreach($slider as $sliders){
                         ?>
                <div class="item <?php if($i == 0){ ?> active <?php } ?>">
                  <img src="<?php echo $admin_url.$sliders->image; ?>"alt="Los Angeles">
                 </div>
                 <?php $i++; } ?>
                </div>
              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            </section>
         
         <!-- =-=-=-=-=-=-= Trending Ads =-=-=-=-=-=-= -->
         <section class="custom-padding gray">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1>Upcomming <span class="heading-color"> Events</span></h1>
                        <!-- Short Description -->
                        <p class="heading-text"></p>
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <ul class="list-unstyled">
                        <!-- Listing Grid -->
                        <?php
                         $event = $db->query("select * from events where status=1 order by id desc");
                         $events = $event->fetchAll(PDO::FETCH_OBJ);
                         foreach($events as $event_info){
                        ?>
                        <li>
                           <div class="well ad-listing clearfix">
                              <div class="col-md-3 col-sm-5 col-xs-12 grid-style no-padding">
                                 <!-- Image Box -->
                                 <div class="img-box">
                                    <img src="<?php echo $admin_url.$event_info->image; ?>" class="img-responsive" alt="">
                                   
                                 </div>
                                 
                              </div>
                              <div class="col-md-9 col-sm-7 col-xs-12">
                                 <!-- Ad Content-->
                                 <div class="row">
                                    <div class="content-area">
                                       <div class="col-md-9 col-sm-12 col-xs-12">
                                          <!-- Category Title -->
                                          <div class="category-title"> <span><a href="#">Category Name</a></span> </div>
                                          <!-- Ad Title -->
                                          <h3><?php echo $event_info->event_name; ?></h3>
                                          <!-- Info Icons -->
                                          <ul class="additional-info pull-right">
                                             <li>
                                                <a data-toggle="tooltip" title="Send Message" href="#" class="fa fa-envelope"></a>
                                             </li>
                                             <li>
                                                <a data-toggle="tooltip" title="+92-4567-123" href="#" class="fa fa-phone"></a>
                                             </li>
                                             
                                          </ul>
                                          <!-- Ad Meta Info -->
                                          <ul class="ad-meta-info">
                                             <li> <i class="fa fa-calendar"></i><a href="#"><?php echo $event_info->event_date; ?></a> </li>
                                             
                                          </ul>
                                          <!-- Ad Description-->
                                          <div class="ad-details">
                                             <p><?php echo $event_info->description; ?></p>
                                          </div>
                                       </div>
                                       <div class="col-md-3 col-xs-12 col-sm-12">
                                          <!-- Ad Stats -->
                                          <div class="short-info">
                                             <div class="ad-stats hidden-xs"><span>Duration  : </span>2 Hours</div>
                                             <div class="ad-stats hidden-xs"><span>Entry Type : </span>Premium</div>
                                             <div class="ad-stats hidden-xs"><span>Fee :</span> </div>
                                          </div>
                                          <!-- Price -->
                                          <div class="price"> <span><i class="fa fa-inr"></i> <?php echo $event_info->price; ?></span> </div>
                                          <!-- Ad View Button -->
                                          <a href="category-details.php" class="btn btn-block btn-success"><i class="fa fa-eye" aria-hidden="true"></i> View Details.</a>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Ad Content End -->
                              </div>
                           </div>
                        </li>

                     </ul>
                    <?php } ?> 
                  </div>
                  <!-- Middle Content Box End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Trending Ads End =-=-=-=-=-=-= -->
        <!-- =-=-=-=-=-=-= Featured Ads =-=-=-=-=-=-= -->
         <section class="custom-padding">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1>Popular <span class="heading-color"> Clubs</span> </h1>
                        <!-- Short Description -->
                        <p class="heading-text"></p>
                     </div>
                  </div>

                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">

                     <div class="row">

                        <div class="featured-slider owl-carousel owl-theme">
                                    <?php
                           
                                    
                                    $club = $db->query("select * from clubs where status=1 order by id asc");
                                    $clubs = $club->fetchAll(PDO::FETCH_OBJ);
                                     ?>

                                       <?php
                                       $i = 0;
                                       foreach($clubs as $club){ ?>
                           <div class="item">
                              <div class="col-md-12 col-xs-12 col-sm-12 clearfix">
                                 

                                 <!-- Ad Box -->
                                 <div class="category-grid-box">
                                    <!-- Ad Img -->
                                    <div class="category-grid-img">
                                       <img class="img-responsive" alt="" src="<?php echo $admin_url.$club->image  ?>">
                                       <!-- User Review -->
                                       
                                       <!-- Additional Info End-->
                                    </div>
                                    <!-- Ad Img End -->
                                    <div class="short-description">
                                       <!-- Ad Category -->
                                       <h3><a title="" href="single-page-listing.php"><?php  echo $club->club_name   ?></a></h3>
                                       <div class="category-title"> <span><a href="#"><?php  echo $club->president_name   ?></a></span> </div>
                                       <div class="category-title"> <span><a href="#"><?php  echo $club->email_id   ?></a></span> </div>
                                       <div class="category-title"> <span><a href="#"><?php  echo $club->phone_number   ?></a></span> </div>
                                       <!-- Ad Title -->
                                       
                                       <!-- Price -->
                                       
                                    </div>
                                    <!-- Addition Info -->
                                   
                                 </div>

                                 
                                 <!-- Ad Box End -->
                              </div>
                           </div>
                           <?php  $i++ ; }?>            
                           </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Middle Content Box End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Featured Ads End =-=-=-=-=-=-= -->
         <section class="custom-padding gray">
            <!-- Main Container -->
            <div class="container">
               <!-- Content Box -->
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1>Our <span class="heading-color"> Team</span> </h1>
                        <!-- Short Description -->
                        <p class="heading-text"></p>
                     </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="row">
                        <!-- Blog Post-->
                       <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php
                           
                           
                           $team = $db->query("select * from team where status=1 order by id asc");
                           $teams = $team->fetchAll(PDO::FETCH_OBJ);
                        ?>

                              <?php
                              $i = 0;
                              foreach($teams as $ta){ ?>
                       <div class="col-md-3 col-sm-4 col-xs-12">
                           <div class="blog-post">
                              <div class="post-img">
                                 <a href="about.php"> <img class="img-responsive" alt="" src="<?php echo $admin_url.$ta->image  ?>"> </a>
                              </div>
                             
                              <h3 class="post-title"> <a href="about.php"> <?php  echo $ta->name   ?></a> </h3>
                              <p class="post-excerpt"><?php  echo $ta->description   ?></p>
                           </div>
                        </div>
                        <?php  $i++ ; }?>
                  
                     </div>
                  </div>
                  <!-- Middle Content Box End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <?php include("includes/footer.php"); ?>
      </div>
      <!-- Main Content Area End --> 
      <!-- Post Ad Sticky -->
     
      <!-- Back To Top -->
      <a href="#0" class="cd-top">Top</a>
      <!-- =-=-=-=-=-=-= Quote Modal =-=-=-=-=-=-= -->
      <div class="modal fade price-quote" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h3 class="modal-title" id="lineModalLabel">Email for Price</h3>
               </div>
               <div class="modal-body">
                  <!-- content goes here -->
                  <form>
                     <div class="form-group  col-md-6">
                        <label>Your Name</label>
                        <input type="text" class="form-control" placeholder="Enter Your Name"> 
                     </div>
                     <div class="form-group  col-md-6">
                        <label>Email Address</label>
                        <input type="email" class="form-control" placeholder="Enter email"> 
                     </div>
                     <div class="form-group  col-md-12">
                        <label>Contact No</label>
                        <input type="text" class="form-control" placeholder="Contact No"> 
                     </div>
                     <div class="form-group  col-md-12">
                        <label>Comments</label>
                        <textarea placeholder="What is the price of the Honda Civic 2017 you have in your inventory?" rows="3" class="form-control">What is the price of the 2015 Honda Accord EX-L you have in your inventory?</textarea>
                     </div>
                     <div class="col-md-12"> <img src="images/captcha.gif" alt="" class="img-responsive"> </div>
                     <div class="clearfix"></div>
                     <div class="col-md-12 margin-bottom-20 margin-top-20">
                        <button type="submit" class="btn btn-theme btn-block">Submit</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- Product Preview Popup -->
      <div class="quick-view-modal modalopen" id="ad-preview" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-lg ad-modal">
            <button class="close close-btn popup-cls" aria-label="Close" data-dismiss="modal" type="button"> <i class="fa-times fa"></i> </button>
            <div class="modal-content single-product">
               <div class="diblock">
                  <div class="col-lg-7 col-sm-12 col-xs-12">
                     <div class="clearfix"></div>
                     <div class="flexslider single-page-slider">
                        <div class="flex-viewport">
                           <ul class="slides slide-main">
                              <li class=""><img alt="" src="images/single-page/1.jpg" title=""></li>
                              <li><img alt="" src="images/single-page/2.jpg" title=""></li>
                              <li class="flex-active-slide"><img alt="" src="images/single-page/3.jpg" title=""></li>
                              <li><img alt="" src="images/single-page/4.jpg" title=""></li>
                              <li><img alt="" src="images/single-page/5.jpg" title=""></li>
                              <li><img alt="" src="images/single-page/6.jpg" title=""></li>
                           </ul>
                        </div>
                     </div>
                     <div class="flexslider" id="carousels">
                        <div class="flex-viewport">
                           <ul class="slides slide-thumbnail">
                              <li><img alt="" draggable="false" src="images/single-page/1_thumb.jpg"></li>
                              <li><img alt="" draggable="false" src="images/single-page/2_thumb.jpg"></li>
                              <li class="flex-active-slide"><img alt="" draggable="false" src="images/single-page/3_thumb.jpg"> </li>
                              <li><img alt="" draggable="false" src="images/single-page/4_thumb.jpg"></li>
                              <li><img alt="" draggable="false" src="images/single-page/5_thumb.jpg"></li>
                              <li><img alt="" draggable="false" src="images/single-page/6_thumb.jpg"></li>
                              <!-- items mirrored twice, total of 12 -->
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class=" col-sm-12 col-lg-5 col-xs-12">
                     <div class="summary entry-summary">
                        <div class="ad-preview-details">
                           <a href="#">
                              <h4>Honda Civic Sports Edition 2017</h4>
                           </a>
                           <div class="overview-price">
                              <span>$36.000</span>
                           </div>
                           <div class="clearfix"></div>
                           <p>Tattooed fashion axe Blue Bottle butcher tilde. Pitchfork leggings meh Odd Future.Drinking vinegar. </p>
                           <ul class="car-info col-md-6 col-sm-6">
                              <li>
                                 <span>Fabrication:</span>
                                 <p>2013/2014</p>
                              </li>
                              <li>
                                 <span>Speed:</span>
                                 <p>160p/h</p>
                              </li>
                              <li>
                                 <span>Mileage:</span>
                                 <p>30.000km - 40.000km</p>
                              </li>
                              <li>
                                 <span>Fuel:</span>
                                 <p>Petrol</p>
                              </li>
                           </ul>
                           <ul class="ad-preview-info col-md-6 col-sm-6">
                              <li>
                                 <span>Color:</span>
                                 <p>Black</p>
                              </li>
                              <li>
                                 <span>Transmition:</span>
                                 <p>Automatic</p>
                              </li>
                              <li>
                                 <span>Dors:</span>
                                 <p>4/5</p>
                              </li>
                              <li>
                                 <span>Engine:</span>
                                 <p>2500cm3</p>
                              </li>
                           </ul>
                           <button class="btn btn-theme btn-block" type="submit">Contact Dealer</button>
                        </div>
                     </div>
                     <!-- .summary -->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- / Product Preview Popup -->
      <!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
      <script src="js/jquery.min.js"></script>
      <!-- Bootstrap Core Css  -->
      <script src="js/bootstrap.min.js"></script>
      <!-- Jquery Easing -->
      <script src="js/easing.js"></script>
      <!-- Menu Hover  -->
      <script src="js/forest-megamenu.js"></script>
      <!-- Jquery Appear Plugin -->
      <script src="js/jquery.appear.min.js"></script>
      <!-- Numbers Animation   -->
      <script src="js/jquery.countTo.js"></script>
      <!-- Jquery Smooth Scroll  -->
      <script src="js/jquery.smoothscroll.js"></script>
      <!-- Jquery Select Options  -->
      <script src="js/select2.min.js"></script>
      <!-- noUiSlider -->
      <script src="js/nouislider.all.min.js"></script>
      <!-- Carousel Slider  -->
      <script src="js/carousel.min.js"></script>
      <script src="js/slide.js"></script>
      <!-- Image Loaded  -->
      <script src="js/imagesloaded.js"></script>
      <script src="js/isotope.min.js"></script>
      <!-- CheckBoxes  -->
      <script src="js/icheck.min.js"></script>
      <!-- Jquery Migration  -->
      <script src="js/jquery-migrate.min.js"></script>
      <!-- Sticky Bar  -->
      <script src="js/theia-sticky-sidebar.js"></script>
      <!-- Style Switcher -->
      <script src="js/color-switcher.js"></script>
      <!-- Template Core JS -->
      <script src="js/custom.js"></script>
   </body>
</html>
