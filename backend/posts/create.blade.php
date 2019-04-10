@extends('layouts/backend')

@section('title', 'Create Post')
@section('styles')
<link rel="stylesheet" href="/image-crop/css/slim.min.css">
@stop
@section('mainContent')

<div class="row">
            <div class="col-md-8">
         
            <!-- START row-->
            
            <!-- START card-->
            <div class="card card-default">
               <div class="card-body">
                   <form class="form-horizontal" action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}            
                     <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label">Title</label>
                           <div class="col-md-10"><input class="form-control" name="title" type="text"><span class="form-text">A block of help text that breaks onto a new line and may extend beyond one line.</span></div>
                        </div>
                     </fieldset>
                     <fieldset class="">
                        <div class="form-group row"><label class="col-md-2 col-form-label">Category</label>
                           <div class="col-md-10"><select name="post_category_id" class="custom-select custom-select-sm">
                                 @foreach($postCategories as $postCategory)
                                 <option value="{{ $postCategory->id }}">{{ $postCategory->name }}</option>
                                 @endforeach
                                
                              </select></div>
                              </div>
                     </fieldset>
                      <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label">Post Body</label>
                           <div class="col-md-10">
                             <textarea type="textarea" class="form-control" rows="10" name="body"></textarea>
                           </div>
                        </div>
                     </fieldset>
                      <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label">Meta Description</label>
                           <div class="col-md-10">
                             <textarea type="textarea" class="form-control" rows="4" name="meta_description"></textarea>
                           </div>
                        </div>
                     </fieldset>
                      <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label">Tags input<br><span class="text-sm text-muted">Type and press Enter</span></label>
                           <div class="col-md-10"><input class="form-control" type="text" data-role="tagsinput" value="Amsterdam,Washington,Sydney,Beijing,Cairo"></div>
                        </div>
                     </fieldset>

               </div>
            </div><!-- END card-->
         </div>
         <div class="col-md-4">
         			<input type="file" name="featimage">

         			<div class="card card-default">
                     	<div class="card-header">Featured Image</div>
                     		<div class="card-body">

                     			<div class="slim" data-label="Drop profile photo here" data-size="200, 200" data-ratio="1:1" data-post="input,output" data-default-input-name="featimage" >
   
    <input type="file" name="featimage" id="featimage"  />
</div>
    					</div>

                  <!-- START card-->
                  <div class="card card-default">
                     <div class="card-header">Slug</div>
                     <div class="card-body">
                        <div class="input-group mb-3">
                                 <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">www.sixmedia.co.uk/</span></div><input class="form-control" name="slug" type="text" placeholder="slug" aria-label="Username" aria-describedby="basic-addon1">
                              </div>
                     </div>
                  </div><!-- END card-->
          
                  <!-- START card-->
                  <div class="card card-default">
                     <div class="card-header">Featured</div>
                     <div class="card-body">
                        <div class="col-md-12">
                       <fieldset>

                        <div class="form-group row">
                              <div class="checkbox c-checkbox"><label><input type="checkbox" value=""><span class="fa fa-check"></span> Option one</label></div>
                              <div class="checkbox c-checkbox"><label><input type="checkbox" checked="" value=""><span class="fa fa-check"></span> Home (Main)</label></div>
                               <div class="checkbox c-checkbox"><label><input type="checkbox" checked="" value=""><span class="fa fa-check"></span> Home (Sidebar)</label></div>
                               <div class="checkbox c-checkbox"><label><input type="checkbox" checked="" value=""><span class="fa fa-check"></span> Articles(Sidebar)</label></div>
                                <div class="checkbox c-checkbox"><label><input type="checkbox" checked="" value=""><span class="fa fa-check"></span> Everywhere</label></div>                              
                        </div>
                     </fieldset>

                     </div>
                  </div>
                  </div><!-- END card-->
                    <button class="btn btn-primary btn-block" name="submit">Save</button>
                     <button class="btn btn-danger btn-block" name="submit">Cancel</button>

                  </form>
         </div>
      </div>

			

@stop
@section('scripts')
<script src="/image-crop/js/slim.kickstart.min.js"></script>
<script type="text/javascript">
	var file = $('#featimage').attr("files")[0]
</script>
<script type="text/javascript">
	
</script>
@stop