<?php 
if(isset($_GET['pageid'])){
	$pageid = $_GET['pageid'];
	echo "page id is ".$pageid;
}else{
$pageid="newpaymentform-bare.html";	
}




$month = new stdClass();

$month->jan=array( 
		'basic'=>array('id'=>'123966c7-ec83-4dc4-b88e-c660bf214d08', 'cost'=>'$275.00'),
		'featured'=>array('id'=>'a039f909-a026-4ccf-b78d-f3c2fc765c0b', 'cost'=>'$875.00')  
	 	);
$month->feb=array(  
		'basic'=>array('id'=>'9d58a006-8f6f-4392-9b9f-c0cd75c1b603', 'cost'=>'$229.17'),
		'featured'=>array('id'=>'c84f7214-91ce-4afe-af85-b639474cf66b', 'cost'=>'$729.17')  
	 	);
$month->mar=array(  
		'basic'=>array('id'=>'590d0056-8d5e-4c09-b074-6f5eb39a6312', 'cost'=>'$183.33'),
		'featured'=>array('id'=>'962c2829-4e56-44e4-a38a-5c48b72f9b13', 'cost'=>'$583.33')  
	 	);	
$month->apr=array(  
		'basic'=>array('id'=>'fb46c915-7759-487b-9191-f2826c2f1e34', 'cost'=>'$137.50'),
		'featured'=>array('id'=>'07c746dd-a038-45a3-b2fb-23326b8b1b50', 'cost'=>'$437.50')  
	 	);					
$month->may=array(  
		'basic'=>array('id'=>'567c68ca-cd49-44c3-99e7-97a01b44a7c6', 'cost'=>'$91.67'),
		'featured'=>array('id'=>'dbf37098-bbe8-404e-a618-ab6b4dc87ec8', 'cost'=>'$291.67')  
	 	);	
$month->jun=array(  
		'basic'=>array('id'=>'d1f38c4c-95a3-40b9-8ad5-1a121a424d42', 'cost'=>'$45.83'),
		'featured'=>array('id'=>'2c17cae5-ddc7-475c-872f-85dc3892a279', 'cost'=>'$145.83')  
	 	);			
$month->jul=array(  
		'basic'=>array('id'=>'3f188e49-a184-46c7-ab98-053c1f7bc8d1', 'cost'=>'$550.00'),
		'featured'=>array('id'=>'3e399e72-1c93-4a33-86ae-999ee765aff9', 'cost'=>'$1750.00')  
	 	);			
$month->aug=array(  
		'basic'=>array('id'=>'c0f50b81-f188-48d9-b16c-9f4e8ab265b2', 'cost'=>'$504.17'),
		'featured'=>array('id'=>'312c6ed0-3665-4d65-aa51-30acccbbc09a', 'cost'=>'$1604.17')  
	 	);	
$month->sep=array(  
		'basic'=>array('id'=>'d92ebe74-edb5-4831-b1d1-303a8ac524e6', 'cost'=>'$458.33'),
		'featured'=>array('id'=>'44d30d1f-e8bf-482a-8017-df38352b0d28', 'cost'=>'$1458.33')  
	 	);	
$month->oct=array(  
		'basic'=>array('id'=>'d977ac4a-efa1-4ac0-80ae-d187e30c0ab5', 'cost'=>'$412.50'),
		'featured'=>array('id'=>'10b2f6ad-e12d-4099-9196-4fc16a4c21d6', 'cost'=>'$1312.50')  
	 	);		
$month->nov=array(  
		'basic'=>array('id'=>'7115b706-50e0-4e28-82af-24fb64474be1', 'cost'=>'$366.67'),
		'featured'=>array('id'=>'78cce4c5-0434-4622-86ce-75a8678d0a69', 'cost'=>'$1166.67')  
	 	);			
$month->dec=array(  
		'basic'=>array('id'=>'e752237e-9ee5-4b34-be43-8fbb19d1d062', 'cost'=>'$320.83'),
		'featured'=>array('id'=>'00564275-8080-4a2a-a81d-98f6e7fb1ac1', 'cost'=>'$1020.83')  
	 	);	
		

$textmonth = date('F');
$mocode = strtolower(date('M'));

$monthNum = date('n');

$thismonth = $month->{$mocode};
		
		
?>
<!doctype html>
<html lang="en-US"><head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="">
    <META NAME="robots" CONTENT="noindex">

    <title>Join the SDTA today.</title>

    <link rel="icon" type="image/png" href="http://www.sandiego.org/media/favicon.png">
    <link rel="shortcut icon" href="http://www.sandiego.org/media/favicon.ico" type="image/x-icon">

	<link rel="stylesheet" type="text/css" href="http://www.sandiego.org/includes/cssbin/mini/sdcvb.css.1841710607818.css" media="all">
  	<link rel="stylesheet" type="text/css" href="../sdta.css" media="all">
 
<?php include "shell_includes/sitescripts.html" ?>

</head>

<body class="layout3">
<!-- 3rd Party JS Snippets -->
<!-- Google Tag Manager -->


    
<?php //include "shell_includes/pinnedfooter.html" ?>

<?php include "shell_includes/mainnav.html" ?>

<!-- Begin: Wrapper -->
<div id="wrapper" class="clear">
    <div id="browserWarning">
        Our site is best viewed in the latest version of your browser. <a href="http://windows.microsoft.com/en-US/internet-explorer/downloads/ie">Please upgrade for the best site experience</a>.
        <span id="close-button" class="floatR"><a href="#x" onclick="return false"><img src="/Media/misc/close-button-sm.png"></a></span>
    </div>
    <div id="wrapperOuter" class="clear">
        <div id="wrapperInner">

            <!-- Begin: main content area -->
            
	<div id="navCol" class="navRail">
	</div>
	<div id="mainContentColExtra" class="extra">
		
<div class="page-header" style="padding-top:20px;">

	<h1>New Member Application and Payment Form</h1>

	<div style="clear:both;"></div>
</div>
		

	</div>
	<!-- Start: main content area -->
	<div id="mainContentColWrap" class="clear">
		<div id="mainInnerColWrap">

	

            
            <?php //include "shell_includes/rail1.html" ?>
            <?php //include "shell_includes/rail2.html" ?>
            <?php //include "shell_includes/rail3.html" ?>
            
            
			<div id="mainContentCol4" class="rail4 wide">
				

<div class="main-detail-section sdcvb-content">
    
    
    
   <?php include $pageid; ?>




    
</div>

			</div>
			<?php //include "shell_includes/rail5.html" ?>
            <?php //include "shell_includes/rail6.html" ?>
	
            
            
		</div>
	</div>


            <!-- End: main content area -->

        </div>
    </div>
</div>
<!-- End: Wrapper -->

<?php include "shell_includes/footer.html" ?>

<?php include "shell_includes/partnerbar.html" ?>


<?php include "shell_includes/areamap.html"?> <!-- end of div#area-map -->



















</body></html>