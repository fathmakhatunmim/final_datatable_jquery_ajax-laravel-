  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> 

<script>
          $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
      });
</script>



  <script>
    $(document).ready(function(){
        // alert();

      //datatable a add kora
      var $table=  $('.bookTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('avaBook.index') }}",
        columns: [
            { data:'id' },
            { data:'title' },
            { data:'author' },
            { data:'category' },
            { data:'available' },
            { data:'action', orderable:false, searchable:false }
        ]
        
    });
     $('#exampleModalLabel').html('Add Book');
           

     $(document).on('click','#AddBook',function(e){
            
            //page ta jeno reload na hoi 
                e.preventDefault();
                
                 let name = $('#title').val();
                 let author = $('#author').val();
                 let category = $('#category').val();
                 let available = $('#available').val();
                //   console.log(name+author+quantity);
                 
             var form = new FormData($('#addForm')[0]);

                // console.log(form);
            $.ajax({
            url:"{{route('create.store')}}",
            method:"POST",            
            data:form,

            processData: false,
//            jQuery FormData কে জোর করে string বানানোর চেষ্টা করবে →
// result = data নষ্ট / empty / server এ পৌঁছাবে না
            contentType: false,
             // multipart/form-data পাঠাবে

               success:function(res){
                if(res.success==true){
                    $('#exampleModal').modal('hide');
                     $('#addForm')[0].reset(); // form reset
                    //  alert('Book added successfully!');
                    $('.bookTable').DataTable().ajax.reload();

                      swal("Success", res.message, "success");

                }

               },
               error:function(err){
                let error = err.responseJSON;
               $.each(error.errors, function(key, value){
    $('.ErrorMassage').append('<span class="text-danger">'+value[0]+'</span><br>');
});


               }



                });

                

            });

// edit
$(document).on('click', '.editButton', function(e){
    e.preventDefault();
    
    let id = $(this).data('id'); // DataTable থেকে ID

    $.ajax({
        url: "/create/edit/" + id,  // ✅ id include
        method: 'GET',
        success: function(response) {


            $('.bookTable').DataTable().ajax.reload();
            $('#exampleModal').modal('show');
            $('#exampleModalLabel').html('Edit Category');
            $('#AddBook').html('Update book');

            $('#book_id').val(response.id);

            // fill modal fields
            $('#title').val(response.title);
            $('#author').val(response.author);
            $('#category').val(response.category);
            $('#available').val(response.available);

            // optional: select type dropdown
            // var type = capitalizeFirstLetter(response.title);
            // $('#type').html('<option value="' + response.title + '">' + title + '</option>');
        },
        error: function(error) {
            console.log(error);
        }
    });
});
// delete

       $('body').on('click', '.deleteButton', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '/categories/' + id + '/destroy', // match the route
                    method: 'DELETE',
                    success: function(response) {
                        swal("Success", response.success, "success");
                        $table.ajax.reload();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            });


function capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }

    });
  </script>