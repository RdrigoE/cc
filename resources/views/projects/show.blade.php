<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Project: {{ $project->name }}</h1>
            </div>
        </div>


        <section>

            <div class="row">
                <div class="col-12">
                    <h2>Create Client</h2>
                </div>
            </div>
            <form role="group" action="{{ route('projects.clients.store', $project->id) }}" method="post">
                @csrf
                @method('POST')
                <fieldset class="grid">
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                        value="{{ old('name') }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <input type="text" name="phone_number" class="form-control" id="phone_number"
                        placeholder="Phone Number" value="{{ old('phone_number') }}">
                    @error('phone_number')
                        <small id="email-helper">
                            {{ $message }}
                        </small>
                    @enderror
                    <input type="submit" value="Create Client" />
                </fieldset>
            </form>
        </section>

        <div class="row">
            <div class="col-12">
                <h2>Clients</h2>
                @if (intval($project->clients()->count()) === 0)
                    <p>No clients assigned to this project</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project->clients as $client)
                                <tr>
                                    <td>
                                        <a href="{{ route('projects.clients.show', ['project' => $project, 'client' => $client]) }}"
                                            role="button" class="btn btn-info">{{ $client->name }}</a>
                                    </td>

                                    <td>{{ $client->phone_number }}</td>
                                    <td style="display: flex; justify-content: start; align-items: center;">
                                        <a role="button"  href="{{ route('projects.clients.edit', ['project' => $project, 'client' => $client]) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form
                                            action="{{ route('projects.clients.destroy', ['project' => $project, 'client' => $client]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
