<base href="/public">
@include("admin.adminheader")

<div class="row flex-d justify-content-center">
<div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit user details:</h4>
                    <p class="card-description"></p>
                    <form class="forms-sample" action="{{url('/saveuser',$user2[0]->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" value="{{$user2[0]->name}}" required>
                      </div>
                      <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" name="email" value="{{$user2[0]->email}}" required>
                      </div>
                      <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input type="text" class="form-control" name="firstname" value="{{$user2[0]->first_name}}">
                      </div>
                      <div class="form-group">
                        <label for="email">Lastname</label>
                        <input type="text" class="form-control" name="lastname" value="{{$user2[0]->last_name}}">
                      </div>
                      <div class="form-group">
                        <label for="nic">NIC</label>
                        <input type="text" class="form-control" name="nic" value="{{$user2[0]->nic}}">
                      </div>
                      <div class="form-group">
                        <label for="dob">Date of birth</label>
                        <input type="date" class="form-control" name="dob" value="{{$user2[0]->dob}}">
                      </div>
                      <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="0" <?php if($user2[0]->gender == 0) {echo("selected");}?> >Male</option>
                            <option value="1" <?php if($user2[0]->gender == 1) {echo("selected");}?> >Female</option>
                            <option value="2" <?php if($user2[0]->gender == 2) {echo("selected");}?> >Other</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role">
                            @foreach($roles as $role)
                            <option value="{{$role->id}}"
                            <?php
                            if($role->id == $user2[0]->role){
                                echo("selected");
                            }
                            ?>
                            >{{$role->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tel">Tel</label>
                        <input type="number" class="form-control" name="tel1" value="{{$user2[0]->tel1}}">
                      </div>
                      <div class="form-group">
                        <label for="tel2">Mobile</label>
                        <input type="number" class="form-control" name="tel2" value="{{$user2[0]->tel2}}">
                      </div>
                      <div class="form-group">
                        <label for="currentimage">Current image</label>
                        <img src="/images/{{$user2[0]->profile_photo_path}}" style="border-radius:50px; width:250px">
                      </div>
                      <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" class="form-control" name="image" accept=".png,.jpeg,.jpg" >
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Save</button>
                      <button type="button" class="btn btn-dark" onClick="history.back()">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
</div>  
@include("admin.adminfooter")

