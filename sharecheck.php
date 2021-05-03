<?php include('vtr_header.php');?>
<?php include('vtr_top_menu.php');?>
<?php include('vtr_side_nav.php');?>
<div class="container-fluid" style="overflow: scroll;" >
        <div class="row" style="margin-top: 5%;height:75vh;">
          <div class="col-md-1"></div>
          <form class="col-md-10 container-fluid" action="#" enctype="multipart/form-data" style="background: #fff; color:rgb(0,0,51); margin-bottom:100px; padding-bottom:15px;">
            <div class="row" style="border-bottom: 2px solid rgb(0,0,51);">
              <div class="col-md-3"><i class="fa fa-trash" aria-hidden="true"></i> &nbsp;<b>Recycle Bin</b></div>
              <div class="col-md-4"></div>
              <div class="col-md-2">
                <label><?php echo date('d-m-Y');?></label>
              </div>
              <div class="col-md-3">
                        <div id="time-cont"></div>
                <!-- <label><?php echo date('H:i:s a');?></label>  -->    
              </div>    
              </div>
          <!--<a href="#" data-toggle="modal" data-target="#upload_try">
            <input type="submit" name="upload" id="upfile" value="Add File" style="margin-top: 10px;" class="btn-xs btn-success pull-right"/>
          </a>
          <a href="#" data-toggle="modal" data-target="#uploadfolder_try">
            <input type="button" name="upload" id="upfolder" value="Add Folder" style="margin-top: 10px;" class="btn-xs btn-success pull-right"/>
          </a>-->
          <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>"/>
  <h4 class="section-title">My Trash</h4>
    <div id="foldername"></div>
    <div class="row">
      <div class="col-md-8">
        <?php
        $website = "http://localhost/";
        if(isset($_POST['dir'])){
        $dir = $_POST['dir'];
        $backButton= "<hr/><span style='cursor:pointer;' class='back'><span class='glyphicon glyphicon-menu-left'></span> <b>Back</b><br/></span>";
        echo $dir;
      }
      else{
        $dir ="SELECT `image` FROM `share_table` where `share_with` ='".$_SESSION['username']."'";
        $backButton="<hr/>";
        //echo $dir;
      }

        $pages = explode("/", $dir);
        //print_r($pages);
        foreach ($pages as $key => $value) {
          //echo '<span title="Double click to jump inside the folder" class="folder" path="'.$value.'">'.$value.'</span> ';
          
        }

          function filesize_formatted($path){
            $size = filesize($path);
            $units = array( 'Byte', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
            $power = $size > 0 ? floor(log($size, 1024)) : 0;
            return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
        }

      
        function listFolderFiles($dir, $type){
          //$dir = "uploads/".$_SESSION['user_id']."/".$dir;
          //echo $dir;
          
            $ffs = scandir($dir);

            unset($ffs[array_search('.', $ffs, true)]);
            unset($ffs[array_search('..', $ffs, true)]);

            // prevent empty ordered elements
            if (count($ffs) < 1)
                return;

            echo "<div class='row'>";
            foreach($ffs as $ff){
                
                if($type == 'Folders'){
                  if(is_dir($dir.'/'.$ff)){
                  $con = mysqli_connect("localhost","root","","task_management");
                  $query ="SELECT `image` FROM `share_table` where `share_with` ='".$_SESSION['username']."'";
                //echo $query;
                $result= mysqli_query($con,$query);
                if(mysqli_num_rows($result) > 0){
                  $flag = 0;
                while($row = mysqli_fetch_array($result)){
                  $flag++;
                }
                if($flag > 0){
                      echo'<div class="col-sm-4 box " style="font-family:Times New Roman, Times, serif;">
                        <div class="inner_box">
                        <span style="float:right;">
                          <a class="move_to_trash" type="button" data-path="'.$ff.'" data-type="folder" data-trash="0" ><i class="fa fa-undo" style="font-size:16px"></i></a>
                          </span>
                      <span style="cursor:pointer;" class="folder" path="'.$dir.'/'.$ff.'">
                          <span class="glyphicon glyphicon-folder-close warning fa fa-folder" style="color:#ffa70f;"></span><br/>
                          <span title="Double click to jump inside the folder">'.$ff.'
                          </span>
                        </div>
                    </div>';
                      echo "<br/>";
                    }
                  
                    }

                      //echo $dir.$ff;
                  }
              }
              if($type=='Files'){
                if(!is_dir($dir.'/'.$ff)){  

                  $con = mysqli_connect("localhost","root","","task_management");
                  $query = "SELECT `image` FROM `share_table` where `share_with` ='".$_SESSION['username']."'";
                  //echo $query;
                  $result= mysqli_query($con,$query);
                  if(mysqli_num_rows($result) > 0){


                  $row = mysqli_fetch_array($result);

                      $ext = strtolower(pathinfo($ff, PATHINFO_EXTENSION));
                  //echo "<h3>". basename($_POST['file'], '?' . $_POST['file'])."</h3><hr/>"; 
                  //$file = $_POST['file'];
                  if($ext =="png" || $ext == "jpg"|| $ext == "jpeg" || $ext == "gif"|| $ext == "bmp"){
                    //echo "<img src='".$file."' class='img-responsive trydata'/>";           
                    echo '<div class="col-sm-4 box" style="font-family:Times New Roman, Times, serif;"><div class="inner_box"><span style="float:right;">
                        <a class="move_to_trash" type="button" data-path="'.$row['image'].'" data-trash="0" ><i class="fa fa-undo" style="font-size:16px"></i></a></span><span style="cursor:pointer;" class="file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'"><span class="fa fa-file-image-o" style="color:#fff;"></span><br/><span title=" File Name - '.$ff.', ('.filesize_formatted($dir.'/'.$ff).'), Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.substr($ff, 0, 10).'...</span></div></div><br/>';

                  }else if($ext =="php" || $ext == "html"|| $ext == "htm" || $ext == "css"|| $ext == "js"){
                    //echo highlight_file($file);
                    echo '<div class="col-sm-4 box" style="font-family:Times New Roman, Times, serif;"><div class="inner_box"><span style="cursor:pointer;"> <span style="float:right;">
                        <a class="move_to_trash" type="button" data-path="'.$row['image'].'" data-trash="0" ><i class="fa fa-undo" style="font-size:16px"></i></a></span><span class="fa fa-file-code-o file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'" style="color:#fff;"></span><br/><span title="File Name - '.$ff.',('.filesize_formatted($dir.'/'.$ff).'), Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.substr($ff, 0, 10).'...</div></div><br/>';
                  }else if($ext =="pdf"){
                    //echo'<iframe src="'.$file.'" width="100%" height="350px"></iframe>';
                    echo '<div class="col-sm-4 box" style="font-family:Times New Roman, Times, serif;"><div class="inner_box"><span style="cursor:pointer;"> <span style="float:right;">
                        <a class="move_to_trash" type="button" data-path="'.$row['image'].'" data-trash="0" ><i class="fa fa-undo" style="font-size:16px"></i></a></span><span class="fa fa-file-pdf-o file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'" style="color:#fff;"></span><br/><span title="File Name - '.$ff.',('.filesize_formatted($dir.'/'.$ff).'), Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.substr($ff, 0, 10).'...</div></div><br/>';
                  }else if($ext =='ppt' || $ext =='pptx' || $ext =='doc' || $ext =='docx' || $ext =='xls' || $ext =='xlsx'){
                    //echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=".$website.$file."'></iframe>";
                    echo '<div class="col-sm-4 box" style="font-family:Times New Roman, Times, serif;"><div class="inner_box"> <span style="float:right;">
                        <a class="move_to_trash" type="button" data-path="'.$row['image'].'" data-trash="0" ><i class="fa fa-undo" style="font-size:16px"></i></a></span><span style="cursor:pointer;" ><span class="fa fa-file-text-o file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'" style="color:#fff;"></span><br/><span title="File Name - '.$ff.',('.filesize_formatted($dir.'/'.$ff).'), Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.substr($ff, 0, 10).'...</div></div><br/>';
                  }
                  else if($ext =='mp3' || $ext == 'wav' || $ext == 'wma')
                  {
                    echo '<div class="col-sm-4 box" style="font-family:Times New Roman, Times, serif;"><div class="inner_box "> <span style="float:right;">
                        <a class="move_to_trash" type="button" data-path="'.$row['image'].'" data-trash="0" ><i class="fa fa-undo" style="font-size:16px"></i></a>
                    </span><span style="cursor:pointer;"><span class="fa fa-file-audio-o file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'"  style="color:#fff;"></span><br/><span title="File Name - '.$ff.',('.filesize_formatted($dir.'/'.$ff).'), Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'">'.substr($ff, 0, 10).'...</div></div><br/>';
                    //echo '<span style="cursor:pointer;" class="file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'/"><span class="fa fa-file" style="color:#fff;"></span><span title="'.filesize_formatted($dir.'/'.$ff).', Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.$ff."<br/>";
                  }                     
                      else if ($ext == 'mp4' || $ext == '3gp' || $ext == 'ogg' || $ext == 'webm' || $ext == 'flv' || $ext  == 'avi')
                      {
                        echo '<div class="col-sm-4 box" style="font-family:Times New Roman, Times, serif;"><div class="inner_box"><span style="float:right;">
                        <a class="move_to_trash" type="button" data-path="'.$row['image'].'" data-trash="0" ><i class="fa fa-undo" style="font-size:16px"></i></a></span><span style="cursor:pointer;" class="file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'"><span class="fa fa-file-video-o" style="color:#fff;"></span><br/><span title="File Name - '.$ff.',('.filesize_formatted($dir.'/'.$ff).'), Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'">'.substr($ff, 0, 10).'...</span></div></div><br/>';
                  }
                }
                    }
              }
            }
            echo "</div>";
        }
        echo $backButton;
        listFolderFiles($dir, 'Folders');
        listFolderFiles($dir, 'Files');?>
      </div>
      <div class="col-md-4" id="show_file">
        <?php
        if(isset($_POST['file'])){
          echo"<div style='border:1px solid #808080;padding:5px; box-shadow:10px 0px 20px 5px; border-radius:5px; background-color:#fff;color:#000;'>";
          $ext = strtolower((pathinfo($_POST['file'], PATHINFO_EXTENSION)));
          $filesize = filesize($_POST['file']);
          $filesize = round($filesize / 1024 / 1024 , 1);
          echo "<a href='#'><span class='pull-right' style='font-size:20px;padding:8px;'>&times;</span></a><h3 style='font-family:Times New Roman, Times, serif;text-align:center;' class='section-title'>".substr((basename($_POST['file'], '?' . $_POST['file'])),0,15)."...</h3><hr/>";  
          $file = $_POST['file'];
          if($ext =="png" || $ext == "jpg"|| $ext == "jpeg" || $ext == "gif"|| $ext == "bmp"){
            echo "<img src='".$file."' class='img-responsive trydata'/>";
            echo "File Type:";
            echo $ext;
            echo "<hr/>File Size:";
            echo $filesize."MB<hr/>";
          }else if($ext =="php" || $ext == "html"|| $ext == "htm" || $ext == "css"|| $ext == "js"){
            echo highlight_file($file);
            echo "<br/>File Type:";
            echo $ext;
            echo "<hr/>File Size:";
            echo $filesize."MB";
          }else if($ext =="pdf"){
            echo'<iframe src="'.$file.'" width="100%" height="300px"></iframe>';
            echo "<br/>File Type:";
            echo $ext;
            echo "<hr/>File Size:";
            echo $filesize."MB";
          }else if($ext =='ppt' || $ext =='pptx' || $ext =='doc' || $ext =='docx' || $ext =='xls' || $ext =='xlsx'){
            echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=".$website.$file."'></iframe>";
            echo "<br/>File Type:";
            echo $ext;
            echo "<hr/>File Size:";
            echo $filesize."MB";
          }
          else if($ext =='mp3' || $ext == 'wav' || $ext == 'wma')
          {
            echo "<audio style='width:100%;' src='".$file."' controls download></audio><br/><br/>";
            echo "File Type:";
            echo $ext;
            echo "<hr/>File Size:";
            echo $filesize."MB<hr/>";
          }
          else if ($ext == 'mp4' || $ext == '3gp' || $ext == 'ogg' || $ext == 'webm' || $ext == 'flv' || $ext  == 'avi') {
            echo '<video style="width:100%;" controls><source src="'.$file.'" type="video/mp4"></video>';
            echo "File Type:";
            echo $ext;
            echo "<hr/>File Size:";
            echo $filesize."MB<hr/>";
          }   
          echo "</div>";
        }?>
      </div>
    </div>

    </form>
     <div class="col-md-1"></div>
      </div>
</div>
<?php include('vtr_footer.php');?>