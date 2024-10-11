<div class="row">

    <div class="col-md-4">
        <strong>Image</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <input type="file" class="form-control" name="image" style="height: auto;"></input>
            <p class="image-error error-messages">{{ __('admin/estimates/edit.select_image_file') }}</p>
        </div>
    </div>
    <ul class="list-unstyled mt-2 mb-2 space-y-2" id="fileList">
    @if (isset($job->image))
        <li class="list-unstyled">
            <img src="{{ url($job->image) }}" alt="" class="img-thumbnail">

        </li>
        <br>
        <br>
    @endif
</ul>

</div>
