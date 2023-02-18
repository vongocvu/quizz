<?php 
    class QuestionModel extends Model {
         function getAllQuestion () {
            return $this->getAll('quizz');
        }

        function insertQuestion($data) {
            $this->insertData('question', $data);
            return $this->lastInsertId();
        }

        function updateQuestion($data, $relationship) {
            $this->updateData('question', $data, $relationship);
        }
        

        function deleteQuestion($relationship) {
            $this->deleteData('question', $relationship);
        }
    }
?>