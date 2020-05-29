<?php
if ( !session_id() ) {
    session_start();
}
if (!isset($_SESSION["egi_user_sub"]) or $_SESSION["egi_user_sub"] == "") {
    include('auth_egi.php');
    $user_name = "";
} else {
    $user_sub = $_SESSION["egi_user_sub"];
    $user_name = $_SESSION["egi_user_name"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="EC3 EGI LToS page">
    <meta name="author" content="Amanda Calatrava">

    <title>EC3 - Elastic Cloud Computing Cluster</title>
    <link rel="shortcut icon" href="img/ec3-small.png">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!--wizard plugin -->
    <!--<link href="bootstrap-wizard/bootstrap-wizard.css" rel="stylesheet"/>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet" />-->
    <link href="src/bootstrap-wizard.css" rel="stylesheet" />
    <link href="chosen/chosen.css" rel="stylesheet" />
    <style type="text/css">
        .wizard-modal p {
            margin: 0 0 10px;
            padding: 0;
        }

        #wizard-ns-detail-servers, .wizard-additional-servers {
            font-size: 12px;
            margin-top: 10px;
            margin-left: 15px;
        }
        #wizard-ns-detail-servers > li, .wizard-additional-servers li {
            line-height: 20px;
            list-style-type: none;
        }
        #wizard-ns-detail-servers > li > img {
            padding-right: 5px;
        }

        .wizard-modal .chzn-container .chzn-results {
            max-height: 150px;
        }
        .wizard-addl-subsection {
            margin-bottom: 40px;
        }
        .create-server-agent-key {
            margin-left: 15px;
            width: 90%;
        }
    </style>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="font-mfizz/font-mfizz.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
<?php include_once("analyticstracking.php") ?>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-right page-scroll">
				<button id="logout" class="navbar-welcome navbar-right page-scroll" type="button" style="color:#fed136;"> Log out </button>
                <p class="navbar-welcome navbar-right page-scroll"> Welcome <?php echo $user_name;?> | </p>
            </div>
        </div>
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">EC3: Elastic Cloud Computing Cluster</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#features">Features</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Learn More</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#try">Deploy!</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                  <div class="intro-lead-in">Elastic Clusters as a Service</div>
                <div class="intro-heading">Deploy Virtual Elastic Clusters on the Cloud</div>
                <a href="#try" class="page-scroll btn btn-xl">Deploy your cluster!</a>
                <a href="#services" class="page-scroll btn btn-xl">Learn more</a>
            </div>
        </div>
    </header>

        <!-- Features Section class="bg-orange" -->
    <section id="features" class="bg-darkest-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">EC3 main features</h2>
                    </br>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <!--<i class="fa fa-terminal fa-stack-1x fa-inverse"></i>-->
                        <i class="icon-shell" style="color:white"></i>
                    </span>
                    <h4 class="service-heading text-muted-contact">Web and CLI interfaces</h4>
                    <p class="text-muted">Unleash the power of EC3 by using the Command Line Interface, available at the <a href="https://github.com/grycap/ec3" target="_blank">GitHub</a> repository.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-bar-chart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading text-muted-contact">Self-Managed Elasticity</h4>
                    <p class="text-muted">Elasticity is powered by <a href="http://www.grycap.upv.es/clues/eng/index.php" target="_blank">CLUES</a> and managed by the cluster itself. No external monitoring required.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-sellsy fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading text-muted-contact">Hybrid clusters</h4>
                    <p class="text-muted">Deploy clusters that span multiple Clouds with automatic VPN / SSH tunnels management.</p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <!--<i class="fa fa-money fa-stack-1x fa-inverse"></i>-->
                        <i class="icon-aws" style="color:white"></i>
                    </span>
                    <h4 class="service-heading text-muted-contact">Cost-Aware</h4>
                    <p class="text-muted">Leverage <a href="http://aws.amazon.com/en/ec2/purchasing-options/spot-instances/" target="_blank">Spot Instances</a> to cut down costs, featuring automatic checkpointing/restart of applications.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-cloud fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading text-muted-contact">Cloud Agnostic</h4>
                    <p class="text-muted">Supercharged with the <a href="http://www.grycap.upv.es/im" target="_blank">Infrastructure Manager (IM)</a> to deploy customized clusters on your favourite Clouds.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <!--<i class="fa fa-file-code-o fa-stack-1x fa-inverse"></i>-->
                        <i class="icon-python" style="color:white"></i>
                    </span>
                    <h4 class="service-heading text-muted-contact">Python-powered strength</h4>
                    <p class="text-muted">Proudly developed in <a href="https://www.python.org/" target="_blank">Python</a> and distributed as open-source under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache 2.0 License</a>.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- More info Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Deploy a virtual elastic cluster in minutes</h2>
                    <h3 class="section-subheading text-muted">No registration is required. You only need valid user credentials to access the EGI resources.<br> This service is offered at no additional cost.</h3>
               </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <!--<a href="doc/index.html">-->
                        <!--<a href="http://ec3.readthedocs.org/en/latest/" target="_blank">-->
                        <a href="http://ec3.readthedocs.org/en/ltos/" target="_blank">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                        </a>
                    </span>
                    <h4 class="service-heading">EC3 Documentation</h4>
                    <p class="text-muted">Check the docs to understand how the cluster will be provisioned.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <a href="https://github.com/grycap/ec3">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                        </a>
                    </span>
                    <h4 class="service-heading">EC3 @ GitHub </h4>
                    <p class="text-muted">Fully open-source (Apache 2 License). Contributions are very much welcome. </p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <a href="https://www.youtube.com/channel/UCQD6RJBs57Giz4Xm8dhDczQ">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
                        </a>
                    </span>
                    <h4 class="service-heading">EC3 @ YouTube</h4>
                    <p class="text-muted">Stay tuned for upcoming tutorials.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Provider Section -->
    <section id="try" class="bg-darkest-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Manage your clusters deployed with EC3</h2>
                    <h3 class="section-subheading text-muted-contact">Wanted to deploy a hybrid cluster? You can do it with the <a href="https://github.com/grycap/ec3">CLI</a>.
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="team-member">
                        <button id="open-wizard-deploy" class="btn btn-primary btn-fedcloud" onclick="ga('send','event','Providers','EGI FedCloud')"></button>
                        <h4 class="provider">Deploy your cluster</h4>
                        <p class="text-muted-contact">In the European Federated Cloud</p>
                        <a href="http://www.egi.eu/news-and-media/newsletters/Inspired_Issue_22/Custom_elastic_clusters_to_manage_Galaxy_environments.html" target="_blank">(See a case study here)</a>.
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="team-member">
                        <!--<button id="open-wizard-list" class="btn btn-primary btn-list"></button>-->
                        <button id="myBtn" class="btn btn-primary btn-list"></button>
                        <h4 class="provider">Manage your deployed clusters</h4>
                        <p class="text-muted-contact">And get info about them</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Organizations Aside -->
    <aside class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <a href="http://www.grycap.upv.es/">
                        <img src="img/logos/grycap.png" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="http://www.i3m.upv.es/">
                        <img src="img/logos/i3m.png" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="http://www.upv.es/index-es.html">
                        <img src="img/logos/upv.png" class="img-responsive img-centered" alt="">
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading-contact text-muted-contact">In case of problems, please send a request for support at: <a href="mailto:services@eosc-synergy.eu">services@eosc-synergy.eu</a> </h3>
					<!--<h3 class="section-subheading-contact text-muted-contact">The request will generate a GGUS ticket to track your problem.</h3>-->
					<h3 class="section-subheading-contact text-muted-contact">Anytime the user will be notified by e-mail about the status of his/her request.</h3>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
					<a href="terms.html">Terms of Service</a>
                </div>	
                <div class="col-md-12">
                    <span class="copyright"><img src="img/EGI_Logo.png" border="0" width="30" align="bottom"/> EC3 is an EGI service provided by <a href="http://www.grycap.upv.es">GRyCAP-I3M-UPV</a> under the <a href="https://www.eosc-synergy.eu/">EOSC-Synergy</a> project. Copyright &copy; 2020, <a href="http://www.upv.es">Universitat Politècnica de València.</a> 
                      <br>

                    </span>
                </div>
                <div class="col-md-12">
                        <p>
                            Tel: (+34) 963 87 70 07  Ext. 88254 <br />
                            Camino de Vera Road, Building 8B, Door N, 1st Floor, <br />
                            Valencia 46022, Spain
                        </p>
                </div>
                <!--<img src="img/EGI_Logo.png" border="0" width="30" align="bottom"/> EC3 is an EGI service provided by GRyCAP UPV-->
            </div>
        </div>
    </footer>

        
        <!-- Wizard Fedcloud section -->
        <div class="wizard" id="fedcloud-wizard" name="fedcloud-wizard" data-title="Configure your cluster">

            <!-- Step 1 Software packages -->
            <div class="wizard-card wizard-card-overlay" data-cardname="swpkg-fedcloud">
                <h3>Cluster configuration</h3>

                <div class="wizard-input-section">
                    <p>
                        Please choose the LRMS (Local Resource Management System) of your cluster
                    </p>
                    <select name="lrms-fedcloud" id="lrms-fedcloud" data-placeholder="--Select one--" style="width:350px;" class="chzn-select form-control" data-validate="drop_down_validation">
                        <option value=""></option>
                        <option value="slurm">SLURM</option>
                        <option value="torque">Torque</option>
                        <!--<option value="sge">SGE</option>-->
                        <option value="mesos">Mesos + Marathon + Chronos</option>
                        <option value="kubernetes">Kubernetes</option>
                        <option value="oscar">OSCAR</option>
                        <option value="oscar-latest">OSCAR-latest</option>
                        <option value="ophidia">ECAS</option>
                        <option value="nomad">Nomad</option>
                    </select>
                </div>
                
                <div class="wizard-input-section" style="padding-left:0px; margin-right:80px;">
                        <p> Kubernetes access token: </p>
                        <input type="text" class="form-control" id="kube_token" name="kube_token" placeholder="Kubernetes token" disabled>
                </div>
                
                <div class="wizard-input-section">
                    <p>
                        Please choose the software packages you'd like EC3 to
                        install in your cluster. It will be automatically installed and configured.
                    </p>

                    <div class="fedcloud col-sm-12">
                        <!--<p style="margin-bottom:0px; margin-top:5px;">Cluster utilities:</p>-->
                        <!--<div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="clues" name="clues" id="clues" title="Cluster Energy Saving System, necessary if you want an elastic cluster" checked=true/> CLUES </div>
                            <div class="col-sm-4"><input type="checkbox" value="nfs" name="nfs" id="nfs" title="Configure a shared file system"/> NFS </div>
                            <div class="col-sm-4"><input type="checkbox" value="docker" name="docker" id="docker" title="An open-source tool to deploy applications inside software containers"/> Docker </div>
                            <div class="col-sm-4"><input type="checkbox" value="openvpn" name="openvpn" id="openvpn" title="Application that implements virtual private network (VPN) techniques"/> OpenVPN </div>
                        </div>-->
                        <!--<div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="marathon" name="marathon" id="marathon" title="A job scheduler for Mesos tasks (framework for Mesos)"/> Marathon </div>
                            <div class="col-sm-4"><input type="checkbox" value="chronos" name="chronos" id="chronos" title="A batch job scheduler for Mesos tasks (framework for Mesos)"/> Chronos </div>
                        </div>-->
                        <!--<div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="ckptman" name="ckptman" id="ckptman" title="A tool to automate the checkpointing in spot instances"/> Ckptman </div>
                            <div class="col-sm-4"><input type="checkbox" value="munge" name="munge" id="munge" title="An authentication service for creating and validating credentials"/> Munge </div>
                            <div class="col-sm-4"><input type="checkbox" value="maui" name="maui" id="maui" title="A job scheduler for use with Torque"/> Maui </div>
                        </div>-->
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="octave" name="octave" id="octave" title="A high-level programming language, primarily intended for numerical computations"/> Octave </div>
                            <div class="col-sm-4"><input type="checkbox" value="gnuplot" name="gnuplot" id="gnuplot" title="A program to generate two- and three-dimensional plots"/> Gnuplot </div>
                            <div class="col-sm-4"><input type="checkbox" value="namd" name="namd" id="namd" title="A parallel, object-oriented molecular dynamics code designed for high-performance simulation of large biomolecular systems"/> Namd </div>
                            <!--<div class="col-sm-4"><input type="checkbox" value="tomcat" name="tomcat" id="tomcat" title="An open-source web server and servlet container"/> Tomcat </div>-->
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="galaxy" name="galaxy" id="galaxy" title="Web-based platform for data intensive biomedical research. Only available with SLURM clusters." disabled/> Galaxy </div>
                            <div class="col-sm-3"><input type="checkbox" value="spark" name="spark" id="spark" title="A unified analytics engine for large-scale data processing"/> Spark </div>
                            <div class="col-sm-5"><input type="checkbox" value="extra_hd" name="extra_hd" id="extra_hd" title="Add a 100GB Extra HD to the cluster"/> 100GB Extra HD</div>
                            <!--<div class="col-sm-4"><input type="checkbox" value="hadoop" name="hadoop" id="hadoop" title="A framework that allows for the distributed processing of large data sets across clusters of computers using simple programming models"/> Hadoop </div>-->
                            <!--<div class="col-sm-4"><input type="checkbox" value="galaxy-tools" name="galaxy-tools" id="galaxy-tools" title="Web-based platform for data intensive biomedical research"/> Galaxy tools </div>-->
                            <!--<div class="col-sm-4"><input type="checkbox" value="sshtunnels" name="sshtunnels" id="sshtun" title="Used to interconnect working nodes in an hybrid cloud scenario"/> SSH tunnels </div>-->
                        </div>
                        <!--<p style="margin-bottom:0px; margin-top:10px;">Software utilities:</p>-->
                    </div>
                </div>
                
                <p style="padding-top:55px;">Is your favourite software not available? <a href="mailto:ec3@upv.es?Subject=[EC3]%20Unsupported%20Software" target="_top">Let us know!</a></p>
            </div>


            <!-- Step 2 Cloud provider credentials -->
            <div class="wizard-card" data-cardname="provider-fedcloud">
                <h3>Endpoint</h3>
                <div class="wizard-input-section">
                    <p>
                        FedCloud endpoint:
                    </p>
                    <div class="form-group" style="height:250px;">
                        <div class="col-sm-8" style="width:350px; height:240px;">
                            <!--<p> Loading options from EGI AppDB... </p>-->
                            <!--<input type="text" class="form-control" id="endpoint-fedcloud" name="endpoint-fedcloud" placeholder="endpoint" data-validate="validateValue">-->
                            <select name="endpoint-fedcloud" id="endpoint-fedcloud" data-placeholder="Loading options from EGI AppDB..." style="width:350px;" class="chzn-select form-control" data-validate="drop_down_validation">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            
            <!-- Step 3 - Operating System -->
            <div class="wizard-card wizard-card-overlay" data-cardname="os-fedcloud">
                <h3>Operating System</h3>

                <div class="wizard-input-section">
                    <p>
                        What OS distribution do you like your cluster to have? 
                    </p>
                    </br>
                    <div class="form-group" style="height:250px;">
                        <div class="col-sm-6" style="width:350px; height:250px;" name="vmifedcloud" id="vmifedcloud">
                            <p> Loading options from EGI AppDB... </p>
                            <!--<select name="vmi-fedcloud" id="vmi-fedcloud" data-placeholder="--Select one--" style="width:350px; height:250px;" class="chzn-select form-control" data-validate="drop_down_validation">
                            </select>-->
                            <!--<input type="text" class="form-control" id="vmi-fedcloud" name="vmi-fedcloud" placeholder="VMI identifier" data-validate="validateValue">-->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4 instance characteristics -->
            <div class="wizard-card" data-cardname="instance-details">
                <h3>Instance details</h3>
                <div class="wizard-input-section">
                    <p>Front-end instance type:</p>
                    <div class="form-group" style="height:30px;">
                        <div class="col-sm-6" style="width:350px; height:30px;" name="frontfedcloud" id="frontfedcloud">
                            <p> Loading options from EGI AppDB... </p>
                            <!--<input type="text" class="form-control" id="front-type" name="front-type" placeholder="frontend instance type" data-validate="validateValue">-->
                            <!--<select name="front-type" id="front-type" data-placeholder="--Select one--" style="width:350px; height:50px;" class="chzn-select form-control" data-validate="drop_down_validation">
                                <option value=""></option>
                            </select>-->
                        </div>
                    </div>
                </div>
                <div class="wizard-input-section">
                    <p>
                        Working nodes instance type:
                    </p>
                    <div class="form-group" style="height:100px;">
                        <div class="col-sm-6" style="width:350px; height:100px;" name="wnfedcloud" id="wnfedcloud">
                            <p> Loading options from EGI AppDB... </p>
                            <!--<input type="text" class="form-control" id="wn-type" name="wn-type" placeholder="WN instance type" data-validate="validateValue">-->
                            <!--<select name="wn-type" id="wn-type" data-placeholder="--Select one--" style="width:350px; height:50px;" class="chzn-select form-control" data-validate="drop_down_validation">
                                <option value=""></option>
                            </select>-->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 5 Local Resource Management System -->
            <!--<div class="wizard-card wizard-card-overlay" data-cardname="lrms-fedcloud">
                <h3>LRMS Selection</h3>

                <div class="wizard-input-section">
                    <p>
                        Please choose the LRMS (Local Resource Management System) of your cluster
                    </p>
                    <select name="lrms-fedcloud" id="lrms-fedcloud" data-placeholder="--Select one--" style="width:350px;" class="chzn-select form-control" data-validate="drop_down_validation">
                        <option value=""></option>
                        <option>SLURM</option>
                        <option>Torque</option>
                        <option>SGE</option>
                        <option>Mesos</option>
                        <option>Kubernetes</option>
                        <option>OSCAR</option>
                        <option>OSCAR-latest</option>
                    </select>
                </div>
            </div>-->

            <!-- Step 6 Cluster's size -->
            <div class="wizard-card wizard-card-overlay" data-cardname="size-fedcloud">
                <h3>Cluster's size & Name</h3>

                <div class="wizard-input-section">
                    <p>
                        Introduce the maximum number of nodes of your cluster (without including the front-end node).
                    </p>
                    <p style="font-size:12px"> <em>
                        Note that EC3 will initially provision only the front-end node and it will dynamically deploy additional working nodes as necessary. </em>
                    </p>
                    </br>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <select type="text" class="form-control" id="nodes-fedcloud" name="nodes-fedcloud" placeholder="number of nodes" data-validate="validateNumber">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            </select>
                        </div>
                        
                       <div class="col-sm-8">
                            </br>
                            <p> Cluster name (must be unique and without spaces): </p>
                            <input type="text" class="form-control" id="cluster-name" name="cluster-name" placeholder="Cluster name" data-validate="validateValue">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 7 Resume and launch -->
            <div class="wizard-card" data-cardname="resume-fedcloud" data-onSelected="showDetails_OCCI">
                <h3>Resume and launch</h3>
                <div>
                    <p>These are the details of your cluster: </p>
                </div>
                <div class="wizard-resume" > <!--onshow="checkSession()"> -->
                </div>

                <div class="wizard-error">
                    <div class="alert alert-error">
                        <strong>There was a problem</strong> with your submission.
                        Please correct the errors and re-submit.
                        </br>
                        </br>
                        <div class="wizard-ip"></div>
                        </br>
                        <a class="btn btn-default create-another-server">Try again</a>
                        <a class="btn btn-primary im-done">Close the wizard</a>
                    </div>
                </div>

                <div class="wizard-failure">
                    <div class="alert alert-error">
                        <strong>There was a problem</strong> submitting the form.
                        Please try again in a minute.
                        </br>
                        <a class="btn btn-default create-another-server">Done</a>
                    </div>
                </div>

                <div class="wizard-success">
                    <div class="alert alert-success">
                        <!--<span class="create-server-name"></span>-->
                        Cluster Front-end deployed <strong>Successfully!</strong>
                    </div>

                    <p> You can now connect to the front-end via SSH using the provided IP. The data of your cluster is: </p>
                    <div class="wizard-ip">
                        <p><strong>aqui.va.la.IP</strong></p>
                    </div>
                    </br>
                    <p> Notice that the cluster might still be configuring! <a href="http://ec3.readthedocs.org/en/devel/faq.html#ec3aas-webpage" target="_blank">More info.</a> </p>
                    </br>
                    <a class="btn btn-default create-another-server" onclick="reload()">Create another cluster</a>
                    <span style="padding:0 10px">or</span>
                    <a class="btn btn-success im-done" onclick="reload()">Done</a>
                </div>
            </div>
        </div>

        <!-- End of wizard FedCloud section -->


        <!-- Wizard Delete section -->
        <div class="wizard" id="delete-wizard" name="delete-wizard" data-title="Destroy your cluster">
            <!-- Step 1 - obtain the name of the cluster -->
            <div class="wizard-card" data-cardname="cluster-id" data-onValidated="setClusterName">
                <h3>Destroy the cluster</h3>
                <div class="wizard-input-section">
                    <p> Please, introduce the unique name of the cluster provided in the deployment process: </p>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="clustername" name="clustername" placeholder="Cluster name" data-validate="validateValue">
                        </div>
                    </div>
                </div>

                <div class="wizard-error">
                    <div class="alert alert-error">
                        <strong>There was a problem</strong> deleting your cluster.
                        Please, correct the name and try again or shutdown your virtual machines manually.
                        </br>
                        </br>
                        <div class="wizard-delete"></div>
                        </br>
                        <a class="btn btn-default create-another-server">Try again</a>
                        <a class="btn btn-primary im-done">Close the wizard</a>
                    </div>
                </div>

                <div class="wizard-failure">
                    <div class="alert alert-error">
                        <strong>There was a problem</strong> submitting the form.
                        Please try again in a minute.
                        </br>
                        <a class="btn btn-primary im-done">Close the wizard</a>
                    </div>
                </div>

                <div class="wizard-success">
                    <div class="alert alert-success">
                        Cluster <strong class="create-cluster-name"></strong> deleted <strong>successfully!</strong>
                    </div>
                    </br>
                    </br>
                    <a class="btn btn-default create-another-server">Delete another cluster</a>
                    <span style="padding:0 10px">or</span>
                    <a class="btn btn-primary im-done">Close the wizard</a>
                </div>
            </div>
        </div>

        <!-- End of wizard Delete section -->

        <!-- The List Modal -->
        <div id="myModal" class="modallist">

          <!-- Modal content -->
          <div class="modallist-content">

            <!-- Header del Modal -->
            <div class="modallist-header">
                  <span class="close">&times;</span>
                  <h2>Details of your deployed clusters</h2>
            </div>

            <!-- Tabla -->
            <div class="wizard-list" style="overflow-x:auto;">
                <p> Loading... </p>
              <!--<table>
                <tr>
                  <th>Cluster name</th>
                  <th>State</th>
                  <th>IP</th>
                  <th>Nodes</th>
                  <th>Action</th>
                </tr>
                <tr>
                  <td>cluster_nfjbsdfa</td>
                  <td>configured</td>
                  <td>158.42.105.22</td>
                  <td>3</td>
                  <td><button>Delete</button></td>
                </tr>
                <tr>
                  <td>cluster_nna84bd</td>
                  <td>unconfigured</td>
                  <td>157.152.4.45</td>
                  <td>1</td>
                  <td><button>Delete</button></td>
                </tr>
                <tr>
                  <td>cluster_pjds33</td>
                  <td>running</td>
                  <td>96.47.62.214</td>
                  <td>0</td>
                  <td><button>Delete</button></td>
                </tr>
              </table>-->
            </div>

                <!-- Footer del Modal -->
            <div class="modallist-footer">
            </div>
          <!--Fin del modal content -->
          </div>
        <!--Fin del modal-->
        </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery-2.0.3.min.js" type="text/javascript"></script>
    <script src="chosen/chosen.jquery.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/prettify.js" type="text/javascript"></script>
    <script src="src/bootstrap-wizard.js" type="text/javascript"></script>


    <!-- Wizard plugin FedCloud -->
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.wizard.logging = true;
                var wizard = $('#fedcloud-wizard').wizard({
                    keyboard : false,
                    contentHeight : 500,
                    contentWidth : 700,
                    backdrop: 'static',
                    submitUrl: "ec3-server-process.php"
                });

                $(".chzn-select").chosen();

                wizard.on('closed', function() {
                    wizard.reset();
                });

                wizard.on("reset", function() {
                    wizard.modal.find(':input').val('').removeAttr('disabled');
                    wizard.modal.find('input:checkbox').val('').removeAttr('checked');
                    wizard.modal.find('.form-group').removeClass('has-error').removeClass('has-succes');
                    wizard.modal.find('.chzn-select').val('').trigger("liszt:updated");
                });

                //http://api.jquery.com/jquery.ajax/
                //Para mostrar la respuesta: http://stackoverflow.com/questions/14918462/get-response-from-php-file-using-ajax
                wizard.on("submit", function(wizard) {
                    var nodes = parseInt($('#nodes-fedcloud').val());
                    //avisar de evento a analytics
                    ga('send','event','Submit','EGI FedCloud');
                    $.ajax({
                            type: "POST",
                            url: wizard.args.submitUrl,
                            /*data: "cloud=fedcloud&" + wizard.serialize()+ "&nodes-fedcloud=" + nodes,*/
                            data: "cloud=fedcloud&endpointName=" + $('#endpoint-fedcloud option:selected').html() + "&" + wizard.serialize()+ "&nodes-fedcloud=" + nodes,
                            dataType: "json",
                            success: function(response, status, data){
                                    wizard.submitSuccess();         // displays the success card
                                    //retValue = "<div> <b> " + JSON.stringify(response) + " </b></div> ";
                                    var obj = jQuery.parseJSON(JSON.stringify(response));
                                    var name = obj.name;
                                    var index = obj.name.indexOf("__");
                                    if (index > -1){
                                        name = obj.name.substring(0, obj.name.indexOf("__"));
                                    }
                                    var retValue = "<div> Cluster name: <b> " + name + " </b></div> <div> Frontend IP: <b> " + obj.ip + " </b></div> <div> Username: <b> " + obj.username + " </b></div>";
                                    retValue += "<div> Secret key: <textarea id='private_key_value' name='private_key_value' style='display:none;'>" + decodeURIComponent(obj.secretkey) + "</textarea>" +
                                    "<a class='download' href='javascript:download(\"private_key_value\", \"key.pem\");'>Download</a> </div>";
                                    $('.wizard-ip').html(retValue);
                                    //$('.wizard-ip').append(retValue).hide().show();
                                    wizard.hideButtons();           // hides the next and back buttons
                                    wizard.updateProgressBar(0);    // sets the progress meter to 0
                            },
                            error: function(response, status, error){
                                    var obj = jQuery.parseJSON(JSON.stringify(response));
                                    var retValue = "<div> <b> " + obj.responseText + " </b></div> ";
                                    //retValue = "<div> <b> " + JSON.stringify(response) + " </b></div> ";
                                    //retValue += "<div> <b> " + JSON.stringify(status) + " </b></div> ";
                                    //retValue += "<div> <b> " + JSON.stringify(error) + " </b></div> ";
                                    $('.wizard-ip').html(retValue);
                                    //$('.wizard-ip').append(retValue).hide().show();
                                    wizard.submitError();           // display the error card
                                    wizard.hideButtons();           // hides the next and back buttons
                            }
                    });
                });

                wizard.el.find(".wizard-success .im-done").click(function() {
                    wizard.hide();
                    setTimeout(function() {
                        wizard.reset();
                    }, 2);
                });

                wizard.el.find(".wizard-success .create-another-server").click(function() {
                    wizard.reset();
                });

                wizard.el.find(".wizard-error .create-another-server").click(function() {
                    wizard.reset();
                });

                wizard.el.find(".wizard-error .im-done").click(function() {
                    wizard.hide();
                    setTimeout(function() {
                        wizard.reset();
                    }, 2);

                });

                wizard.el.find(".wizard-failure .create-another-server").click(function() {
                    wizard.hide();
                    setTimeout(function() {
                        wizard.reset();
                    }, 250);
                });

                $(".wizard-group-list").click(function() {
                    alert("Disabled for demo.");
                });

                $('#open-wizard-deploy').click(function(e) {
                    e.preventDefault();
                    wizard.show();
                    //Send endpoint selected to the server to obtain instance types
                    $.ajax({
                        method: "POST",
                        url: "print_select_endpoints.php",
                        //data:{endpointfedcloud: $('#endpoint-fedcloud').val()},
                        success : function(text)
                        {  
                            $('#endpoint_fedcloud_chzn').hide()
                            $('#endpoint-fedcloud').prop('data-placeholder', "--Select one--");
                            $('#endpoint-fedcloud').append(text).hide().show();
                            //$('#endpoint-fedcloud').html(text);
                        }
                    });
                });
            });

            function download(id, filename) {
                var dataToDownload = document.getElementById(id).value;
                var textFileAsBlob = new Blob([dataToDownload], {type:'text/plain'});
                var link = document.createElement("a");
                link.download = filename;
                window.URL = window.URL || window.webkitURL;
                link.href = window.URL.createObjectURL(textFileAsBlob);
                link.style.display = "none";
                document.body.appendChild(link);
                link.click();
            }

            function validateValue(el) {
                var name = el.val();
                var retValue = {};

                if (name == "") {
                    retValue.status = false;
                    retValue.msg = "Please enter a value";
                } else {
                    retValue.status = true;
                }

                return retValue;
            };

            function validateNumber(el) {
                var number = el.val();
                var retValue = {};

                if (number == "" || !$.isNumeric(number)) {
                    retValue.status = false;
                    retValue.msg = "Please enter an integer value";
                } else {
                    retValue.status = true;
                }

                return retValue;
            };

            $('select#endpoint-fedcloud.chzn-select.form-control').change(function() {
                //Send endpoint selected to the server to obtain OS
                $.ajax({
                    method: "POST",
                    url: "print_select_os.php",
                    /*data:{endpointfedcloud: $('#endpoint-fedcloud').val()},*/
                    data: {endpointfedcloud: $('#endpoint-fedcloud option:selected').html()},
                    success : function(text)
                    {   
                        $('#vmifedcloud').html(text);
                        //$("select#vmi-fedcloud").html(text);
                    }
                });
                //Send endpoint selected to the server to obtain instance types
                $.ajax({
                    method: "POST",
                    url: "print_select_instances.php",
                    /*data:{endpointfedcloud: $('#endpoint-fedcloud').val()},*/
                    data: {endpointfedcloud: $('#endpoint-fedcloud option:selected').html()},
                    success : function(text)
                    {   
                        $('#frontfedcloud').html(text);
                        $('#wnfedcloud').html(text.replace(/front-fedcloud/g, "wn-fedcloud"));
                    }
                });
            });
            
            
            document.getElementById('lrms-fedcloud').onchange = function() {
                var e = document.getElementById("lrms-fedcloud");
                var lrms = e.options[e.selectedIndex].value;
                if (lrms == 'slurm'){
                    document.getElementById('galaxy').disabled= false;
                } else{
                    document.getElementById('galaxy').disabled = true;
                    document.getElementById('galaxy').checked = false;
                }
                
                if (lrms == 'kubernetes'){
                    document.getElementById('kube_token').disabled = false;
                } else{
                    document.getElementById('kube_token').disabled = true;
                }
            };

            function drop_down_validation(el){
                var name = el.val();
                var retValue = {};
                if (name == "") {
                    retValue.status = false;
                    retValue.msg = "Please select a value";
                    //alert("Please select a value");
                    //wizard.errorPopover(el, retValue.msg);
                } else {
                    retValue.status = true;
                }
                return retValue;
            }

            function showDetails_OCCI() {
                var retValue = ' '

                //obtener endpoint
                var endpoint = $('#endpoint-fedcloud').val();
                var endpointName = $('#endpoint-fedcloud option:selected').html();

                //obtener la vmi seleccionada
                var vmi = $('#vmi-fedcloud').val();

                //obtener las caracteristicas de las VMs
                //tipo 2;4096
                var front_type = $('#front-fedcloud').val();
                var front_splitted = front_type.split(";");
                var frontcpu = front_splitted[0];
                var frontmem = front_splitted[1];
                
                var wn_type = $('#wn-fedcloud').val();
                var wn_splitted = wn_type.split(";");
                var wncpu = wn_splitted[0];
                var wnmem = wn_splitted[1];

                //obtener el LRMS seleccionado
                var lrms = $('#lrms-fedcloud').val();
                
                //obtener (si es el caso) el token de kubernetes
                var kubeToken = $('#kube_token').val();

                //obtener el SW
                var sw = '';
                //if( $('.fedcloud.col-sm-12 #clues').prop('checked') ) sw += "CLUES ";
                //if( $('.fedcloud.col-sm-12 #blcr').prop('checked') ) sw += "BLCR ";
                if( $('.fedcloud.col-sm-12 #nfs').prop('checked') ) sw += "NFS ";
                //if( $('.fedcloud.col-sm-12 #ckptman').prop('checked') ) sw += "ckptman ";
                //if( $('.fedcloud.col-sm-12 #munge').prop('checked') ) sw += "Munge ";
                //if( $('.fedcloud.col-sm-12 #maui').prop('checked') ) sw += "Maui ";
                if( $('.fedcloud.col-sm-12 #openvpn').prop('checked') ) sw += "OpenVPN ";
                if( $('.fedcloud.col-sm-12 #galaxy').prop('checked') ) sw += "Galaxy ";
                if( $('.fedcloud.col-sm-12 #extra_hd').prop('checked') ) sw += "100GB Extra HD ";
                //if( $('.fedcloud.col-sm-12 #galaxy-tools').prop('checked') ) sw += "Galaxy-tools";
                //if( $('.fedcloud.col-sm-12 #sshtun').prop('checked') ) sw += "SSH tunnels ";
                if( $('.fedcloud.col-sm-12 #octave').prop('checked') ) sw += "Octave ";
                if( $('.fedcloud.col-sm-12 #docker').prop('checked') ) sw += "Docker ";
                if( $('.fedcloud.col-sm-12 #gnuplot').prop('checked') ) sw += "Gnuplot ";
                if( $('.fedcloud.col-sm-12 #tomcat').prop('checked') ) sw += "Tomcat ";
                if( $('.fedcloud.col-sm-12 #marathon').prop('checked') ) sw += "Marathon ";
                if( $('.fedcloud.col-sm-12 #chronos').prop('checked') ) sw += "Chronos ";
                if( $('.fedcloud.col-sm-12 #hadoop').prop('checked') ) sw += "Hadoop ";
                if( $('.fedcloud.col-sm-12 #namd').prop('checked') ) sw += "Namd";

                if (sw == ''){
                    sw +="Nothing selected";
                }

                if (lrms == ''){
                    lrms +="nothing selected";
                }
                
                if (lrms == 'mesos'){
                    lrms = "Mesos + Marathon + Chronos"
                }
                    
                //obtener el numero de nodos
                var nodes = parseInt($('#nodes-fedcloud').val());
                
                //obtener el nombre del cluster
                var clustername = $('#cluster-name').val();

                retValue = "<div><b>Endpoint: </b>" + endpointName + "</div>";

                if(vmi != ''){
                    retValue += "<div> <b> VMI: </b>" + vmi + "</div>";
                } else {
                    retValue += "<div> <b>VMI: </b> nothing indicated</div>";
                }
                

                retValue +="<div> <b>Frontend instance type: </b>" + frontcpu  + " CPU, " + frontmem + "mb RAM" + "</div>" +
                           "<div> <b>Working nodes instance type: </b>" + wncpu + " CPU, " + wnmem + "mb RAM"+ "</div>" +
                           "<div> <b>Local Resource Management System: </b>" + lrms + "</div>" +
                           "<div> <b>Software packages: </b>" + sw + "</div>" +
                           "<div> <b>Maximum number of nodes: </b>" + nodes + "</div>" +
                           "<div> <b>Cluster name: </b>" + clustername.replace(/\s/g, '_') + "</div>";
                
                if(kubeToken != ''){
                    retValue += "<div> <b> Kubernetes token: </b>" + kubeToken + "</div>";
                } 

                //Mostramos los datos recogidos al usuario
                //$('.wizard-resume').append(retValue);
                $('.wizard-resume').html(retValue);
            };
            
            function reload() {
                location.reload(true);
            };

        </script>

     
    <!-- Modal box to list clusters -->
        <script type="text/javascript">

        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
            list();
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function list(){
            $.ajax({
                    type: "POST",
                    url: "ec3-list-clusters.php",
                    data: "list=list",
                    dataType: "json",
                    success: function(response, status, data){
                            var obj = jQuery.parseJSON(JSON.stringify(response));
                            //retValue = "<div> <b> " + obj.responseText + " </b></div> ";
                            var retValue = "<p><i>Notice that if you destroy the cluster, this might take 15-30 seconds, please, wait for the response of the portal. </i></p>"
                            retValue += "<table> <tr> <th>Cluster name</th> <th>State</th> <th>IP</th> <th>Nodes</th> <th>Provider</th> <th>SSH key</th> <th>Ctxt Log</th> <th>Action</th> </tr>";
                            if (obj.length == 0) {
                                retValue += "<tr> <td colspan=6>No clusters available for this user.</td> </tr>";
                            }
                            for (var i = 0; i < obj.length; i++){
                                var name = obj[i].name;
                                var index = obj[i].name.indexOf("__");
                                if (index > -1){
                                    name = obj[i].name.substring(0, obj[i].name.indexOf("__"));
                                }
                                retValue += "<tr>";
                                retValue += "<td> " + name + " </th> ";
                                retValue += "<td> " + obj[i].state + " </th> ";
                                retValue += "<td> " + obj[i].IP + " </th> ";
                                retValue += "<td> " + obj[i].nodes + " </th> ";
                                var provider = obj[i].provider;
                                if (provider == "OCCI"){
                                    provider = "EGI Fedcloud";
                                } else if (provider =="OpenStack"){
                                    provider = "EGI Fedcloud";
                                } else{
                                    provider = "Exoscale";
                                }
                                retValue += "<td> " + provider + " </th> ";
                                retValue += "<td><a class=\"btn btn-ssh\" id=\"ssh_"+ obj[i].name + "\" href=\"ec3-ssh-key.php?clustername=" + obj[i].name + "\">Download</a></td>";
                                retValue += "<td><a class=\"btn btn-ssh\" href=\"ec3-log-clusters.php?cluster=" + name + "\" target=\"_blank\">See</a></td>";
                                retValue += "<td><button class=\"btn btn-deleting\" id=\"delete_"+ obj[i].name + "\" onclick=\"deleteCluster(this, '"+ obj[i].name + "', '" + obj[i].provider + "')\">Delete</button></td>";
                                retValue += "</tr>";
                            }
                            retValue += "</table>"
                            $('.wizard-list').html(retValue); // display list information
                    },
                    error: function(response, status, error){
                            var obj = jQuery.parseJSON(JSON.stringify(response));
                            var retValue = "<div> <b> ERROR: " + obj.responseText + " </b></div> ";
                            //retValue = "<div> <b> " + JSON.stringify(response) + " </b></div> ";
                            //retValue += "<div> <b> " + JSON.stringify(status) + " </b></div> ";
                            //retValue += "<div> <b> " + JSON.stringify(error) + " </b></div> ";                              
                            $('.wizard-list').html(retValue);
                    }
            });
        };
            
        function deleteCluster(button, name, provider){
            button.textContent = "Deleting...";
            button.disabled = true;

            var shortname = name;
            var index = name.indexOf("__");
            if (index > -1){
                shortname = name.substring(0, name.indexOf("__"));
            }
          
            $.ajax({
                    type: "POST",
                    url: "ec3-destroy-cluster.php",
                    data: "clustername=" + name + "&provider=" + provider,  
                    dataType: "json",
                    success: function(response, status, data){
                        //$('.wizard-delete').html(retValue); // display list information
                        //sleep(2000);
                        list();
                        alert('Cluster ' + shortname + ' succesfully deleted!')
                    },
                    error: function(response, status, error){
                            var obj = jQuery.parseJSON(JSON.stringify(response));
                            //retValue = "<div> <b> " + obj.responseText + " </b></div> ";
                            //retValue = "<div> <b> " + JSON.stringify(response) + " </b></div> ";
                            //$('.wizard-delete').html(retValue);
                            //sleep(2000);
                            list();
                            //alert(obj.responseText);        
                            alert('Found problems deleting cluster ' + shortname + '. Try again, if the error persists, contact us.')
                    }
            });   
        };
         

        function sleep(milliseconds) {
          var start = new Date().getTime();
          for (var i = 0; i < 1e7; i++) {
            if ((new Date().getTime() - start) > milliseconds){
              break;
            }
          }
        }

        </script> 

		
    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

    <!-- Logout behaviour -->
    <script>

    // Get the logout button 
    var btn = document.getElementById("logout");

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        //Operacion de logout, que tiene que llamar en el servidor a "session_destroy()"
        //http://stackoverflow.com/questions/23126582/destroy-php-session-in-javascript-function
        //http://stackoverflow.com/questions/24923413/how-to-clear-a-php-session-using-jquery-javascript
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'logout.php', true);
        /*xmlhttp.onreadystatechange=function(){
           if (xmlhttp.readyState == 4){
              if(xmlhttp.status == 200){
                 alert(xmlhttp.responseText);
             }
           }
        };*/
        xhr.send();
        redirection();
        //alert('Goodbye!')
    }
    
    function redirection(){  
        window.location ="https://www.eosc-synergy.eu/";
    }
    </script>

</body>

</html>
