<?php $title= "Orders"  ?>
@include("admin.adminheader")
<div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <h4 class="card-title" style="flex-grow:1">Online Orders</h4>
                      <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="/searchorders" method="post"> 
                       @csrf               
                        <input type="text" name="search" class="form-control" placeholder="Search Orders">
                        <button type="submit" class="btn"><i class="mdi mdi-magnify"></i></button>
                      </form>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Name </th>
                            <th> Address </th>
                            <th> Phone </th>
                            <th> Time </th>
                            <th> Food </th>
                            <th> Price </th>
                            <th> Quantity </th>
                            <th> Total price </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($orders as $order)
                          <tr>
                            <td> {{$order->name}} </td>
                            <td> {{$order->address}} </td>
                            <td> {{$order->phone}} </td>
                            <td> {{$order->created_at}} </td>
                            <td> {{$order->food}} </td>
                            <td> {{$order->price}} </td>
                            <td> {{$order->quantity}} </td>
                            <td> {{$order->price * $order->quantity}} </td>                              
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