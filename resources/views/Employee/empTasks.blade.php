<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout">Logout</a>
          </li>

        </ul>

      </div>
    </div>
  </nav><br><br>
<h1>Tasks Assigned To You</h1>





<table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Start Time</th>
        <th scope="col">End Time</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>


      </tr>
    </thead>
    <tbody>
        @foreach ($task as $i)

        @if ($eid == $i->emp_id)

        <tr>
                <td>{{$i->task_name}}</td>
                <td>{{$i->start_time}}</td>
                <td>{{$i->end_time}}</td>
                <td>
                    @if ($i->status == 1)
                        Assigned
                    @elseif ($i->status == 2)
                        Ongoing
                    @else
                        Completed
                    @endif
                </td>
                <td>
                    <button><a href="update/{{$i->id}}">Update Status</a></button>
                </td>
                @endif
            @endforeach
        </tr>
    </tbody>
  </table>
