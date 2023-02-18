<?php 
  class PlayQuizz extends Controller {

        function readyQuizz ($id = "") {
             $getQuizz = $this->model('QuizzModel')->table('quizz')->where('quizzID', '=', $id)->get();
             $count_questions = $this->model('QuestionModel')->select('COUNT(questionID) AS numberQuestion')->table('question')->where('quizz', '=', $id)->get();
             $this->data['count_questions'] = $count_questions;
             $this->data['quizz'] = $getQuizz;

             $this->render('contents/quizz/beginQuizz', $this->data);
        }

       function play ($id = "") {
            $questions = $this->model('QuestionModel')->table('question')->where('quizz', '=', $id)->orderBy('numberShow')->get();
            $count_questions = $this->model('QuestionModel')->select('COUNT(questionID) AS numberQuestion')->table('question')->where('quizz', '=', $id)->get();
            $this->data['questions'] = $questions;
            $this->data['count_questions'] = $count_questions;
            $this->render('contents/quizz/play_quizz', $this->data);
       }
  }
?>