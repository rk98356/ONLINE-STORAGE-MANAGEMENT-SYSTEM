<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right" id="sidebar-wrapper">

        <div class="list-group list-group-flush">
            <a href="ad_index.php" class="list-group-item list-group-item-action " style="background: #fff; color:rgb(0,0,51);"><?php echo $_SESSION['desig']; ?> Dashboard</a>
<?php
if($_SESSION['desig']=="Intern-01" || $_SESSION['desig']=="Intern-02"){
     echo'<ul style="list-style-type: none; margin-top:15px; margin-bottom: 5px; margin-left: 0px;">
                <li class="side-item dropdown">      
                  <a href="#" class="side-link dropdown-toggle"  id="navbarDropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none; color:rgb(0,0,51);"> 
                    <i class="fa fa-file" aria-hidden="true"></i>&nbsp; Task
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarDropdown" >
                      <a class="dropdown-item" href="tm_add.php">
                          <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add</a>
                      <a class="dropdown-item" href="tm_edit.php">
                          <i class="fa fa-edit" aria-hidden="true"></i> &nbsp;Edit</a>
                      <a class="dropdown-item" href="tm_view.php">
                          <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;View</a>
                  </div>
                </li>
            </ul>';
        }
else if($_SESSION['desig']=="Admin"){
     echo'<ul style="list-style-type: none; margin-top:15px; margin-bottom: 5px; margin-left: 0px;">
                <li class="side-item dropdown">

                    <a class="side-link dropdown-toggle" style="text-decoration-line:none; color: rgb(0,0,51);" href="#"  id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        <i class="fa fa-user" aria-hidden="true"></i>&nbsp; User
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarDropdown">
                        <a class="dropdown-item" href="ad_add_user.php">
                            <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add User</a>
                        <a class="dropdown-item" href="ad_view_user.php">
                            <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;View User</a>
                        <a class="dropdown-item" href="ad_edit_user.php">
                            <i class="fa fa-edit" aria-hidden="true"></i>&nbsp; Edit User </a>
                    </div>
                </li>
            </ul>
            <div class="dropdown-divider"></div>
            <ul style="list-style-type: none; margin-top:15px; margin-bottom: 5px; margin-left: 0px;">
                <li class="side-item dropdown">

                    <a style="text-decoration-line:none; color: rgb(0,0,51);" href="#" class="side-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:rgb(0,0,51);">
                        <i class="fa fa-file" aria-hidden="true"></i>&nbsp; Task
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarDropdown">
                        <a class="dropdown-item" href="ad_view_task.php">
                            <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;View Task</a>
                        <a class="dropdown-item" href="ad_mail_task_view
                        .php">
                            <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Mail Task</a>
                    </div>
                </li>
            </ul>';
      }
?>      
          <ul style="list-style-type: none; margin-top:15px; margin-bottom: 5px; margin-left: 0px;">
                <li class="side-item dropdown">      
                  <a href="#" class="side-link dropdown-toggle"  id="navbarDropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none; color:rgb(0,0,51);"> 
                    <i class="fa fa-file" aria-hidden="true"></i>&nbsp; Visitor
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarDropdown" >
                      <a class="dropdown-item" href="demo.php">
                          <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add Visitor</a>
                      <a class="dropdown-item" href="tm_edit.php">
                          <i class="fa fa-edit" aria-hidden="true"></i> &nbsp;Assign Empolyee</a>
                      <a class="dropdown-item" href="tm_view.php">
                          <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Visitor List</a> 
                      <a class="dropdown-item" href="tm_view.php">
                          <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;Visitor Work</a>
                  </div>
                </li>
            </ul>
        </div>
    </div>