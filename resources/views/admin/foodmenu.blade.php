@include("admin.adminheader")
  
<div class="row">
<div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Fooditem</h4>
                    <p class="card-description"> Add new fooditem here... </p>
                    <form class="forms-sample" action="{{url('/addfood')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <label for="Cat">Category</label>
                        <select class="form-control" id="cat" name="cat">
                          @foreach($cats as $cat)
                            <option value="{{$cat->id}}" >{{$cat->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name">
                      </div>
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" placeholder="price">
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" placeholder="description">
                      </div>
                      <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" class="form-control" name="image" required>
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Add</button>
                      <button type="reset" class="btn btn-dark">Clear</button>
                    </form>
                  </div>
                </div>
              </div>
<div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                  <div class="card-body">
                      <a class="btn btn-primary card-title" onClick="openCat()">Change Categories</a>

                      <div class="table-responsive" id="catList" style="display:none">
                      <table class="table" >
                      <thead>
                        <tr> 
                           <form class="forms-sample" action="{{url('/addcat')}}" method="post" enctype="multipart/form-data">
                              @csrf

                              <th><input type="text" class="form-control" name="name" placeholder="Add new..."></th>
                              <th><button type="submit" class="btn btn-primary me-2" style="margin: 0 0 6px 12px">+</button></th>

                            </form>
                          </tr>
                          </thead>
                          <tbody>
                          <ol>
                        @foreach($cats as $cat)

                          <tr id="{{$cat->id.$cat->name}}" style="display: revert">
                            <td>
                              <li class="pl-2">{{$cat->name}}</li>
                            </td>
                            <td>
                              <a class="btn btn-primary" onClick="editCat('{{$cat->id.$cat->name}}')">Edit</a>
                            </td>
                          </tr>

                          <tr id="{{$cat->id.$cat->name.'edit'}}" style="display: none"> 
                          <form action='/savecat/{{$cat->id}}' method='post'>
                            @csrf 
                          <div class="form-group">
                          <td>
                            <input type='text' value='{{$cat->name}}' name='name' class='form-control'></input>
                          </td>
                          <td>
                            <button type='submit' class='btn btn-warning'>Save</button> 
                          </td> 
                          </div>
                          </form>
                          </tr>

                        @endforeach  
                        </ol>
                        </tbody>
                      </table>
                      </div>

                  </div>
                  </div>
                  </div>
</div>  


<div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Current Foods</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Food Name </th>
                            <th> Price </th>
                            <th> Description </th>
                            <th> Edit </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($foods as $food)
                          <tr>
                            <td>
                              <img src="/foodimage/{{$food->image}}" alt="image">
                              <span class="pl-2">{{$food->name}}</span>
                            </td>
                            <td> {{$food->price}} </td>
                            <td> {{$food->description}} </td>
                            <td>
                              <a class="btn btn-primary" href="/editfood/{{$food->id}}">Edit</a>
                            </td>
                            <td>
                              <?php
                              if($food->status == True){ ?>
                              <a class="btn btn-danger" href="/disablefood/{{$food->id}}">Disable</a>
                              <?php }else{ ?>
                              <a class="btn btn-success" href="/enablefood/{{$food->id}}">Enable</a>
                              <?php } ?>
                            </td>
                          </tr>
                        @endforeach  
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<script type="text/javascript">
  function openCat(){
    var element = document.getElementById("catList").style.display;

    if(element == "none"){
      document.getElementById("catList").style.display = "inline";
    }else{
      document.getElementById("catList").style.display = "none";
    }
  }

  function editCat(element){
    element2 = element+"edit"; 
    document.getElementById(element).style.display = "none";
    document.getElementById(element2).style.display = "revert";
  }

</script>

@include("admin.adminfooter")