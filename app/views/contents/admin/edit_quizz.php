<?php
if (!empty($quizz)) {
      $row = $quizz->fetch_assoc();
      $count = $count_questions->fetch_assoc();
?>
      <div class="w-full flex justify-center my-10">
            <div class="w-4/6 grid grid-cols-9 gap-5">
                  <div class="col-span-6">
                        <div class="border shadow-md bg-white">
                              <div class="">
                                    <div class="flex">
                                          <img width="180" src="<?= _WEB_ROOT . '/public/images/' . $row['quizz_image'] ?>" alt="anh test" style="heigth: 30px !important">
                                          <div class="flex-1 p-3">
                                                <div class="flex justify-between">
                                                      <span>QUIZ</span>
                                                      <div class="">
                                                            <button>Embed</button>
                                                      </div>
                                                </div>
                                                <div class="">
                                                      <h3 class="font-semibold"><?= $row['quizzName'] ?></h3>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="flex justify-between items-center p-4">
                                          <div class="flex items-center">
                                                <img class="rounded-full w-10 h-10 mr-2" src="<?=_WEB_ROOT . '/public/images/'.$_SESSION['image']?>" alt="">
                                                <div class="">
                                                      <span class="text-sm"><?=$_SESSION['user']?></span>
                                                      <p class="m-0 text-xs">6 months</p>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <div class="grid grid-cols-3 my-5 text-white gap-2 sticky top-12 bg-white shadow-lg p-5 rounded-lg">
                              <div class="col-span-1 p-3 flex items-center bg-purple-600 rounded-md shadow-xl hover:opacity-80 cursor-pointer">
                                    <i class="fa-solid fa-chalkboard-user p-2"></i>
                                    <div class="flex flex-col">
                                          <span class="text-xs font-semibold opacity-70">INSTRUCTOR-LED SESSION</span>
                                          <span class="text-xl text-center font-semibold">Start a live quiz</span>
                                    </div>
                              </div>
                              <div class="col-span-1 p-3 flex items-center bg-purple-600 rounded-md shadow-xl hover:opacity-80 cursor-pointer">
                                    <i class="fa-solid fa-clock p-2"></i>
                                    <div class="flex flex-col">
                                          <span class="text-xs font-semibold opacity-70"> ASYNCHRONOUS LEARNING</span>
                                          <span class="text-xl text-center font-semibold"> Assign homework</span>
                                    </div>
                              </div>
                              <div class="col-span-1 p-3 flex items-center bg-purple-600 rounded-md shadow-xl hover:opacity-80 cursor-pointer play_quizz_btn" name_play="<?= $row['quizzName'] ?>" id_play="<?= $row['quizzID'] ?>">
                                    <i class="fa-solid fa-play p-2"></i>
                                    <div class="flex flex-col">
                                          <span class="text-xs font-semibold opacity-70">NO DEVICES NEEDED</span>
                                          <span class="text-xl text-center font-semibold">Preview</span>
                                    </div>
                                    <script type="text/javascript">
                                          var playBtn = document.querySelector('.play_quizz_btn')
                                          playBtn.addEventListener('click', function(e) {
                                                window.location = window.location.pathname.replace(`admin/quizz/edit/${playBtn.getAttribute('id_play')}`, `playQuizz/readyQuizz/${playBtn.getAttribute('id_play')}`)
                                          })
                                    </script>
                              </div>
                        </div>
                        <div class="flex justify-between py-2">
                              <div class="">
                                    <i class="fa-solid fa-list-check"></i>
                                    <span class="font-medium text-red-500"><?= $count['numberQuestion'] ?> Questions</span>
                              </div>
                        </div>
                        <div class="w-full h-10 border-2 my-5 bg-white hover:bg-gray-100 hover:text-green-500 hover:border-purple-300">
                              <button class="w-full text-center add_question_btn" previous_question="0">
                                    <span class="text-2xl">+</span>
                              </button>
                        </div>
                        <?php
                        if (!empty($questions)) {
                              $stt = 1;
                              foreach ($questions as $question) {
                        ?>
                                    <div class="border p-3 shadow-md cursor-pointer bg-white">
                                          <div class="flex justify-between items-center">
                                                <div class="text-sm">
                                                      <i class="fa-regular fa-square-check text-green-800"></i>
                                                      <span><b><?= $stt++ ?></b> . Mutiple-choice</span>
                                                </div>
                                                <div class="">
                                                      <button link="<?= _WEB_ROOT . '/admin/quizz/edit_question' ?>" id="<?= $question['questionID'] ?>" class="border rounded text-sm py-2 px-3 text-white bg-purple-500 hover:opacity-80 edit_question"><i class="fa-solid fa-pencil"></i> Edit</button>
                                                      <button delete_id="<?= $question['questionID'] ?>" curent_quizz="<?= $question['quizz'] ?>" class="border rounded text-sm py-2 px-3 text-white bg-red-500 hover:opacity-80 delete_question"><i class="fa-solid fa-trash-can"></i> Delete</button>
                                                      <button class="border rounded text-xs py-2 px-3"><i class="fa-regular fa-clock"></i> <?= $question['time'] ?> seconds</button>
                                                      <button class="border rounded text-xs py-2 px-3"><i class="fa-regular fa-circle-check"></i> <?= $question['point'] ?> points</button>
                                                </div>
                                          </div>
                                          <div class="">
                                                <div class="flex items-center">
                                                      <img width="105" src="<?= _WEB_ROOT . '/public/images/' . $question['qs_image'] ?>" alt="">
                                                      <div class="flex-1 text-center px-30">
                                                            <h4><?= $question['question'] ?></h4>
                                                      </div>X
                                                </div>
                                                <div class="">
                                                      <p class="text-xs px-3 py-2">answer choices</p>
                                                </div>
                                                <div class="grid grid-cols-2 gap-3">
                                                      <div class="col-span-1 text-black">
                                                            <input class="<?php echo $question['answer'] == 'A' ? "bg-green-800" : "bg-red-500"; ?> mx-2" type="radio">
                                                            <?= $question['A'] ?>
                                                      </div>
                                                      <div class="col-span-1 text-black">
                                                            <input class="<?php echo $question['answer'] == 'B' ? "bg-green-800" : "bg-red-500"; ?> mx-2" type="radio">
                                                            <?= $question['B'] ?>
                                                      </div>
                                                      <div class="col-span-1 text-black">
                                                            <input class="<?php echo $question['answer'] == 'C' ? "bg-green-800" : "bg-red-500"; ?> mx-2" type="radio">
                                                            <?= $question['C'] ?>
                                                      </div>
                                                      <div class="col-span-1 text-black">
                                                            <input class="<?php echo $question['answer'] == 'D' ? "bg-green-800" : "bg-red-500"; ?> mx-2" type="radio">
                                                            <?= $question['D'] ?>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="w-full h-10 border-2 my-5 bg-white hover:bg-gray-100 hover:text-green-500 hover:border-purple-300">
                                          <button class="w-full text-center add_question_btn" previous_question="<?= $question['numberShow'] ?>">
                                                <span class="text-2xl">+</span>
                                          </button>
                                    </div>
                        <?php
                              }
                        }
                        ?>
                  </div>
                  <div class="col-span-3">
                        <div class="">
                              <img src="https://cf.quizizz.com/img/super/ads/ads_banner13.png" alt="">
                        </div>
                        <div class="flex justify-between py-3 items-center">
                              <span class="font-medium">Suggestions for you</span>
                              <div class="border-2 border-purple-800 rounded text-xs flex items-center px-2 py-2 font-medium"><span>See more </span><i class="fa-solid fa-chevron-right"></i></div>
                        </div>
                        <div class="flex p-2 border rounded-sm hover:bg-gray-200 cursor-pointer mb-3 bg-white">
                              <div class="flex items-center justify-center">
                                    <img width="100" class="rounded-xl" src="https://cf.quizizz.com/img/presentation/default-img/presentation_title_img-6_training.jpg?w=90&h=90" alt="">
                              </div>
                              <div class="p-1 flex-1 ">
                                    <h5>Quizizz Test Lesson</h5>
                                    <h6 class="text-sm">75 plays</h6>
                                    <p class="m-0 text-xs font-bold">5th</p>
                                    <div class="flex justify-end">
                                          <button class="px-3 border border-orange-400 text-orange-400">Super</button>
                                          <button class="ml-1 px-3 border border-green-600 text-green-600">Lesson</button>
                                    </div>
                              </div>
                        </div>
                        <div class="flex p-2 border rounded-sm hover:bg-gray-200 cursor-pointer mb-3 bg-white">
                              <div class="flex items-center justify-center">
                                    <img width="100" class="rounded-xl" src="https://quizizz.com/_media/questions/b927d6cb-95d2-4485-b451-adc3bc3f04b0_90_90" alt="">
                              </div>
                              <div class="p-1 flex-1 ">
                                    <h5>Les Objets Directs</h5>
                                    <h6 class="text-sm">1.7K plays</h6>
                                    <p class="m-0 text-xs font-bold">11th - 12th</p>
                                    <div class="flex justify-end">
                                          <button class="px-3 border border-orange-400 text-orange-400">Super</button>
                                          <button class="ml-1 px-3 border border-green-600 text-green-600">Lesson</button>
                                    </div>
                              </div>
                        </div>
                        <div class="flex p-2 border rounded-sm hover:bg-gray-200 cursor-pointer mb-3 bg-white">
                              <div class="flex items-center justify-center">
                                    <img width="100" class="rounded-xl" src="https://cf.quizizz.com/img/presentation/default-img/presentation_title_img-1_default.jpg?w=90&h=90" alt="">
                              </div>
                              <div class="p-1 flex-1 ">
                                    <h5>La Fecha</h5>
                                    <h6 class="text-sm">926 plays</h6>
                                    <p class="m-0 text-xs font-bold">8th - 11th</p>
                                    <div class="flex justify-end">
                                          <button class="ml-1 px-3 border border-green-600 text-green-600">Lesson</button>
                                    </div>
                              </div>
                        </div>
                        <div class="flex p-2 border rounded-sm hover:bg-gray-200 cursor-pointer mb-3 bg-white">
                              <div class="flex items-center justify-center">
                                    <img width="100" class="rounded-xl" src="https://quizizz.com/_media/quizzes/e0855588-a133-4305-8308-71fcc79d60f8_90_90" alt="">
                              </div>
                              <div class="p-1 flex-1 ">
                                    <h5>Tragedy</h5>
                                    <h6 class="text-sm">3.5K plays</h6>
                                    <p class="m-0 text-xs font-bold">5th</p>
                                    <div class="flex justify-end">
                                          <button class="ml-1 px-3 border border-green-600 text-green-600">Lesson</button>
                                    </div>
                              </div>
                        </div>
                        <div class="flex p-2 border rounded-sm hover:bg-gray-200 cursor-pointer mb-3 bg-white">
                              <div class="flex items-center justify-center">
                                    <img width="100" class="rounded-xl" src="https://quizizz.com/_media/quizzes/ae67178d-12e4-4bcb-ab3f-5e21de9da980_90_90" alt="">
                              </div>
                              <div class="p-1 flex-1 ">
                                    <h5>Travel</h5>
                                    <h6 class="text-sm">3.5K plays</h6>
                                    <p class="m-0 text-xs font-bold">5th</p>
                                    <div class="flex justify-end">
                                          <button class="px-3 border border-orange-400 text-orange-400">Super</button>
                                          <button class="ml-1 px-3 border border-green-600 text-green-600">Lesson</button>
                                    </div>
                              </div>
                        </div>
                        <div class="flex p-2 border rounded-sm hover:bg-gray-200 cursor-pointer mb-3 bg-white">
                              <div class="flex items-center justify-center">
                                    <img width="100" class="rounded-xl" src="https://cf.quizizz.com/img/presentation/default-img/presentation_title_img-6_training.jpg?w=90&h=90" alt="">
                              </div>
                              <div class="p-1 flex-1 ">
                                    <h5>Quizizz Test Lesson</h5>
                                    <h6 class="text-sm">75 plays</h6>
                                    <p class="m-0 text-xs font-bold">5th</p>
                                    <div class="flex justify-end">
                                          <button class="ml-1 px-3 border border-green-600 text-green-600">Lesson</button>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
            <?php $this->render('contents/admin/preview_quizz') ?>
            <?php $this->render('contents/admin/edit_question') ?>
            <?php $this->render('contents/admin/add_question', array('quizzID' => $row['quizzID'])) ?>
            <?php $this->render('blocks/form_msg') ?>
      </div>
<?php
}

?>

<script type="text/javascript">
      var edit_questions = document.querySelectorAll('.edit_question')
      var edit_content = document.querySelector('.edit_content')

      function cancel_update_question() {
            edit_content.classList.add('top-full')
            edit_content.classList.remove('top-0')
      }

      edit_content.style.transition = 'all .3s ease'
      edit_questions.forEach(question => {
            question.addEventListener('click', () => {

                  $.ajax({
                        type: 'POST',
                        url: question.getAttribute('link'),
                        data: {
                              id: question.id,
                        },
                        success: function(response) {
                              var res = jQuery.parseJSON(response)

                              $('#output_edit_img').attr("src", `<?= _WEB_ROOT . '/public/images/' ?>${res.data.qs_image}`);
                              $('#question_update').val(res.data.question)
                              $('#answer_A').val(res.data.A)
                              $('#answer_B').val(res.data.B)
                              $('#answer_C').val(res.data.C)
                              $('#answer_D').val(res.data.D)

                              if ($('#answer_A').attr('name') == res.data.answer) {
                                    $('#answer_A').parent().addClass('bg-green-600')
                              }

                              if ($('#answer_B').attr('name') == res.data.answer) {
                                    $('#answer_B').parent().addClass('bg-green-600')
                              }

                              if ($('#answer_C').attr('name') == res.data.answer) {
                                    $('#answer_C').parent().addClass('bg-green-600')
                              }

                              if ($('#answer_D').attr('name') == res.data.answer) {
                                    $('#answer_D').parent().addClass('bg-green-600')
                              }


                              edit_content.classList.add('top-0')
                              edit_content.classList.remove('top-full')
                        }
                  })




            })
      })

      var delete_question = document.querySelectorAll('.delete_question')
      var form_msg = document.querySelector('.form_msg')
      var delete_question_id = document.querySelector('.delete_question_id')
      var curent_quizz = document.querySelector('.curent_quizz')

      delete_question.forEach(item => {
            item.addEventListener('click', () => {
                  form_msg.style.transform = 'translateY(0)';
                  delete_question_id.setAttribute('value', item.getAttribute('delete_id'))
                  curent_quizz.setAttribute('value', item.getAttribute('curent_quizz'))
            })
      })

      function cancel_delete() {
            form_msg.style.transform = 'translateY(100%)';
            delete_question_id.setAttribute('value', "")
      }

      function submit_delete(event) {
            $.ajax({
                  type: "POST",
                  url: "http://localhost:3000/xampp/htdocs/quiz-system/admin/quizz/delete_question",
                  data: {
                        id: $('.delete_question_id').val()
                  },
                  success: function(response) {
                        var res = jQuery.parseJSON(response);
                        if (res.status == 200) {
                              form_msg.style.transform = 'translateY(100%)';
                              Swal.fire(
                                    'Delete success!',
                                    'You clicked the button!',
                                    'success'
                              )
                        }
                  }
            })
      }
</script>