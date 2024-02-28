<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Laravel Ajax</title>
    
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
  <body>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Student Management</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

     <div class="container">
        <div class="row">
            <div class="col-md-12">


            <div class="card mt-4 shadow">

                <div class="card-header d-flex justify-content-between">

                    <h5>Student Management</h5>
                               
                     <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                        <i class="bi bi-person-plus-fill"></i> Add New Student
                       </button>
                </div>

            <div class="card-body">
                <div id="show_all_student_data"> </div>
            </div>
            </div>




  
<!-- Add New Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

<form action="#" method="POST" id="add_student_form" idzenctype="multipart/form-data">
    <div class="modal-body">
        
        

         <?php echo csrf_field(); ?> <!--Compulsary Token-->
         
         <div class="row">
            <div class="col-lg">
                <label for="fname">First Name</label>
                <input type="text" name="fname" class="form-control" required>
            </div>

            <div class="col-lg">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" class="form-control" required>
            </div>
         </div>

         <div class="row">

            <div class="col-lg">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" required>
            </div>

         </div>

         <div class="row">

            <div class="col-lg">
                <label for="avata">Avatar</label>
                <input type="file" name="avatar" class="form-control" required>
            </div>

         </div>





        


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="add_student_btn">Add Student</button>
    </div>

</form>
    </div>
</div>
</div>



<!-- Edit Student Modal -->

<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Student</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    
    <form action="#" method="POST" id="update_student_form" idzenctype="multipart/form-data">
        <div class="modal-body">
            
            
    
             <?php echo csrf_field(); ?> <!--Compulsary Token-->

             <input type="hidden" name="user_id" id="user_id" >
             
             <div class="row">
                <div class="col-lg">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" class="form-control" required>
                </div>
    
                <div class="col-lg">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" class="form-control" required>
                </div>
             </div>
    
             <div class="row">
    
                <div class="col-lg">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
    
             </div>
    
             <div class="row mt-2 ">

                <div id="avatar"></div>
    
                <div class="col-lg">
                    <label for="avatar">Avatar</label>
                    <input type="file"  name="avatar" class="form-control">
                </div>
    
             </div>
    
    
    
    
    
            
    
    
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="update_student_btn">Update Student</button>
        </div>
    
    </form>



        </div>
      </div>
    </div>

                

            </div>
        </div>
     </div>

    
    
    
    
    
    
    
    
    
    <!--JQuery-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <!--Data Tables-->
     <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!--Link Sweet Alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready( function () {

            

           //Add Student

            $('#add_student_form').submit(function(e){
                e.preventDefault();
                const fd = new FormData(this);

                $('#add_student_btn').text('Adding...');

                $.ajax({
                    url :'<?php echo e(route('store')); ?>',
                    method : 'post',
                    data : fd,
                    cache : false,
                    contentType : false,
                    processData : false,
                    dataType : 'json',
                    success : function(response){
                        if(response.status==200){
                            Swal.fire(
                                'Added !',
                                'Student Added Successfully !',
                                'success'
                        )

                            $('#add_student_btn').text('Add Student');
                            $('#add_student_form')[0].reset();
                            $('#addStudentModal').modal('hide');


                            fetchAllStudent();


                        }
                    }


                });
            });



            
            $(document).on('click', '.userEditBtn', function(e){
                
                e.preventDefault();
               
                var id = $(this).attr('id');

                $.ajax({
                    url : '<?php echo e(route ('edit')); ?>',
                    method : 'get',
                    data : {id: id, _token: '<?php echo e(csrf_token()); ?>'
                },

                success: function(response){

                    $('#fname').val(response.first_name);
                    $('#lname').val(response.last_name);
                    $('#email').val(response.email);
                    $('#avatar').html(
                        `<img src="storage/images/${response.avatar}" width="100px" height="100px" class="img-fluid img-thumbnail">`
                    );

                    $("#user_id").val(response.id);

                }
                })
            });


            //Update Student

            $('#update_student_form').submit(function(e){
                e.preventDefault();
                const fd = new FormData(this);

                $('#update_student_btn').text('Updating...');

                $.ajax({
                    url :'<?php echo e(route('update')); ?>',
                    method : 'post',
                    data : fd,
                    cache : false,
                    contentType : false,
                    processData : false,
                    dataType : 'json',
                    success : function(response){
                        if(response.status==200){
                            Swal.fire(
                                'Updated !',
                                'Student Updated Successfully !',
                                'success'
                        )

                            $('#update_student_btn').text('Update Student');
                            $('#update_student_form')[0].reset();
                            $('#editStudentModal').modal('hide');


                            fetchAllStudent();


                        }
                    }


                });
            });





            fetchAllStudent();

            function fetchAllStudent(){

                $.ajax({

                    url:'<?php echo e(route('fetchAll')); ?>',
                    method: 'get',
                    success: function (response){
                        $('#show_all_student_data').html(response);
                        $('#stuTable').DataTable();
                    }
                });
            }

            //Delete Student process

            $(document).on('click', '.deleteBtn', function(e){
                e.preventDefault()

                let id = $(this).attr('id');

                let csrf = '<?php echo e(csrf_token()); ?>';

                Swal.fire({
                    title: 'Are you sure ?',
                    text: "You won't be able to revet this !",
                    icon: "warning",
                    showCancelButton:true,
                    confirmButtonColor:'red',
                    confirmButtonText:'Yes, Delete it !',
                    cancelButtonColor:'green'

                }).then((result => {

                    if(result.isConfirmed){

                        $.ajax({
                            url: '<?php echo e(route('delete')); ?>',
                            method: 'delete',
                            data:{
                                id: id,
                                _token: csrf
                            },
                            success: function(response){

                                console.log(response);
                                Swal.fire(
                                    'Deleted!',
                                    'Student has been deleted',
                                    'success'

                                );
                                fetchAllStudent();

                            }
                        });

                    }

                }));
            });
            

        });


    </script>

  </body>
</html><?php /**PATH G:\Laravel\LaravelAjax\resources\views/home.blade.php ENDPATH**/ ?>