<?php include('vtr_header.php');?>
<?php include('vtr_top_menu.php');?>
<?php include('vtr_side_nav.php');?>
<?php if($_SESSION['desig']=="Intern"){
    echo "<script>window.location.href='vtr_index_view.php';</script>";
} ?>

    <form method="POST" id="doodle_form">       
        <div class="container-fluid" style="margin-top: 2%;width: 1200px;">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" style="background:white; min-height: 450px; border:2px solid green; border-radius:0px 10px 10px 0;">
                    <h5> Add User</h5>
                            <br/>
                            <br/>
                            <label style="margin-top:10px; margin-bottom:0px; font-size:20px;">Add Existing User</label>
                            <br/>
                            <br/>
                            <div>
                            <div class="input-group">
                                <input list="browsers" name="browser" class="form-control">
                                <datalist id="browsers">
                                <?php
                                    $con = mysqli_connect('localhost', 'root', '', 'task_management');
                                    $select_user="SELECT * FROM `user_details`";
                                    $result_user=mysqli_query($con,$select_user);
                                    while ($row_user=mysqli_fetch_array($result_user)) {
                                        echo "<option>".$row_user['name']."</option>";
                                        # code...
                                    }
                                ?>
                                </datalist>
                               <span>
                                    <input type="button" name="add_user" value="Add User" class="btn btn-success pull-right">
                                </span>
                            </div>
                                <label style="margin-top:10px; margin-bottom:0px; font-size:20px;">Add New User</label><br/>
                                <label style="margin-top:10px; margin-bottom:0px;">Name</label>
                                <input type="text" placeholder=" Enter Your Name.." required="true" class="form-control" id="name_check">
                                <span id="namespan" class="text-danger"></span>
                                <br/>
                                <label style="margin-top:10px; margin-bottom:0px;">Mobile-no</label>
                                <br/>
                                <input type="text" placeholder="  Your Mobile-no.." maxlength="10" minlength="10"required="true" class="form-control"  id="mobileno_check" >
                                <span id="mobileno_span" class="text-danger"></span>
                                <br/>
                                <label style="margin-top:10px; margin-bottom:0px;">Email</label>
                                <br/>
                                <input type="email" placeholder=" Enter Your Email.." required="true" class="form-control" name="email_check" id="email_check">
                                <span id="email_span" class="text-danger"></span>
                                <br/>
                                <input type="submit" class="btn btn-primary pull-right" style="background:rgb(0, 0,51); color:#fff;" id="save" value="Submit">
                                <br/>
                                <br/>
                            </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    </form>
<?php include('vtr_footer.php');?>