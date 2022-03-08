<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Settings - HRMS admin template</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="assets/css/line-awesome.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/css/select2.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
	
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
		<!-- Header -->
            <div class="header">
            
                <!-- Logo -->
                <div class="header-left">
                    <a href="index" class="logo">
                        <img src="assets/img/logo.png" width="40" height="40" alt="">
                    </a>
                </div>
                <!-- /Logo -->
                
                <a id="toggle_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                
                <!-- Header Title -->
                <div class="page-title-box">
                    <h3>Dreamguy's Technologies</h3>
                </div>
                <!-- /Header Title -->
                
                <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
                
                <!-- Header Menu -->
                <ul class="nav user-menu">
                
                    <!-- Search -->
                    <li class="nav-item">
                        <div class="top-nav-search">
                            <a href="javascript:void(0);" class="responsive-search">
                                <i class="fa fa-search"></i>
                           </a>
                            <form action="search">
                                <input class="form-control" type="text" placeholder="Search here">
                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </li>
                    <!-- /Search -->
                    
                    <!-- Flag -->
                    <li class="nav-item dropdown has-arrow flag-nav">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
                            <img src="assets/img/flags/us.png" alt="" height="20"> <span>English</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/img/flags/us.png" alt="" height="16"> English
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/img/flags/fr.png" alt="" height="16"> French
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/img/flags/es.png" alt="" height="16"> Spanish
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/img/flags/de.png" alt="" height="16"> German
                            </a>
                        </div>
                    </li>
                    <!-- /Flag -->
                    
                    <!-- Notifications -->
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <i class="fa fa-bell-o"></i> <span class="badge rounded-pill">3</span>
                        </a>
                        <div class="dropdown-menu notifications">
                            <div class="topnav-dropdown-header">
                                <span class="notification-title">Notifications</span>
                                <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                            </div>
                            <div class="noti-content">
                                <ul class="notification-list">
                                    <li class="notification-message">
                                        <a href="activities">
                                            <div class="media d-flex">
                                                <span class="avatar flex-shrink-0">
                                                    <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                                    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="activities">
                                            <div class="media d-flex">
                                                <span class="avatar flex-shrink-0">
                                                    <img alt="" src="assets/img/profiles/avatar-03.jpg">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
                                                    <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="activities">
                                            <div class="media d-flex">
                                                <span class="avatar flex-shrink-0">
                                                    <img alt="" src="assets/img/profiles/avatar-06.jpg">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
                                                    <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="activities">
                                            <div class="media d-flex">
                                                <span class="avatar flex-shrink-0">
                                                    <img alt="" src="assets/img/profiles/avatar-17.jpg">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
                                                    <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="activities">
                                            <div class="media d-flex">
                                                <span class="avatar flex-shrink-0">
                                                    <img alt="" src="assets/img/profiles/avatar-13.jpg">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
                                                    <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="topnav-dropdown-footer">
                                <a href="activities">View all Notifications</a>
                            </div>
                        </div>
                    </li>
                    <!-- /Notifications -->
                    
                    <!-- Message Notifications -->
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <i class="fa fa-comment-o"></i> <span class="badge rounded-pill">8</span>
                        </a>
                        <div class="dropdown-menu notifications">
                            <div class="topnav-dropdown-header">
                                <span class="notification-title">Messages</span>
                                <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                            </div>
                            <div class="noti-content">
                                <ul class="notification-list">
                                    <li class="notification-message">
                                        <a href="chat">
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="avatar">
                                                        <img alt="" src="assets/img/profiles/avatar-09.jpg">
                                                    </span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author">Richard Miles </span>
                                                    <span class="message-time">12:28 AM</span>
                                                    <div class="clearfix"></div>
                                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="chat">
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="avatar">
                                                        <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                                    </span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author">John Doe</span>
                                                    <span class="message-time">6 Mar</span>
                                                    <div class="clearfix"></div>
                                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="chat">
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="avatar">
                                                        <img alt="" src="assets/img/profiles/avatar-03.jpg">
                                                    </span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author"> Tarah Shropshire </span>
                                                    <span class="message-time">5 Mar</span>
                                                    <div class="clearfix"></div>
                                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="chat">
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="avatar">
                                                        <img alt="" src="assets/img/profiles/avatar-05.jpg">
                                                    </span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author">Mike Litorus</span>
                                                    <span class="message-time">3 Mar</span>
                                                    <div class="clearfix"></div>
                                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="chat">
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="avatar">
                                                        <img alt="" src="assets/img/profiles/avatar-08.jpg">
                                                    </span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author"> Catherine Manseau </span>
                                                    <span class="message-time">27 Feb</span>
                                                    <div class="clearfix"></div>
                                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="topnav-dropdown-footer">
                                <a href="chat">View all Messages</a>
                            </div>
                        </div>
                    </li>
                    <!-- /Message Notifications -->

                    <li class="nav-item dropdown has-arrow main-drop">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <span class="user-img"><img src="assets/img/profiles/avatar-21.jpg" alt="">
                            <span class="status online"></span></span>
                            <span>Admin</span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile">My Profile</a>
                            <a class="dropdown-item" href="settings">Settings</a>
                            <a class="dropdown-item" href="login">Logout</a>
                        </div>
                    </li>
                </ul>
                <!-- /Header Menu -->
                
                <!-- Mobile Menu -->
                <div class="dropdown mobile-user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="profile">My Profile</a>
                        <a class="dropdown-item" href="settings">Settings</a>
                        <a class="dropdown-item" href="login">Logout</a>
                    </div>
                </div>
                <!-- /Mobile Menu -->
                
            </div>
            <!-- /Header -->

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div class="sidebar-menu">
						<ul>
                                         <li class="{{ Request::is('index') ? 'active' : '' }}">
        <a  href="{{ url('index') }}"><i class="la la-home"></i> <span>Back to Home</span>  </a></li>

							
							<li class="menu-title">Settings</li>

                            <li class="{{ Request::is('settings') ? 'active' : '' }}">
        <a  href="{{ url('settings') }}"><i class="la la-building"></i><span>Company Settings</span>  </a></li>

        <li class="{{ Request::is('localization') ? 'active' : '' }}">
        <a  href="{{ url('localization') }}"><i class="la la-clock-o"></i><span>Localization</span>  </a></li>

        <li class="{{ Request::is('theme-settings') ? 'active' : '' }}">
        <a  href="{{ url('theme-settings') }}"><i class="la la-photo"></i><span>Theme Settings</span>  </a></li>
        <li class="{{ Request::is('roles-permissions') ? 'active' : '' }}">
        <a  href="{{ url('roles-permissions') }}"><i class="la la-key"></i> <span>Roles & Permissions</span>  </a></li>
        <li class="{{ Request::is('email-settings') ? 'active' : '' }}">
        <a  href="{{ url('email-settings') }}"><i class="la la-at"></i><span>Email Settings</span>  </a></li>
        <li class="{{ Request::is('performance-setting') ? 'active' : '' }}"> 
                                <a href="{{ url('performance-setting') }}"><i class="la la-chart-bar"></i> <span>Performance Settings</span></a>
                            </li>
                            <li class="{{ Request::is('approval-setting') ? 'active' : '' }}"> 
                                <a href="{{ url('approval-setting') }}"><i class="la la-thumbs-up"></i> <span>Approval Settings</span></a>
                            </li>
		<li class="{{ Request::is('invoice-settings') ? 'active' : '' }}">
        <a  href="{{ url('invoice-settings') }}"><i class="la la-pencil-square"></i><span>Invoice Settings</span>  </a></li>
        <li class="{{ Request::is('salary-settings') ? 'active' : '' }}">
        <a  href="{{ url('salary-settings') }}"><i class="la la-money"></i> <span>Salary Settings</span>  </a></li>
		<li class="{{ Request::is('notifications-settings') ? 'active' : '' }}">
        <a  href="{{ url('notifications-settings') }}"><i class="la la-globe"></i><span>Notifications</span>  </a></li>
		<li class="{{ Request::is('change-password') ? 'active' : '' }}">
        <a  href="{{ url('change-password') }}"><i class="la la-lock"></i><span>Change Password</span>  </a></li>
		<li class="{{ Request::is('leave-type') ? 'active' : '' }}">
        <a  href="{{ url('leave-type') }}"><i class="la la-cogs"></i> <span>Leave Type </span>  </a></li>	
        <li class="{{ Request::is('toxbox-setting') ? 'active' : '' }}"> 
								<a href="{{ url('toxbox-setting') }}"><i class="la la-comment"></i> <span>ToxBox Settings</span></a>
							</li>
							<li class="{{ Request::is('cron-setting') ? 'active' : '' }}"> 
								<a href="{{ url('cron-setting') }}"><i class="la la-rocket"></i> <span>Cron Settings</span></a>
							</li>	
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
		
        <!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                        
                            <!-- Page Header -->
                            <div class="page-header">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="page-title">Invoice Settings</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- /Page Header -->
                            
                            <form>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Invoice prefix</label>
                                    <div class="col-lg-9">
                                        <input type="text" value="INV" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Invoice Logo</label>
                                    <div class="col-lg-7">
                                        <input type="file" class="form-control">
                                        <span class="form-text text-muted">Recommended image size is 200px x 40px</span>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="img-thumbnail float-end"><img src="assets/img/logo3.png" class="img-fluid" alt="" width="140" height="40"></div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Page Content -->
                
            </div>
            <!-- /Page Wrapper -->


        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
       <script src="assets/js/jquery-3.6.0.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/js/select2.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>
		
    </body>
</html>