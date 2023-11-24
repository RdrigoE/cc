<x-app-layout>
    <form
        action="{{ route('projects.clients.items.update', [
            'project' => $project->id,
            'client' => $client->id,
            'item' => $item->id,
        ]) }}"
        method="post">
        @csrf
        @method('PATCH')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Edit Item</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                        value="{{ $item->name }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Quantity"
                        value="{{ $item->quantity }}">
                    @error('quantity')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <label for="unit_price" class="form-label">Unit Price</label>
                    <input type="number" name="unit_price" class="form-control" id="unit_price"
                        placeholder="Unit Price" value="{{ $item->unit_price }}">
                    @error('unit_price')
                        <small class="text-danger">{{ $message }}</small>
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
