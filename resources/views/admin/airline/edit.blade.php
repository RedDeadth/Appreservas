<form action="{{ route('admin.airline.update', $airline->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nombre de la Aerolínea:</label>
        <input type="text" name="name" id="name" value="{{ $airline->name }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
