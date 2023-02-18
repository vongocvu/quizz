<?php 
  if (!isset($_SESSION['user'])) { 
    die("You are not authencation !");
   };
?>

<?php
class Quizz extends Controller
{

    function addQuizz()
    {
        if (isset($_POST['submitADD'])) {

            $idTopic = '';
            $getTopic = $this->model('TopicModel')->table('topic')->where('topicName', '=', $_POST['nameTopic'])->get();
            $row = $getTopic->fetch_assoc();
            if (!isset($row)) {
                $lastIDtopic = $this->model('TopicModel')->insertTopic(
                    array(
                        'topicName' => $_POST['nameTopic']
                    )
                );
                $idTopic  = $lastIDtopic;
            } else {
                $idTopic = $row['topicID'];
            }

            move_uploaded_file($_FILES['imageQuizz']['tmp_name'],  _DIR_ROOT_ . "/public/images/" . $_FILES['imageQuizz']['name']);

            $lastID = $this->model('QuizzModel')->insertQuizz(
                array(
                    'topic' => $idTopic,
                    'quizz_image' => $_FILES['imageQuizz']['name'],
                    'quizzName' => $_POST['nameQuizz'],
                    'host' => '1',
                    'share' => $_POST['visibility']
                )
            );
        }

        $location = _WEB_ROOT . '/admin/quizz/edit/' . $lastID;
        header("Location: $location");
    }

    function edit($id = "")
    {
        $quizz = $this->model('QuizzModel')->table('quizz')->where('quizzID', '=', $id)->get();
        $count_questions = $this->model('QuestionModel')->select('COUNT(questionID) AS numberQuestion')->table('question')->where('quizz', '=', $id)->get();
        $questions = $this->model('QuestionModel')->table('question')->where('quizz', '=', $id)->orderBy('numberShow')->get();
        $this->data['content'] = 'contents/admin/edit_quizz';
        $this->data['sub_content']['quizz'] = $quizz;
        $this->data['sub_content']['count_questions'] = $count_questions;
        $this->data['sub_content']['questions'] = $questions;
        $this->render('layouts/admin_layout', $this->data);
    }


    function add_question($quizz = "")
    {
        if (isset($_POST['submit'])) {

            move_uploaded_file($_FILES['qs_image']['tmp_name'],  _DIR_ROOT_ . "/public/images/" . $_FILES['qs_image']['name']);

            $lastID = $this->model('QuestionModel')->insertQuestion(
                $data = array(
                    'question' => $_POST['question'],
                    'A' => $_POST['A'],
                    'B' => $_POST['B'],
                    'C' => $_POST['C'],
                    'D' => $_POST['D'],
                    'qs_image' => $_FILES['qs_image']['name'],
                    'answer' => $_POST['answer'],
                    'quizz' => $quizz,
                    'point' => 500,
                    'time' => 10,
                    'numberShow' => ''
                )
            );

            $getQuestions = $this->model('QuestionModel')->table('question')->where('quizz', '=', $quizz)->orderBy('numberShow')->get();
            foreach ($getQuestions as $question) {
                if ($question['numberShow'] > ($_POST['previous_question'])) {
                    $this->model('QuestionModel')->updateQuestion(
                        $data = array(
                            'numberShow' => $question['numberShow'] + 1,
                        ),
                        'questionID = ' . $question['questionID']
                    );
                }

                if ($question['questionID'] == $lastID) {
                    $this->model('QuestionModel')->updateQuestion(
                        $data = array(
                            'numberShow' => $_POST['previous_question'] + 1,
                        ),
                        'questionID = ' . $lastID
                    );
                }
            }



            $location = _WEB_ROOT . '/admin/quizz/edit/' . $quizz;
            header("Location: $location");
        }
    }

    function edit_question()
    {
        $question_data = $this->model('QuestionModel')->table('question')->where('questionID', '=', $_POST['id'])->first();
        $data = array(
            'status' => 200,
            'data' => $question_data
        );

        echo json_encode($data);
    }

    function update_question($quizz = "", $id = "")
    {
        if (isset($_POST['submit'])) {
            $imageUpdate = "";
            $curentImage = $this->model('QuestionModel')->table('question')->where('questionID', '=', $id)->get();
            $row = $curentImage->fetch_assoc();
            if (empty($_FILES['qs_image']['name'])) {
                $imageUpdate = $row['qs_image'];

                echo '1';
            } else {
                $imageUpdate = $_FILES['qs_image']['name'];
                echo '2';
            }
            $_FILES['qs_image']['name'] &&  move_uploaded_file($_FILES['qs_image']['tmp_name'],  _DIR_ROOT_ . "/public/images/" . $_FILES['qs_image']['name']);
            $this->model('QuestionModel')->updateQuestion(
                $data = array(
                    'question' => $_POST['question'],
                    'A' => $_POST['A'],
                    'B' => $_POST['B'],
                    'C' => $_POST['C'],
                    'D' => $_POST['D'],
                    'qs_image' => $imageUpdate,
                    'answer' => $_POST['answer']
                ),
                'questionID = ' . $id
            );

            $location = _WEB_ROOT . '/admin/quizz/edit/' . $quizz;
            header("Location: $location");
        }
    }

    function delete_question()
    {
        $this->model('QuestionModel')->deleteQuestion('questionID = ' . $_POST['id']);
        $data = array(
            'status' => 200
        );
        echo json_encode($data);
    }
}
?>
