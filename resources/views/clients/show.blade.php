<x-app-layout>

    <div class="container">
        <h2><a href="{{route('projects.show', $project->id)}}" > Project: {{ $project->name }}</a></h2>
        <h1>Client: {{ $client->name }} </h1>
        <h3>Total:
            {{ $client->items->sum(function ($item) {return $item->quantity * $item->unit_price;}) }}€</h3>


        <section id="create">

            <div class="row">
                <div class="col-12">
                    <h3>Insert Item</h3>
                </div>
            </div>
            <form action="{{ route('projects.clients.items.store', [$project->id, $client->id]) }}" method="post">
                @csrf
                @method('POST')
                <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Quantity"
                    value="{{ old('quantity') }}">
                @error('quantity')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="number" step="0.01"  name="unit_price" class="form-control" id="unit_price" placeholder="Unit Price"
                    value="{{ old('unit_price') }}">
                @error('unit_price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="hidden" name="client_id" value="{{ $client->id }}">
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <button class="btn btn-primary">Create Item</button>
            </form>

        </section>
        <div class="row">
            <div class="col-12">
                <h2>Items</h2>
                @if (intval($client->items()->count()) === 0)
                    <p>No items assigned to this client</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Subtotal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($client->items as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->unit_price }}€</td>
                                    <td>{{ $item->quantity * $item->unit_price }}€</td>
                                    <td style="display: flex; justify-content: start; align-items: center;">
                                        <a role="button" href="{{ route('projects.clients.items.edit', [$project->id, $client->id, $item->id]) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form
                                            action="{{ route('projects.clients.items.destroy', [$project->id, $client->id, $item->id]) }}"
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
