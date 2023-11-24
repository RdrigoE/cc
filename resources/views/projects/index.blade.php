<x-app-layout>
    {{-- this is supose to showcase the project and link to them --}}
    {{-- create this page --}}

    <div class="container">
        <h1>Projects</h1>

        <h4>Create Project</h4>
        <form action="{{ route('projects.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                            value="{{ old('name') }}">
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

        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">
                                    <a role="button" href="{{ route('projects.show', $project->id) }}"
                                        class="btn btn-info">{{ $project->name }}</a>
                                </th>
                                <td style="display: flex; justify-content: start; align-items: center; gap: 10px"
                                    scope="row">
                                    <a role="button" href="{{ route('projects.edit', $project->id) }}"
                                        class="btn btn-warning">Edit</a>
                                    {{-- <div hx-post="{{ route('projects.destroy', $project->id) }}" role="button"
                                        >Delete
                                    </div> --}}
                                    <div>
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button>Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $projects->links() }}
            </div>
        </div>
    </div>


</x-app-layout>
