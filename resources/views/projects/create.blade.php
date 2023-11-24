{{-- create the project --}}

<section>

    <form action="{{route('projects.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Create Project</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                        value="{{old('name')}}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary">Create Project</button>
                </div>
            </div>
        </div>
    </form>

</section>