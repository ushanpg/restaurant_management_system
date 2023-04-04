<?php $title= "Reservations"  ?>
@include("admin.adminheader")
<div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Current Reservations</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Phone </th>
                            <th> No. Of Guests </th>
                            <th> Date </th>
                            <th> Time </th>
                            <th> Message </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($reservations as $reservation)
                          <tr>
                            <td> {{$reservation->name}} </td>
                            <td> {{$reservation->email}} </td>
                            <td> {{$reservation->phone}} </td>
                            <td> {{$reservation->numberGuests}} </td>
                            <td> {{$reservation->date}} </td>
                            <td> {{$reservation->time}} </td>
                            <td> {{$reservation->message}} </td>                              
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