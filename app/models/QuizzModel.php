<?php 
    class QuizzModel extends Model {
         function getAllQuizz () {
            return $this->getAll('quizz');
        }

        function insertQuizz($data) {
            $this->insertData('quizz', $data);
            return $this->lastInsertId();
        }
    }
?>