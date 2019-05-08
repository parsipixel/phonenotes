<form method="post" action="{{ $action }}">
    @method($method)
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control invalid {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name"
               placeholder="Name" value="{{ old('name') ? old('name') : (isset($phoneNote) ? $phoneNote->name : '') }}">
    </div>
    <div class="form-group">
        <label for="phone-number">Phone Number</label>
        <input type="text" class="form-control {{ $errors->has('phone-number') ? 'is-invalid' : '' }}" id="phone-number" name="phone-number"
               placeholder="Phone Number"
               value="{{ old('phone-number') ? old('phone-number') : (isset($phoneNote) ? $phoneNote->phone_number : '') }}">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="number" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description"
                  name="description" placeholder="Description">{{ old('description') ? old('description') : (isset($phoneNote) ? $phoneNote->description : '') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
