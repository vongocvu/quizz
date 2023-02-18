<div class="fixed inset-0 z-10 form_msg flex items-center justify-center form_msg">
      <div class="w-96 bg-white border-2 border-gray p-5 rounded-xl shadow-lg shadow-gray-500/50">
            <h2 class="text-center text-2xl font-medium">Confirm delete !</h2>
            <h3 class="text-center py-2">Are you sure you want to delete this ?</h3>
            <div class="grid grid-cols-2">
                  <div class="col-span-1 text-center"><span class="hover:opacity-80 text-red-500 cursor-pointer" onClick="cancel_delete()">Cancel</span></div>
                  <div class="col-span-1 text-center"><span class="hover:opacity-80 text-green-500 cursor-pointer" onClick="submit_delete(event)">Delete</span></div>
            </div>
            <input type="text" class="delete_question_id hidden" value=""/>
            <input type="text" class="curent_quizz hidden" value=""/>
      </div> 
</div>