<form action="{{route('admin.item.store')}}" method="post" id="item-formx" enctype="multipart/form-data">
    <div class="row">
        @csrf
        <div class="form-group col-md-4">
            <label for="name">Category Name</label>
            <select name="category" id="Category" class="form-control required_elem">
                <option value="">Select</option>
                @if ($categories??'')
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                @endif
            </select>                               
            @error('category')
                <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror		
        </div>
        <div class="form-group col-md-4">
            <label for="name">Subcategory Name</label>
            <select name="subcategory" id="Subcategory" class="form-control required_elem input-sm">
                <option value="">Select</option>                
            </select>                               
            @error('subcategory')
                <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror		
        </div>
        <div class="form-group col-md-4">
            <label for="name">Product Name</label>
            <select name="product" id="Product" class="form-control input-sm">
                <option value="">Select</option>                
            </select>                                 
            @error('product')
                <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror		
        </div>
        {{-- <div class="form-group col-md-3">
            <label for="name">Product Name</label>
            <select name="number_of_items" id="Number_of_items" class="form-control input-sm">
                @for ($i = 1; $i <= $count = 20; $i++)
                    <option value="{{$i}}">{{$i}}</option>               
                @endfor
            </select>                                 
            @error('number_of_items')
                <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror		
        </div>           --}}
    </div>
    <div class="row" id="number_of_item_row">
        <div class="col-md-6">   
            <div class="form-group"><label for="name">Item Name</label><input class="form-control" name="name"></div>
            <div class="row">
              <div class="form-group col-md-6"><label for="price">Item Price</label><input class="form-control" name="price"></div>
              <div class="form-group col-md-6"><label for="qty">Item Quantity</label><input class="form-control" name="qty"></div>
            </div>
            <div class="form-group"><label for="description">Item Description</label><textarea class="form-control" name="description" placeholder="Describe this item here"></textarea></div>
        </div>
        <div class="col-md-6">
            <div class="row">
                @include('admin.assets.inc.forms.imageUploadBox')
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" id="ItemBtn" >
            <span class="__f_loader svg__white"></span>
            <span class="__f_text"><i class="fas fa-smile fa-sm"></i> Submit</span>
        </button>
    </div>
</form>