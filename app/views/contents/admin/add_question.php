      <div class="add_question w-screen h-screen fixed top-0 left-0 right-0 bottom-0 z-10 flex" style="background-color: rgba(0, 0, 0, 0.8);">
            <form method="POST" action="<?= _WEB_ROOT . '/admin/quizz/add_question/' . $quizzID ?>" enctype="multipart/form-data" class="m-auto w-full h-full flex flex-col">
                  <div class="p-2 flex justify-between relative bg-fuchsia-900" style="background-color: rgb(56 21 53/1);">
                        <div class="flex">
                              <div class="w-40 h-10 flex justify-center items-center text-white bg-gray-800 rounded-xl ml-2">
                                    <i class="fa-regular fa-square-check text-green-800 mr-2"></i>
                                    <span> Mutiple-choice</span>
                              </div>
                        </div>
                        <div class="w-40 h-10 flex justify-center items-center text-white bg-gray-800 rounded-xl ml-2 absolute top-2 right-1/2 translate-x-1/2">
                              <span> Participants view</span>
                        </div>
                        <div class="close_add_question w-10 h-10 flex justify-center items-center text-white bg-gray-800 rounded-xl ml-2 hover:opacity-80 cursor-pointer">
                              <span>X</span>
                        </div>
                  </div>
                  <div class="flex-1 flex flex-col bg-fuchsia-900 p-5 rounded-xl mx-96 my-24 " style="background-color: rgb(56 21 53/1);">
                        <div class="my-2 px-2 flex h-96">
                              <div class="rounded-xl border-2 text-center w-96 h-96 overflow-hidden relative">
                                    <img width="100%" height="100%" id="output_add" />
                                    <div class="file-input">
                                          <input type="file" name="qs_image" id="file-input_add" class="file-input__input object-cover" onChange="loadFileAdd(event)" />
                                          <label class="file-input__label" for="file-input_add">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                      <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                                </svg>
                                                <span>Upload file</span></label>
                                    </div>
                                    <script>
                                          var loadFileAdd = function(event) {
                                                var output = document.getElementById('output_add');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.onload = function() {
                                                      URL.revokeObjectURL(output.src) // free memory
                                                }
                                          };
                                    </script>
                              </div>
                              <div class="flex-1 flex items-center justify-center p-10">
                                    <input name="question" class="input-edit text-white text-4xl bg-transparent w-full h-full text-center placeholder:text-white" placeholder="Nhập câu hỏi tại đây !" value="" />
                              </div>
                        </div>
                        <div class="p-2 grid h-full grid-cols-4 gap-3">
                              <div class="col-span-1 h-full bg-cyan-600 rounded-xl flex items-center justify-center p-10 relative">
                                    <button class="choose_answer" type="button"><i class="fa-solid fa-circle-check "></i></button>
                                    <input type="text" name="A" class=" input-edit text-white font-medium bg-transparent w-full h-full text-center placeholder:text-white" placeholder="Đáp án A" value="" />
                              </div>
                              <div class="col-span-1 h-full bg-cyan-600 rounded-xl flex items-center justify-center p-10 relative">
                                    <button class="choose_answer" type="button"><i class="fa-solid fa-circle-check "></i></button>
                                    <input type="text" name="B" class=" input-edit text-white font-medium bg-transparent w-full h-full text-center placeholder:text-white" placeholder="Đáp án B" value="" />
                              </div>
                              <div class="col-span-1 h-full bg-cyan-600 rounded-xl flex items-center justify-center p-10 relative">
                                    <button class="choose_answer" type="button"><i class="fa-solid fa-circle-check "></i></button>
                                    <input type="text" name="C" class=" input-edit text-white font-medium bg-transparent w-full h-full text-center placeholder:text-white" placeholder="Đáp án C" value="" />
                              </div>
                              <div class="col-span-1 h-full bg-cyan-600 rounded-xl flex items-center justify-center p-10 relative">
                                    <button class="choose_answer" type="button"><i class="fa-solid fa-circle-check "></i></button>
                                    <input type="text" name="D" class=" input-edit text-white font-medium bg-transparent w-full h-full text-center placeholder:text-white" placeholder="Đáp án D" value="" />
                              </div>
                              <input type="text" class="hidden answer" name="answer" value="A">
                              <input type="text" class="hidden previousQuestion" name="previous_question" value="">
                        </div>
                  </div>
                  <div class="h-16 p-5 flex items-center justify-between bg-black">
                        <div class="flex">
                              <div class="flex items-center p-2 text-white bg-gray-800 text-lg rounded-lg mx-2 font-medium">
                                    <i class="fa-solid fa-clock"></i>
                                    <select class="bg-gray-800 border-0 cursor-pointer" name="" id="" style="border: none !important">
                                          <option value="30">30 seconds</option>
                                          <option value="60">1 minutes</option>
                                          <option value="120">2 minutes</option>
                                          <option value="180">3 minutes</option>
                                    </select>
                              </div>
                        </div>
                        <div class="w-full flex justify-end">
                              <div class="flex flex-col hover:opacity-80">
                                    <button type="button" class="close_add_question p-2 px-10 text-white bg-gray-800 text-lg rounded-lg"><span class="text-center text-white text-2xl font-bold">Cancel</span></button>
                              </div>
                              <div class="ml-4 flex flex-col hover:opacity-80">
                                    <button name="submit" type="submit" class="p-2 px-10 text-black bg-white text-lg rounded-lg"><i class="fa-solid fa-floppy-disk mr-2"></i><span class="text-center font-bold text-2xl">Save</span></button>
                              </div>
                        </div>
                  </div>
            </form>
      </div>

      <script type="text/javascript">
            var add_question = document.querySelector('.add_question')
            var add_question_btn = document.querySelectorAll('.add_question_btn')
            var close_add_question = document.querySelectorAll('.close_add_question')

            var previousQuestion = document.querySelector('.previousQuestion')

            add_question_btn.forEach(item => {
                  item.addEventListener('click', function(e) {
                        add_question.style.transform = 'translateY(0)';
                        previousQuestion.setAttribute('value', item.getAttribute('previous_question'))
                  })
            })


            close_add_question.forEach(item => {
                  item.addEventListener('click', function(e) {
                        add_question.style.transform = 'translateY(100%)';
                        previousQuestion.setAttribute('value', "")
                  })
            })


            var choose_answer = document.querySelectorAll('.choose_answer')
            var answer = document.querySelector('.answer')

            choose_answer.forEach(item => {
                  item.addEventListener('click', function(e) {
                        if (item.nextElementSibling.value !== "") {
                              choose_answer.forEach(choose => {
                                    choose.style.color = 'white'
                                    choose.parentElement.classList.remove('bg-green-600')
                              })
                              item.style.color = '#0fd50f'
                              item.parentElement.classList.add('bg-green-600')
                              answer.setAttribute('value', item.nextElementSibling.getAttribute('name'))
                        } else {
                              alert('Please enter your answer !')
                        }

                  })
            })
      </script>