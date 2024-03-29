@csrf
<div class="form-group">
@error('name')<div class="alert alert-danger">{{ $message }}</div> @enderror
<label for="exampleInputName1">Name</label>
<input type="text" class="form-control" value="{{ old('name',$data->name ?? '') }}" id="exampleInputName1" placeholder="Name" name="name">
</div>
<div class="form-group">
@error('price')<div class="alert alert-danger">{{ $message }}</div> @enderror
<label for="exampleInputEmail3">Price</label>
<input type="text" class="form-control" value="{{ old('price',$data->price??'') }}" id="exampleInputEmail3" placeholder="Price" name="price">
</div>
<div class="form-group">
@error('sale')<div class="alert alert-danger">{{ $message }}</div> @enderror
<label for="exampleInputPassword4">sale</label>
<input type="text" class="form-control" value="{{ old('sale',$data->sale??'') }}" id="exampleInputPassword4" name="sale" placeholder="sale">
</div>
<div class="form-group">
@error('quntity')<div class="alert alert-danger">{{ $message }}</div> @enderror
<label for="exampleInputPassword4">Quntity </label>
<input type="text" class="form-control" value="{{ old('quntity',$data->quntity??'') }}" id="exampleInputPassword4" name="quntity" placeholder="Quntity">
</div>

<div class="form-group">
<label>File upload</label>
@error('img')<div class="alert alert-danger">{{ $message }}</div> @enderror
@error('img.*')<div class="alert alert-danger">{{ $message }}</div> @enderror
<input type="file" multiple name="img[]" class="file-upload-default">
<div class="input-group col-xs-12">
    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
    <span class="input-group-append">
    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
    </span>
</div>
</div>


<div class="form-group">
@error('cteogry')<div class="alert alert-danger">{{ $message }}</div> @enderror
<label for="exampleSelectGender">Cteogry</label>
<select name="cteogry" class="form-control" id="exampleSelectGender">
@forelse (config('cateogry')["cateogry"] as $val)

<option value="{{ $val }}" @selected(old('cteogry',$data->cteogry ??"")==$val) > {{ $val }}</option>
@empty

@endforelse

</select>
</div>
<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<button class="btn btn-light">Cancel</button>
</form>
</div>
</div>
</div>
