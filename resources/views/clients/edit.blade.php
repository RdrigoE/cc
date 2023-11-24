<x-app-layout>
    <form action="{{ route('projects.clients.update', ['project' => $project->id, 'client' => $client->id]) }}"
        method="post">
        @csrf
        @method('PATCH')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Update Client</h1>
                </div>
            </div>
            <div class="row">
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                        value="{{ $client->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" id="phone_number"
                        placeholder="Phone Number" value="{{ $client->phone_number }}">
                    @error('phone_number')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary">Update Client</button>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
