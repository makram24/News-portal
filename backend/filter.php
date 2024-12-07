<?php
session_start();
require_once '../dbConnect.php';
      $query = "SELECT * FROM articles WHERE 1=1";
      //
      if(isset($_POST["date"])) {
        $data = $_POST['date'];
        if ($data != '') {
          $query .= " AND published_at = '$data'";
        }
      }

      if(isset($_POST["statusdata"])) {
        $data = $_POST['statusdata'];
        if ($data != '') {
          $query .= " AND status = '$data'";
        }
      }

      if(isset($_POST["author_name"])) {
        $data = $_POST['author_name'];
        if ($data != '') {
          if ($pendingauthorarticles = $mysqli -> query("SELECT * FROM authors WHERE name LIKE '%".$data."%'")) {
            if ($pendingauthorarticles ->num_rows > 1) {
              // $query .= " AND author_id IN "  . '(';
              // while ($pendingauthorarticlesdata = mysqli_fetch_row($pendingauthorarticles)) {
              //   $author =  $pendingauthorarticlesdata[0];
              //   $query .= "" . $author . ",";
              // }
              // $query .= ')';
              $i = 0;
              while ($pendingauthorarticlesdata = mysqli_fetch_row($pendingauthorarticles)) {
                $author =  $pendingauthorarticlesdata[0];
                if ($i == 0) {
                  $query .= " AND ". '(' ." author_id  = '$author'";
                  $i++;
                }else {
                  $query .= " or author_id  = '$author'";
                }
              }
              $query .= ')';
            }else {
              while ($pendingauthorarticlesdata = mysqli_fetch_row($pendingauthorarticles)) {
                $author =  $pendingauthorarticlesdata[0];
                $query .= " AND author_id  = '$author'";
              }
            }
          }
        }
      }

      if(isset($_POST["category"])) {
        $data = $_POST['category'];
        if ($data != '' and $data != 'all') {
          $query .= " AND category_id  = '$data'";
        }
      }

      if(isset($_POST["title"])) {
        $data = $_POST['title'];
        if ($data != '') {
          $query .= " AND title LIKE '%".$data."%'";
        }
      }


      // echo $query;
      $results = '<div class="table-responsive">
          <table class="table table-hover mb-0">
              <thead>
                  <tr class="align-self-center">
                      <th>#</th>
                      <th>Article Name</th>
                      <th>Category</th>
                      <th>Author Name</th>
                      <th>Status</th>
                      <th>Published Date</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                  </tr>
              </thead>
              <tbody>';
      if ($pendingarticles = $mysqli -> query($query)) {
        if ($pendingarticles ->num_rows > 0) {
          $artriclenum = 1;
            while ($pendingarticlesdata = mysqli_fetch_row($pendingarticles)) {
              $results .= '<tr><td>' . $artriclenum . '</td><td>' . $pendingarticlesdata[1] .'</td>';
              $category =  $pendingarticlesdata[7];
              $artriclenum++;
              if ($pendingcatarticles = $mysqli -> query("SELECT * FROM categories WHERE cat_id = '$category'")) {
                if ($pendingcatarticles ->num_rows > 0) {
                  if ($pendingcatarticlesdata = mysqli_fetch_row($pendingcatarticles)) {
                    $results .= '<td>' . $pendingcatarticlesdata[1] . '</td>';
                  }
                }
              }

            $results .= '<td>';
                $author =  $pendingarticlesdata[6];
                if ($pendingauthorarticles = $mysqli -> query("SELECT * FROM authors WHERE author_id = '$author'")) {
                  if ($pendingauthorarticles ->num_rows > 0) {
                    if ($pendingauthorarticlesdata = mysqli_fetch_row($pendingauthorarticles)) {
                      $results .= $pendingauthorarticlesdata[1];
                    }
                  }
                }
              $results .= '</td>';
              $results .= '<td>' . $pendingarticlesdata[8] . '</td>';
              $results .= '<td>' . $pendingarticlesdata[9] . '</td>';

              $results .= '<td class="border-top-0 text-right"><a class="btn btn-light btn-sm" href="../single/' . $pendingarticlesdata[2] . '">View</a></td>';
              $results .= '<td class="border-top-0 text-right"><a class="btn btn-light btn-sm" href="edit-article.php?articleid=' . $pendingarticlesdata[0] . '">Edit</a></td>';

              $results .= '</tr>';
              }
            }
          }

          $results .= '</tbody>
          </table>
          </div>';
          echo $results;
      // $output = '';

?>
