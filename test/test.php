<?php 
    require_once ('component\diskDetail.php');
    require_once ('component\fileContent.php');
    require_once ('component\fileDetail.php');
    require_once ('component\fileList.php'); 
?>

<?php 
    $dirPath = "WindowsServerBackup";
    $files = glob($dirPath . "/*");
                              
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/style.css">
    <title>Server Diagnosis
    </title>
</head>
<body>
  <section id="title">
    <div class="container">
      <div class="row text-center">
        <h1>SERVER DIAGNOSIS</h1>
    </div>
  </section>
  <section id="disk-space">
    <div class="container mt-2">
      <div class="row text-start">
        <h3>Disk Space Monitor</h3>
      </div>
      <div class="row d-flex mt-1">
        <div class="col-md-4">
          <div class="card">
            <h5 class="card-header">Disk C</h5>
            <div class="card-body d-block">
              <div class="col">
                <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar progress-bar-striped bg-danger" style="width: 74%">74%</div>
                </div>
              </div>
              <div class="col">
                <h6>74GB out of 100GB used</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <h5 class="card-header">Disk D</h5>
            <div class="card-body d-block">
              <div class="col">
                <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar progress-bar-striped bg-warning" style="width: 65%">65%</div>
                </div>
              </div>
              <div class="col">
                <h6>65GB out of 100GB used</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <h5 class="card-header">Disk E</h5>
            <div class="card-body d-block">
              <div class="col">
                <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar progress-bar-striped" style="width: 25%">25%</div>
                </div>
              </div>
              <div class="col">
                <h6>25GB out of 100GB used</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="file-detail ">
    <div class="container mt-1">
      <div class="row text-start">
        <h3>Log File Details</h3>
      </div>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="row g-0">
              <div class="col-md-5">
                <div class="card-body">
                  <h5 class="card-title">Log Files</h5>
                  <div class="row">
                    <div class="col" style="overflow-y:scroll; max-height:250px;">
                        <div class="list-group">
                            <?php
                                $files = glob($dirPath . "/*");
                                foreach ($files as $file) {
                                    if ($file > 1){
                                        fileList($file);
                                    }
                                    else {
                                        fileEmpty($file);
                                    }
                                }
                            
                            ?>
                        </div>
                    </div>
                  </div>
                </div>   
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h5 class="card-title">File Details</h5>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Date Created</th>
                        <th scope="col">Size</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">17-02-2023</th>
                        <td>4.4MB</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="file-content">
    <div class="container mt-1">
      <div class="row">
        <h3>Log File Content</h3>
      </div>
      <div class="row">
        <div class="col">
          <div class="card" style="overflow-y:scroll; max-height: 18rem;">
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore facilis rem voluptatem tempora, odio qui consequuntur perferendis soluta nesciunt ipsa in officia, quidem nihil dignissimos harum vitae deserunt sint quod?</p>
              <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore facilis rem voluptatem tempora, odio qui consequuntur perferendis soluta nesciunt ipsa in officia, quidem nihil dignissimos harum vitae deserunt sint quod?</p>
              <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore facilis rem voluptatem tempora, odio qui consequuntur perferendis soluta nesciunt ipsa in officia, quidem nihil dignissimos harum vitae deserunt sint quod?</p>
              <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore facilis rem voluptatem tempora, odio qui consequuntur perferendis soluta nesciunt ipsa in officia, quidem nihil dignissimos harum vitae deserunt sint quod?</p>
              <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore facilis rem voluptatem tempora, odio qui consequuntur perferendis soluta nesciunt ipsa in officia, quidem nihil dignissimos harum vitae deserunt sint quod?</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- PHP Script -->
    
  </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
<style>
  html, body{
    background-color: lightgrey;
  }
</style>
<!-- <?php

/**

 * Finds a list of disk drives on the server.

 * @return array The array velues are the existing disks.

 */

function get_disks(){

    if(php_uname('s')=='Windows NT'){

        // windows

        $disks=`fsutil fsinfo drives`;

        $disks=str_word_count($disks,1);

        if($disks[0]!='Drives')return '';

        unset($disks[0]);

        foreach($disks as $key=>$disk)$disks[$key]=$disk.':\\';

        return $disks;

    }else{

        // unix

        $data=`mount`;

        $data=explode(' ',$data);

        $disks=array();

        foreach($data as $token)if(substr($token,0,5)=='/dev/')$disks[]=$token;

        return $disks;

    }

}

?> -->