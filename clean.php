<?php
@session_start();

// include 'config.php';

function clean($value){
    GLOBAL $conn;
      $value=trim($value);
      $value=htmlspecialchars($value);
      $value=strip_tags($value);
      $value = $conn->real_escape_string($value);
      return $value;                
  }

function findBaseName($data){
  if(basename($_SERVER["REQUEST_URI"])==$data){
    echo 'active';
  }
}

function findBaseNamex($data){
  if(basename($_SERVER["REQUEST_URI"])==$data){
    echo 'activex';
  }
}


function formatDate($data){
  return date("d M, Y", strtotime($data));
}

function runQuery($data){
  GLOBAL $conn;
  return $conn->query($data);
}

function fetchAssoc($data){
  return $data->fetch_assoc();
}

function limit_text($text,$limit){
  if(str_word_count($text, 0)>$limit){
      $word = str_word_count($text,2);
      $pos=array_keys($word);
      $text=substr($text,0,$pos[$limit]). '...';
  }
  return $text;
}


  function loginUsers($dataEmail, $dataPassword){
    $dataPassword = md5($dataPassword);
      $sql = runQuery("SELECT * FROM admin WHERE demail='$dataEmail' AND dpass='$dataPassword' AND dstatus='active'");
      if($sql->num_rows>0){
          $row=fetchAssoc($sql);
          $_SESSION['admin'] = true;
          $_SESSION['userid'] = $row['userid'];
          header("Location: dashboard");
      }else{
          $_SESSION['msgs'] = "Incorrect login details provided, try again later";
          header("Location: login");
      }

  }

?>
  <?php
function blogPost($limit=0, $not=null){
  if(is_null($not)){
    if($limit!=0){
        $sql = runQuery("SELECT * FROM dblog ORDER BY id DESC LIMIT $limit");
    }else{        
        $sql = runQuery("SELECT * FROM dblog ORDER BY id DESC");
    }
  }else{
    $sql = runQuery("SELECT * FROM dblog WHERE bid !='$not' ORDER BY id DESC LIMIT $limit");
  }
    if($sql->num_rows>0){
        while($row=fetchAssoc($sql)):
?>
    <article class="blog-card blog-card-light">
        <a href="read-post?pid=<?php echo $row['bid']; ?>" class="image"><img src="cover/<?php echo $row['dimg']; ?>.jpg" alt="" /></a>
        <div class="article-content">
            <a href="read-post?pid=<?php echo $row['bid']; ?>" class="category"><i class="far fa-folder"></i>By <?php echo $row['dby']; ?></a>
            <a href="read-post?pid=<?php echo $row['bid']; ?>" class="date"><i class="far fa-clock"></i> <?php echo formatDate($row['ddate']); ?></a>
            <a href="read-post?pid=<?php echo $row['bid']; ?>" class="title"><h3><?php echo $row['dtitle']; ?></h3></a>
        </div>
    </article>
<?php endwhile; }  }?>
