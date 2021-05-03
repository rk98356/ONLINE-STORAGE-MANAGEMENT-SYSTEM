<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right" id="sidebar-wrapper">

        <div class="list-group list-group-flush">
            <a href="vtr_index_view.php" class="list-group-item list-group-item-action " style="background: #fff; color:rgb(0,0,51);"><i class="material-icons" style="font-size:20px">dashboard</i> <?php echo $_SESSION['desig']; ?> Dashboard</a>
<?php
if($_SESSION['desig']=="Admin"){
     echo'<ul style="list-style-type: none; margin-top:15px; margin-bottom: 5px; margin-left: 0px;">
                <li class="side-item dropdown">

                    <a class="side-link dropdown-toggle" style="text-decoration-line:none; color: rgb(0,0,51);" href="#"  id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        <i class="fa fa-user" aria-hidden="true"></i>&nbsp; User
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarDropdown">
                        <a class="dropdown-item" href="stor_add_user.php">
                            <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add User</a>
                        <a class="dropdown-item" href="ad_view_user.php">
                            <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;View User</a>
                        <a class="dropdown-item" href="ad_edit_user.php">
                            <i class="fa fa-edit" aria-hidden="true"></i>&nbsp; Edit User </a>
                    </div>
                </li>
            </ul>';
      }
?>      
          <ul style="list-style-type: none; margin-top:15px; margin-bottom: 5px; margin-left: 0px;">
                <li class="side-item dropdown">      
                  <a href="#" class="side-link dropdown-toggle"  id="navbarDropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none; color:rgb(0,0,51);"> 
                    <i class="fa fa-cloud" aria-hidden="true"></i>&nbsp; Online Storage
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarDropdown" >
                      <a class="dropdown-item" href="uploadtry.php">
                          <i class="fa fa-folder" aria-hidden="true"></i> &nbsp;My Folder</a>
                      <a class="dropdown-item" href="stor_share_with_me.php">
                          <i class="fa fa-share-alt-square" aria-hidden="true"></i> &nbsp;Share With Me</a> 
                      <a class="dropdown-item" href="stor_trash.php">
                          <i class="fa fa-trash" aria-hidden="true"></i> &nbsp;Trash</a>
                  </div>
                </li>
            </ul>
			
        </div>
    </div>
  