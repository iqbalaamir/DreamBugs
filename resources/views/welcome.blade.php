<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    
    <title>Dashboard</title>
    <style>
    .sidebar {
  margin: 0;
  margin-top: 2px;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
.img{
    height: 100px;
    width: 100px;
    border-radius: 15px;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
    margin-top: 100px;
  margin-left: 20px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
.navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed; /* Set the navbar to fixed position */
  top: 0; /* Position the navbar at the top of the page */
  width: 100%; /* Full width */
}
    </style>
</head>
<body>
    <div>
        <div class="modal fade" id="DataModal" tabindex="-1" role="dialog" aria-labelledby="DataModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="DataModalLabel">Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('data.edit')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="data"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" id="submitbtn" class="btn btn-primary">Save changes</button>
                </div>
            </form>
              </div>
            </div>
          </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CRUD Operation</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    </div>
  </div>
</nav>
<div class="content"> 
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          Add Data
        </a>
      </p>
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <form action="{{route('data.save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlFile1">Profile Pic</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputName1">Full Name</label>
                    <input type="text" name="name" class="form-control" id="usernames" aria-describedby="emailHelp" placeholder="Enter Full Name">
                    <h5 id="usercheck" style="color: red;" >
                      **Username is missing
                    </h5>
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" required class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailvalid" class="form-text text-muted invalid-feedback" style="color: red;">
                    Your email must be a valid email
                  </small>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputAddress1">Address</label>
                  <textarea name="Address" id="" cols="10" rows="5" class="form-control"></textarea> 
                </div>
                <div class="form-group">
                    <label for="">Age Group</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Age" id="Age1" value="10-20">
                    <label class="form-check-label" for="Age1">10-20</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Age" id="Age2" value="20-30">
                    <label class="form-check-label" for="Age2">20-30</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Age" id="Age3" value="30-40">
                    <label class="form-check-label" for="Age3">30-40</label>
                </div>
                </div>
                <div class="form-group">
                <label for="">State</label>
                <select class="form-control form-control-sm" name="state">
                    <option disabled>Select a State</option>
                    <option value="Himachal">Himachal</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Andra Pradesh">Andra Pradesh</option>
                    <option value="Karnataka">Karnataka</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputDate1">Date of Birth</label>
                    <input type="Date" name="Date" class="form-control" id="exampleInpuDatel1">
                </div>

                <br>
                <button type="submit" id="submitbtn" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>      
<table class="table table-striped" id="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Profile Image</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">State</th>
            <th scope="col">Age</th>
            <th scope="col">DOB</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(count($data)>0)
        @php
            $i=0;
        @endphp
        @foreach($data as $user)
        <tr>
            <th scope="row">{{++$i}}</th>
            <th><img class="img-fluid img" src="{{ url('storage/'.$user->Pic)}}" alt="" ></th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->Address}}</td>
            <td>{{$user->state}}</td>
            <td>{{$user->Age}}</td>
            <td>{{$user->DOB}}</td>
            <td>
                <button class="btn btn-warning" onclick="edit({{$user->id}})" data-toggle="modal" data-target="#DataModal"><i class="fa fa-pen" style="color: #fff;"></i></button>
                <button class="btn btn-danger"  onclick="del({{$user->id}})"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </td>
        </tr>
        {{-- Delete Modal --}}
        @endforeach
        @endif
    </tbody>
</table>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{asset('validation.js')}}"></script>
<script>
    function edit(index){
        $.ajax({
            type: "POST",
            url: '{{route('data.fetch')}}',
            data: {
                "_token": "{{csrf_token()}}",
                "userId": index
            },
            success: function (response) {
                console.log(response);
                $('#data').html(response);
            },
    });
    }
    function del(index){
      $.ajax({
        type: "POST",
        url: '{{route('data.delete')}}',
        data:{
          "_token":"{{csrf_token()}}",
          "userId":index
        },
        success: function (response){
          console.log(response);
          alert('user is been deleted');
          location.reload();
        }
      });
    }
    $(document).ready(function () {
        $('#table').DataTable();
    });
</script>

    </body>
</html>
