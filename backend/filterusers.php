<?php
session_start();
require_once '../dbConnect.php';
      $query = "SELECT * FROM users WHERE 1=1";
      //

      if(isset($_POST["email"])) {
        $data = $_POST['email'];
        if ($data != '') {
          $query .= " AND email LIKE '%".$data."%'";
        }
      }

      if(isset($_POST["user_name"])) {
        $data = $_POST['user_name'];
        if ($data != '') {
          $query .= " AND name LIKE '%".$data."%'";
        }
      }

      if(isset($_POST["roledata"])) {
        $data = $_POST['roledata'];
        if ($data != '' and $data != 'all') {
          $query .= " AND role  = '$data'";
        }
      }


      $results = '<div class="table-responsive">
          <table class="table table-hover mb-0">
                <thead>
                    <tr class="align-self-center">
                        <th>#</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Role</th>
                        <th>User Subscription Status</th>
                        <th>Join Date</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
              <tbody>';
              if ($users = $mysqli -> query($query)) {
                if ($users ->num_rows > 0) {
                  $usersnum = 1;
                  while ($usersdata = mysqli_fetch_row($users)) {
                    $results .= '<tr><td>'. $usersnum .'</td><td>' . $usersdata[1] .'</td>';
                    $usersnum++;
                    $results .= '<td>' . $usersdata[2] . '</td>';
                    $results .= '<td>' . $usersdata[4] . '</td>';
                    $results .= '<td>' . $usersdata[5] . '</td>';
                    $results .= '<td>' . $usersdata[6] . '</td>';
                    $results .= '<td class="border-top-0 text-right"><a class="btn btn-light btn-sm" href="edit-user.php?userid=' . $usersdata[0] . '">Edit</a></td>';
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
