 @extends("admin.layout.app")
 @section("_content")
 <?php  $routeName='admin.product' ?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Form</h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="{{ route($routeName.'list') }}">All Categories</a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content-header">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create</h3>
              </div>
              <form role="form" action="{{ route($routeName.'create') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($model))
                  @method('put')
                @endif
                <div class="row">
                  <div class="col-12">
                    <div class="card-body">
                      <label>Name</label>
                      @foreach(config('translatable.locales') as $lang)
                                    <div class="tab-pane fade active show" id="tab-{{$lang}}"
                                        role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                        <div class="form-group">
                                            <label>{{ $lang }} </label>
                                            <input type="text" placeholder="Product name" name="{{$lang}}[name]" class="form-control"                                            
                                            value="{{old($lang.'name', isset($model) ? ($model->translateOrDefault($lang)->name ?? '') : ''  ) }}">
                                            @error("$lang.name")
                                              <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card-body">
                      <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" placeholder="Product name" name="price" class="form-control">
                                            @error("price")
                                              <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                                            <label>Img</label>
                                            <input type="file" placeholder="Product name" name="img" class="form-control">
                                            @error("img")
                                              <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                      {{-- value="{{old($lang.'name', isset($model) ? ($model->translateOrDefault($lang)->name ?? '') : ''  ) }}" --}}
                        <label>Categories</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                            @foreach ($categories as $key=>$data )
                              {{-- <option value="{{$data->id}}">{{$data->name}}</option> --}}
                              <option value="{{$data->id}}" {{ isset($model) ? ($data->id==$model->category->id ? 'selected' : '') : '' }}>{{$data->name}}</option>
                              {{-- value="{{old($lang.'name', isset($model) ? ($model->translateOrDefault($lang)->name ?? '') : ''  ) }}" --}}
                              @endforeach
                        </select>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            @if (\Session::has('message'))
              <div class="alert alert-success message fade-out">
                  <ul class="list-unstyled">
                      <li>{!! \Session::get('message') !!}</li>
                  </ul>
              </div>
            @endif
          </div>
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

