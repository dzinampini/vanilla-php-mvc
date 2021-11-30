<?php error_reporting(0);
include('_header.php'); 
$question_number = 1;
// store as cookie value 
setcookie("guest_id", "", time() - 3600); // expire current cookie first
$guest_id = rand(100000, 999999); 
setcookie("guest_id", $guest_id, time() + (86400 * 30), "/"); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">

            <?php 
                $questions_array = json_decode($questions_json, true);
                // var_dump($questions_array);
            ?>
            <h2>Survey questions</h2>
            <form>
                <input type="hidden" name="guest_id" id="guest_id" value="<?= $guest_id ?>" class="form-control" />
                
                <input type="text" name="question" id="question" value="<?= $questions_array['1'] ?>" class="form-control" disabled/>

                <input type="hidden" name="question_number" id="question_number" value="1"  class="form-control"  />

                <textarea name="answer" id="answer" value="" class="form-control" placeholder="Type your answer here" ></textarea>

                <div class="form-group mt-3">
                  <button type="button" type="submit" id="btn_save" class="btn btn-primary">Next</button>
                </div>
            </form>

        </div>
    </div>

    <div class="row card mb-5 mt-5">
      <div class="card-header">
        <i class="fas fa-table"></i> Your responses</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <!-- <th>#</th> -->
                    <th>Question</th>
                    <th>Answer</th>
                    <th></th>
                  </tr>
                </thead>

                <tbody id="surveyQuestions">
                     
                </tbody>

              </table>
            </div>
          </div>
          <!-- <div class="card-footer small text-muted">Survey responses</div> -->
        </div>
      </div>
</div>


<!--MODAL DELETE-->
<form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete response</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this response?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id_delete" id="id_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->


        <!-- MODAL EDIT -->
        <form method="POST">
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Response</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Response ID</label>
                            <div class="col-md-10">
                              <input type="text" name="id_edit" id="id_edit" class="form-control" placeholder="Question ID" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Question</label>
                            <div class="col-md-10">
                              <input type="text" name="question_edit" id="question_edit" class="form-control" placeholder="Question" required>
                            </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-12"><p id ="question_type_notes"></p></div>
                          <label class="col-md-2 col-form-label">
                            Answer
                          </label>
                          <div class="col-md-10">
                            <textarea name="answer_edit" id="answer_edit" class="form-control" required></textarea>
                          </div>
                        </div> 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>

<?php include('_footer.php'); ?>




<script type="text/javascript">
    $(document).ready(function(){

        var myVar;
        var warning_given = false; 
        var last_activity = new Date();

        $(window).blur(function(){
          last_activity = new Date();
        });
        $(window).focus(function(){
          last_activity = new Date();
        });

        setInterval(alertFunc, 30000);

        function alertFunc() {
          var time_now = new Date();

          var seconds = (time_now.getTime() - last_activity.getTime()) / 1000;

          if (seconds >= 30 ) {
            if (warning_given == false) {
              warning_given = true; 
              alert("Hello its been 30 seconds and you have not made any action on the web page. Please note after another 30 seconds the page will close!");
            } else {
              alert("Redirecting because you have been inactive for long");
              window.location.href = 'index.php?controller=site&action=index';
            }  
          } else {
            warning_given = false;
          }
        }


        surveyResponses(); 

        // calculate the time issue 
          
        // function show all product
        function surveyResponses(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo $helper->url("site", "responses"); ?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                // '<td>'+data[i].question_number+'</td>'+
                                '<td>'+data[i].question+'</td>'+
                                '<td>'+data[i].answer+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm question_edit" data-id="'+data[i].id+'" data-question="'+data[i].question+'" data-question_number="'+data[i].question_number +'" data-answer="'+data[i].answer +'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm question_delete" data-id="'+data[i].id+'">Delete</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#surveyQuestions').html(html);
                }
 
            });
        } 

        //Save answer
        $('#btn_save').on('click', async function(){
            var question = $('#question').val();
            var guest_id = $('#guest_id').val();
            var answer        = $('#answer').val();
            var question_number        = $('#question_number').val();
            

            console.log(question, guest_id, answer, question_number);
            try {
                await $.ajax({
                    type : "POST",
                    url  : "<?php echo $helper->url("site", "record_answer"); ?>",
                    dataType : "JSON",
                    data : {question:question, guest_id:guest_id, answer:answer },
                    success: function(data) {
                        alert("Response recorded");
                        new_question_number = parseInt(question_number) + 1;
                        $('[name="question"]').val("<?php echo $questions_array['2'] ?>");
                        $('[name="question_number"]').val(new_question_number);

                        if (new_question_number == 2) {
                            $('[name="question"]').val("<?php echo $questions_array['2'] ?>");
                        } else if (new_question_number == 3) {
                            $('[name="question"]').val("<?php echo $questions_array['3'] ?>");
                        } else if (new_question_number == 4) { 
                            $('[name="question"]').val("<?php echo $questions_array['4'] ?>");
                        } else if (new_question_number == 5) {
                            $('[name="question"]').val("<?php echo $questions_array['5'] ?>");
                        } else {
                            // TODO: should actually be redirection
                            window.location.href = 'index.php?controller=site&action=thank_you';
                        } 
                        $('[name="answer"]').val("");
                        surveyResponses();
                    },
                    error: function(error) {
                        console.log('error occured on function call', question_number, error.responseText);
                    }
                });
                // console.log('no error occured, but there was no success')
            } catch (error) {
                console.error('An error occured');
            }

            return false;
        });

        //get data for delete record
    $('#surveyQuestions').on('click','.question_delete',function(){
        var id = $(this).data('id');
             
            $('#Modal_Delete').modal('show');
            $('[name="id_delete"]').val(id);
        });
 
        //delete record to database
         $('#btn_delete').on('click', async function(){
            var id = $('#id_delete').val();

            console.log('about to delete', id);
            await $.ajax({
                type : "POST",
                url  : "<?php echo $helper->url("site", "delete_answer"); ?>",
                dataType : "JSON",
                data : {id: id},
                success: function(data){
                    // $('[name="id"]').val("");
                    $('#Modal_Delete').modal('hide');
                    
                },
                error: function(error) {
                    console.log('error occured on function call', error.responseText);
                }
            });

            $('#surveyQuestions').html('');

            surveyResponses();
            
            return false;
        });

        //get data for update record
    $('#surveyQuestions').on('click','.question_edit',function(){
            var id = $(this).data('id');
            var question = $(this).data('question');
            var answer = $(this).data('answer');
             
            $('#Modal_Edit').modal('show');
            $('[name="id_edit"]').val(id);
            $('[name="question_edit"]').val(question);
            $('[name="answer_edit"]').val(answer);
        });
 
        //update record to database
         $('#btn_update').on('click', async function(){
            var id = $('#id_edit').val();
            var question = $('#question_edit').val();
            var answer = $('#answer_edit').val();
            try {
                await $.ajax({
                    type : "POST",
                    url  : "<?php echo $helper->url("site", "update_answer"); ?>",
                    dataType : "JSON",
                    data : {id:id, question:question, answer:answer},
                    success: function(data){
                        $('[name="id_edit"]').val("");
                        $('[name="question_edit"]').val("");
                        $('[name="answer_edit"]').val("");
                        $('#Modal_Edit').modal('hide');
                    },
                    error: function(error) {
                        console.log('error occured on function call', error.responseText);
                    }
                });
            } catch(error) {
                console.error('An error occured', error.message);
            }
            surveyResponses();
            return false;
        });
    });

    

    
 
</script>