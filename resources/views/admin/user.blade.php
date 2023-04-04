
@include("admin.adminheader")

<div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">System Users</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Username </th>
                            <th> Email </th>
                            <th> Role </th>
                            <th> Edit </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)

                          <tr>                            
                            <td>
                            
                              <img src="/images/{{$user->profile_photo_path}}" alt="image" />
                              <span class="pl-2">{{$user->name}}</span>

                            </td>
                            <td> {{$user->email}} </td>
                            <td> {{$user->role}} </td>
                            <td> <a class="btn btn-primary" href="{{url('/edituser',$user->id)}}">Edit</a> </td>
                              
                            <td> <?php
                             if($user->status == 1){ ?>
                              <a class="btn btn-danger" href="{{url('/deactivate',$user->id)}}">Deactivate</a>
                              <?php }else{ ?>
                                <a class="btn btn-success" href="{{url('/activate',$user->id)}}">Activate</a>
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

@include("admin.adminfooter")