<?php 
   class Auth extends Controller {
      function login () {
            if ($_POST['email'] && $_POST['password']) {
                  $getUser = $this->model('UserModel')->table('user')->where('email', '=', $_POST['email'])->get();
                  $row = $getUser->fetch_assoc();
                  if (!empty($row)) {
                        if ($row['password'] == $_POST['password']) {
                              $_SESSION['user'] = $row['firstName'] . ' ' . $row['lastName'];
                              $_SESSION['image'] = $row['image'];
                              $_SESSION['id'] = $row['userID'];
                              $data = array (
                                    'status' => 200,
                                    'message' => 'Login successfully !'
                              );
                              echo json_encode($data);
                        } else {
                              $data = array (
                                    'status' => 303,
                                    'message' => 'Password is wrong !'
                              );
                              echo json_encode($data);
                        }
                  } else {
                     $data = array (
                        'status' => 404,
                        'message' => 'Email not valid !'
                     );
                     echo json_encode($data);
                  }
            } 
      }

      function logout () {
            session_destroy();
            $location = _WEB_ROOT;
            header("Location: $location");
      }
   }

?>