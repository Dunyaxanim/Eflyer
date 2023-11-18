@extends("admin.layout.app")
@section('_content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Table</h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.categorycreate') }}"> Create new</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="">
      <div class="">
        <div class="col-12">
          <div class="card">
            <div class="d-flex align-items-center justify-content-between px-5 pt-3">
              <h3 class="card-title mr-auto">Blog data</h3>
               <button type="button" class="btn btn-warning p-2 mr-2" data-toggle="modal" data-target="#exampleModal">
                 Delete Selected 
              </button>
              <button type="button" class="btn btn-danger p-2" data-toggle="modal" data-target="#exampleModal">
                 Delete All 
              </button>
              <!-- Button trigger modal -->
            </div>
            <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete all blogs?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        If you implement this process, all your blogs will be deleted.
                      </div>
                      <div class="modal-footer">
                         <form action="{{ route('admin.categorydestroyAll') }}" method="post">
                          @method('delete')
                          @csrf
                            <a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger">Save changes</button>
                         </form>
                      </div>
                    </div>
                  </div>
                </div>
            @if (\Session::has('message'))
              <div class="alert alert-success deleted-message fade-out">
                  <ul class="list-unstyled">
                      <li>{!! \Session::get('message') !!}</li>
                  </ul>
              </div>
            @endif
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($model as $key => $data)
                    <tr>
                      <td>{{$data->name}}</td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="{{ route('admin.categoryshow', $data) }}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                           <form class="delete-form" action="{{ route('admin.deleteitem', $data) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</button>
                            </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-center">
              {{-- {{ $blogs->links() }} --}}
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection
  @section("_scripts")
  <script>
    const message = document.querySelector('.deleted-message')
    if(message){
      setTimeout(() => {
        message.classList.add("fade");
      }, 2000);
    }
  </script>
    <script>
      const blogs = document.querySelectorAll('.selected-blog')
      console.log(blogs);
      blogs.forEach(blog => {
        blog.addEventListener('click', function() {
        if (blog.checked) {
          console.log('Checkbox işaretlendi');
        }
      });
      });
  </script>
  @endsection