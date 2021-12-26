<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Multi Images
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <!-- All Categories -->
          <div class="row">
            <!-- col 8 -->
            <div class="col-md-8">
              <!-- display something here -->
              <div class="card-group">
                    @foreach($images as $multi)
                    <div class="col-md-4 mt-5">
                        <div class="card">
                            <img src="{{ asset($multi->image) }}" alt="image{{ $multi->id }}">
                        </div>
                    </div>
                    @endforeach
              </div>
            </div>

            <!-- col-4 -->
            <div class="col-md-4">
                <div class="card">

                    <div class="card-header">Multi Images</div>
                    <div class="card-body">
                        <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data" >
                            @csrf

                            <!-- form -->
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Image</label>
                                @error('image')
                                <span class="text-danger">- {{$message}}</span>
                                @enderror
                                <input type="file" name="image[]" class="form-control mb-4" id="exampleInputEmail1" aria-describedby="emailHelp" multiple="" >
                            </div>
                            <button type="submit" class="btn btn-primary">Add Image</button>
                        </form>
                    </div>
                </div>
            </div>
          </div>
          <!-- end col-4 -->
      </div>
    </div>
</x-app-layout>
