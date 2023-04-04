@include("admin.adminheader")
<script>
    window.onload = function(){
    document.getElementById("navToggle").click();
    }
</script>
<div class="row d-flex justify-content-center">
    @foreach($data[0]['modules'] as $module)
              <div class="col-md-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                  <a href="/{{Illuminate\Support\Str::lower($module->module_name)}}">
                    <div class="d-flex flex-row p-3">
                      <div class="align-self-top">
                        <p class="card-title mb-1 font-weight-bold">{{$module->module_name}}</p>

                      </div>
                      <div class="align-self-center flex-grow text-end">
                        <i class="icon-lg mdi {{$module->module_img}} text-primary"></i>
                      </div>
                    </div>
                    <div>
                  </a>
                  </div>
                  </div>                  
                </div>
              </div>
    @endforeach
</div>
@include("admin.adminfooter")


        