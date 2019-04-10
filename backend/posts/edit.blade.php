@extends('layouts/backend')

@section('title', 'Edit Post')
@section('stylesheets')
{!!Html::style ('css/select2.min.css') !!}

@stop
@section('mainContent')

	<div class="row">
		<div class="col-md-8">
		<!-- update form ([] = array) -->
		 <form action="{{ route('posts.update',$post->id) }}"
                                  method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('put')}}
			 <div class="card card-default">
               <div class="card-body">
                   
                     <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label">Title</label>
                           <div class="col-md-10"><input class="form-control" name="title" type="text" value="{{$post->title}}"><span class="form-text">A block of help text that breaks onto a new line and may extend beyond one line.</span></div>
                        </div>
                     </fieldset>
                     <fieldset class="">
                        <div class="form-group row"><label class="col-md-2 col-form-label">Category</label>
                           <div class="col-md-10">
                           	</div>
                              </div>
                     </fieldset>
                      <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label">Post Body</label>
                           <div class="col-md-10">
                             <textarea type="textarea" class="form-control p-body" rows="10" name="body" style="" value="{{$post->body}}"></textarea>
                        </div>
                     </fieldset>
                      <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label">Meta Description</label>
                           <div class="col-md-10">
                            <textarea type="textarea" class="form-control" rows="4" name="meta_description" value="{{$post->meta_description}}"></textarea>
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
						<p>img</p>
         	<input type="file" name="featimage">

         			<div class="card card-default">
                     	<div class="card-header">Featured Image</div>
                     		<div class="card-body">

                     			<fieldset class="form-group">
						        <label for="featimage">Upload Image</label>
						        <input type="file" class="form-control slim" data-ratio="4:3" name="featimage">
						    	</fieldset>
    					</div>

                  <!-- START card-->
                  <div class="card card-default">
                     <div class="card-header">Slug</div>
                     <div class="card-body">
                        <div class="input-group mb-3">
                                 <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">www.sixmedia.co.uk/</span></div><input class="form-control" name="slug" type="text" value="{{$post->slug}}" aria-label="Username" aria-describedby="basic-addon1">
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

         </div>
	</div> 
</form>
	

@stop
@section('scripts')
{!!Html::script ('js/select2.min.js') !!}
<script type="text/javascript">$( '.select2-multi').select2(); </script>
@stop