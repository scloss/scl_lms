<br>

<h2 align="center">SCL Leave Management System</h2>


<style>
body {
        background:url("<?php echo base_url();?>assets/images/home.jpg")!important; 
        background-size: 100%!important; 
}

@font-face{
        font-family: "BebasNeue-Regular";
        src: url("<?php echo base_url();?>assets/fonts/BebasNeue-Regular.ttf");
}

@font-face{
	font-family: "Lato-Thin";
	src: url("<?php echo base_url();?>assets/fonts/Lato-Thin.ttf");
}

@font-face{
	font-family: "Lato-Bold";
	src: url("<?php echo base_url();?>assets/fonts/Lato-Bold.ttf");
}

h1 {
    margin: 15px 10px 0 !important; 
    font-size:28px !important;
    font-family:"BebasNeue-Regular";
	font-weight:1;
	line-height:25px;
	text-align: center;
}

p {
    margin: 7px 7px 0 !important; 
    font-size:15px !important;
    font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
	line-height:10px;
	text-align: center;
}

#btn1{
	background:#3AB5B0;
	height:200px;
	width:200px;
	box-shadow: 5px 5px 10px rgba(0, 0, 0, .5);
	
	margin-left:20px !important;
	left:900px;
	cursor:pointer;
	
	color:#fff;
	font-size:25px;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
	line-height:25px;
	padding-left:10px;
	text-align:left;
	
	border-radius: 15px;
	margin:5px;
}
#btn2{
	background:#A8cF58;
	height:200px;
	width:200px;
	box-shadow: 5px 5px 10px rgba(0, 0, 0, .5);
	
	margin-left:20px !important;
	left:900px;
	cursor:pointer;
	
	color:#fff;
	font-size:25px;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
	line-height:25px;
	padding-left:10px;
	text-align:left;

	border-radius: 15px;
	margin:5px;
}

#btn3{
	background:#26B8DD;
	height:200px;
	width:200px;
	box-shadow: 5px 5px 10px rgba(0, 0, 0, .5);
	
	margin-left:20px !important;
	left:900px;
	cursor:pointer;
	
	color:#fff;
	font-size:25px;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
	line-height:25px;
	padding-left:10px;
	text-align:left;

	border-radius: 15px;
	margin:5px;
}

#btn4{
	background:#F97D5F;
	height:200px;
	width:200px;
	box-shadow: 5px 5px 10px rgba(0, 0, 0, .5);
	
	margin-left:20px !important;
	margin-top:20px !important;
	left:900px;
	cursor:pointer;
	
	color:#fff;
	font-size:25px;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
	line-height:25px;
	padding-left:10px;
	text-align:left;

	border-radius: 15px;
	margin:5px;
}
#btn5{
	background:#7A7BCD;
	height:200px;
	width:200px;
	box-shadow: 5px 5px 10px rgba(0, 0, 0, .5);
	
	margin-left:20px !important;
	margin-top:20px !important;
	left:900px;
	cursor:pointer;
	
	color:#fff;
	font-size:25px;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
	line-height:25px;
	padding-left:10px;
	text-align:left;

	border-radius: 15px;
	margin:5px;
}

#btn6{
	background:#2BB673;
	height:200px;
	width:200px;
	box-shadow: 5px 5px 10px rgba(0, 0, 0, .5);
	
	margin-left:20px !important;
	margin-top:20px !important;
	left:900px;
	cursor:pointer;
	
	color:#FFF;
	font-size:25px;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
	line-height:25px;
	padding-left:10px;
	text-align:left;

	border-radius: 15px;
	margin:5px;
}


</style>



<!--buttons-->
<div style="width:750px; height:450px; overflow:hidden; margin: 0 auto; position:relative; margin-top:25px;">


	<a href="<?php echo base_url();?>leaves/counters">
		<div id="btn1" style="float:left"> 
		<div style="display: flex; justify-content: center; margin-top:20px;">
                <img src="<?php echo base_url();?>assets/images/Landing page-03.png" style="width: 50px; height: 50px">
        </div> 
		<h1> My Leave Balance </h1>

			<?php 
			if (count($summary) > 0) {
				foreach ($summary as $key => $value) {
					if (($value[2] == '') || ($value[2] == 'x')) {
						$estimated = round(((float) $value[1] - (float) $value[0]), 3, PHP_ROUND_HALF_DOWN);
						$simulated = $estimated;
						if (!empty($value[4])) $simulated -= (float) $value[4];
						if (!empty($value[5])) $simulated -= (float) $value[5];
						echo '<p>'.explode(' ',$key)[0].':'.$estimated.'/'.((float) $value[1]).'</p>' ;        
					}
				}
			}
            ?>
		</div> 
	</a>
	<a href="<?php echo base_url();?>leaves">
		<div id="btn2" style="float:left">
			<div style="display: flex; justify-content: center; margin-top:20px;">
					<img src="<?php echo base_url();?>assets/images/Landing page-04.png" style="width: 50px; height: 50px">
			</div>
			<h1> My Pending Leave Requests  </h1> 
			<h1 style="font-size:50px !important;">
					<?php echo count($leaves);?>
			</h1>
		</div> 
	</a>
	<a href="<?php echo base_url();?>leaves/create">
		<div id="btn3" style="float:left"> 
			<div style="display: flex; justify-content: center; margin-top:30px;margin-left:-10px;">
					<img src="<?php echo base_url();?>assets/images/Landing page-05.png" style="width: 70px; height: 70px">
			</div>
			<h1> Submit a New Leave Request </h1> 
		</div> 
	</a>
	<a href="<?php echo base_url();?>leaves">
		<div id="btn4" style="float:left"> 
		<div style="display: flex; justify-content: center; margin-top:40px;">
					<img src="<?php echo base_url();?>assets/images/Landing page-06.png" style="width: 70px; height: 70px">
		</div>
			<h1> My Last Leave </h1> 
		</div> 
	</a>
	<a href="<?php echo base_url();?>contactus">
		<div id="btn5" style="float:left"> 
		<div style="display: flex; justify-content: center; margin-top:40px;">
					<img src="<?php echo base_url();?>assets/images/Landing page-07.png" style="width: 70px; height: 70px">
		</div>
			<h1> Contact Us </h1> 
		</div> 
	</a>
    <a href="<?php echo base_url();?>holidaycalendar">
		<div id="btn6" style="float:left"> 
			<div style="display: flex; justify-content: center; margin-top:40px;">
					<img src="<?php echo base_url();?>assets/images/Landing page-08.png" style="width: 70px; height: 70px">
			</div>
			<h1> Govt. Holidays </h1> 
		</div> 
	</a>
    
    
</div>