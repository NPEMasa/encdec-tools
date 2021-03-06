<?php

if(isset($_POST['text']) && isset($_POST['flg'])){
    $text = htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8');
    $flg = htmlspecialchars($_POST['flg'], ENT_QUOTES, 'UTF-8');

    if($flg === "Encode"){
        $res = base64_encode($text);
    }elseif($flg === "Decode"){
        $res = base64_decode($text);
        $ptn = "/<\/textarea>/s";
        if(preg_match($ptn, $res)){
          $replacements = "";
          $res = preg_replace($ptn, $replacements, $res);
          echo "<font color='red'><h4>textarea tag id danger. replacement in BLANK.</h4></font>";
        }
    }
}
?>
<html>
  <head>

    <title> encode && decode tool </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/base64.css">

  </head>
  <body>


    <main role="main" class="container">

      <div class="content">

      <h3>Base64 Encode & Decode tool</h3>

      <div class="form-class">
        <form action="#" method="post">

            <div class="form-check">
              <input class="form-check-input" type="radio" name="flg" id="flg1" value="Encode" checked>
              <label class="form-check-label" for="flg1">Encode</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flg" id="flg2" value="Decode">
              <label class="form-check-label" for="flg2">Decode</label>
            </div>
            <br>
            
              <textarea rows="5" cols="50" name="text" placeholder="text"><?php if(!empty($text)){ echo $text; } ?></textarea><br><br>
              <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <pre><textarea rows="5" cols="50" name="res" placeholder="base64 converted text"><?php if(!empty($res)){ echo $res; } ?></textarea></pre>
      </div>

      </div>

    </main>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
