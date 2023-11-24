<x-app-layout>

    <form action="{{ route('projects.update', $project->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Edit Project</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                        value="{{ $project->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </form>

</x-app-layout>
