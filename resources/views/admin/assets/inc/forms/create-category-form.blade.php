<form action="javascript:void(0)" method="post" id="category-form">
    <div class="row">
        @csrf
        <div class="form-group col-md-12">
            <label for="name">Category Name</label>
            <input type="text" class="form-control required_elem" name="name" required placeholder="category 1, category 2, category 3 (Multiple inputs)">                               
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
            <button type="submit" class="btn btn-primary btn-block" id="categoryBtn" disabled="disabled">
                <span class="__f_loader svg__white"></span>
                <span class="__f_text"><i class="fas fa-smile fa-sm"></i> Submit</span>
            </button>
        </div>
       
    </div>
</form>