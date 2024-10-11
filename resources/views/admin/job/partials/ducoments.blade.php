<div class="row">

        <div class="col-md-4">
            <strong>Documents</strong>
        </div>
        <div class="col-md-8">
            <div class="form-group">
              <input type="file" class="form-control" name="document" style="height: auto;"></input>
              <p class="document-error error-messages">{{ __('admin/estimates/edit.select_document_file') }}</p>
            </div>
        </div>
        <ul class="list-unstyled mt-2 mb-2 space-y-2" id="fileList">
            @if (isset($job->document))
                <li class="list-unstyled">
                    <a href="{{ $job->document}}" class="text-success"
                        target="_blank">{{ basename($job->document) }}</a>

                </li>
                <br>
                <br>
            @endif
        </ul>
</div>
