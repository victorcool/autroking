@for ($i = 1; $i <= $count=4; $i++)
	<div class="wrap-custom-file col-md-4 col-xs-6">
		<input type="file" name="images[]" id="images{{$i}}"/>
		<label  for="images{{$i}}">
			<span>Image {{$i}}</span>
			<i class="icon-plus"></i>
		</label>
	</div>	
@endfor    
<!-- End Page Wrap -->

{{-- <div class="wrap-custom-file col-md-3 col-xs-6">
	<input type="file" name="images[]" id="images1" accept=".gif, .jpg, .png" />
	<label  for="images1">
		<span>Image 1</span>
		<i class="icon-plus"></i>
	</label>
</div>
<div class="wrap-custom-file col-md-3 col-xs-6">
	<input type="file" name="images[]" id="images2" accept=".gif, .jpg, .png" />
	<label  for="images2">
		<span>Image 2</span>
		<i class="icon-plus"></i>
	</label>
</div>
<div class="wrap-custom-file col-md-3 col-xs-6">
	<input type="file" name="images[]" id="images3" accept=".gif, .jpg, .png" />
	<label  for="images3">
		<span>Image 3</span>
		<i class="icon-plus"></i>
	</label>
</div>
<div class="wrap-custom-file col-md-3 col-xs-6">
	<input type="file" name="images[]" id="images4" accept=".gif, .jpg, .png" />
	<label  for="images4">
		<span>Image 4</span>
		<i class="icon-plus"></i>
	</label>
</div> --}}