 @extends("admin.layout.app")
 @section("_content")
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category Create Form</h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Dashboard</a></li> --}}
              {{-- <li class="breadcrumb-item active"><a href="{{ route('admin.blogList') }}">All Blogs</a></li> --}}
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Category</h3>
              </div>
              <form role="form" action="{{ route('admin.categoryupdate', $model) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <label>Category name</label>
                  @foreach(config('translatable.locales') as $lang)
                                <div class="tab-pane fade active show" id="tab-{{$lang}}"
                                     role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="form-group">
                                        <label>{{ $lang }} </label>
                                        <input type="text" placeholder="Category name" name="{{$lang}}[name]" class="form-control" value="{{ $model->translateOrDefault($lang)->name }}">
                                        @error("$lang.name")
                                           <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                    @endforeach
                  <div class="form-group">
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
            </div>
          </div>
           @if (\Session::has('message'))
              <div class="alert alert-success message fade-out">
                  <ul class="list-unstyled">
                      <li>{!! \Session::get('message') !!}</li>
                  </ul>
              </div>
            @endif
    </section>
 @endsection

  @section("_scripts")
  <script>
    const message = document.querySelector('.message')
    if(message){
      setTimeout(() => {
        message.classList.add("fade");
      }, 2000);
    }
  </script>
  @endsection

