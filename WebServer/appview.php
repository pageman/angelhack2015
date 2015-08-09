<?php
    //header('Content-type: application/json');

    require_once('connectDB.php'); 
    
    if(isset($_GET['appid'])) {
        $con=mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database);

        $appid = $_GET['appid'];
        
        // Check connection
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $sql = "SELECT * FROM wrapper_main WHERE appid = $appid";
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
        $selected = 0;

        if ($appid == 1) {
            $selected = "Crossy Road";
        }
        elseif ($appid == 2) {
            $selected = "Temple Run";
        }
         else {
            $selected = "No App Selected";
        }

        mysqli_close($con);
    }
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
                    <li>
                        <a href="appupload.php"><i class="fa fa-fw fa-arrow-up"></i> Upload App to Wrap</a>
                    </li>
                    <li class="active">
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
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <img src="images/icons/money.png" alt="" />
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Ads</div>
                                        <div>Service has been selected</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <img src="images/icons/graph.png" alt="" />
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Analytics</div>
                                        <div>Not Included</div>
                                        <div>(for demo purposes)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <img src="images/icons/bug.png" alt="" />
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Tracking</div>
                                        <div>Not Included</div>
                                        <div>(for demo purposes)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-desktop fa-fw"></i> <?php echo $selected; ?></h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <a href="">
                                            <img class="img-responsive" src="<?php echo $dbreturn[0]['urlimage']; ?>" alt="Android Ads">
                                        </a>
                                    </div>
                                    <div class="col-lg-9">
                                        <h2>Integrated SDKs:</h2>
                                        <h3>Advertisements</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->            

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

</body>

</html>
