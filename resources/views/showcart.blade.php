@include("header")
<div id="top">
<div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Ur Food Cart</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Food Name </th>
                            <th> Price </th>
                            <th> Quantity </th>
                            <th> Remove </th>
                            <th> Subtotal </th>
                          </tr>
                        </thead>
                        <tbody>
                        
                        
                        <?php $total = 0 ?>
                        @foreach($items as $item)    
                        <tr>
                            <td>
                              <img src="/foodimage/{{$item->image}}" style="border-radius:100%" width="50px" alt="fd-img">
                              <span class="pl-2">{{$item->food}}</span>
                            </td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->amount}}</td>
                            
                            <td>
                              <a class="btn btn-danger" href="/dropcart/{{$item->id}}">Remove</a>
                            </td>
                            <td>{{$subtotal = $item->price * $item->amount}}</td>
                          </tr>
                          
                        <?php $total = $total + $subtotal ?>
                        @endforeach
                        <tr> 
                            <td colspan="4" align="right"><h5>Total:</h5> </td>
                            <td><h5>{{$total}}/=</h5></td>
                         </tr>
                        
                        </tbody>
                      </table>
                    </div>
                    <div align="center"> <a class="btn btn-warning" id="btnOrder">Order Now!</a></div>
                    <div id="orderArea" align="center" style="display: none">
                    <form class="forms-sample" style="margin-top: 2rem; width:350px; text-align:center" action="http://localhost:8000/checkout" method="post" enctype="multipart/form-data">
                      @csrf
                      <h5>Let us know a bit about you...</h5>
                      <br/>
                      <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="Phone">Phone</label>
                        <input type="number" class="form-control"  name="phone" placeholder="Phone">
                      </div>
                      <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="textarea" class="form-control" name="address" placeholder="Address">
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Finish</button>
                      <button type="button" class="btn btn-dark" id="closeOrder">Cancel</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
<script>
    document.getElementById("btnOrder").addEventListener("click",
        () =>{
        document.getElementById("orderArea").style.display="inline";
        }
    );
    document.getElementById("closeOrder").addEventListener("click",
        () =>{
        document.getElementById("orderArea").style.display="none";
        }
    );
</script>
@include("footer")