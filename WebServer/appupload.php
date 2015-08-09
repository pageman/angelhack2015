<?php
    //header('Content-type: application/json');

    require_once('connectDB.php'); 
    
    $con=mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database);
    
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "SELECT * FROM wrapper_main";
    $result = mysqli_query($con, $sql);

    $dbreturn;
    $ctr = 0;
    while($row = mysqli_fetch_array($result)) {
          $dbreturn[$ctr]['appid'] = $row['appid'];
          $dbreturn[$ctr]['name'] = $row['name'];
          $dbreturn[$ctr]['urlimage'] = $row['urlimage'];
          $dbreturn[$ctr]['urlshop'] = $row['urlshop'];

          $ctr = $ctr + 1;
    }

   //echo json_encode( $dbreturn );

   mysqli_close($con);
?>  

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wrap It App! Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Wrap It App!</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Prado Bognot <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="appupload.php"><i class="fa fa-fw fa-arrow-up"></i> Upload App to Wrap</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-desktop"></i> Applications <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="appview.php?appid=1">Crossy Road</a>
                            </li>
                            <li>
                                <a href="appview.php?appid=2">Temple Run</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  Click on the Services you want to be integrated on your App...
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <a>
                        <div id="optionAds" class="panel" onclick="includeAds()">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <img src="images/icons/money.png" alt="" />
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Ads</div>
                                        <div id="textAds">Click to Include<Br>this service</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <span class="pull-left">Click to include service</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a>
                        <div id="optionAnalytics" class="panel" onclick="includeAnalytics()">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <img src="images/icons/graph.png" alt="" />
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Analytics</div>
                                        <div id="textAnalytics">Click to Include<Br>this service</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <span class="pull-left">Click to include service</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a>
                        <div id="optionTracking" class="panel" onclick="includeTracking()">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <img src="images/icons/bug.png" alt="" />
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Tracking</div>
                                        <div id="textTracking">Click to Include<Br>this service</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <span class="pull-left">Click to include service</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  Upload your App for Wrapping
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="User's Application" aria-describedby="basic-addon2">
                            <span class="btn btn-default btn-file">
                                Browse <input type="file">
                            </span>
                            <span class="btn btn-default">
                                Upload App
                            </span>
                        </div>  
                    </div>
                </div>        

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <script type="text/javascript">

    function includeAds() {
        var option = document.getElementById("optionAds")
        //option.className = "panel panel-primary";

        if (option.className == "panel panel-primary") {
            option.className = "panel";

            document.getElementById("textAds").innerHTML = "Click to Include<Br>this service";
        }
        else {
            option.className = "panel panel-primary";

            document.getElementById("textAds").innerHTML = "Service has been included!";
        }
    }

    function includeAnalytics() {
        var option = document.getElementById("optionAnalytics")
        //option.className = "panel panel-primary";

        if (option.className == "panel panel-yellow") {
            option.className = "panel";

            document.getElementById("textAnalytics").innerHTML = "Click to Include<Br>this service";
        }
        else {
            option.className = "panel panel-yellow";

            document.getElementById("textAnalytics").innerHTML = "Service has been included!";
        }
    }

    function includeTracking() {
        var option = document.getElementById("optionTracking")
        //option.className = "panel panel-primary";

        if (option.className == "panel panel-green") {
            option.className = "panel";

            document.getElementById("textTracking").innerHTML = "Click to Include<Br>this service";
        }
        else {
            option.className = "panel panel-green";

            document.getElementById("textTracking").innerHTML = "Service has been included!";
        }
    }

    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });

    $(document).ready( function() {
        $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
            console.log(numFiles);
            console.log(label);
        });
    });

    </script>

</body>

</html>
