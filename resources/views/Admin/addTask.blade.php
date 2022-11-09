<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<h1>Add Task</h1>


<div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Add Task Here</h4>


        <form action="addTask" method="post">
            @csrf
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
             </div>
            <input name="tname" class="form-control" placeholder="Name" type="text">
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
             </div>
            <input name="start" class="form-control"  type="datetime-local">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
             </div>
            <input name="end" class="form-control"  type="datetime-local">
        </div>

       <!-- form-group// -->
        <div class="form-group input-group">
            Assign To :-
            <select class="form-select form-select-lg mb-3" name="assign" id="">
                @foreach ($data as $i)
                   <option value="{{$i->id}}">{{$i->name}}</option>
                @endforeach
               </select>
        </div> <!-- form-group// -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Add task  </button>
        </div> <!-- form-group// -->
    </form>
    </article>
    </div> <!-- card.// -->

    </div>
