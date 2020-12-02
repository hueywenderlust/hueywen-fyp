   <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed|Poppins" rel="stylesheet">



   <div class="navbar navbar-inverse set-radius-zero" >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">
                <img src="assets/img/logo.png" />
            </a>
        </div>
        <div class="right-div">
            <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo htmlentities($_SESSION['alogin']);?>
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="change-password.php">Edit Passsword</a></li>
      <li><a href="logout.php" >Log Out</a></li>
    </ul>
  </div>
</div>



            
        </div>
    </div>
</div>
<!-- LOGO HEADER END-->
<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Announcement<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="create-announcement.php">Create New Announcement</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-announcement.php">Manage Announcement</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="view-announcement.php">View Announcement</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Parcels <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="create-parcel.php">Create New Parcel</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-parcel.php">Manage Parcels</a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Manage Message <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-message.php">Announcement Message</a></li>
                                 <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-pcmessage.php">Parcel Message</a></li> 
                                 
                                
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Manage User <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-adminlist.php">Admin List</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-stafflist.php">User List</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="create-admin.php">Create New Admin</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="create-user.php">Create New User</a></li>
                                
                            </ul>
                        </li>


                     

                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-isticket.php">Manage Issues Ticket</a></li>
                     
                        
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>