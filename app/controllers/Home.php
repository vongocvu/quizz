<?php 
   class Home extends Controller {
      
      public function index() {
            $quizz = $this->model('QuizzModel')->table('quizz')->join('user', 'host = userID')->where('share', '=', '1')->get();
            $this->data['content'] = 'contents/home/home';
            $this->data['sub_content']['quizz'] = $quizz;
            $this->render('layouts/client_layout', $this->data);
      }
   }
?>