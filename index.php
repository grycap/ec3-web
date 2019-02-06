<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="EC3 try-it page">
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
                  <div class="intro-lead-in">Cluster as a Service</div>
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
                    <h3 class="section-subheading text-muted">No registration is required. You only need valid user credentials for the Cloud. Pay only for the resources consumed.<br> This service is offered at no additional cost.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <!--<a href="doc/index.html">-->
                        <!--<a href="http://ec3.readthedocs.org/en/latest/" target="_blank">-->
                        <a href="http://ec3.readthedocs.org/en/devel/" target="_blank">
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
                    <p class="text-muted">Find tutorials about EC3 (AWS, Galaxy,...). Stay tuned for upcoming tutorials.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Provider Section -->
    <section id="try" class="bg-darkest-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Where do you want to deploy the cluster?</h2>
                    <h3 class="section-subheading text-muted-contact">You will need to provide valid credentials for the Cloud provider. Not sure if this is safe? <a <a href="http://ec3.readthedocs.org/en/devel/ec3.html#authorization-file">Check the docs.</a>
                      <br>
                      Wanted to deploy a hybrid cluster? You can do it with the <a href="https://github.com/grycap/ec3">CLI</a>.
                      <!--</br>
                      Is your favourite provider not available below? <a href="http://servproject.i3m.upv.es/ec3/doc/faq.html#general-faqs">Check supported providers</a>.-->
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="team-member">
                        <button id="open-wizard" class="btn btn-primary btn-ec2" onclick="ga('send','event','Providers','Amazon Web Services')"></button>
                        <!--<img src="img/provider/aws1.png" class="img-thumbnail" alt="">-->
                        <h4 class="provider">Amazon Web Services</h4>
                        <p class="text-muted-contact">Public Cloud provider</p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="team-member">
                        <button id="open-wizard-2" class="btn btn-primary btn-one" onclick="ga('send','event','Providers','OpenNebula')"></button>
                        <!--<img src="img/provider/one1.jpg" class="img-thumbnail" alt="">-->
                        <h4 class="provider">OpenNebula</h4>
                        <p class="text-muted-contact">On-premises Cloud provider</p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="team-member">
                        <button id="open-wizard-3" class="btn btn-primary btn-openstack" onclick="ga('send','event','Providers','OpenStack')"></button>
                        <!--<img src="img/provider/openstack1.png" class="img-thumbnail" alt="">-->
                        <h4 class="provider">OpenStack</h4>
                        <p class="text-muted-contact">On-premises Cloud provider</p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="team-member">
                        <button id="open-wizard-4" class="btn btn-primary btn-fedcloud" onclick="ga('send','event','Providers','EGI FedCloud')"></button>
                        <!--<img src="img/provider/fedcloud1.png" class="img-thumbnail" alt="">-->
                        <h4 class="provider">EGI FedCloud</h4>
                        <p class="text-muted-contact">European Federated Cloud</p>
                        <a href="http://www.egi.eu/news-and-media/newsletters/Inspired_Issue_22/Custom_elastic_clusters_to_manage_Galaxy_environments.html" target="_blank">(See a case study here)</a>.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h3 class="section-subheading text-muted-contact" style="margin-bottom:10px">
                    Is your favourite provider not available above? <a href="http://ec3.readthedocs.org/en/devel/faq.html">Check supported providers</a>.
                    </h3>
                </div>
            </div>
            <!--<div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">More providers coming soon. Stay tuned.</p>
                </div>
            </div>-->
            <!-- Delete a cluster section -->
            <div class="row">
                <div class="col-sm-1 text-center">
                    <span class="fa-4x">
                        <a id="open-wizard-delete" href="#">
                            <!--<i class="fa fa-circle fa-stack-2x text-primary"></i>-->
                            <i class="fa fa-trash-o fa-stack-5x fa-inverse"></i>
                        </a>
                    </span>
                </div>
                <div class="col-sm-3 text-left">
                    </br>
                    </br>
                        <p class="text-muted-contact">Delete your cluster </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Organizations Aside -->
    <aside class="clients">
        <div class="container">
            <div class="row">
                <!--<div class="col-lg-12 text-center">
                    <h4 class="service-heading">EC3 has been developed by:</h4>
                </div>-->
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
                    <h3 class="section-subheading text-muted-contact">Got problems? Is your favourite OS/software package still not available? Do you have any suggestions? Please, let us know.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" name = "name" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" name="email" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Institution *" name="institution" id="institution" required data-validation-required-message="Please enter your institution.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" name="message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
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
                    <!--<span class="copyright">&copy; Grid and High Performance Computing Group (<a href="http://www.grycap.upv.es" target="_blank">GRyCAP</a>) / Universitat Politècnica de València (<a href="http://www.upv.es" target="_blank">UPV</a>) - 2015
                      <br>

                    </span>-->

                    <span class="copyright">Copyright &copy; 2015, <a href="http://www.grycap.upv.es">GRyCAP-I3M-UPV</a>, <a href="http://www.upv.es">Universitat Politècnica de València</a> - 46022, Valencia, Spain
                      <br>

                    </span>
                </div>

                <div class="col-md-12">
                        <p>
                            Tel: (+34) 963 87 70 07  Ext. 88254 <br />
                            Camino de Vera Road, Building 8B, Door N, 1st Floor, <br />
                            Valencia City, Valencia 46022
                        </p>
                </div>
                <!--<div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                -->
                <!--<div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
                -->
            </div>
        </div>
    </footer>

    <!-- Wizard EC2 section -->
        <div class="wizard" id="ec2-wizard" data-title="Configure your cluster">

            <!-- Step 1 Cloud provider credentials -->
            <div class="wizard-card" data-cardname="provider-ec2">
                <h3>Provider Account</h3>

                <div class="wizard-input-section">
                    <p>
                        Access Key ID:
                    </p>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="accesskey" name="accesskey" placeholder="access key" data-validate="validateAccessKeyValue">
                        </div>
                    </div>
                </div>

                <div class="wizard-input-section">
                    <p>
                        Secret Access Key:
                    </p>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="secretkey" name="secretkey" placeholder="secret key" data-validate="validateSecretKeyValue">
                        </div>
                    </div>
                </div>
                </br>
                </br>
                </br>
                </br>
                <a href="http://aws.amazon.com/es/documentation/iam/" target="_blank">What is IAM?</a>
            </div>

            <!-- Step 2 Operating System -->
            <div class="wizard-card wizard-card-overlay" data-cardname="os-ec2">
                <h3>Operating System</h3>
                <div class="wizard-input-section">
                    <p>
                        Choose the OS distribution for the cluster:
                    </p>
                    <!--<div class="form-group">-->
                    <select name="os-ec2" id="os-ec2" data-placeholder="--Select one--" style="width:350px;" class="chzn-select form-control" data-validate="">
                        <option value=""></option>
                        <optgroup label="Linux">
                            <option>CentOS 6.5</option>
                            <!--<option>CentOS 7</option>-->
                            <!--<option>Ubuntu 12.04</option>-->
                            <option>Ubuntu 14.04</option>
                        </optgroup>
                    </select>
                    <!--</div>-->
                </div>

                <div class="wizard-input-section">
                    <p>
                        Alternatively, you can provide an AMI ID and the username (root/ubuntu/ec2-user/core):
                    </p>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="ami" name="ami" placeholder="AMI identifier" data-validate="">
                    </div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="ami-user" name="ami-user" placeholder="AMI username" data-validate="">
                    </div>
                    </br>
                    </br>
                </div>

                <div class="wizard-input-section">
                    <p>
                        If an AMI is provided, please, choose the region where the AMI is available. You can find this information in the <a target="_blank" href="https://aws.amazon.com/marketplace">AWS Marketplace</a>:
                    </p>
                    <select name="region" id="region" data-placeholder="--Select a region--" style="width:150px;" class="chzn-select form-control" data-validate="">
                        <option value=""></option>
                        <optgroup label="America">
                            <option>us-east-1</option>
                            <option>us-west-1</option>
                            <option>us-west-2</option>
                            <option>sa-east-1</option>
                        </optgroup>
                        <optgroup label="Asia Pacific">
                            <option>ap-northeast-1</option>
                            <option>ap-southeast-1</option>
                            <option>ap-southeast-2</option>
                        </optgroup>
                        <optgroup label="Europe">
                            <option>eu-central-1</option>
                            <option>eu-west-1</option>
                        </optgroup>
                    </select>
                </div>
            </div>

            <!-- Step 3 Instance type -->
            <div class="wizard-card wizard-card-overlay" data-cardname="instance-type-ec2">
                <h3>Instance type</h3>
                <div class="wizard-input-section">
                    <p>
                        Choose the instance type of the front-end of the cluster:
                    </p>
                    <select name="instance-type-front" id="instance-type-front" data-placeholder="--Select one--" style="width:350px;" class="chzn-select form-control" data-validate="drop_down_validation">
                        <option value=""></option>
                        <optgroup label="T1">
                            <option>t1.micro</option>
                        </optgroup>
                        <optgroup label="T2">
                            <option>t2.micro</option>
                            <option>t2.small</option>
                            <option>t2.medium</option>
                        </optgroup>
                        <optgroup label="M1">
                            <option>m1.small</option>
                            <option>m1.medium</option>
                            <option>m1.large</option>
                            <option>m1.xlarge</option>
                        </optgroup>
                        <optgroup label="M2">
                            <option>m2.xlarge</option>
                            <option>m2.2xlarge</option>
                            <option>m2.4xlarge</option>
                            <option>cr1.8xlarge</option>
                        </optgroup>
                        <optgroup label="M3">
                            <option>m3.medium</option>
                            <option>m3.large</option>
                            <option>m3.xlarge</option>
                            <option>m3.2xlarge</option>
                        </optgroup>
                        <optgroup label="C1">
                            <option>c1.medium</option>
                            <option>c1.xlarge</option>
                            <option>cc2.8xlarge</option>
                        </optgroup>
                        <optgroup label="C3">
                            <option>c3.large</option>
                            <option>c3.xlarge</option>
                            <option>c3.2xlarge</option>
                            <option>c3.4xlarge</option>
                            <option>c3.8xlarge</option>
                        </optgroup>
                        <optgroup label="C4">
                            <option>c4.large</option>
                            <option>c4.xlarge</option>
                            <option>c4.2xlarge</option>
                            <option>c4.4xlarge</option>
                            <option>c4.8xlarge</option>
                        </optgroup>
                        <optgroup label="G1-GPU">
                            <option>cg1.4xlarge</option>
                        </optgroup>
                        <optgroup label="HI1">
                            <option>hi1.4xlarge</option>
                        </optgroup>
                        <optgroup label="HS1">
                            <option>hs1.8xlarge</option>
                        </optgroup>
                        <optgroup label="R3">
                            <option>r3.large</option>
                            <option>r3.xlarge</option>
                            <option>r3.2xlarge</option>
                            <option>r3.4xlarge</option>
                            <option>r3.8xlarge</option>
                        </optgroup>
                        <optgroup label="G2-GPU">
                            <option>g2.2xlarge</option>
                            <option>g2.8xlarge</option>
                        </optgroup>
                        <optgroup label="I2">
                            <option>i2.xlarge</option>
                            <option>i2.2xlarge</option>
                            <option>i2.4xlarge</option>
                            <option>i2.8xlarge</option>
                        </optgroup>
                        <optgroup label="D2">
                            <option>d2.xlarge</option>
                            <option>d2.2xlarge</option>
                            <option>d2.4xlarge</option>
                            <option>d2.8xlarge</option>
                        </optgroup>
                    </select>
                </div>
                <div class="wizard-input-section">
                    <p>
                        Choose the instance type of the working nodes of the cluster:
                    </p>
                    <select name="instance-type-wn" id="instance-type-wn" data-placeholder="--Select one--" style="width:350px;height:350px;" class="chzn-select form-control" data-validate="drop_down_validation">
                        <option value=""></option>
                        <optgroup label="T1">
                            <option>t1.micro</option>
                        </optgroup>
                        <optgroup label="T2">
                            <option>t2.micro</option>
                            <option>t2.small</option>
                            <option>t2.medium</option>
                        </optgroup>
                        <optgroup label="M1">
                            <option>m1.small</option>
                            <option>m1.medium</option>
                            <option>m1.large</option>
                            <option>m1.xlarge</option>
                        </optgroup>
                        <optgroup label="M2">
                            <option>m2.xlarge</option>
                            <option>m2.2xlarge</option>
                            <option>m2.4xlarge</option>
                            <option>cr1.8xlarge</option>
                        </optgroup>
                        <optgroup label="M3">
                            <option>m3.medium</option>
                            <option>m3.large</option>
                            <option>m3.xlarge</option>
                            <option>m3.2xlarge</option>
                        </optgroup>
                        <optgroup label="C1">
                            <option>c1.medium</option>
                            <option>c1.xlarge</option>
                            <option>cc2.8xlarge</option>
                        </optgroup>
                        <optgroup label="C3">
                            <option>c3.large</option>
                            <option>c3.xlarge</option>
                            <option>c3.2xlarge</option>
                            <option>c3.4xlarge</option>
                            <option>c3.8xlarge</option>
                        </optgroup>
                        <optgroup label="C4">
                            <option>c4.large</option>
                            <option>c4.xlarge</option>
                            <option>c4.2xlarge</option>
                            <option>c4.4xlarge</option>
                            <option>c4.8xlarge</option>
                        </optgroup>
                        <optgroup label="G1-GPU">
                            <option>cg1.4xlarge</option>
                        </optgroup>
                        <optgroup label="HI1">
                            <option>hi1.4xlarge</option>
                        </optgroup>
                        <optgroup label="HS1">
                            <option>hs1.8xlarge</option>
                        </optgroup>
                        <optgroup label="R3">
                            <option>r3.large</option>
                            <option>r3.xlarge</option>
                            <option>r3.2xlarge</option>
                            <option>r3.4xlarge</option>
                            <option>r3.8xlarge</option>
                        </optgroup>
                        <optgroup label="G2-GPU">
                            <option>g2.2xlarge</option>
                            <option>g2.8xlarge</option>
                        </optgroup>
                        <optgroup label="I2">
                            <option>i2.xlarge</option>
                            <option>i2.2xlarge</option>
                            <option>i2.4xlarge</option>
                            <option>i2.8xlarge</option>
                        </optgroup>
                        <optgroup label="D2">
                            <option>d2.xlarge</option>
                            <option>d2.2xlarge</option>
                            <option>d2.4xlarge</option>
                            <option>d2.8xlarge</option>
                        </optgroup>
                    </select>
                </div>
                </br>
                </br>
                 Check the details about the different <a href="http://aws.amazon.com/en/ec2/instance-types/" target="_blank"> instance types</a>
                <p> Be aware that not all instance types are compatible for all the AMIs. See the <a href="https://aws.amazon.com/marketplace" target="_blank">AWS Marketplace</a> for details.<p>
            </div>

            <!-- Step 4 Local Resource Management System -->
            <div class="wizard-card wizard-card-overlay" data-cardname="lrms-ec2">
                <h3>LRMS Selection</h3>

                <div class="wizard-input-section">
                    <p>
                        Please choose the LRMS (Local Resource Management System) of your cluster:
                    </p>
                    <select name="lrms-ec2" id="lrms-ec2" data-placeholder="--Select one--" style="width:350px;" class="chzn-select form-control" data-validate="drop_down_validation">
                        <option value=""></option>
                        <option>SLURM</option>
                        <option>Torque</option>
                        <option>SGE</option>
                        <option>Mesos</option>
                        <option>Kubernetes</option>
                    </select>
                </div>
            </div>

            <!-- Step 5 Software packages -->
            <div class="wizard-card wizard-card-overlay" data-cardname="swpkg-ec2">
                <h3>Software Packages</h3>

                <div class="wizard-input-section">
                    <p>
                        Please choose the software packages you'd like EC3 to
                        install in your cluster. They will be automatically installed and configured.
                    </p>

                    <!--<select name="software-ec2" id="software-ec2" data-placeholder="Service List" style="width:350px;" class="chzn-select create-server-service-list form-control" multiple>
                        <option value=""></option>
                        <optgroup label="Basic">
                            <option>NFS</option>
                            <option>CLUES</option>
                        </optgroup>
                        <optgroup label="Checkpointing">
                            <option>BLCR</option>
                            <option>ckptman</option>
                        </optgroup>
                        <optgroup label="LRMS">
                            <option>Munge</option>
                            <option>Maui</option>
                        </optgroup>
                        <optgroup label="Virtual private networks">
                            <option>OpenVPN</option>
                            <option>SSH tunnels</option>
                        </optgroup>
                        <optgroup label="Utilities">
                            <option>Octave</option>
                            <option>Latex</option>
                            <option>Gnuplot</option>
                            <option>Apache tomcat</option>
                        </optgroup>
                    </select>-->

                    <div class="ec2 col-sm-12">
                        <p style="margin-bottom:0px; margin-top:5px;">Cluster utilities:</p>
                        <div class="row">
                            <!--<div class="col-sm-4"><input type="checkbox" value="clues" name="clues" id="clues" title="Cluster Energy Saving System, necessary if you want an elastic cluster" checked=true/> CLUES </div>-->
                            <div class="col-sm-4"><input type="checkbox" value="nfs" name="nfs" id="nfs" title="Configure a shared file system"/> NFS </div>
                            <div class="col-sm-4"><input type="checkbox" value="docker" name="docker" id="docker" title="An open-source tool to deploy applications inside software containers"/> Docker </div>
                            <div class="col-sm-4"><input type="checkbox" value="openvpn" name="openvpn" id="openvpn" title="Application that implements virtual private network (VPN) techniques"/> OpenVPN </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="marathon" name="marathon" id="marathon" title="A job scheduler for Mesos tasks (framework for Mesos)"/> Marathon </div>
                            <div class="col-sm-4"><input type="checkbox" value="chronos" name="chronos" id="chronos" title="A batch job scheduler for Mesos tasks (framework for Mesos)"/> Chronos </div>
                            <div class="col-sm-4"><input type="checkbox" value="hadoop" name="hadoop" id="hadoop" title="A framework that allows for the distributed processing of large data sets across clusters of computers using simple programming models"/> Hadoop </div>
                        </div>
                        <!--<div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="ckptman" name="ckptman" id="ckptman" title="A tool to automate the checkpointing in spot instances"/> Ckptman </div>
                            <div class="col-sm-4"><input type="checkbox" value="munge" name="munge" id="munge" title="An authentication service for creating and validating credentials"/> Munge </div>
                            <div class="col-sm-4"><input type="checkbox" value="maui" name="maui" id="maui" title="A job scheduler for use with Torque"/> Maui </div>
                        </div>-->
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="galaxy" name="galaxy" id="galaxy" title="Web-based platform for data intensive biomedical research. Recommended to install with Torque and NFS."/> Galaxy </div>
                            <div class="col-sm-4"><input type="checkbox" value="extra_hd" name="extra_hd" id="extra_hd" title="Add a 100GB Extra HD to the cluster"/> 100GB HD </div>
                            <!--<div class="col-sm-4"><input type="checkbox" value="galaxy-tools" name="galaxy-tools" id="galaxy-tools" title="Web-based platform for data intensive biomedical research"/> Galaxy tools </div>-->
                            <!--<div class="col-sm-4"><input type="checkbox" value="sshtunnels" name="sshtunnels" id="sshtun" title="Used to interconnect working nodes in an hybrid cloud scenario"/> SSH tunnels </div>-->
                        </div>
                        <p style="margin-bottom:0px; margin-top:10px;">Software utilities:</p>
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="octave" name="octave" id="octave" title="A high-level programming language, primarily intended for numerical computations"/> Octave </div>
                            <div class="col-sm-4"><input type="checkbox" value="gnuplot" name="gnuplot" id="gnuplot" title="A program to generate two- and three-dimensional plots"/> Gnuplot </div>
                            <div class="col-sm-4"><input type="checkbox" value="tomcat" name="tomcat" id="tomcat" title="An open-source web server and servlet container"/> Tomcat </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="namd" name="namd" id="namd" title="A parallel, object-oriented molecular dynamics code designed for high-performance simulation of large biomolecular systems"/> Namd </div>
                           <!-- <div class="col-sm-4"><input type="checkbox" value="docker" name="docker" id="docker" title="An open-source tool to deploy applications inside software containers"/> Docker </div>
                            <div class="col-sm-4"><input type="checkbox" value="latex" name="latex" id="latex" title="Word processor and document markup language"/> Latex </div>-->
                        </div>
                    </div>
                </div>
                <p style="padding-top:180px; padding-right:160px;">Is your favourite software not available? <a href="mailto:ec3@upv.es?Subject=[EC3]%20Unsupported%20Software" target="_top">Let us know!</a></p>
            </div>

            <!-- Step 6 Cluster's size -->
            <div class="wizard-card wizard-card-overlay" data-cardname="size-ec2">
                <h3>Cluster's size</h3>

                <div class="wizard-input-section">
                    <p>
                        Introduce the maximum number of nodes of your cluster (without including the front-end node).
                    </p>
                    </br>
                    <p>
                        Note that EC3 will initially provision only the front-end node and it will dynamically deploy additional working nodes as necessary.
                    </p>
                    </br>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nodes-ec2" name="nodes-ec2" placeholder="number of nodes" data-validate="validateNumber">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 7 Details -->
            <div class="wizard-card" data-cardname="resume-ec2" data-onSelected="showDetails_EC2">
                <h3>Resume and launch</h3>

                <div>
                    <p>These are the details of your cluster: </p>
                </div>
                <div class="wizard-resume">
                </div>
                </br>
                <p style="padding-right:120px">Estimate the price of your cluster using the <a href="http://calculator.s3.amazonaws.com/index.html" target="_blank">AWS Simple Monthly Calculator</a> </p>

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

                    <p> Please, remember the cluster name if you wish to delete the cluster using EC3. You can connect to the front-end via SSH using the provided IP. The data of your cluster is: </p>
                    <div class="wizard-ip">
                        <p><strong>aqui.va.la.IP</strong></p>
                    </div>
                    </br>
                    <p> Notice that the cluster might still be configuring. <a href="http://ec3.readthedocs.org/en/devel/faq.html#ec3aas-webpage" target="_blank">More info.</a> </p>
                    </br>
                    <a class="btn btn-default create-another-server">Create another cluster</a>
                    <span style="padding:0 10px;">or</span>
                    <a class="btn btn-success im-done">Done</a>
                </div>
            </div>
        </div>

        <!-- End of wizard EC2 section -->

        <!-- Wizard ONE section -->
        <div class="wizard" id="one-wizard" name="one-wizard" data-title="Configure your cluster">

            <!-- Step 1 Cloud provider credentials -->
            <div class="wizard-card" data-cardname="provider-one">
                <h3>Provider Account</h3>

                <div class="wizard-input-section">
                    <p>
                        OpenNebula credentials - Username:
                    </p>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="username" name="username" placeholder="username" data-validate="validateValue">
                        </div>
                    </div>
                </div>

                <div class="wizard-input-section">
                    <p>
                        OpenNebula credentials- Password:
                    </p>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="password" data-validate="validateValue">
                        </div>
                    </div>
                </div>

                <div class="wizard-input-section">
                    <p>
                        OpenNebula endpoint:
                    </p>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="endpoint" name="endpoint" placeholder="endpoint" title="e.g. yourserver.yourdomain:2633" data-validate="validateValue">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2 - Operating System -->
            <div class="wizard-card wizard-card-overlay" data-cardname="os-one">
                <h3>Operating System</h3>

                <div class="wizard-input-section">
                    <p>
                        What OS distribution do you like your cluster to have? <i>(only for GRyCAP users)</i>
                    </p>
                    <select name="os-one" id="os-one" data-placeholder="--Select one--" style="width:350px;" class="chzn-select form-control">
                        <option value=""></option>
                        <optgroup label="Linux">
                            <option>CentOS 7</option>
                            <!--<option>Ubuntu 12.04</option>-->
                            <option>Ubuntu 14.04</option>
                            <option>Ubuntu 16.04</option>
                            <option>Scientific Linux 6.6</option>
                        </optgroup>
                    </select>
                </div>
                
                <div class="wizard-input-section">
                    <p>
                        If you prefer, you can provide an VMI identifier registered in your OpenNebula catalog. Please, introduce also user and password details to connect with the VM:
                    </p>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="vmi-user" name="vmi-user" placeholder="VMI username" data-validate="">
                    </div>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="vmi-pass" name="vmi-pass" placeholder="VMI password" data-validate="">
                    </div>
                </div>
                
                <div class="wizard-input-section">
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="vmi" name="vmi" placeholder="VMI identifier" data-validate="">
                    </div>
                    </br>
                </div>
            </div>

            <!-- Step 3 instance characteristics -->
            <div class="wizard-card" data-cardname="instance-details">
                <h3>Instance details</h3>

                <div class="wizard-input-section">
                    <p>
                        Frontend CPU and RAM memory (in MB) values:
                    </p>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="front-cpu" name="front-cpu" placeholder="frontend CPU" data-validate="validateNumber">
                        </div>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="front-mem" name="front-mem" placeholder="frontend memory" data-validate="validateNumber">
                        </div>
                    </div>
                </div>
                </br>
                <div class="wizard-input-section">
                    <p>
                        Working nodes CPU and RAM memory (in MB) values:
                    </p>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="wn-cpu" name="wn-cpu" placeholder="WN CPU" data-validate="validateNumber">
                        </div>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="wn-mem" name="wn-mem" placeholder="WN memory" data-validate="validateNumber">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4 Local Resource Management System -->
            <div class="wizard-card wizard-card-overlay" data-cardname="lrms-one">
                <h3>LRMS Selection</h3>

                <div class="wizard-input-section">
                    <p>
                        Please choose the LRMS (Local Resource Management System) of your cluster:
                    </p>
                    <select name="lrms-one" id="lrms-one" data-placeholder="--Select one--" style="width:350px;" class="chzn-select form-control" data-validate="drop_down_validation">
                        <option value=""></option>
                        <option>SLURM</option>
                        <option>Torque</option>
                        <option>SGE</option>
                        <option>Mesos</option>
                        <option>Kubernetes</option>
                        <option>OSCAR</option>
                    </select>
                </div>
            </div>

            <!-- Step 5 Software packages -->
            <div class="wizard-card wizard-card-overlay" data-cardname="swpkg-one">
                <h3>Software Packages</h3>

                <div class="wizard-input-section">
                    <p>
                        Please choose the software packages you'd like EC3 to
                        install in your cluster. They will be automatically installed and configured.
                    </p>

                    <div class="one col-sm-12">
                        <p style="margin-bottom:0px; margin-top:5px;">Cluster utilities:</p>
                        <div class="row">
                            <!--<div class="col-sm-4"><input type="checkbox" value="clues" name="clues" id="clues" title="Cluster Energy Saving System, necessary if you want an elastic cluster" checked=true/> CLUES </div>-->
                            <div class="col-sm-4"><input type="checkbox" value="nfs" name="nfs" id="nfs" title="Configure a shared file system"/> NFS </div>
                            <div class="col-sm-4"><input type="checkbox" value="docker" name="docker" id="docker" title="An open-source tool to deploy applications inside software containers"/> Docker </div>
                            <div class="col-sm-4"><input type="checkbox" value="openvpn" name="openvpn" id="openvpn" title="Application that implements virtual private network (VPN) techniques"/> OpenVPN </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="marathon" name="marathon" id="marathon" title="A job scheduler for Mesos tasks (framework for Mesos)"/> Marathon </div>
                            <div class="col-sm-4"><input type="checkbox" value="chronos" name="chronos" id="chronos" title="A batch job scheduler for Mesos tasks (framework for Mesos)"/> Chronos </div>
                            <div class="col-sm-4"><input type="checkbox" value="hadoop" name="hadoop" id="hadoop" title="A framework that allows for the distributed processing of large data sets across clusters of computers using simple programming models"/> Hadoop </div>
                        </div>
                        <!--<div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="ckptman" name="ckptman" id="ckptman" title="A tool to automate the checkpointing in spot instances"/> Ckptman </div>
                            <div class="col-sm-4"><input type="checkbox" value="munge" name="munge" id="munge" title="An authentication service for creating and validating credentials"/> Munge </div>
                            <div class="col-sm-4"><input type="checkbox" value="maui" name="maui" id="maui" title="A job scheduler for use with Torque"/> Maui </div>
                        </div>-->
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="galaxy" name="galaxy" id="galaxy" title="Web-based platform for data intensive biomedical research. Recommended to install with Torque and NFS."/> Galaxy </div>
                            <div class="col-sm-4"><input type="checkbox" value="extra_hd" name="extra_hd" id="extra_hd" title="Add a 100GB Extra HD to the cluster"/> 100GB HD </div>
                            <!--<div class="col-sm-4"><input type="checkbox" value="galaxy-tools" name="galaxy-tools" id="galaxy-tools" title="Web-based platform for data intensive biomedical research"/> Galaxy tools </div>-->
                            <!--<div class="col-sm-4"><input type="checkbox" value="sshtunnels" name="sshtunnels" id="sshtun" title="Used to interconnect working nodes in an hybrid cloud scenario"/> SSH tunnels </div>-->
                        </div>
                        <p style="margin-bottom:0px; margin-top:10px;">Software utilities:</p>
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="octave" name="octave" id="octave" title="A high-level programming language, primarily intended for numerical computations"/> Octave </div>
                            <div class="col-sm-4"><input type="checkbox" value="gnuplot" name="gnuplot" id="gnuplot" title="A program to generate two- and three-dimensional plots"/> Gnuplot </div>
                            <div class="col-sm-4"><input type="checkbox" value="tomcat" name="tomcat" id="tomcat" title="An open-source web server and servlet container"/> Tomcat </div>
                        </div>
                        <div class="row">
                             <div class="col-sm-4"><input type="checkbox" value="namd" name="namd" id="namd" title="A parallel, object-oriented molecular dynamics code designed for high-performance simulation of large biomolecular systems"/> Namd </div>
                            <!--<div class="col-sm-4"><input type="checkbox" value="docker" name="docker" id="docker" title="An open-source tool to deploy applications inside software containers"/> Docker </div>
                            <div class="col-sm-4"><input type="checkbox" value="latex" name="latex" id="latex" title="Word processor and document markup language"/> Latex </div>-->
                        </div>
                    </div>
                </div>
                <p style="padding-top:180px; padding-right:160px;">Is your favourite software not available? <a href="mailto:ec3@upv.es?Subject=[EC3]%20Unsupported%20Software" target="_top">Let us know!</a></p>
            </div>

            <!-- Step 6 Cluster's size -->
            <div class="wizard-card wizard-card-overlay" data-cardname="size-one">
                <h3>Cluster's size</h3>

                <div class="wizard-input-section">
                    <p>
                        Introduce the maximum number of nodes of your cluster (without including the front-end node).
                    </p>
                    </br>
                    <p>
                        Note that EC3 will initially provision only the front-end node and it will dynamically deploy additional working nodes as necessary.
                    </p>
                    </br>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nodes-one" name="nodes-one" placeholder="number of nodes" data-validate="validateNumber">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 7 Resume and launch -->
            <div class="wizard-card" data-cardname="resume-one" data-onSelected="showDetails_ONE">
                <h3>Resume and launch</h3>
                <div>
                    <p>These are the details of your cluster: </p>
                </div>
                <div class="wizard-resume">
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

                    <p> Please, remember the cluster name if you wish to delete the cluster using EC3. You can connect to the front-end via SSH using the provided IP. The data of your cluster is: </p>
                    <div class="wizard-ip">
                        <p><strong>aqui.va.la.IP</strong></p>
                    </div>
                    </br>
                    <p> Notice that the cluster might still be configuring. <a href="http://ec3.readthedocs.org/en/devel/faq.html#ec3aas-webpage" target="_blank">More info.</a> </p>
                    </br>
                    <a class="btn btn-default create-another-server">Create another cluster</a>
                    <span style="padding:0 10px">or</span>
                    <a class="btn btn-success im-done">Done</a>
                </div>
            </div>
        </div>

        <!-- End of wizard ONE section -->

        <!-- Wizard Openstack section -->
        <div class="wizard" id="openstack-wizard" name="openstack-wizard" data-title="Configure your cluster">

            <!-- Step 1 Cloud provider credentials -->
            <div class="wizard-card" data-cardname="provider-openstack">
                <h3>Provider Account</h3>

                <div class="wizard-input-section">
                    <p>
                        Openstack credentials - Username and Password:
                    </p>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="username-openstack" name="username-openstack" placeholder="username" data-validate="validateValue">
                        </div>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="pass-openstack" name="pass-openstack" placeholder="password" data-validate="validateValue">
                        </div>
                    </div>
                </div>

                <div class="wizard-input-section">
                    <p>
                        Openstack Tenant:
                    </p>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="tenant-openstack" name="tenant-openstack" placeholder="tenant" data-validate="validateValue">
                        </div>
                    </div>
                </div>

                <div class="wizard-input-section">
                    <p>
                        Openstack endpoint:
                    </p>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="endpoint-openstack" name="endpoint-openstack" placeholder="endpoint" title="e.g. yourserver.yourdomain:5000" data-validate="validateValue">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2 - Operating System -->
            <div class="wizard-card" data-cardname="os-openstack">
                <h3>Operating System</h3>

                <!--<div class="wizard-input-section">
                    <p>
                        What OS distribution do you like your cluster to have?
                    </p>
                    <select name="os-openstack" id="os-openstack" data-placeholder="--Select one--" style="width:350px;" class="chzn-select form-control">
                        <option value=""></option>
                        <optgroup label="Linux">
                            <option>Ubuntu 14.04</option>
                        </optgroup>
                    </select>
                </div>-->

                <div class="wizard-input-section">
                    <p>
                        What OS distribution do you like your cluster to have? Provide an image identifier registered in your Openstack catalog:
                    </p>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="vmi-openstack" name="vmi-openstack" placeholder="VMI Image ID" data-validate="validateValue">
                        </div>
                    </div>
                </div>

                <div class="wizard-input-section">
                    </br>
                    <p>
                        Please, introduce also user details to connect with the VM:
                    </p>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="vmi-user-openstack" name="vmi-user-openstack" placeholder="VMI username" data-validate="validateValue">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3 instance characteristics -->
            <div class="wizard-card" data-cardname="instance-details-openstack">
                <h3>Instance details</h3>

                <div class="wizard-input-section">
                    <p>
                        Frontend CPU and RAM memory (in MB) values:
                    </p>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="front-cpu-openstack" name="front-cpu-openstack" placeholder="frontend CPU" data-validate="validateNumber">
                        </div>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="front-mem-openstack" name="front-mem-openstack" placeholder="frontend memory" data-validate="validateNumber">
                        </div>
                    </div>
                </div>
                </br>
                <div class="wizard-input-section">
                    <p>
                        Working nodes CPU and RAM memory (in MB) values:
                    </p>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="wn-cpu-openstack" name="wn-cpu-openstack" placeholder="WN CPU" data-validate="validateNumber">
                        </div>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="wn-mem-openstack" name="wn-mem-openstack" placeholder="WN memory" data-validate="validateNumber">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4 Local Resource Management System -->
            <div class="wizard-card wizard-card-overlay" data-cardname="lrms-openstack">
                <h3>LRMS Selection</h3>

                <div class="wizard-input-section">
                    <p>
                        Please choose the LRMS (Local Resource Management System) of your cluster:
                    </p>
                    <select name="lrms-openstack" id="lrms-openstack" data-placeholder="--Select one--" style="width:350px;" class="chzn-select form-control" data-validate="drop_down_validation">
                        <option value=""></option>
                        <option>SLURM</option>
                        <option>Torque</option>
                        <option>SGE</option>
                        <option>Mesos</option>
                        <option>Kubernetes</option>
                    </select>
                </div>
            </div>

            <!-- Step 5 Software packages -->
            <div class="wizard-card wizard-card-overlay" data-cardname="swpkg-openstack">
                <h3>Software Packages</h3>

                <div class="wizard-input-section">
                    <p>
                        Please choose the software packages you'd like EC3 to
                        install in your cluster. They will be automatically installed and configured.
                    </p>

                    <div class="openstack col-sm-12">
                        <p style="margin-bottom:0px; margin-top:5px;">Cluster utilities:</p>
                        <div class="row">
                            <!--<div class="col-sm-4"><input type="checkbox" value="clues" name="clues" id="clues" title="Cluster Energy Saving System, necessary if you want an elastic cluster" checked=true/> CLUES </div>-->
                            <div class="col-sm-4"><input type="checkbox" value="nfs" name="nfs" id="nfs" title="Configure a shared file system"/> NFS </div>
                            <div class="col-sm-4"><input type="checkbox" value="docker" name="docker" id="docker" title="An open-source tool to deploy applications inside software containers"/> Docker </div>
                            <div class="col-sm-4"><input type="checkbox" value="openvpn" name="openvpn" id="openvpn" title="Application that implements virtual private network (VPN) techniques"/> OpenVPN </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="marathon" name="marathon" id="marathon" title="A job scheduler for Mesos tasks (framework for Mesos)"/> Marathon </div>
                            <div class="col-sm-4"><input type="checkbox" value="chronos" name="chronos" id="chronos" title="A batch job scheduler for Mesos tasks (framework for Mesos)"/> Chronos </div>
                            <div class="col-sm-4"><input type="checkbox" value="hadoop" name="hadoop" id="hadoop" title="A framework that allows for the distributed processing of large data sets across clusters of computers using simple programming models"/> Hadoop </div>
                        </div>
                        <!--<div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="ckptman" name="ckptman" id="ckptman" title="A tool to automate the checkpointing in spot instances"/> Ckptman </div>
                            <div class="col-sm-4"><input type="checkbox" value="munge" name="munge" id="munge" title="An authentication service for creating and validating credentials"/> Munge </div>
                            <div class="col-sm-4"><input type="checkbox" value="maui" name="maui" id="maui" title="A job scheduler for use with Torque"/> Maui </div>
                        </div>-->
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="galaxy" name="galaxy" id="galaxy" title="Web-based platform for data intensive biomedical research. Recommended to install with Torque and NFS."/> Galaxy </div>
                            <div class="col-sm-4"><input type="checkbox" value="extra_hd" name="extra_hd" id="extra_hd" title="Add a 100GB Extra HD to the cluster"/> 100GB HD </div>
                            <!--<div class="col-sm-4"><input type="checkbox" value="galaxy-tools" name="galaxy-tools" id="galaxy-tools" title="Web-based platform for data intensive biomedical research"/> Galaxy tools </div>-->
                            <!--<div class="col-sm-4"><input type="checkbox" value="sshtunnels" name="sshtunnels" id="sshtun" title="Used to interconnect working nodes in an hybrid cloud scenario"/> SSH tunnels </div>-->
                        </div>
                        <p style="margin-bottom:0px; margin-top:10px;">Software utilities:</p>
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="octave" name="octave" id="octave" title="A high-level programming language, primarily intended for numerical computations"/> Octave </div>
                            <div class="col-sm-4"><input type="checkbox" value="gnuplot" name="gnuplot" id="gnuplot" title="A program to generate two- and three-dimensional plots"/> Gnuplot </div>
                            <div class="col-sm-4"><input type="checkbox" value="tomcat" name="tomcat" id="tomcat" title="An open-source web server and servlet container"/> Tomcat </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="namd" name="namd" id="namd" title="A parallel, object-oriented molecular dynamics code designed for high-performance simulation of large biomolecular systems"/> Namd </div>
                            <!--<div class="col-sm-4"><input type="checkbox" value="docker" name="docker" id="docker" title="An open-source tool to deploy applications inside software containers"/> Docker </div>
                            <div class="col-sm-4"><input type="checkbox" value="latex" name="latex" id="latex" title="Word processor and document markup language"/> Latex </div>-->
                        </div>
                    </div>
                </div>
                <p style="padding-top:180px; padding-right:160px;">Is your favourite software not available? <a href="mailto:ec3@upv.es?Subject=[EC3]%20Unsupported%20Software" target="_top">Let us know!</a></p>
            </div>

            <!-- Step 6 Cluster's size -->
            <div class="wizard-card wizard-card-overlay" data-cardname="size-openstack">
                <h3>Cluster's size</h3>

                <div class="wizard-input-section">
                    <p>
                        Introduce the maximum number of nodes of your cluster (without including the front-end node).
                    </p>
                    </br>
                    <p>
                        Note that EC3 will initially provision only the front-end node and it will dynamically deploy additional working nodes as necessary.
                    </p>
                    </br>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nodes-openstack" name="nodes-openstack" placeholder="number of nodes" data-validate="validateNumber">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 7 Resume and launch -->
            <div class="wizard-card" data-cardname="resume-openstack" data-onSelected="showDetails_Openstack">
                <h3>Resume and launch</h3>
                <div>
                    <p>These are the details of your cluster: </p>
                </div>
                <div class="wizard-resume">
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

                    <p> Please, remember the cluster name if you wish to delete the cluster using EC3. You can connect to the front-end via SSH using the provided IP. The data of your cluster is: </p>
                    <div class="wizard-ip">
                        <p><strong>aqui.va.la.IP</strong></p>
                    </div>
                    </br>
                    <p> Notice that the cluster might still be configuring. <a href="http://ec3.readthedocs.org/en/devel/faq.html#ec3aas-webpage" target="_blank">More info.</a> </p>
                    </br>
                    <a class="btn btn-default create-another-server">Create another cluster</a>
                    <span style="padding:0 10px">or</span>
                    <a class="btn btn-success im-done">Done</a>
                </div>
            </div>
        </div>

        <!-- End of wizard Openstack section -->

        <!-- Wizard Fedcloud section -->
        <div class="wizard" id="fedcloud-wizard" name="fedcloud-wizard" data-title="Configure your cluster">

            <!-- Step 1 VO selection -->
            <div class="wizard-card" data-cardname="vo-fedcloud">
                <h3>VO Details</h3>
                <div class="wizard-input-section">
                    <p>
                        Virtual Organization (VO):
                    </p>
                    <div class="form-group" style="height:400px;">
                            <select name="vo-fedcloud" id="vo-fedcloud" data-placeholder="--Select one--" style="width:350px;" class="chzn-select form-control" data-validate="drop_down_validation">
                                <option value=""></option>
                                <option>geohazards.terradue.com</option>
                                <option>fedcloud.egi.eu</option>
                                <option>vo.africa-grid.org</option>
                                <option>hydrology.terradue.com</option>
                                <option>training.egi.eu</option>
                                <option>atlas</option>
                                <option>lhcb</option>
                                <option>auger</option>
                                <option>vo.access.egi.eu</option>
                                <option>vo.chain-project.eu</option>
                                <option>d4science.org</option>
                                <option>vo.emsodev.eu</option>
                                <option>enmr.eu</option>
                                <option>demo.fedcloud.egi.eu</option>
                                <option>vo.elixir-europe.org</option>
                                <option>chipster.csc.fi</option>
                                <option>highthroughputseq.egi.eu</option>
                                <option>extras-fp7.eu</option>
                                <option>eiscat.se</option>
                                <option>cms</option>
                                <option>vo.nbis.se</option>
                                <option>verce.eu</option>
                                <option>biomed</option>
                                <option>vo.dariah.eu</option>
                                <option>eubrazilcc.eu</option>
                            </select>
                    </div>
                </div>
            </div>
            
            <!-- Step 2 Cloud provider credentials -->
            <div class="wizard-card" data-cardname="provider-fedcloud">
                <h3>Endpoint details</h3>
                <div class="wizard-input-section">
                    <p>
                        FedCloud endpoint:
                    </p>
                    <div class="form-group" style="height:150px;">
                        <div class="col-sm-8" style="width:350px; height:150px;">
                            <select name="endpoint-fedcloud" id="endpoint-fedcloud" data-placeholder="Loading options from EGI AppDB..." style="width:350px;" class="chzn-select form-control" data-validate="drop_down_validation">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="wizard-input-section">
                    <p>
                        FedCloud Proxy - key:
                    </p>
                    <div class="form-group">
                        <div class="col-sm-11">
                            <textarea rows="4" class="form-control" id="proxy" name="proxy" data-validate="validateValue"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3 myProxy (TEMPORAL) -->
            <div class="wizard-card" data-cardname="myproxy-fedcloud">
                <h3>MyProxy details</h3>
                <div class="wizard-input-section">
                    <p>
                        Please introduce the details of your MyProxy account to be used with your cluster <i>(Optional)</i>:
                    </p>
                    </br>
                    <p>
                        MyProxy credentials - Username and Password
                    </p>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="myproxy-user" name="myproxy-user" placeholder="MyProxy user">
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="myproxy-pass" name="myproxy-pass" placeholder="MyProxy pass">
                        </div>
                    </div>
                </div>
                <div class="wizard-input-section">
                    <p>MyProxy Server:</p>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="myproxy-server" name="myproxy-server" placeholder="MyProxy server">
                        </div>
                    </div>
                </div>
                </br>
                <a href="http://grid.ncsa.illinois.edu/myproxy/" target="_blank"> More info about My Proxy</a>
            </div>
                
            <!-- Step 4 - Operating System -->
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
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 5 instance characteristics -->
            <div class="wizard-card" data-cardname="instance-details">
                <h3>Instance details</h3>
                <div class="wizard-input-section">
                    <p>Front-end instance type:</p>
                    <div class="form-group" style="height:30px;">
                        <div class="col-sm-6" style="width:350px; height:30px;" name="frontfedcloud" id="frontfedcloud">
                            <p> Loading options from EGI AppDB... </p>
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
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 6 Local Resource Management System -->
            <div class="wizard-card wizard-card-overlay" data-cardname="lrms-fedcloud">
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
                    </select>
                </div>
            </div>

            <!-- Step 7 Software packages -->
            <div class="wizard-card wizard-card-overlay" data-cardname="swpkg-fedcloud">
                <h3>Software Packages</h3>

                <div class="wizard-input-section">
                    <p>
                        Please choose the software packages you'd like EC3 to
                        install in your cluster. They will be automatically installed and configured.
                    </p>

                    <div class="fedcloud col-sm-12">
                        <p style="margin-bottom:0px; margin-top:5px;">Cluster utilities:</p>
                        <div class="row">
                            <!--<div class="col-sm-4"><input type="checkbox" value="clues" name="clues" id="clues" title="Cluster Energy Saving System, necessary if you want an elastic cluster" checked=true/> CLUES </div>-->
                            <div class="col-sm-4"><input type="checkbox" value="nfs" name="nfs" id="nfs" title="Configure a shared file system"/> NFS </div>
                            <div class="col-sm-4"><input type="checkbox" value="docker" name="docker" id="docker" title="An open-source tool to deploy applications inside software containers"/> Docker </div>
                            <div class="col-sm-4"><input type="checkbox" value="openvpn" name="openvpn" id="openvpn" title="Application that implements virtual private network (VPN) techniques"/> OpenVPN </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="marathon" name="marathon" id="marathon" title="A job scheduler for Mesos tasks (framework for Mesos)"/> Marathon </div>
                            <div class="col-sm-4"><input type="checkbox" value="chronos" name="chronos" id="chronos" title="A batch job scheduler for Mesos tasks (framework for Mesos)"/> Chronos </div>
                            <div class="col-sm-4"><input type="checkbox" value="hadoop" name="hadoop" id="hadoop" title="A framework that allows for the distributed processing of large data sets across clusters of computers using simple programming models"/> Hadoop </div>
                        </div>
                        <!--<div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="ckptman" name="ckptman" id="ckptman" title="A tool to automate the checkpointing in spot instances"/> Ckptman </div>
                            <div class="col-sm-4"><input type="checkbox" value="munge" name="munge" id="munge" title="An authentication service for creating and validating credentials"/> Munge </div>
                            <div class="col-sm-4"><input type="checkbox" value="maui" name="maui" id="maui" title="A job scheduler for use with Torque"/> Maui </div>
                        </div>-->
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="galaxy" name="galaxy" id="galaxy" title="Web-based platform for data intensive biomedical research. Recommended to install with Torque and NFS."/> Galaxy </div>
                            <div class="col-sm-4"><input type="checkbox" value="extra_hd" name="extra_hd" id="extra_hd" title="Add a 100GB Extra HD to the cluster"/> 100GB HD </div>
                            <!--<div class="col-sm-4"><input type="checkbox" value="galaxy-tools" name="galaxy-tools" id="galaxy-tools" title="Web-based platform for data intensive biomedical research"/> Galaxy tools </div>-->
                            <!--<div class="col-sm-4"><input type="checkbox" value="sshtunnels" name="sshtunnels" id="sshtun" title="Used to interconnect working nodes in an hybrid cloud scenario"/> SSH tunnels </div>-->
                        </div>
                        <p style="margin-bottom:0px; margin-top:10px;">Software utilities:</p>
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="octave" name="octave" id="octave" title="A high-level programming language, primarily intended for numerical computations"/> Octave </div>
                            <div class="col-sm-4"><input type="checkbox" value="gnuplot" name="gnuplot" id="gnuplot" title="A program to generate two- and three-dimensional plots"/> Gnuplot </div>
                            <div class="col-sm-4"><input type="checkbox" value="tomcat" name="tomcat" id="tomcat" title="An open-source web server and servlet container"/> Tomcat </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><input type="checkbox" value="namd" name="namd" id="namd" title="A parallel, object-oriented molecular dynamics code designed for high-performance simulation of large biomolecular systems"/> Namd </div>
                            <!--<div class="col-sm-4"><input type="checkbox" value="docker" name="docker" id="docker" title="An open-source tool to deploy applications inside software containers"/> Docker </div>
                            <div class="col-sm-4"><input type="checkbox" value="latex" name="latex" id="latex" title="Word processor and document markup language"/> Latex </div>-->
                        </div>
                    </div>
                </div>
                <p style="padding-top:180px; padding-right:160px;">Is your favourite software not available? <a href="mailto:ec3@upv.es?Subject=[EC3]%20Unsupported%20Software" target="_top">Let us know!</a></p>
            </div>

            <!-- Step 8 Cluster's size -->
            <div class="wizard-card wizard-card-overlay" data-cardname="size-fedcloud">
                <h3>Cluster's size</h3>

                <div class="wizard-input-section">
                    <p>
                        Introduce the maximum number of nodes of your cluster (without including the front-end node).
                    </p>
                    </br>
                    <p>
                        Note that EC3 will initially provision only the front-end node and it will dynamically deploy additional working nodes as necessary.
                    </p>
                    </br>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nodes-fedcloud" name="nodes-fedcloud" placeholder="number of nodes" data-validate="validateNumber">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 9 Resume and launch -->
            <div class="wizard-card" data-cardname="resume-fedcloud" data-onSelected="showDetails_OCCI">
                <h3>Resume and launch</h3>
                <div>
                    <p>These are the details of your cluster: </p>
                </div>
                <div class="wizard-resume">
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

                    <p> Please, remember the cluster name if you wish to delete the cluster using EC3. You can connect to the front-end via SSH using the provided IP. The data of your cluster is: </p>
                    <div class="wizard-ip">
                        <p><strong>aqui.va.la.IP</strong></p>
                    </div>
                    </br>
                    <p> Notice that the cluster might still be configuring. <a href="http://ec3.readthedocs.org/en/devel/faq.html#ec3aas-webpage" target="_blank">More info.</a> </p>
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
                <div class="wizard-input-section">
                    <p>
                        In case you have deployed your cluster in <b>FedCloud</b>, please, introduce a valid Proxy:
                    </p>
                    <div class="form-group">
                        <div class="col-sm-11">
                            <textarea rows="3" class="form-control" id="proxy_del" name="proxy_del"></textarea>
                        </div>
                    </div>
                </div>

                <div class="wizard-error">
                    <div class="alert alert-error">
                        <strong>There was a problem</strong> deleting your cluster.
                        Please, correct the name and try again or shutdown your virtual machines manually.
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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery-2.0.3.min.js" type="text/javascript"></script>
    <script src="chosen/chosen.jquery.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/prettify.js" type="text/javascript"></script>
    <script src="src/bootstrap-wizard.js" type="text/javascript"></script>

    <!-- Wizard plugin EC2 -->
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.wizard.logging = true;
                var wizard = $('#ec2-wizard').wizard({
                    keyboard : false,
                    contentHeight : 400,
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

                // https://github.com/amoffat/bootstrap-application-wizard/blob/master/README.md#submitting-wizard
                //http://api.jquery.com/jquery.ajax/
                //Para mostrar la respuesta: http://stackoverflow.com/questions/14918462/get-response-from-php-file-using-ajax
                wizard.on("submit", function(wizard) {
                    //obtener el numero de nodos
                    var nodes = Math.abs(parseInt($('#nodes-ec2').val()));
                    //avisar de evento a analytics
                    ga('send','event','Submit','Amazon Web Services');
                    $.ajax({
                            type: "POST",
                            url: wizard.args.submitUrl,
                            data: "cloud=ec2&" + wizard.serialize() + "&nodes-ec2=" + nodes,
                            //data: "cloud=ec2&" + wizard.serialize(),
                            //enviamos los datos en cadena de texto, pero esperamos de vuelta un json, asi puedo comprobar si el despliegue ha ido bien o no
                            dataType: "json",
                            success: function(response, status, data){
                                    wizard.submitSuccess();         // displays the success card
                                    //retValue = "<div> <b> " + JSON.stringify(response) + " </b></div>";
                                    var obj = jQuery.parseJSON(JSON.stringify(response));
                                    retValue = "<div> Cluster name: <b> " + obj.name + " </b></div> <div> Frontend IP: <b> " + obj.ip + " </b></div> <div> Username: <b> " + obj.username + " </b></div>";
                                    //retValue += "<div> Secret key: <b> " + decodeURIComponent(obj.secretkey) + " </b></div>";
                                    retValue += "<div> Secret key: <textarea id='private_key_value' name='private_key_value' style='display:none;'>" + decodeURIComponent(obj.secretkey) + "</textarea>" +
                                    "<a class='download' href='javascript:download(\"private_key_value\", \"key.pem\");'>Download</a> </div>";
                                    //retValue += "<div> Secret key: <textarea id='private_key_value' name='private_key_value' style='display:none;'>" + decodeURIComponent(obj.secretkey) + "</textarea>" +
                                    //"<a id='export' class='download' href='javascript:createDownloadLinkAux();'>Download</a> </div>";
                                    //retValue += "<div> Secret key: <textarea id='private_key_value' name='private_key_value' style='display:none;'>" + decodeURIComponent(obj.secretkey) + "</textarea>" +
                                    //"<a id='export' class='download' href='#'>Download</a> </div>";
                                    $('.wizard-ip').html(retValue);
                                    wizard.hideButtons();           // hides the next and back buttons
                                    wizard.updateProgressBar(0);    // sets the progress meter to 0
                            },
                            error: function(response, status, error){
                                    var obj = jQuery.parseJSON(JSON.stringify(response));
                                    retValue = "<div> <b> " + decodeURIComponent(obj.responseText) + " </b></div> ";
                                    //retValue = "<div> <b> " + JSON.stringify(response) + " </b></div> ";
                                    //retValue += "<div> <b> " + JSON.stringify(status) + " </b></div> ";
                                    //retValue += "<div> <b> " + JSON.stringify(error) + " </b></div> ";
                                    $('.wizard-ip').html(retValue);
                                    wizard.submitError();           // display the error card
                                    wizard.hideButtons();           // hides the next and back buttons
                            }
                    });
                });

                //"cloud=ec2&" + wizard.serialize();
                //Esto muestra lo siguiente (no lo crea en formato JSON):
                //cloud=ec2&accesskey=ffffff&secretkey=hhhhhhhhh&os-ec2=Ubuntu+12.04&lrms-ec2=SLURM&clues=clues&nodes-ec2=5

                wizard.el.find(".wizard-success .im-done").click(function() {
                    wizard.hide();
                    setTimeout(function() {
                        wizard.reset();
                    }, 250);

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
                    }, 250);

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

                $('#open-wizard').click(function(e) {
                    e.preventDefault();
                    wizard.show();
                });
            });

            function createDownloadLink(anchorSelector, str, fileName){
                anchor = document.getElementById(anchorSelector)
                if(window.navigator.msSaveOrOpenBlob) {
                    var fileData = [str];
                    blobObject = new Blob(fileData);
                    anchor.onclick = function(){
                        window.navigator.msSaveOrOpenBlob(blobObject, fileName);
                    }
                } else {
                    var url = "data:Application/octet-stream," + encodeURIComponent(str);
                    anchor.download = fileName;
                    anchor.href = url;
                }
            }

            function createDownloadLinkAux(){
                var dataToDownload = document.getElementById("private_key_value").value;
                createDownloadLink("export",dataToDownload,"key.pem");
            }

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

            /*function download(id, filename) {
                //var dataToDownload = $(id).val();
                var dataToDownload = document.getElementById(id).value;
                var link = document.createElement("a");
                link.download = filename;
                link.href = 'data:Application/octet-stream,' + encodeURIComponent(dataToDownload);
                link.click();
            }*/

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

            function validateAccessKeyValue(el) {
                var name = el.val();
                var retValue = {};

                if (name == "") {
                    retValue.status = false;
                    retValue.msg = "Please enter a value";
                } else if (name.length < 20 || name.length > 20 || name.charAt(0) != 'A' || name.charAt(1) != 'K' ){
                    retValue.status = false;
                    retValue.msg = "The Access Key ID must have 20 characters and begin with 'AK'";
                } else {
                    retValue.status = true;
                }

                return retValue;
            };

            function validateSecretKeyValue(el) {
                var name = el.val();
                var retValue = {};

                if (name == "") {
                    retValue.status = false;
                    retValue.msg = "Please enter a value";
                } else if (name.length != 40){
                    retValue.status = false;
                    retValue.msg = "The Secret Access Key must have 40 characters";
                } else {
                    retValue.status = true;
                }

                return retValue;
            };

            function validateAMIValue(el) {
                var name = el.val();
                var retValue = {};

                if (name == "") {
                    retValue.status = true;
                } else if (name.length < 12 || name.length > 12 || name.charAt(0) != 'a' || name.charAt(1) != 'm' || name.charAt(2) != 'i' || name.charAt(3) != '-'){
                    retValue.status = false;
                    retValue.msg = "Please enter a valid AMI identifier";
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
                    retValue.msg = "Please enter a positive integer value";
                } else {
                    retValue.status = true;
                }

                return retValue;
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

            function showDetails_EC2() {
                var retValue = ' '

                //obtener access y secret keys
                var accessKey = $('#accesskey').val();
                var secretKey = $('#secretkey').val();
                secretKey = "******************";

                //obtener el OS seleccionado
                var os = $('#os-ec2').val();

                //obtener la ami y region si las hay
                var ami = $('#ami').val();
                var ami_user = $('#ami-user').val();
                var region = $('#region').val();

                //obtener el instance type seleccionado
                var instancetype_front = $('#instance-type-front').val();
                var instancetype_wn = $('#instance-type-wn').val();

                //obtener el LRMS seleccionado
                var lrms = $('#lrms-ec2').val();

                //obtener el SW
                var sw = '';
                //if( $('.ec2.col-sm-12 #clues').prop('checked') ) sw += "CLUES ";
                //if( $('.ec2.col-sm-12 #blcr').prop('checked') ) sw += "BLCR ";
                if( $('.ec2.col-sm-12 #nfs').prop('checked') ) sw += "NFS ";
                //if( $('.ec2.col-sm-12 #ckptman').prop('checked') ) sw += "ckptman ";
                //if( $('.ec2.col-sm-12 #munge').prop('checked') ) sw += "Munge ";
                //if( $('.ec2.col-sm-12 #maui').prop('checked') ) sw += "Maui ";
                if( $('.ec2.col-sm-12 #openvpn').prop('checked') ) sw += "OpenVPN ";
                if( $('.ec2.col-sm-12 #galaxy').prop('checked') ) sw += "Galaxy ";
                if( $('.ec2.col-sm-12 #extra_hd').prop('checked') ) sw += "100GB Extra HD ";
                //if( $('.ec2.col-sm-12 #galaxy-tools').prop('checked') ) sw += "Galaxy-tools";
                //if( $('.ec2.col-sm-12 #sshtun').prop('checked') ) sw += "SSH tunnels ";
                if( $('.ec2.col-sm-12 #octave').prop('checked') ) sw += "Octave ";
                if( $('.ec2.col-sm-12 #docker').prop('checked') ) sw += "Docker ";
                if( $('.ec2.col-sm-12 #gnuplot').prop('checked') ) sw += "Gnuplot ";
                if( $('.ec2.col-sm-12 #tomcat').prop('checked') ) sw += "Tomcat ";
                if( $('.ec2.col-sm-12 #marathon').prop('checked') ) sw += "Marathon ";
                if( $('.ec2.col-sm-12 #chronos').prop('checked') ) sw += "Chronos ";
                if( $('.ec2.col-sm-12 #hadoop').prop('checked') ) sw += "Hadoop";

                if (sw == ''){
                    sw +="nothing selected"
                }

                if (lrms == ''){
                    lrms +="nothing selected"
                }

                if (instancetype_front == ''){
                    instancetype_front +="nothing selected"
                }

                if (instancetype_wn == ''){
                    instancetype_wn +="nothing selected"
                }

                //obtener el numero de nodos
                var nodes = Math.abs(parseInt($('#nodes-ec2').val()));

                retValue = "<div> <b> Access Key: </b>" + accessKey + "</div> <div><b>Secret Key: </b>" + secretKey + "</div>";

                if(ami != '' && region != '' && ami_user != ''){
                    retValue += "<div> <b> AMI: </b>" + ami + "</div> <div><b>Region: </b>" + region + "</div> <div><b>AMI user: </b>" + ami_user + "</div>";
                } else if (os!= ''){
                    retValue+= "<div> <b>Operating System: </b>" + os + "</div>";
                } else {
                    retValue+= "<div> <b>Operating System: </b> nothing selected</div>";
                }

                retValue +="<div> <b>Frontend instance type: </b>" + instancetype_front + "</div>" +
                           "<div> <b>Working nodes instance type: </b>" + instancetype_wn + "</div>" +
                           "<div> <b>Local Resource Management System: </b>" + lrms + "</div>" +
                           "<div> <b>Software packages: </b>" + sw + "</div>" +
                           "<div> <b>Maximum number of nodes: </b>" + nodes + "</div>";


                //Mostramos los datos recogidos al usuario
                //$('.wizard-resume').append(retValue);
                $('.wizard-resume').html(retValue);
            };
        </script>


    <!-- Wizard plugin ONE -->
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.wizard.logging = true;
                var wizard = $('#one-wizard').wizard({
                    keyboard : false,
                    contentHeight : 400,
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
                    //obtener el numero de nodos
                    var nodes = parseInt($('#nodes-one').val());
                    //avisar de evento a analytics
                    ga('send','event','Submit','OpenNebula');
                    $.ajax({
                            type: "POST",
                            url: wizard.args.submitUrl,
                            //data: "cloud=one&" + wizard.serialize(),
                            data: "cloud=one&" + wizard.serialize() + "&nodes-one=" + nodes,
                            dataType: "json",
                            success: function(response, status, data){
                                    wizard.submitSuccess();         // displays the success card
                                    //retValue = "<div> <b> " + JSON.stringify(response) + " </b></div> ";
                                    var obj = jQuery.parseJSON(JSON.stringify(response));
                                    retValue = "<div> Cluster name: <b> " + obj.name + " </b></div> <div> Frontend IP: <b> " + obj.ip + " </b></div> " +
                                               "<div> Username: <b> " + obj.username + " </b></div> <div> Password: <b> " + obj.password + " </b></div> ";
                                    $('.wizard-ip').html(retValue);
                                    wizard.hideButtons();           // hides the next and back buttons
                                    wizard.updateProgressBar(0);    // sets the progress meter to 0
                            },
                            error: function(response, status, error){
                                    var obj = jQuery.parseJSON(JSON.stringify(response));
                                    retValue = "<div> <b> " + obj.responseText + " </b></div> ";
                                    //retValue = "<div> <b> " + JSON.stringify(response) + " </b></div> ";
                                    //retValue += "<div> <b> " + JSON.stringify(status) + " </b></div> ";
                                    //retValue += "<div> <b> " + JSON.stringify(error) + " </b></div> ";
                                    $('.wizard-ip').html(retValue);
                                    wizard.submitError();           // display the error card
                                    wizard.hideButtons();           // hides the next and back buttons
                            }
                    });
                });

                /*wizard.on("submit", function(wizard) {
                    $.ajax({
                        type: "POST",
                        url: wizard.args.submitUrl,
                        data: "cloud=ec2&" + wizard.serialize(),
                        dataType: "json"
                    }).done(function(response) {
                        wizard.submitSuccess();         // displays the success card
                        wizard.hideButtons();           // hides the next and back buttons
                        wizard.updateProgressBar(0);    // sets the progress meter to 0
                    }).fail(function() {
                        wizard.submitError();           // display the error card
                        wizard.hideButtons();           // hides the next and back buttons
                    });
                });*/

                //console.log(wizard.serialize()+"&wizard=ec2");
                //Esto muestra lo siguiente:
                //accesskey=&secretkey=&os-ec2=Ubuntu+12.04&lrms-ec2=SLURM&clues=clues&nodes-ec2=&wizard=ec2

                wizard.el.find(".wizard-success .im-done").click(function() {
                    wizard.hide();
                    setTimeout(function() {
                        wizard.reset();
                        //$('#os-one').prop('selectedIndex', 0);
                    }, 250);
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
                    }, 250);

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

                $('#open-wizard-2').click(function(e) {
                    e.preventDefault();
                    wizard.show();
                });
            });

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

            function showDetails_ONE() {
                var retValue = ' '

                //obtener access y secret keys
                var username = $('#username').val();
                var password = $('#pass').val();
                password = "*********";
                var endpoint = $('#endpoint').val();

                //obtener el OS seleccionado
                var os = $('#os-one').val();
                var vmi = $('#vmi').val();
                var vmi_user = $('#vmi-user').val();
                var vmi_pass = $('#vmi-pass').val();

                //obtener las caracteristicas de las VMs
                var front_cpu = $('#front-cpu').val();
                var front_mem = $('#front-mem').val();
                var wn_cpu = $('#wn-cpu').val();
                var wn_mem = $('#wn-mem').val();

                //obtener el LRMS seleccionado
                var lrms = $('#lrms-one').val();

                //obtener el SW
                var sw = '';
                //if( $('.one.col-sm-12 #clues').prop('checked') ) sw += "CLUES ";
                //if( $('.one.col-sm-12 #blcr').prop('checked') ) sw += "BLCR ";
                if( $('.one.col-sm-12 #nfs').prop('checked') ) sw += "NFS ";
                //if( $('.one.col-sm-12 #ckptman').prop('checked') ) sw += "ckptman ";
                //if( $('.one.col-sm-12 #munge').prop('checked') ) sw += "Munge ";
                //if( $('.one.col-sm-12 #maui').prop('checked') ) sw += "Maui ";
                if( $('.one.col-sm-12 #openvpn').prop('checked') ) sw += "OpenVPN ";
                if( $('.one.col-sm-12 #galaxy').prop('checked') ) sw += "Galaxy ";
                if( $('.one.col-sm-12 #extra_hd').prop('checked') ) sw += "100GB Extra HD ";
                //if( $('.one.col-sm-12 #galaxy-tools').prop('checked') ) sw += "Galaxy-tools";
                //if( $('.one.col-sm-12 #sshtun').prop('checked') ) sw += "SSH tunnels ";
                if( $('.one.col-sm-12 #octave').prop('checked') ) sw += "Octave ";
                if( $('.one.col-sm-12 #docker').prop('checked') ) sw += "Docker ";
                if( $('.one.col-sm-12 #gnuplot').prop('checked') ) sw += "Gnuplot ";
                if( $('.one.col-sm-12 #tomcat').prop('checked') ) sw += "Tomcat ";
                if( $('.one.col-sm-12 #marathon').prop('checked') ) sw += "Marathon ";
                if( $('.one.col-sm-12 #chronos').prop('checked') ) sw += "Chronos ";
                if( $('.one.col-sm-12 #hadoop').prop('checked') ) sw += "Hadoop";

                if (sw == ''){
                    sw +="Nothing selected"
                }

                if (lrms == ''){
                    lrms +="nothing selected"
                }

                //obtener el numero de nodos
                var nodes = parseInt($('#nodes-one').val());

                retValue = "<div> <b> Username: </b>" + username + "</div> <div><b>Password: </b>" + password + "</div> <div><b>Endpoint: </b>" + endpoint + "</div>";

                if(vmi != ''){
                    retValue += "<div> <b> VMI: </b>" + vmi + "</div><div> <b> VMI User: </b>" + vmi_user + "<b> VMI Password: </b>" + vmi_pass + "</div>";
                } else if (os!= ''){
                    retValue+= "<div> <b>Operating System: </b>" + os + "</div>";
                } else {
                    retValue+= "<div> <b>Operating System: </b> nothing selected</div>";
                }

                retValue +="<div> <b>Frontend CPU: </b>" + front_cpu + "<b></div> <div>Frontend RAM memory: </b>" + front_mem + " </div>" +
                           "<div> <b>Working nodes CPU: </b>" + wn_cpu + "<b></div> <div> Working nodes RAM memory: </b>" + wn_mem + " </div>" +
                           "<div> <b>Local Resource Management System: </b>" + lrms + "</div>" +
                           "<div> <b>Software packages: </b>" + sw + "</div>" +
                           "<div> <b>Maximum number of nodes: </b>" + nodes + "</div>";


                //Mostramos los datos recogidos al usuario
                //$('.wizard-resume').append(retValue);
                $('.wizard-resume').html(retValue);
            };

            //Se podria meter tambien un metodo de validacion del endpoint

        </script>

    <!-- Wizard plugin Openstack -->
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.wizard.logging = true;
                var wizard = $('#openstack-wizard').wizard({
                    keyboard : false,
                    contentHeight : 400,
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
                    //obtener el numero de nodos
                    var nodes = parseInt($('#nodes-openstack').val());
                    //avisar de evento a analytics
                    ga('send','event','Submit','Openstack');
                    $.ajax({
                            type: "POST",
                            url: wizard.args.submitUrl,
                            //data: "cloud=one&" + wizard.serialize(),
                            data: "cloud=openstack&" + wizard.serialize() + "&nodes-openstack=" + nodes,
                            dataType: "json",
                            success: function(response, status, data){
                                    wizard.submitSuccess();         // displays the success card
                                    //retValue = "<div> <b> " + JSON.stringify(response) + " </b></div>";
                                    var obj = jQuery.parseJSON(JSON.stringify(response));
                                    retValue = "<div> Cluster name: <b> " + obj.name + " </b></div> <div> Frontend IP: <b> " + obj.ip + " </b></div> <div> Username: <b> " + obj.username + " </b></div>";
                                    //retValue += "<div> Secret key: <b> " + decodeURIComponent(obj.secretkey) + " </b></div>";
                                    retValue += "<div> Secret key: <textarea id='private_key_value' name='private_key_value' style='display:none;'>" + decodeURIComponent(obj.secretkey) + "</textarea>" +
                                    "<a class='download' href='javascript:download(\"private_key_value\", \"key.pem\");'>Download</a> </div>";
                                    $('.wizard-ip').html(retValue);
                                    wizard.hideButtons();           // hides the next and back buttons
                                    wizard.updateProgressBar(0);    // sets the progress meter to 0
                            },
                            error: function(response, status, error){
                                    var obj = jQuery.parseJSON(JSON.stringify(response));
                                    retValue = "<div> <b> " + decodeURIComponent(obj.responseText) + " </b></div> ";
                                    //retValue = "<div> <b> " + JSON.stringify(response) + " </b></div> ";
                                    //retValue += "<div> <b> " + JSON.stringify(status) + " </b></div> ";
                                    //retValue += "<div> <b> " + JSON.stringify(error) + " </b></div> ";
                                    $('.wizard-ip').html(retValue);
                                    wizard.submitError();           // display the error card
                                    wizard.hideButtons();           // hides the next and back buttons
                            }
                    });
                });

                wizard.el.find(".wizard-success .im-done").click(function() {
                    wizard.hide();
                    setTimeout(function() {
                        wizard.reset();
                    }, 250);
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
                    }, 250);

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

                $('#open-wizard-3').click(function(e) {
                    e.preventDefault();
                    wizard.show();
                });
            });

            function download(id, filename) {
                //var dataToDownload = $(id).val();
                var dataToDownload = document.getElementById(id).value;
                var link = document.createElement("a");
                link.download = filename;
                link.href = 'data:Application/octet-stream,' + encodeURIComponent(dataToDownload);
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

            //TODO adaptar para openstack
            function showDetails_Openstack() {
                var retValue = ' '

                //obtener access y secret keys
                var username = $('#username-openstack').val();
                var password = $('#pass-openstack').val();
                password = "*********";
                var tenant = $('#tenant-openstack').val();
                var endpoint = $('#endpoint-openstack').val();

                //obtener el OS seleccionado
                var os = $('#os-openstack').val();
                var vmi = $('#vmi-openstack').val();
                var vmi_user = $('#vmi-user-openstack').val();

                //obtener las caracteristicas de las VMs
                var front_cpu = $('#front-cpu-openstack').val();
                var front_mem = $('#front-mem-openstack').val();
                var wn_cpu = $('#wn-cpu-openstack').val();
                var wn_mem = $('#wn-mem-openstack').val();

                //obtener el LRMS seleccionado
                var lrms = $('#lrms-openstack').val();

                //obtener el SW
                var sw = '';
                //if( $('.openstack.col-sm-12 #clues').prop('checked') ) sw += "CLUES ";
                //if( $('.openstack.col-sm-12 #blcr').prop('checked') ) sw += "BLCR ";
                if( $('.openstack.col-sm-12 #nfs').prop('checked') ) sw += "NFS ";
                //if( $('.openstack.col-sm-12 #ckptman').prop('checked') ) sw += "ckptman ";
                //if( $('.openstack.col-sm-12 #munge').prop('checked') ) sw += "Munge ";
                //if( $('.openstack.col-sm-12 #maui').prop('checked') ) sw += "Maui ";
                if( $('.openstack.col-sm-12 #openvpn').prop('checked') ) sw += "OpenVPN ";
                if( $('.openstack.col-sm-12 #galaxy').prop('checked') ) sw += "Galaxy ";
                if( $('.openstack.col-sm-12 #extra_hd').prop('checked') ) sw += "100GB Extra HD ";
                //if( $('.openstack.col-sm-12 #galaxy-tools').prop('checked') ) sw += "Galaxy-tools";
                //if( $('.openstack.col-sm-12 #sshtun').prop('checked') ) sw += "SSH tunnels ";
                if( $('.openstack.col-sm-12 #octave').prop('checked') ) sw += "Octave ";
                if( $('.openstack.col-sm-12 #docker').prop('checked') ) sw += "Docker ";
                if( $('.openstack.col-sm-12 #gnuplot').prop('checked') ) sw += "Gnuplot ";
                if( $('.openstack.col-sm-12 #tomcat').prop('checked') ) sw += "Tomcat ";
                if( $('.openstack.col-sm-12 #marathon').prop('checked') ) sw += "Marathon ";
                if( $('.openstack.col-sm-12 #chronos').prop('checked') ) sw += "Chronos ";
                if( $('.openstack.col-sm-12 #hadoop').prop('checked') ) sw += "Hadoop";

                if (sw == ''){
                    sw +="Nothing selected"
                }

                if (lrms == ''){
                    lrms +="nothing selected"
                }

                //obtener el numero de nodos
                var nodes = parseInt($('#nodes-openstack').val());

                //retValue = "<div> <b> Username: </b>" + username + "</div> <div><b>Password: </b>" + password + "</div> <div><b>Endpoint: </b>" + endpoint + "</div>";
                retValue = "<div> <b> Username: </b>" + username + "     <b>Password: </b>" + password + "</div> <div><b>Tenant: </b>" + tenant + "</div> <div><b>Endpoint: </b>" + endpoint + "</div>";

                if(vmi != ''){
                    retValue += "<div> <b> VMI: </b>" + vmi + "</div><div> <b> VMI User: </b>" + vmi_user + "</div>";
                } else if (os!= ''){
                    retValue+= "<div> <b>Operating System: </b>" + os + "</div>";
                } else {
                    retValue+= "<div> <b>Operating System: </b> nothing selected</div>";
                }

                retValue +="<div> <b>Frontend CPU: </b>" + front_cpu + "<b></div> <div>Frontend RAM memory: </b>" + front_mem + " </div>" +
                           "<div> <b>Working nodes CPU: </b>" + wn_cpu + "<b></div> <div> Working nodes RAM memory: </b>" + wn_mem + " </div>" +
                           "<div> <b>Local Resource Management System: </b>" + lrms + "</div>" +
                           "<div> <b>Software packages: </b>" + sw + "</div>" +
                           "<div> <b>Maximum number of nodes: </b>" + nodes + "</div>";


                //Mostramos los datos recogidos al usuario
                //$('.wizard-resume').append(retValue);
                $('.wizard-resume').html(retValue);
            };

            //Se podria meter tambien un metodo de validacion del endpoint

        </script>

    <!-- Wizard plugin FedCloud -->
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.wizard.logging = true;
                var wizard = $('#fedcloud-wizard').wizard({
                    keyboard : false,
                    contentHeight : 430,
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
                            data: "cloud=fedcloud&endpointName=" + $('#endpoint-fedcloud option:selected').html() + "&" + wizard.serialize()+ "&nodes-fedcloud=" + nodes,
                            //data: "cloud=fedcloud&" + wizard.serialize()+ "&nodes-fedcloud=" + nodes,
                            dataType: "json",
                            success: function(response, status, data){
                                    wizard.submitSuccess();         // displays the success card
                                    //retValue = "<div> <b> " + JSON.stringify(response) + " </b></div> ";
                                    var obj = jQuery.parseJSON(JSON.stringify(response));
                                    //retValue = "<div> Cluster name: <b> " + obj.name + " </b></div> <div> Frontend IP: <b> " + obj.ip + " </b></div> " +
                                    //           "<div> Username: <b> " + obj.username + " </b></div> <div> Password: <b> " + obj.password + " </b></div> ";
                                    retValue = "<div> Cluster name: <b> " + obj.name + " </b></div> <div> Frontend IP: <b> " + obj.ip + " </b></div> <div> Username: <b> " + obj.username + " </b></div>";
                                    retValue += "<div> Secret key: <textarea id='private_key_value' name='private_key_value' style='display:none;'>" + decodeURIComponent(obj.secretkey) + "</textarea>" +
                                    "<a class='download' href='javascript:download(\"private_key_value\", \"key.pem\");'>Download</a> </div>";
                                    $('.wizard-ip').html(retValue);
                                    wizard.hideButtons();           // hides the next and back buttons
                                    wizard.updateProgressBar(0);    // sets the progress meter to 0
                            },
                            error: function(response, status, error){
                                    var obj = jQuery.parseJSON(JSON.stringify(response));
                                    retValue = "<div> <b> " + obj.responseText + " </b></div> ";
                                    //retValue = "<div> <b> " + JSON.stringify(response) + " </b></div> ";
                                    //retValue += "<div> <b> " + JSON.stringify(status) + " </b></div> ";
                                    //retValue += "<div> <b> " + JSON.stringify(error) + " </b></div> ";
                                    $('.wizard-ip').html(retValue);
                                    wizard.submitError();           // display the error card
                                    wizard.hideButtons();           // hides the next and back buttons
                            }
                    });
                });

                /*wizard.on("submit", function(wizard) {
                    $.ajax({
                        type: "POST",
                        url: wizard.args.submitUrl,
                        data: "cloud=ec2&" + wizard.serialize(),
                        dataType: "json"
                    }).done(function(response) {
                        wizard.submitSuccess();         // displays the success card
                        wizard.hideButtons();           // hides the next and back buttons
                        wizard.updateProgressBar(0);    // sets the progress meter to 0
                    }).fail(function() {
                        wizard.submitError();           // display the error card
                        wizard.hideButtons();           // hides the next and back buttons
                    });
                });*/

                //console.log(wizard.serialize()+"&wizard=ec2");
                //Esto muestra lo siguiente:
                //accesskey=&secretkey=&os-ec2=Ubuntu+12.04&lrms-ec2=SLURM&clues=clues&nodes-ec2=&wizard=ec2

                wizard.el.find(".wizard-success .im-done").click(function() {
                    wizard.hide();
                    setTimeout(function() {
                        wizard.reset();
                        //$('#os-one').prop('selectedIndex', 0);
                    }, 250);
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
                    }, 250);

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

                $('#open-wizard-4').click(function(e) {
                    e.preventDefault();
                    wizard.show();
                });
            });

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
            
            $('select#vo-fedcloud.chzn-select.form-control').change(function() {
                <!-- Send vo selected to the server to obtain endpoints-->
                $.ajax({
                    method: "POST",
                    url: "print_select_endpoints.php",
                    data:{vofedcloud: $('#vo-fedcloud').val()},
                    success : function(text)
                    {  
                        $('#endpoint_fedcloud_chzn').hide()
                        $('#endpoint-fedcloud').prop('data-placeholder', "--Select one--");
                        $('#endpoint-fedcloud').append(text).hide().show();
                        //$('#endpoint-fedcloud').html(text);
                    }
                });
            });
            
            
            $('select#endpoint-fedcloud.chzn-select.form-control').change(function() {
                <!-- Send endpoint selected to the server to obtain OS-->
                $.ajax({
                    method: "POST",
                    url: "print_select_os.php",
                    data:{endpointfedcloud: $('#endpoint-fedcloud option:selected').html(), vofedcloud: $('#vo-fedcloud').val()},
                    //data:{endpointfedcloud: $('#endpoint-fedcloud').val(), vofedcloud: $('#vo-fedcloud').val()},
                    success : function(text)
                    {   
                        $('#vmifedcloud').html(text);
                        //$("select#vmi-fedcloud").html(text);
                    }
                });
                <!-- Send endpoint selected to the server to obtain instance types-->
                $.ajax({
                    method: "POST",
                    url: "print_select_instances.php",
                    data:{endpointfedcloud: $('#endpoint-fedcloud option:selected').html(), vofedcloud: $('#vo-fedcloud').val()},
                    //data:{endpointfedcloud: $('#endpoint-fedcloud').val(), vofedcloud: $('#vo-fedcloud').val()},
                    success : function(text)
                    {   
                        $('#frontfedcloud').html(text);
                        $('#wnfedcloud').html(text.replace(/front-fedcloud/g, "wn-fedcloud"));
                    }
                });
            });
            
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
                    /*$.ajax({
                        method: "POST",
                        url: "print_select_os.php",
                        data:{endpointfedcloud: name},
                        //data:{endpoint-fedcloud: $('#endpoint-fedcloud').val()},
                        success : function(text)
                        {   
                            $('.vmifedcloud').html(text);
                        }, 
                        error: function(response, status, error){
                            var obj = jQuery.parseJSON(JSON.stringify(response));
                            //retValue = "<div> <b> " + obj.responseText + " </b></div> ";
                            retValue = "<div> <b> " + JSON.stringify(response) + " </b></div> ";
                            retValue += "<div> <b> " + JSON.stringify(status) + " </b></div> ";
                            retValue += "<div> <b> " + JSON.stringify(error) + " </b></div> ";
                            alert(retValue);
                        }
                    });*/
                }
                return retValue;
            }

            function showDetails_OCCI() {
                var retValue = ' '
                var vo = $('#vo-fedcloud').val();
                //obtener proxy y endpoint
                var proxy = $('#proxy').val();
                if(proxy == ""){
                    proxy = "not indicated";
                }else{
                    proxy = "*********";
                }
                var endpoint = $('#endpoint-fedcloud').val();
                var endpointName = $('#endpoint-fedcloud option:selected').html();
                var proxyserver = $('#myproxy-server').val();
                var proxyuser = $('#myproxy-user').val();
                var proxypass = $('#myproxy-pass').val();

                //obtener el OS seleccionado
                //var os = $('#os-fedcloud').val();
                var vmi = $('#vmi-fedcloud').val();

                //obtener las caracteristicas de las VMs
                var front_type = $('#front-fedcloud').val();
                var wn_type = $('#wn-fedcloud').val();

                //obtener el LRMS seleccionado
                var lrms = $('#lrms-fedcloud').val();

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
                if( $('.fedcloud.col-sm-12 #hadoop').prop('checked') ) sw += "Hadoop";

                if (sw == ''){
                    sw +="Nothing selected"
                }

                if (lrms == ''){
                    lrms +="nothing selected"
                }

                //obtener el numero de nodos
                var nodes = parseInt($('#nodes-fedcloud').val());

                retValue = "<div> <b> VO: </b> " + vo + "<b> Proxy: </b>" + proxy + "</div><div><b>Endpoint: </b>" + endpointName + "</div>";
                if(proxyserver != '' && proxyuser != '' && proxypass != ''){
                    proxypass = "**********";
                    retValue += "<div> <b> MyProxy Server: </b>" + proxyserver + "</div><div> <b> MyProxy User: </b>" + proxyuser + "</div><div><b> MyProxy Password: </b>" + proxypass + "</div>";
                }

                if(vmi != ''){
                    retValue += "<div> <b> VMI: </b>" + vmi + "</div>";
                } else {
                    retValue += "<div> <b>VMI: </b> nothing indicated</div>";
                }
                /*else if (os!= ''){
                    retValue+= "<div> <b>Operating System: </b>" + os + "</div>";
                } else {
                    retValue+= "<div> <b>Operating System: </b> nothing selected</div>";
                }*/

                retValue +="<div> <b>Frontend instance type: </b>" + front_type + "</div>" +
                           "<div> <b>Working nodes instance type: </b>" + wn_type + "</div>" +
                           "<div> <b>Local Resource Management System: </b>" + lrms + "</div>" +
                           "<div> <b>Software packages: </b>" + sw + "</div>" +
                           "<div> <b>Maximum number of nodes: </b>" + nodes + "</div>";


                //Mostramos los datos recogidos al usuario
                //$('.wizard-resume').append(retValue);
                $('.wizard-resume').html(retValue);
            };
            
            function reload() {
                location.reload(true);
            };

        </script>

    <!-- Wizard plugin delete a cluster -->
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.wizard.logging = true;
                var wizard = $('#delete-wizard').wizard({
                    keyboard : false,
                    contentHeight : 400,
                    contentWidth : 700,
                    backdrop: 'static',
                    submitUrl: "ec3-destroy-cluster.php"
                });

                $(".chzn-select").chosen();
                wizard.on('closed', function() {
                    wizard.reset();
                });
                wizard.on("reset", function() {
                    wizard.modal.find(':input').val('').removeAttr('disabled');
                    wizard.modal.find('.form-group').removeClass('has-error').removeClass('has-succes');
                });
                wizard.on("submit", function(wizard) {
                    $.ajax({
                            type: "POST",
                            url: wizard.args.submitUrl,
                            data: wizard.serialize(),
                            dataType: "json",
                            success: function(response, status, data){
                                    wizard.submitSuccess();         // displays the success card
                                    wizard.hideButtons();           // hides the next and back buttons
                                    wizard.updateProgressBar(0);    // sets the progress meter to 0
                            },
                            error: function(response, status, error){
                                    var obj = jQuery.parseJSON(JSON.stringify(response));
                                    retValue = "<div> <b> " + obj.responseText + " </b></div> ";
                                    //retValue = "<div> <b> " + JSON.stringify(response) + " </b></div> ";
                                    //retValue += "<div> <b> " + JSON.stringify(status) + " </b></div> ";
                                    //retValue += "<div> <b> " + JSON.stringify(error) + " </b></div> ";
                                    $('.wizard-ip').html(retValue);
                                    wizard.submitError();           // display the error card
                                    wizard.hideButtons();           // hides the next and back buttons
                            }
                    });
                });
                wizard.el.find(".wizard-success .im-done").click(function() {
                    wizard.hide();
                    setTimeout(function() {
                        wizard.reset();
                    }, 250);

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
                    }, 250);

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
                $('#open-wizard-delete').click(function(e) {
                    e.preventDefault();
                    wizard.show();
                });
            });
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

            function setClusterName(card) {
                var name = $("#clustername").val();
                card.wizard.el.find(".create-cluster-name").text(name);
            }

        </script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>
