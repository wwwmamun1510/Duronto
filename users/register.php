
<?php 
session_start();
if(!isset( $_SESSION['login'])){
   header('location:/Durjoy/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="/Durjoy/dashboard_assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/Durjoy/dashboard_assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="/Durjoy/dashboard_assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="/Durjoy/dashboard_assets/css/starlight.css">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
        <a href="/Durjoy/admin.php" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Home</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="/Durjoy/users/register.php" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Registration</span>
          </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      </div><!-- sl-sideleft-menu -->
      <?php if($_SESSION['role'] != 0 ){?>
      <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span class="menu-item-label">Users</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="/Durjoy/users/users.php" class="nav-link">User Info</a></li>

          <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){?>
          <li class="nav-item"><a href="/Durjoy/users/trash.php" class="nav-link">Trash</a></li>
          <?php }?>
          </ul>
       </div>
       <?php }?>
      <br>
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name"><?=$_SESSION['name']?></span>
              <img src="../../Durjoy/uploads/users/<?=$_SESSION['profile_photo']?>" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
                <li><a href="/Durjoy/logout.php"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-bell-outline"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
      <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link">
              <div class="media">
                <img src="/Durjoy/dashboard_assets/img/img3.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                  <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
            <a href="" class="media-list-link">
              <div class="media">
                <img src="/Durjoy/dashboard_assets/img/img4.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                  <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link">
              <div class="media">
                <img src="/Durjoy/dashboard_assets/img/img7.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
                  <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link">
              <div class="media">
                <img src="/Durjoy/dashboard_assets/img/img5.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
                  <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

                  <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link">
              <div class="media">
                <img src="/Durjoy/dashboard_assets/img/img3.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                  <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
                  <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
          </div><!-- media-list -->
          <div class="pd-15">
            <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
          </div>
        </div><!-- #messages -->

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="/Durjoy/dashboard_assets/img/img8.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                  <span class="tx-12">October 03, 2017 8:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="/Durjoy/dashboard_assets/img/img9.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                  <span class="tx-12">October 02, 2017 12:44am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="/Durjoy/dashboard_assets/img/img10.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                  <span class="tx-12">October 01, 2017 10:20pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="/Durjoy/dashboard_assets/img/img5.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                  <span class="tx-12">October 01, 2017 6:08pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="/Durjoy/dashboard_assets/img/img8.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
                  <span class="tx-12">September 27, 2017 6:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="/Durjoy/dashboard_assets/img/img10.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                  <span class="tx-12">September 28, 2017 11:30pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="/Durjoy/dashboard_assets/img/img9.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
                  <span class="tx-12">September 26, 2017 11:01am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="/Durjoy/dashboard_assets/img/img5.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                  <span class="tx-12">September 23, 2017 9:19pm</span>
                </div>
              </div><!-- media -->
            </a>
          </div><!-- media-list -->
        </div><!-- #notifications -->

      </div><!-- tab-content -->
    </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->

<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="index.html">Dashboard</a>
</nav>
<div class="sl-pagebody">
<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">
<div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
<div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span class="tx-inf
tx-normal">admin</span></div>
<div class="tx-center mg-b-60">Professional Admin Template Design</div>
<?php if(isset($_SESSION['success'])) {?>
<div class="alert alert-success">
<?=$_SESSION['success']?>
</div>
<?php } unset($_SESSION['success'])?>
<?php if(isset($_SESSION['email_exist'])) {?>
<div class="alert alert-warning">
<?=$_SESSION['email_exist']?>
</div>
<?php } unset($_SESSION['email_exist'])?>

<form action="post.php" method="POST" enctype='multipart/form-data'>
  <div class="form-group">
    <input type="text" name="name" class="form-control" placeholder="Enter your Name">
     </div><!-- form-group -->
      <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Enter your Email">
         </div><!-- form-group -->
          <div class="form-group">
           <input type="password" name="password" class="form-control" placeholder="Enter your Password">
           </div><!-- form-group -->
           <div class="form-group">
           <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1">Country</label>
           <div class="row row-xs">
           <select class="form-control" name='country' data-placeholder="Month">
           <option value="">Select Country</option>
           <option value="Bangladesh">Bangladesh</option>
           <option value="India">India</option>
           <option value="Pakistan">Pakistan</option>
           <option value="USA">USA</option>
           <option value="UK">UK</option>
           <option value="France">France</option>
           <option value="China">China</option>
           <option value="Israel">Israel</option>
           <option value="Japan">Japan</option>
           <option value="Indonesia">Indonesia</option>
           <option value="Malaysia">Malaysia</option>
           <option value="Singapore">Singapore</option>
           <option value="Australia">Australia</option>
           <option value="Myanmar">Myanmar</option>
           <option value="Iran">Iran</option>
           <option value="S.Korea">S.Korea</option>
           <option value="Canada">Canada</option>
           <option value="UAE">UAE</option>
           <option value="Brazil">Brazil</option>
           <option value="Aurzentina">Aurzentina</option>
           <option value="Cuba">Cuba</option>
           <option value="Philipine">Philipine</option>
           <option value="Paraguye">Paraguye</option>
           <option value="Alzeria">Alzeria</option>
           <option value="Tunisia">Tunisia</option>
           <option value="Egypt">Egypt</option>
           <option value="yibuti">yibuti</option>
           <option value="Uzbekistan">Uzbekistan</option>
           <option value="Maldip">Maldip</option>
           <option value="Srilanka">Srilanka</option>
           <option value="Thailand">Thailand</option>
           <option value="Nepal">Nepal</option>
          <option value="Laous">Laous</option>
          <option value="Vietnam">Vietnam</option>
          <option value="Bhutan">Combodia</option>
          <option value="Brunai">Brunai</option>
          <option value="Papua Newgini">Papua Newgini</option>
          <option value="Fiji">Fiji</option>
          <option value="Fiji">Newziland</option>
      </select>        
   </div>
<div class="form-group">
   <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1">Role</label>
      <div class="row row-xs ">
           <select class="form-control" name='role' data-placeholder="Month">
           <option value="">Select Role</option>
           <option value="1">Admin</option>
           <option value="2">Moderator</option>
           <option value="3">Viewer</option>
           <option value="0">Nutral</option>
       </select>        
    </div>
</div>
</div>
<div class="form-group">
<input type="file" name="profile_image" class="form-control">
</div><!-- form-group -->
<div class="form-group tx-12">Dear Users,by clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
   <button type="submit" class="btn btn-info btn-block">Sign Up</button>
</form>
<div class="mg-t-40 tx-center">Already Have An Account??<a href="../login.php" class="tx-info">Sign In</a></div>
</div>
</div>
</div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->

<?php require '../dashboard_includes/footer.php';?>
<?php
unset($_SESSION['email']);
unset($_SESSION['password']);
?>