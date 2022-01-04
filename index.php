<?php
  session_start();
  $UserId = uniqid (rand (),true);
  $_SESSION['UserId']=$UserId;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Compress Files Online">
    <meta property="og:image" content="">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="">
    <meta property="og:site_name" content="mbtokb">
    <meta property="og:locale" content="in_HI">
    <meta property="og:url" content="">
    <meta property="og:title" content="">


    <title>MbToKb.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
    <link rel="stylesheet" href="assets/css/dropzone.css"/>
    <link rel="stylesheet" href="assets/css/all.css" title="" type="" />
  </head>
  <body>
    <div id="loading"></div>
    <div class="container-fluid">
  
        <nav class="navbar navbar-expand-lg ">
          <a class="navbar-brand " href="index.html"><i class="logo">&#9832;</i></a>
          <a class="nav-link" href="index.html"><div class="brandname">MbToKb.com</div></a>
        </nav>
        
        <div class="bodyarea">
          <div class="card text-center ">
            <div class="seprator"></div>
            <div class="card-body col-sm-8 offset-sm-2">
              <h3 class="card-title">Compress Files Online</h3>
              <p class="card-text">
                Select your .jpg or .jpeg images or pdf files from you device. 
                Or drag files to the drop area.
                Wait for the compression to finish. 
                Download compressed images either separately or get them all, 
                grouped in a ZIP archive.
               </p>
               <div class="seprator"></div>
              <a href="#areaupload" class="btn btn-mouse">&nbsp;🖲 &nbsp;</a>
        
              <div class="seprator"></div>

              <h5 class="card-title">Types of files you can Compress</h5>
              <div class="filetype">
                  <span class="badge badge-secondary">.jpeg/.jpg</span>
                  <span class="badge badge-success">.png</span>
                  <span class="badge badge-danger">.pdf</span>
                  <span class="badge badge-warning">.gif</span>
                 <!--  <span class="badge badge-info">.mp4</span>
                  <span class="badge badge-secondary">.mp3</span> -->
              </div>
              <div class="seprator"></div>
              <h6 class="card-title">Max File Size : 10mb && Max No. Of Files at a time: 10</h6>
              <div class="seprator"></div>
              <div class="uploadarea" id="areaupload">
                <form action="phpfiles/upload.php" class="dropzone" >
                  <div class="fallback">
                      <input name="file" type="file" multiple />
                  </div>
                </form>
              </div>
              <div class="seprator"></div>

              <div id="downloadArea"></div> 
              <div id="downloadZipArea"></div> 

              <div class="seprator"></div>
              <div id="compressform" action="">
                <div class="form-group text-centert col-sm-8 offset-sm-2">
                  <h5 class="card-title">Compression Percentage</h5>
                  <select class="form-control" id="percentage" onchange="validateSubmitForm();">
                    <option value="0">0%</option>
                    <option value="10">10%</option>
                    <option value="20">20%</option>
                    <option value="30">30%</option>
                    <option value="40">40%</option>
                    <option value="50">50%</option>
                    <option value="60">60%</option>
                    <option value="70">70%</option>
                    <option value="80">80%</option>
                    <option value="90">90%</option>
                    <option value="100">100%</option>
                  </select>
                  <div class="verificationpercentage"></div>
                </div>
              </div>
              <div class="seprator"></div>
              <div class="compressionProcess"></div>
              <div class="seprator"></div>
              <button class="btn btn-danger btn-compress" style="color: white;">&#9832;&nbsp; Remove Queue</button>
              <button class="btn btn-warning btn-compress btn-compressed" onclick="formSubmit();">&#9832;&nbsp; Compress Now</button>
              <div class='spinner-border text-warning'></div>
              
              
            </div>
            
          </div>
        </div>
          
        <footer class="page-footer text-center">
        
          <div >© 2020 Copyright:
            <a class="footer-link" href="https://mdbootstrap.com/">mbtokb.com</a>
          </div> 
        
        </footer>

      
    </div>
    
    
    
    <script src="assets/js/jquery.js" type="text/javascript" charset="utf-8"></script>
    <script src="assets/js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
    <script src="assets/js/dropzone.js?n=1" type="text/javascript" charset="utf-8"></script>
    <script src="ajax.js" type="text/javascript" charset="utf-8"></script>
    <script src="assets/js/all.js" type="text/javascript" charset="utf-8"></script>  
    <script>
     
    </script>
    <script>
      $(document).ready(function() {
          $('#loading').fadeOut(2000);
      });
    </script>

  </body>
</html>