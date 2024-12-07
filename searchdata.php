<?php
require_once 'dbConnect.php';

    if(isset($_POST["query"])){
        $output = '';
        if ($result = $mysqli -> query("SELECT * FROM articles WHERE title LIKE '%".$_POST["query"]."%'")) {
         if ($result ->num_rows > 0) {
           $output = '<ul class="list-unstyled">';
           while ($row = mysqli_fetch_row($result)) {

                $output .= '<div style="padding: 2% 2%;border: 1px solid #e2e2e2;"><h4 class="post-title mb-10 font-weight-bold"><a href=single/'.$row[2] .'> '.$row[1].'</a></h4><p class="excerpt mb-0">'.$row[1].'</p></div>';

            }
        }else{
            $output .= ' <li>Topic Not Available</li>';
        }

    $output .= '</ul>';
    echo $output;
    }
  }
?>
