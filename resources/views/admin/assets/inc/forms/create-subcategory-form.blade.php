<form action="javascript:void(0)" method="post" id="subcategory-form">
    <div class="row">
        @csrf
        <div class="form-group col-md-6">
            <label for="name">Category Name</label>
            <select name="category" id="" class="form-control required_elem">
                <option value="">Select</option>
                @if ($categories??'')
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                @endif
            </select>                               
            @error('name')
                <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror		
        </div>
        <div class="form-group col-md-6">
            <label for="name">sub Category Name</label>
            <input type="text" class="form-control required_elem" name="name" required placeholder="subcategory 1, subcategory 2">                               
            @error('name')
                <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror		
        </div>

        <div class="form-group col-md-12">
            <input type="file" name="images[]">
        </div>

        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary btn-block generalBtn" id="subcategoryBtn" disabled="disabled">
                <span class="__f_loader svg__white"></span>
                <span class="__f_text"><i class="fas fa-smile fa-sm"></i> Submit</span>
            </button>
        </div>
       
    </div>
</form>