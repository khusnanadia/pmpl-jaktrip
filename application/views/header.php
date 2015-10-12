<!DOCTYPE html>

<html lang="en">

<head>

  <link rel="shortcut icon" type="image/x-icon" 

  href="<?php echo base_url('assets/img/logo2.png');?>" />



  <link href="<?php echo base_url('assets/css/normalize.css');?>" type="text/css" rel="stylesheet"/>

  <link href="<?php echo base_url('assets/css/bootstrap.sandstone.css'); ?>" type="text/css" rel="stylesheet"/>

  <link href="<?php echo base_url('assets/css/bootstrap-datepicker3.css');?>" type="text/css" rel="stylesheet"/>

  <link href="<?php echo base_url('assets/css/font-awesome.css');?>" type="text/css" rel="stylesheet"/>

  <link href="<?php echo base_url('assets/css/jaktrip.css');?>" type="text/css" rel="stylesheet"/>

  <link href="<?php echo base_url('assets/css/ion.rangeSlider.skinFlat.css');?>" type="text/css" rel="stylesheet"/>

  <link href="<?php echo base_url('assets/css/ion.rangeSlider.css');?>" type="text/css" rel="stylesheet"/>

  <link href="<?php echo base_url('assets/css/sm-core-css.css');?>" type="text/css" rel="stylesheet"/>

  <link href="<?php echo base_url('assets/css/sm-clean.css');?>" type="text/css" rel="stylesheet"/>

  <link href="<?php echo base_url('assets/css/sm-clean2.css');?>" type="text/css" rel="stylesheet"/>

  <link href="<?php echo base_url('assets/css/ns-style-growl.css');?>" type="text/css" rel="stylesheet"/>

  <link href="<?php echo base_url('assets/css/ns-default.css');?>" type="text/css" rel="stylesheet"/>

  <link href="<?php echo base_url('assets/css/lightbox.css');?>" type="text/css" rel="stylesheet"/>

  <script src="<?php echo base_url('assets/js/jquery-1.11.0.min.js')?>"></script>

  <script src="<?php echo base_url('assets/js/lightbox.js')?>"></script>

  <script src="<?php echo base_url('assets/js/gmaps.js')?>"></script>

  <script src="<?php echo base_url('assets/amcharts/amcharts.js')?>" type="text/javascript"></script>

  <script src="<?php echo base_url('assets/amcharts/serial.js')?>" type="text/javascript"></script>

  



  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

  <script src="https://connect.facebook.net/en_US/all.js"></script>

  

  <script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>

<script type="text/javascript" src="http://www.amcharts.com/lib/3/radar.js"></script>

<script type="text/javascript" src="http://www.amcharts.com/lib/3/themes/none.js"></script>



  <title> JAKtrip: Explore fun places within your budget in Jakarta</title>



  <style>

    header{

      background-image: url('<?php echo base_url("assets/img/header.png");?>');

      height: 530px;

    }



    @font-face { 

      font-family: Tuffy; 

      src: url('<?php echo base_url("assets/fonts/Tuffy.otf");?>');

    }



    @font-face { 

      font-family: TuffyBold; 

      src: url('<?php echo base_url("assets/fonts/Tuffy_Bold.otf");?>');

    }



    @font-face { 

      font-family: Lato; 

      src: url('<?php echo base_url("assets/fonts/lato-regular.ttf");?>');

    }



    @font-face { 

      font-family: LatoBlack; 

      src: url('<?php echo base_url("assets/fonts/lato-black.ttf");?>');

    }

  </style>





<script type="text/javascript">



	var arrayOfPHPData = <?php echo json_encode($query) ?>;

	var arrayOfPHPData2 = <?php echo json_encode($query2) ?>;

	var arrayOfPHPData3 = <?php echo json_encode($query3) ?>;



	/*var chartData = [{

		"country": "USA",

		"visits": 4252

	}, {

		"country": "China",

		"visits": 1882

	}, {

		"country": "Japan",

		"visits": 1809

	}, {

		"country": "Germany",

		"visits": 1322

	}, {

		"country": "UK",

		"visits": 1122

	}, {

		"country": "France",

		"visits": 1114

	}, {

		"country": "India",

		"visits": 984

	}, {

		"country": "Spain",

		"visits": 711

	}, {

		"country": "Netherlands",

		"visits": 665

	}, {

		"country": "Russia",

		"visits": 580

	}, {

		"country": "South Korea",

		"visits": 443

	}, {

		"country": "Canada",

		"visits": 441

	}, {

		"country": "Brazil",

		"visits": 395

	}, {

		"country": "Italy",

		"visits": 386

	}, {

		"country": "Australia",

		"visits": 384

	}, {

		"country": "Taiwan",

		"visits": 338

	}, {

		"country": "Poland",

		"visits": 328

	}];*/



</script>





  <script>



  



		

		AmCharts.ready(function() {		

		//chart Pertama

		chart = new AmCharts.AmSerialChart();

		chart.dataProvider = arrayOfPHPData;

		chart.categoryField = "place_name";

		

		var graph = new AmCharts.AmGraph();

		graph.valueField = "visitors";

		graph.type = "column";

		chart.addGraph(graph);

		var legend2 = new AmCharts.AmLegend();
        legend2.data = [{title:"Visitors", color:"orange"}]
    chart.addTitle("Total Visitors", 12, "Red", "alpha", "bold");
     chart.addLegend(legend2);

		var categoryAxis = chart.categoryAxis;

		categoryAxis.autoGridCount  = false;

		categoryAxis.gridCount = arrayOfPHPData.length;

		categoryAxis.gridPosition = "start";

		categoryAxis.labelRotation = 90;
    categoryAxis.title = 'Tourist Attraction';
		

		graph.fillAlphas = 0.8;

		chart.angle = 30;

		chart.depth3D = 15;

		

		//chart kedua

		/*chart2 = new AmCharts.AmSerialChart();

		chart2.dataProvider = arrayOfPHPData2;

		chart2.categoryField = "place_name";

		

		var graph2 = new AmCharts.AmGraph();

		graph2.valueField = "rate_avg";

		graph2.type = "column";

		chart2.addGraph(graph2);

		

		var categoryAxis2 = chart2.categoryAxis;

		categoryAxis2.autoGridCount  = false;

		categoryAxis2.gridCount = arrayOfPHPData2.length;

		categoryAxis2.gridPosition = "start";

		categoryAxis2.labelRotation = 90;

		

		graph2.fillAlphas = 0.8;

		chart2.angle = 30;

		chart2.depth3D = 15;*/

		

		

		var chart2 = AmCharts.makeChart("chartdiv2",{

  "type": "radar",

  "categoryField": "rate_avg",

  "graphs": [

    {

      "valueField": "count(rate_avg)"

    }

  ],

  "valueAxes": [

    {

      "axisTitleOffset": 20,

      "minimum": 0,

      "axisAlpha": 0.35,

      "dashLength": 5

    }

  ],

  "dataProvider": arrayOfPHPData2

});

		

		//chart ketiga

		chart3 = new AmCharts.AmSerialChart();

		chart3.dataProvider = arrayOfPHPData3;

		chart3.categoryField = "lower_nom";

		

		var graph3 = new AmCharts.AmGraph();
    graph3.title= "Total";
		graph3.valueField = "input_num";

		graph3.type = "line";

		chart3.addGraph(graph3);

    var legend = new AmCharts.AmLegend();
        legend.data = [{title:"total", color:"orange"}]
    chart3.addTitle("Total Input Budget By User", 12, "Red", "alpha", "bold");
     chart3.addLegend(legend);
		

		var categoryAxis3 = chart3.categoryAxis;

		categoryAxis3.autoGridCount  = false;

		categoryAxis3.gridCount = arrayOfPHPData3.length;

		categoryAxis3.gridPosition = "start";

		categoryAxis3.labelRotation = 90;
    categoryAxis3.title = 'Budget';
		

		graph3.fillAlphas = 0; // or delete this line, as 0 is default

		//graph3.bullet = "round";

		//graph3.lineColor = "#8d1cc6";

		

		chart.write('chartdiv');

		//chart2.write('chartdiv2');

		//chart3.write('chartdiv3');

		});

</script>

</head>



<body>

  <nav class="navbar navbar-default navbar-fixed-top">

    <div class="container-fluid">

      <div class="navbar-header">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

      <span class="sr-only">Toggle navigation</span>

      <span class="icon-bar"></span>

      <span class="icon-bar"></span>

      <span class="icon-bar"></span>

      </button>

        <a class="navbar-brand" href="<?php echo base_url('home');?>" style="background-image: url(<?php echo base_url('assets/img/logo.png');?>) !important;"></a>

      </div>



      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav">

          <li>&nbsp;&nbsp;&nbsp;</li>

          <li><a href="<?php echo base_url('allplaces');?>">PLACES</a></li>

          <li><a href="<?php echo base_url('allpromo');?>">PROMO</a></li>

          </ul>



        <ul class="nav navbar-nav navbar-right sm sm-clean2" id="main-menu">

         <?php

            if(isset($_COOKIE["username"]) && (isset($_COOKIE["photo_facebook"])|| isset($_COOKIE["foto_profil"]) ))

            {

              

          //    echo "<li><a href='http://localhost/JAKtrip/index.php/searchCtr/logout'>Selamat datang ".$_COOKIE['username']."</a></li>";

               

            }

            else

            {

              echo "<li><a href=".base_url('register').">Sign Up</a></li>";

              echo "<li><a href='#openLogin'>Log In</a></li>";

            }

            

          ?>

          <!--li><a href="#">Sign Up</a></li-->

          

          <!--<?php

        //if(isset($_COOKIE["username"]))

        {



        //  echo "<li><a href='http://localhost/JAKtrip/index.php/searchCtr/logout'>Selamat datang ".$_COOKIE['username']."</a></li>";  

        }

        //else

        {

        //  echo "<li><a href='#openLogin'>Log In</a></li>";

        }

      ?>-->

            <!--li><a href="#openLogin">Log In</a></li-->

            <div id="openLogin" class="openModal">

              <div>

                <a href="#close" title="Close" class="close"><span class="fa fa-times"></span></a>

                <center><div class="tuffyh2a">Log In to JAKtrip</div></center><br>



                <form role="form" class="form-group" method="POST" action="<?php echo base_url('login');?>">

                  <input class="form-control form-group" type="text" placeholder="E-mail/username" name="username" required>

                  <input class="form-control form-group" type="password" placeholder="Password" name="password" required>

                  <div class="col-lg-12">

                    <span class="col-lg-6 pull-left" style="margin-left: -25px;"><input type="checkbox" name="remember">&nbsp; Remember me</span>

                    <span class="col-lg-6" style="text-align: right;"><a href="<?php echo base_url('login/forgotpassword');?>" style="margin-right: -60px; margin-top: -9px; text-align: right;">Forgot password?</a></span><br><br>

                  </div>

                  <button class="login btn btn-warning" type="submit">LOG IN</button><br><br>

                  <center>Or login with your account below

                  <div class="iconsocial col-lg-12">

                    <div class="col-lg-3"></div>

                    <a class="col-lg-2" href="#"><span class="fa fa-google-plus-square" style="color: #E03F3F;"></span></a>

                    <?php

                    if(isset($_COOKIE["username"]))

                    {

                      $ref_facebook = "#";  

                    }

                    else

                    {

                      $ref_facebook = base_url('LoginCtr/loginFB');

                    }



                    // if($login_url != null)

                    // {

                    //   $ref_facebook = $login_url;

                    // }

                    // else

                    // {

                    //   $ref_facebook = "#";

                    // }



                    ?>

                    <a class="col-lg-2" href="<?php echo $ref_facebook;?>"><span class="fa fa-facebook-square" style="color: #43468C;"></span></a>

                    <a class="col-lg-2" href="#"><span class="fa fa-twitter-square" style="color: #2EA0F2;"></span></a>

                    <div class="col-lg-3"></div>

                  </div>

                  <br>

                  <span class="col-lg-12">Don't have an account? <a href="<?php echo base_url('register');?>" style="float:right; margin-top: -13px; margin-right: 30px; margin-left: -50px;">Sign Up.</a></span>

                </center></form>

          </div>

            </div>

          <li id="popoverEdit1"><a type="button" id="theTrip" class="btn buttonAtasToggle" data-container="#popoverEdit1" data-placement="bottom"   

              data-toggle="popover">Trip (0)  <span class="fa fa-bus"></span></a>



           <?php

            





            if(isset($_COOKIE["username"]))

            {

              

              if(isset($_COOKIE["photo_facebook"]))

              {

                $foto = $_COOKIE["photo_facebook"];

                $username_header = $_COOKIE["username_facebook"];

                /*------biar cookienya ga mati------*/

                 setcookie('photo_facebook',$foto,time()+3600,"/");

                 setcookie('username_facebook',$username_header,time()+3600,"/");

              }

              else

              {

                 $foto = $_COOKIE["foto_profil"];

                 $username_header = $_COOKIE["username"];

                  /*------biar cookienya ga mati------*/

                  setcookie('foto_profil',$foto,time()+3600,"/");

              }

              $update_cookie_username = $_COOKIE["username"];

              /*------biar cookienya ga mati------*/

              setcookie('username',$update_cookie_username,time()+3600,"/");

              $update_is_admin = $_COOKIE["is_admin"];

              setcookie('is_admin',$update_is_admin,time()+3600,"/");

              if($_COOKIE["is_admin"]==1)

              {

                $halaman_user = "<li><a  href=\"".base_url()."admin/places\">Admin Page</a></li><li><a  href=\"".base_url()."user\">My Profile</a></li>";

              }

              else

              {

                $halaman_user = "<li><a  href=\"".base_url()."user\">My Profile</a></li>";

              }



              echo "<li><a href=\"#\">".$username_header."<div class='userphoto-ava'><img src=".$foto." class=\"ava-rounded\" style=\"position: relative;\"/></div></a><ul>".$halaman_user."<li><a  href=\"".base_url('logout')."\">Logout</a></li></ul>";  



            }

            

          ?></li> 

        </ul>

      </div>

    </div>

  </nav>