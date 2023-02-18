<div class="px-10 py-10 ">
      <div class="">
            <h1 class="font-medium mb-4">ADD NEW QUIZZ</h1>
            <div class="w-60 h-60 shadow-md rounded-lg text-gray-400 flex hover:text-gray-900 cursor-pointer bg-white" onClick="showAddQuizz()">
                  <span class="m-auto text-9xl font-extralight  ">+</span>
            </div>
      </div>
      <?php
            if (!empty($TopicArr)) {
                  foreach ($TopicArr as $topic) {
                        ?>
                          <div class="mt-10">
                              <h1><?=$topic['topicName']?></h1>
                              <div class="grid grid-cols-6 gap-4 mt-5">
                        <?php
                        foreach ($QuizzArr as $quizz) {
                              if ($topic['topicID'] == $quizz['topic']) {
                                    ?>
                                    <div class="col-span-1 ">
                                          <a href="<?php echo _WEB_ROOT .'/admin/quizz/edit/'. $quizz['quizzID']?>" class="col-span-1 h-60 grid grid-rows-5 rounded-xl overflow-hidden border-2 border-gray-300 bg-white hover:opacity-80 hover:cursor-pointer hover:scale-105" style="animation: all 10s ease;">
                                                <img class="w-full h-full row-span-2  object-cover bg-center" src="<?=_WEB_ROOT . '/public/images/' . $quizz['quizz_image'] ?>" alt="">
                                                <div class="row-span-3 grid grid-rows-5 p-2">
                                                      <h1 class="row-span-2 w-full font-bold text-black"><?= $quizz['quizzName'] ?></h1>
                                                      <span class="row-span-2 text-sm text-black">by:(FPL Ngoc)</span>
                                                      <button class="row-span-1 w-full bg-yellow-300 rounded-xl text-black">100% accuracy</button>
                                                </div>
                                          </a>
                                    </div>
                                    <?php
                              }
                        }
                        ?> 
                               </div>
                         </div>
                        <?php
                              
                  }
            }
      ?>
</div>
<div class="fixed inset-0 z-50 flex boxADDparent" style="background-color: rgba(0 ,0 ,0 , 0.5); transform: translateY(100%)">
      <form action="<?= _WEB_ROOT .'/admin/quizz/addQuizz'?>" method="post" enctype="multipart/form-data" class="m-auto rounded-2xl px-10 py-5 boxADDchild" style="width: 600px; background-color: white; transition: all 0.4s linear; transform: translateY(1000px)">
            <div class="flex items-center mb-5">
                  <div class="w-10 h-10 flex bg-purple-100 rounded-full text-purple-400"><i class="fa-regular fa-folder m-auto"></i></div>
                  <h3 class="ml-3 font-medium">Create a new quizz</h3>
            </div>
            <div class="w-full mb-3" >
                  <h3 class="text-xs mb-2">Enter quizz name</h3>
                  <input class="w-full input_quizz checkValue" check="false" name="nameQuizz" type="text" placeholder="ex: Hãy đoán xem v.v.v..">
            </div>
            <div class=" mb-3">
                  <h3 class="text-xs mb-2">Topic</h3>
                  <div class="flex w-full">
                        <input class="flex-1 mr-2 input_quizz checkValue"  check="false" name="nameTopic" type="text" placeholder="Enter new topic or choose topic">
                        <select class="choose_topic" name="" id="">
                              <option value="">Choose topic</option>
                              <?php 
                                 if (!empty($TopicArr)) {
                                          foreach ($TopicArr as $topic) {
                                            ?> 
                                               <option value="<?=$topic['topicID']?>"><?=$topic['topicName']?></option>
                                            <?php
                                          }
                                    }
                              ?>
                        </select>
                  </div>
            </div>
            <div class="text-center overflow-hidden flex items-center justify-between mb-3">
                  <img width="100" height="100" id="output_upload" />
                  <div class="">
                        <input type="file" name="imageQuizz"  id="file-input" check="false" class="file-input__input object-cover checkValue" onChange="loadFile(event)" />
                        <label class="file-input__label" for="file-input">
                              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                              </svg>
                        <span>Upload Image Quizz</span></label>
                  </div>
                  <script>
                        var loadFile = function(event) {
                              var output = document.getElementById('output_upload');
                              output.src = URL.createObjectURL(event.target.files[0]);
                              output.onload = function() {
                                    URL.revokeObjectURL(output.src) // free memory
                              }
                        };
                  </script>
                   <div class=" mb-3">
                        <h3 class="text-xs mb-2">Visibility</h3>
                        <div class="flex items-center">
                              <input checked value="1" type="radio" name="visibility"><label for="visibility" class="mr-4">Public</label>
                              <input value="2" type="radio" name="visibility"><label for="visibility" class="mr-4">Private</label>
                        </div>
                   </div>
            </div>
           
            <div class="grid grid-cols-2 gap-4">
                  <button type="button" class="col-span-1 bg-gray-300 py-2 rounded-lg text-red-500 hover:opacity-80" onClick="cancelADD()">Cancel</button>
                  <button id="saveADD" type="button" name="submitADD" class="col-span-1 bg-gray-300 py-2 rounded-lg text-green-500 hover:opacity-80">Done</button>
            </div>
      </form>
</div>
<script type="text/javascript">
      var boxADDparent = document.querySelector('.boxADDparent')
      var boxADDchild = document.querySelector('.boxADDchild')
      var input_quizz = document.querySelectorAll('.input_quizz')
      var choose_topic = document.querySelector('.choose_topic')
      var saveADD = document.querySelector('#saveADD')
      var file_input = document.querySelector('#file-input')
      

      choose_topic.addEventListener('change', (e) => {
            if (e.target.value !== "") {
                  for ( var i = 0; i < e.target.children.length; i++) {
                        if (e.target.children[i].value == e.target.value ) {
                              e.target.previousElementSibling.value = e.target.children[i].innerText
                              e.target.previousElementSibling.setAttribute('check', 'true')
                        }
                  }
            } else {
                  e.target.previousElementSibling.value = ""
                  e.target.previousElementSibling.setAttribute('check', 'false')
            }
            check()
      })

      file_input.addEventListener('change', function () {
          if (file_input.value == '') {
            file_input.setAttribute('check', "false")
          } else {
            file_input.setAttribute('check', "true")

          }
          check()
      })

      input_quizz.forEach(input => {
          input.addEventListener('keyup', () => {
            if ( input.value !== "") {
                  input.setAttribute('check', "true")
                  if (input.nextElementSibling) {
                         input.nextElementSibling.value = ""
                  }
            } else {
                  input.setAttribute('check', "false")
            }
            check()
          })
      })

      function showAddQuizz () {
            boxADDparent.style.transform = 'translateY(0)'
            boxADDchild.style.transform = 'translateY(0)'
      }

      function cancelADD () {
            boxADDparent.style.transform = 'translateY(100%)'
            boxADDchild.style.transform = 'translateY(1000px)'
      }

      var checkValue = document.querySelectorAll('.checkValue')
      var count = 0 

      function check () {
            checkValue.forEach(check => {
                  if (check.getAttribute('check') == 'false') {
                        count++
                        console.log(count);
                  }
            })

            if (count == 0) {
                  saveADD.type = 'submit'
            } else {
                  count = 0
                  saveADD.type = 'button'
            }
      }
      

</script>