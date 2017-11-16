<?php

$text = "";
if(!empty($_POST['text']) && !empty($_POST['flg'])){
    $text = htmlspecialchars($_POST['text']);
    $flg = htmlspecialchars($_POST['flg']);

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
  </head>
  <body>
    <h3>Base64 Encode & Decode tool</h3>
    <div id="test" align="left">
    <form action="#" method="post">
      <p>Encode
      <input type="radio" name="flg" value="Encode">
      &nbsp;&nbsp;Decode
      <input type="radio" name="flg" value="Decode">
      </p>
      <textarea rows="5" cols="50" name="text"></textarea><br>
      <input type="submit" name="submit" value="submit" >
    </form>
      <pre><textarea rows="5" cols="50" name="res"><?php if(!empty($res)){ echo $res; } ?></textarea></pre>
    </div>
  </body>
</html>
