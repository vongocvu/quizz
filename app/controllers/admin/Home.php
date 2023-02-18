<?php 
  if (!isset($_SESSION['user'])) { 
    die("You are not authencation !");
   };
?>

<?php 
   class Home extends Controller {
      public function index() {
         
         $QuizzArr = $this->model('QuizzModel')->table('quizz')->where('host', '=', $_SESSION['id'])->get();
         $TopicArr = $this->model('TopicModel')->table('topic')->get();
         
         $this->data['content'] = 'contents/admin/library';
         $this->data['sub_content']['QuizzArr'] = $QuizzArr;
         $this->data['sub_content']['TopicArr'] = $TopicArr;
         $this->render('layouts/admin_layout', $this->data);
      }
   }
  
?>