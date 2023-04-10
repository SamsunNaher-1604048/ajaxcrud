<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta  name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

        <style>
            body { 
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id='add_todo'>
     Add Todo
</button>

<!-- table create -->

         <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">name</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($todos as $todo)
                  <tr id="list_todo_{{$todo->id}}">
                    <td>{{$todo->id}}</td>
                    <td>{{$todo->name}}</td>
                    <td>
                        <button type="button" class="btn btn-primary" id="todo_edit"  data-id="{{$todo->id}}">Edit</button>
                        <button type="button" class="btn btn-danger" id="todo_delete"   data-id="{{$todo->id}}">Delete</button>
                    </td>
                  </tr>
                @endforeach
            </tbody>
         </table>
       
    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="from-todo">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="model_title"> </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="number" class="form-control" name="id" value="" hidden>

                            <label for="name" class="form-label">Todo</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Todo....">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $('#add_todo').on('click',function(){
                $('#from-todo').trigger('reset');
                $('#model_title').html('Add Todo');
            });

            $('#submit').on('click',function(){

                 let name = $('#name').val();

                 $.ajax({
                    url:"/store/todo",
                    type:"POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                         name:name,
                    },
                    success:function(res){
                        console.log(res);
                    }
                 });

            })

            $(document).on("click", "#todo_delete" , function() {
                var id = $(this).data('id');
                $.ajax({
                    url:"/delete/todo/"+id,
                    type:"GET",
                    data:{
                        'id':id,
                    },
                    success:function(res){
                        console.log(res);
                        window.location='/'

                    }
                })

            })
        </script>
    </body>
</html>
