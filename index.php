<!-- Include all external components to index page -->
<?php 
    require_once ('component\diskDetail.php');
    require_once ('component\fileList.php'); 
?>

<!-- Declaring Directory path variable and looping variable -->
<?php 
    $dirPath = "WindowsServerBackup";
    $i= 0;
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
    <script>history.scrollRestoration = "manual"</script>
</head>
<body>
  <section id="title">
    <div class="container">
      <div class="row text-center mt-1">
        <h1>SERVER DIAGNOSIS</h1>
    </div>
  </section>
  <section id="disk-space">
    <div class="container mt-2">
      <div class="row text-start">

        <!-- Hard Drive Part -->
        <h3>Hard Drive Space Monitor</h3>
      </div>
      <div class="row d-flex mt-1">

      <!-- Php Script for generating all required disk information -->
        <?php

        // script for executing cmd command and see the output 
        $output = [];
        exec("wmic logicaldisk get DeviceID,FreeSpace,Size", $output);

        // extract the array output of the previous cmd command into a useable php variables 
        $diskInfo = [];
        $output = array_slice($output, 1); //to exclude the first row of the output because it doesn't contain any executable information
        foreach ($output as $line) {
          $data = explode(' ', preg_replace('/\s+/', ' ', trim($line))); //to divide data from each coloumn in a row into array
          if (count($data) === 3) {
              $diskInfo[] = [ //divide all necesary data from the array list
                  'DeviceID' => $data[0],
                  'FreeSpace' => $data[1],
                  'Size' => $data[2],
              ];
          }
        }

        //start code to declare
        if (!empty($diskInfo)) {  
          foreach ($diskInfo as $disk) {
              $deviceID = $disk['DeviceID'];
              $freeSpace = $disk['FreeSpace'];
              $size = $disk['Size'];

              $percentageUsed = number_format(($size - $freeSpace) / $size * 100, 0);
              if ($size >= 1048576){
                $size = number_format($size / 1073741824, 2) . ' GB';
              }
              elseif ($size >= 1048576){
                $size = number_format($size / 1048576, 2) . ' MB';
              }
              elseif ($size >= 1024){
                $size = number_format($size / 1024, 2) . ' KB';
              }
              elseif ($size > 1)
              {
                $size = $size . ' bytes';
              }
              elseif ($size == 1)
              {
                $size = $size . ' byte';
              }
              else
              {
                $size = '0 byte';
              }

              if ($freeSpace >= 1048576){
                $freeSpace = number_format($freeSpace / 1073741824, 2) . ' GB';
              }
              elseif ($freeSpace >= 1048576){
                $freeSpace = number_format($freeSpace / 1048576, 2) . ' MB';
              }
              elseif ($freeSpace >= 1024){
                $freeSpace = number_format($freeSpace / 1024, 2) . ' KB';
              }
              elseif ($freeSpace > 1)
              {
                $freeSpace = $freeSpace . ' bytes';
              }
              elseif ($freeSpace == 1)
              {
                $freeSpace = $freeSpace . ' byte';
              }
              else
              {
                $freeSpace = '0 byte';
              }
      
              getHardDrivePartitions($deviceID,$percentageUsed, $freeSpace, $size);
          }
          
        }
            
        ?>
      </div>
    </div>
  </section>
  <section id="file-detail">
    <div class="container mt-1">
      <div class="row text-start">
        <h3>Log File Details</h3>
      </div>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="row g-0">
              <div class="col">
                <div class="card-body">
                  <h5 class="card-title">Log Files</h5>
                  <div class="row">
                    <div class="col" style="overflow-y:scroll; max-height:250px;">
                    <table class="table table-striped table-hover">
                      <thead class="sticky-top">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date Modified 
                              <button type="button" class="btn btn-primary"
                                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .6rem;">
                                Sort
                              </button>
                            </th>
                            <th scope="col">Size</th>
                        </tr>
                      </thead>
                        <tbody>
                              <?php
                                //For taking all the files in the folder of the $dirPath 
                                $files = glob($dirPath . "/*");
                                
                                // For checking if sorting mode is active after reload
                                
                                


                                // For generating all files from $dirPath based on the template on fileList.php
                                foreach ($files as $file) {
                                    if ($file > 0){
                                        $bytes=filesize($file);
                                        $i++;
                                        $creation_date = filemtime($file);
                                        $file_creation_date = date('Y-m-d H:m:s', $creation_date);
                                        if ($bytes >= 1048576){
                                            $bytes = number_format($bytes / 1048576, 2) . ' MB';
                                        }
                                        elseif ($bytes >= 1024){
                                            $bytes = number_format($bytes / 1024, 2) . ' KB';
                                        }
                                        elseif ($bytes > 1)
                                        {
                                            $bytes = $bytes . ' bytes';
                                        }
                                        elseif ($bytes == 1)
                                        {
                                            $bytes = $bytes . ' byte';
                                        }
                                        else
                                        {
                                            $bytes = '0 byte';
                                        }
                                
                                        logList($i,$file,$file_creation_date,$bytes);
                                    }
                                    else {
                                        fileEmpty($file);
                                    }
                                }                           
                            ?>
                        </tbody>
                  </table>
                    </div>
                  </div>
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
          <div class="card" style="overflow-y:scroll; max-height: 15rem; m-height: 15rem;">
            <div class="card-body">
              <div class="row text-center bg-white sticky-top">
                <h2>
                  <?php
                    if(isset($_GET['getFileName'])){
                      $myLog = $_GET['getFileName'];
                      echo ($myLog); } 
                  ?>
                </h2>
                <span class="border-bottom border-dark-subtle"></span>
              </div>
              <div class="row mt-1">
                <p> 
                  <?php
                    if(isset($_GET['getFileName'])){
                      $myLog = $_GET['getFileName'];
                      $handle = fopen($myLog,'r') or die ('File opening failed');
                      $readLog = fread($handle,filesize($myLog));
                      echo nl2br($readLog);
                      fclose($handle);
                    }
                  ?>
                </p>
              </div>
          </div>
        </div>
      </div>
    </div>
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