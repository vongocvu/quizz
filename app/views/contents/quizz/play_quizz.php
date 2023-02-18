<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="https://cf.quizizz.com/img/favicon/favicon.ico">
      <link rel="stylesheet" href="<?=_WEB_ROOT?>/public/client/font/fontawesome-free-6.1.1-web/css/all.min.css">
      <link rel="stylesheet" href="<?=_WEB_ROOT?>/public/css/quizz.css">
      <title>Playing quizz... </title>
</head>

<body>
      <?php
      $this->render('blocks/loading');
      $count = $count_questions->fetch_assoc();
      ?>

      <div class=" w-full h-screen bg-black relative overflow-hidden">
            <div class="absolute inset-0 flex items-center justify-center" style="z-index: 100">
                  <span id="countStart" style="font-size: 200px; color: rgba(0, 0, 0, 0.9)">5</span>
            </div>
            <div class="show_time w-full h-2 bg-green-700"></div>
            <div class="w-full h-20 flex items-center px-5 justify-between">
                  <div class="flex items-center">
                        <div class="progess w-64 h-10 rounded-lg text-white overflow-hidden">
                              <h3 class="name_streak absolute left-2 bottom-2/4 translate-y-1/2 z-10">Streak</h3>
                              <h3 class="absolute right-2 bottom-2/4 translate-y-1/2 z-10"><i class="fa-solid fa-fire-flame-curved"></i><span class="number_streak ml-2">0</span></h3>
                              <div class="show_streak w-full absolute h-full">
                              </div>
                        </div>
                        <div class="text-white py-1 px-5 ml-2 bg-slate-500 rounded-lg"><span class="curent_question text-xl"></span>/<?=$count['numberQuestion']?></div>
                        <div class="text-white flex px-3 items-center">
                              <h3> Points of this question: </h3>
                              <span class="show_point_question mx-3 text-3xl font-medium rounded-full"></span>
                              <span>Points</span>
                        </div>
                  </div>
                  <div class="flex">
                        <div class="flex items-center text-2xl font-medium px-12 text-white">
                              <i class="fa-solid fa-feather-pointed"></i>
                              <span class="show_point px-3">0</span>
                              <span>POINTS</span>
                        </div>
                        <button class="px-4 py-2 bg-gray-600 text-white hover:opacity-70 rounded-lg" onClick="cancelPlay()">X</button>
                  </div>
            </div>
            <?php
            if (!empty($questions)) {
                  foreach ($questions as $question) {
            ?>
                        <div class="w-full flex flex-col absolute slide_questions top-24" style="height: 90%">
                              <div class="flex-1 flex flex-col rounded-2xl p-5" style="background-color: rgb(56 21 53/1);">
                                    <div class="my-2 px-2 flex items-center flex">
                                          <div class="rounded-xl border-2 text-center w-96 h-96 overflow-hidden relative">
                                                <img width="100%" height="100%" id="output_edit_img" src="<?= _WEB_ROOT . '/public/images/' . $question['qs_image'] ?>" />
                                          </div>
                                          <div class=" flex items-center justify-center p-10 flex-1">
                                                <div name="question" class=" text-white text-4xl w-full h-full text-center py-32 mx-32"><?= $question['question'] ?></div>
                                          </div>
                                    </div>
                                    <div class="p-2 grid grid-cols-4 gap-3 flex-1" the_answer="<?=$question['answer'] ?>" the_point="<?=$question['point']?>" the_time="<?=$question['time']?>">
                                          <div answers="A" class="choose_answer border-2 border-white col-span-1 h-full bg-cyan-600 rounded-xl flex items-center justify-center p-10 cursor-pointer hover:opacity-80 text-3xl text-white font-medium">
                                                <?= $question['A'] ?>
                                          </div>
                                          <div answers="B" class="choose_answer border-2 border-white col-span-1 h-full bg-cyan-600 rounded-xl flex items-center justify-center p-10 cursor-pointer hover:opacity-80 text-3xl text-white font-medium">
                                                <?= $question['B'] ?>
                                          </div>
                                          <div answers="C" class="choose_answer border-2 border-white col-span-1 h-full bg-cyan-600 rounded-xl flex items-center justify-center p-10 cursor-pointer hover:opacity-80 text-3xl text-white font-medium">
                                                <?= $question['C'] ?>
                                          </div>
                                          <div answers="D" class="choose_answer border-2 border-white col-span-1 h-full bg-cyan-600 rounded-xl flex items-center justify-center p-10 cursor-pointer hover:opacity-80 text-3xl text-white font-medium">
                                                <?= $question['D'] ?>
                                          </div>
                                          <input type="text" class="hidden answer" name="answer" value="<?= $question['answer'] ?>">
                                    </div>
                              </div>
                              <div class="w-full h-16"></div>
                        </div>
                        <?php
                  }
            }
            ?>
      </div>
      <div class="fixed inset-0 endQuizz" style="background-color: rgb(56 21 53/1); z-index: 10000; transform: translateY(100%) scale(0); opacity:0;">
            <div class="absolute bottom-1/2 rounded-lg right-1/2 bg-red-800 translate-x-2/4 translate-y-2/4 text-white p-5" 
                  style="width: 500px; background-color: rgba(0, 0, 0, 0.5); z-index:9999; padding-bottom: 80px"
            >
                 <div class="text-center pb-5">
                         <p class="text-2xl font-medium">Summary</p>
                 </div>
                 <div class="flex items-center p-3 bg-black rounded-2xl">
                         <img class="rounded-full" width="80" height="80" src="<?=_WEB_ROOT .'/public/images/637726540893897315_cpu intel core i5-10400f-quat-trang-dd - Copy.jpg'?>" alt="">
                         <div class="px-5">
                              <h4 class="text-2xl font-medium">Võ Ngọc Vũ</h4>
                         </div>
                 </div>
                 <div class="grid grid-cols-2 gap-3 py-3">
                     <div class="flex justify-between items-center col-span-1 p-3 bg-black rounded-2xl">
                        <div class="">
                              <p>Rank</p>
                              <h3>9/16</h3>
                        </div>
                        <i class="fa-solid fa-medal"></i>
                     </div>
                     <div class="flex justify-between items-center col-span-1 p-3 bg-black rounded-2xl">
                        <div class="">
                              <p>Score</p>
                              <h3 class="show_point">0</h3>
                        </div>
                        <i class="fa-solid fa-coins"></i>
                     </div>
                 </div>
                  <button class="w-full text-center bg-purple-600 py-3 mt-3 text-xl font-medium rounded-2xl hover:opacity-80" onClick="playAgain()">Play again</button>
                  <button link_root="<?=_WEB_ROOT?>" class="w-full text-center bg-white text-black py-3 mt-3 text-xl font-medium rounded-2xl hover:opacity-80" onClick="findNewQuizz(event)">Find a new quiz</button>
            </div>
      </div>
      

<script type="text/javascript">

      function cancelPlay () {
            window.location =  window.location.pathname.replace('playQuizz/play','playQuizz/readyQuizz')
      }

      function playAgain() {
            location.reload();
      }

      function findNewQuizz (event) {
            window.location.href = event.target.getAttribute('link_root')
      }

      var countStart = document.querySelector('#countStart')
      countStart.style.transition = "all 1s linear"

      var TimeCount = 5
     setTimeout ( () => {
            setTimeCount = setInterval (function () {
                  countStart.innerText = --TimeCount
                  if (TimeCount < 0) {
                        clearInterval(setTimeCount)
                        countStart.innerText = "START"
                        setTimeout ( () => {
                              countStart.style.opacity = "0"
                              countStart.style.fontSize = "0"
                              setTimeout ( () => {
                                    countStart.parentElement.style.width = "0"
                                    countStart.parentElement.style.heghit = "0"
                              },1000)
                        },1500)
                  }
            },1000)
     }, 1000)


      var slide_questions = document.querySelectorAll('.slide_questions')
      var z_index = 49
      // Set ẩn tất cả các slide và chỉ hiện 1 slide đầu tiên
      slide_questions.forEach(slide => {
            slide.style.zIndex = z_index--
            slide.style.transform = "scale(0.8)"
            slide.style.opacity = "0"
            slide.style.transition = "all 0.6s linear"
      })
            slide_questions[0].style.zIndex = 50
            slide_questions[0].style.transform = "scale(1)"
            slide_questions[0].style.opacity = "1"
      // 

      //  Thiết kế mảng hiển thị tên, điểm và màu của từng chuỗi win streak
      let Streak = [
            {
                  name: "Streak",
                  point: 0,
                  backgroundColor: "yellow"
            },
            {
                  name: "+ 100đ",
                  point: 100,
                  backgroundColor: "orange"
            },
            {
                  name: "+ 500đ",
                  point: 500,
                  backgroundColor: "purple"
            },
            {
                  name: "+ 1000đ",
                  point: 1000,
                  backgroundColor: "red"
            }
      ]
            

      // Thiết lập các giá trị mặc định
      var point = 0 // điểm tổng mặc định
      var streak_fire = 0 // chuỗi win streak mặc định
      var curentArrStreak = 0; // Cấp độ đầu tiên trong mảng win treak
      var curentSteak = 0; // Chuỗi win treak của từng cấp độ, tối đa là 3 sẽ set mặc định thành 1


      // Get các phần từ DOM cần thiết
      var show_streak = document.querySelector('.show_streak')
      var name_streak = document.querySelector('.name_streak')
      var number_streak = document.querySelector('.number_streak')
      var show_point = document.querySelectorAll('.show_point')
      var show_point_question = document.querySelector('.show_point_question')
      var show_time = document.querySelector('.show_time')

      var choose_answer = document.querySelectorAll('.choose_answer')
      var progess = document.querySelector('.progess')
      var curent_question = document.querySelector('.curent_question')

      var numberCurent = 1
      curent_question.innerText = numberCurent
      show_point.innerText = point

      var times = 0

      show_point_question.innerText = choose_answer[0].parentElement.getAttribute('the_point')

      var setTimerBegin;
      var setTimerAfter;

      // Chạy thời gian quy định của câu hỏi đầu tiên
      setTimeout (() => {
            setTimerBegin = setInterval(() => {
                  show_time_question(slide_questions[0].children[0].children[1])
            }, 1000)
      }, 8000)

      var endQuizz = document.querySelector('.endQuizz')
      // CODE xử lý thời gian của từng câu hỏi
      function show_time_question (question) {
            ++times
            show_time.style.transition = "all 1s linear";
            show_time.style.width = 100 - ((100 / question.getAttribute('the_time')) * times) + '%'
            if (show_time.offsetWidth == 0){
                  clearInterval(setTimerBegin)
                  var getQuizzPrent = question.parentElement.parentElement
                  var getNextQuizz = getQuizzPrent.nextElementSibling
                  if (getNextQuizz) {
                        setTimeout(() => {
                              getQuizzPrent.style.transform = "translateX(-100%)"
                              getQuizzPrent.style.opacity = "0"
                              getNextQuizz.style.opacity = "1"
                              getNextQuizz.style.transform = "scale(1)"
                              curent_question.innerText = ++numberCurent
                              show_point_question.innerText = question.parentElement.getAttribute('the_point')
                              show_time.style.transition = "none"
                              show_time.style.width = "100%";
                              times = 0
                              setTimerBegin = setInterval(() => {
                                    show_time_question(getNextQuizz.children[0].children[1])
                              }, 1000)
                        }, 1000)
                  } else {
                        clearInterval(setTimerBegin)
                        EndQuestion(getQuizzPrent)
                  }
            };
      }

      choose_answer.forEach(choice => {

            choice.addEventListener('click', function() {
                  clearInterval(setTimerBegin)
                  clearInterval(setTimerAfter)
                  if (this.getAttribute('answers') == this.parentElement.getAttribute('the_answer')) {
                        ++streak_fire

                        this.style.backgroundColor = 'green'
                        number_streak.innerText = streak_fire
                        
                        ++curentSteak

                        name_streak.innerText = Streak[curentArrStreak].name
                        show_streak.innerHTML = `<div class="w-${curentSteak}/3 h-full bg-${Streak[curentArrStreak].backgroundColor}-500"></div>`


                        point+= parseInt(this.parentElement.getAttribute('the_point'))
                        point+= parseInt(Streak[curentArrStreak].point)

                        if ((streak_fire % 3) == 0) {
                              show_streak.classList.add(`bg-${Streak[curentArrStreak].backgroundColor}-500`)
                              ++curentArrStreak
                              curentSteak = 0
                        }
                  } else {

                        this.style.backgroundColor = 'red'
                        number_streak.innerText = "Streak"
                        show_streak.innerHTML = "";
                        number_streak.innerText = 0
                        streak_fire = 0
                        curentSteak = 0

                        if (curentArrStreak > 0) {
                              show_streak.classList.remove(`bg-${Streak[curentArrStreak-1].backgroundColor}-500`)
                        }

                        point-= parseInt(this.parentElement.getAttribute('the_point'))

                        for (var i = 0; i < this.parentElement.children.length; i++) {
                              if (this.parentElement.children[i].getAttribute('answers') == this.parentElement.getAttribute('the_answer')) {
                                    this.parentElement.children[i].style.backgroundColor = 'green'
                              }
                        }
                  }
                  var getQuizzPrent = this.parentElement.parentElement.parentElement
                  var getNextQuizz = getQuizzPrent.nextElementSibling
                  
                  if (getNextQuizz) {
                        setTimeout(() => {
                              getQuizzPrent.style.transform = "translateX(-100%)"
                              getQuizzPrent.style.opacity = "0"
                              getNextQuizz.style.opacity = "1"
                              getNextQuizz.style.transform = "scale(1)"
                              curent_question.innerText = ++numberCurent
                              show_point_question.innerText = this.parentElement.getAttribute('the_point')
                              show_time.style.transition = "none"
                              show_time.style.width = "100%";
                              times = 0

                              setTimerBegin = setInterval(() => {
                                    show_time_question(getNextQuizz.children[0].children[1])
                              }, 1000)
                        }, 1000)
                  } else {
                        clearInterval(setTimerBegin)
                        EndQuestion(getQuizzPrent)
                  }
                  if (point < 0) {
                        point = 0
                  }
                  show_point.forEach ( item => {
                        item.innerText = point
                  })
            })
      })


      function EndQuestion(getQuizzPrent) {
            setTimeout ( () => {
                  getQuizzPrent.style.transform = "translateX(-100%)"
                  getQuizzPrent.style.opacity = "0"
            }, 2000)

            endQuizz.style.transition = "all 2s linear"
            endQuizz.style.transform = "translateY(0)"
            endQuizz.style.opacity = "1"
            endQuizz.style.transform = "scale(1)"
            
      }
      
</script>
</body>

</html>