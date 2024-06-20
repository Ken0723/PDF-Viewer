<html>

<head>
  <title>pdf Viewer</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
  <script>
    function getContentByPage(page) {
      var newPage = page;
      document.getElementById("pdf-view").src = "samplepdf.pdf#page=" + newPage;
      document.getElementById("pdf-view").contentWindow.location.reload(true);
    }
  </script>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1>
          <center>pdf Viewer</center>
        </h1>
      </div>
    </div>
    <hr />
    <div class="row">
      <?php
      include 'vendor/autoload.php';

      $pdfParser = new \Smalot\PdfParser\Parser();
      $pdfFile = $pdfParser->parseFile('samplepdf.pdf');

      $allContent = $pdfFile->getText();
      $pageContent = $pdfFile->getPages();
      $contentArray = array();
      ?>
      <div class="col-sm-6">
        <center id="page-menu">
          <?php
          for ($i = 0; $i < count($pageContent); $i++) {
            echo "<button onclick=getContentByPage(" . $i + 1 . ")>Page " . $i + 1 . "</button><br /><br />";
          }
          ?>
        </center>
      </div>
      <div class="col-sm-6">
        <iframe style="width: 100%; height: 100%;" src="samplepdf.pdf#page=1'" id="pdf-view"></iframe>
      </div>
    </div>
  </div>
</body>

</html>