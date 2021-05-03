
          <?php
            session_start();
            $website = "http://localhost/";
            $user_id = $_POST['user_id'];
            $check  = $_POST['check'];

            if($check == 'folder'){
                if(isset($_POST['dir']) && $_POST['dir'] == 'All'){
                    //$dir = $_POST['dir'];

                    $dir = "uploads/".$user_id;

                    $backButton= "<hr/><span style='cursor:pointer;' class='back'><span class='glyphicon glyphicon-menu-left'></span> <b>Back</b><br/>cff</span>";
                    //echo $dir;
                }
                else if(isset($_POST['dir'])){
                    $dir = "uploads/".$user_id."/".$_POST['dir'];

                    $backButton= "<hr/><span style='cursor:pointer;' class='back'><span class='glyphicon glyphicon-menu-left'></span> <b>Back</b><br/>cff</span>";
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
                            
                           if($type=='Folders'){
                                if(is_dir($dir.'/'.$ff)) 
                                    {
                                    echo'<div class="col-sm-4 box ">
                                            <div class="inner_box"><span style="cursor:pointer;" class="folder" path="'.$ff.'">
                                                <span class="glyphicon glyphicon-folder-close warning fa fa-folder" style="color:#ffa70f;"></span><br/>
                                                <span title="Double click to jump inside the folder">'.$ff." </span>
                                            </div>
                                        </div>";
                                        echo "<br/>";
                                        //echo $dir.$ff;
                                    }
                            }

                            if($type=='Files'){
                                if(!is_dir($dir.'/'.$ff)) 
                                    {
                                        $ext = strtolower((pathinfo($ff, PATHINFO_EXTENSION)));
                                        //echo "<h3>". basename($file, '?' . $file)."</h3><hr/>";   
                                        //$file = $file;
                                        if($ext =="png" || $ext == "jpg"|| $ext == "jpeg" || $ext == "gif"|| $ext == "bmp"){
                                            //echo "<img src='".$file."' class='img-responsive trydata'/>";
                                            echo '<div class="col-sm-4 box"><div class="inner_box file" path="'.$ff.'" dir="'.$dir.'/"><span style="cursor:pointer;" ><span class="fa fa-file-image-o" style="color:#fff;"></span><br/><span title="'.filesize_formatted($dir.'/'.$ff).', Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.$ff."</div></div><br/>";
                                        }else if($ext =="php" || $ext == "html"|| $ext == "htm" || $ext == "css"|| $ext == "js"){
                                            //echo highlight_file($file);
                                            echo '<div class="col-sm-4 box"><div class="inner_box file" path="'.$ff.'" dir="'.$dir.'/"><span style="cursor:pointer;"><span class="fa fa-file-code-o" style="color:#fff;"></span><br/><span title="'.filesize_formatted($dir.'/'.$ff).', Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.$ff."</div></div><br/>";
                                        }else if($ext =="pdf"){
                                            //echo'<iframe src="'.$file.'" width="100%" height="350px"></iframe>';

                                            echo '<div class="col-sm-4 box"><div class="inner_box file" path="'.$ff.'" dir="'.$dir.'/"><span style="cursor:pointer;"><span class="fa fa-file-pdf-o" style="color:#fff;"></span><br/><span title="'.filesize_formatted($dir.'/'.$ff).', Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.$ff."</div></div><br/>";
                                        }else if($ext =='ppt' || $ext =='pptx' || $ext =='doc' || $ext =='docx' || $ext =='xls' || $ext =='xlsx'){
                                            //echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=".$website.$file."'></iframe>";
                                            echo '<div class="col-sm-4 box"><div class="inner_box file" path="'.$ff.'" dir="'.$dir.'/"><span style="cursor:pointer;" ><span class="fa fa-file-text-o" style="color:#fff;"></span><br/><span title="'.filesize_formatted($dir.'/'.$ff).', Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.$ff."</div></div><br/>";
                                        }
                                        //echo '<span style="cursor:pointer;" class="file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'/"><span class="fa fa-file" style="color:#fff;"></span><span title="'.filesize_formatted($dir.'/'.$ff).', Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.$ff."<br/>";
                                    }
                            } 
                        }
                        echo "</div>";
                    }
                    echo $backButton;
                    listFolderFiles($dir, 'Folders');
                    listFolderFiles($dir, 'Files'); 
                }

                if($check == 'file'){
                    if(isset($_POST['file'])){

                        $file = 'uploads/'.$user_id.'/'.$_POST['file'];
                    echo"<div style='border:1px dotted #808080; padding: 10px;overflow-x: scroll;'>";
                    $ext = strtolower((pathinfo($file, PATHINFO_EXTENSION)));
                    echo "<h3>". basename($file, '?' . $file)."</h3><hr/>"; 
                    $file = $file;
                    if($ext =="png" || $ext == "jpg"|| $ext == "jpeg" || $ext == "gif"|| $ext == "bmp"){
                        echo "<img src='".$file."' class='img-responsive'/>";
                    }else if($ext =="php" || $ext == "html"|| $ext == "htm" || $ext == "css"|| $ext == "js"){
                        echo highlight_file($file);
                    }else if($ext =="pdf"){
                        echo'<iframe src="'.$file.'" width="100%" height="600px"></iframe>';
                    }else if($ext =='ppt' || $ext =='pptx' || $ext =='doc' || $ext =='docx' || $ext =='xls' || $ext =='xlsx'){
                        echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=".$website.$file."'></iframe>";
                    }
                    echo "</div>";
                }
                }
            ?>
        