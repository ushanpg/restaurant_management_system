<base href="/public">
@include("admin.adminheader")

<div class="row">
<div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Fooditem</h4>
                    <p class="card-description"> Change the fooditem below. </p>
                    <form class="forms-sample" action="{{url('/savefood',$food->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="Cat">Category</label>
                        <select class="form-control" id="cat" name="cat">
                          @foreach($cats as $cat)
                            <option value="{{$cat->id}}" <?php if($food->category == $cat->id){echo("Selected");} ?> >{{$cat->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$food->name}}">
                      </div>
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" value="{{$food->price}}">
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="textarea" class="form-control" name="description" value="{{$food->description}}">
                      </div>
                      <div class="form-group">
                        <label for="currentimage">Current image</label>
                        <img src="/foodimage/{{$food->image}}" style="border-radius:50px; width:250px">
                      </div>
                      <div class="form-group">
                        <label for="image">New image</label>
                        <input type="file" class="form-control" name="image" >
                      </div>
                      <button type="submit" class="btn btn-warning">Save</button>
                      <button type="button" class="btn btn-dark" onClick="history.back()">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
</div>  
@include("admin.adminfooter")