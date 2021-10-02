<div class="container_input_and_file_flex" id="container_input_and_file_flex_cv">

    <div class="container_file" id="container_file_cv">
        <a href="/forseadesa/readUserDocument/user_{{ $prospect->id }}/{{  $cv->path }}" target="_blank" rel="noopener noreferrer"> 
            <i class="far fa-file-pdf icon_pdf"></i> 
        </a>
    </div>
    <div>
        <input id="cv" class="custom_file" type="file" name="cv" 
            placeholder="{!! ucfirst(Lang::get('lang.cv')) !!}">
        <span class="text-danger validator_error cv_error" role="alert"></span>
    </div>


    @if($prospect->applications->first()->applicationStatus->slug == 'infos')
	@if ($cv != null)
		<div class="form-group">
			<label for="cv"> {!! ucfirst(Lang::get('lang.cv')) !!} </label> <br />
			<div class="container_input_and_file_flex" id="container_input_and_file_flex_cv">

				<div class="container_file" id="container_file_cv">
					<a href="/forseadesa/readUserDocument/user_{{ $prospect->id }}/{{  $cv->path }}" target="_blank" rel="noopener noreferrer"> 
						<i class="far fa-file-pdf icon_pdf"></i> 
					</a>
				</div>
				<div>
					<input id="cv" class="custom_file" type="file" name="cv" 
						placeholder="{!! ucfirst(Lang::get('lang.cv')) !!}">
					<span class="text-danger validator_error cv_error" role="alert"></span>
				</div>

			</div>
		</div>
	@else
        <label for="cv"> {!! ucfirst(Lang::get('lang.cv')) !!} </label> <br />
        <div class="container_input_and_file_flex" id="container_input_and_file_flex_cv">
            <div class="container_file" id="container_file_cv">
            </div>
            <div>
                <input id="cv" class="custom_file" type="file" name="cv" 
                    placeholder="{!! ucfirst(Lang::get('lang.cv')) !!}">
                <span class="text-danger validator_error cv_error" role="alert"></span>
            </div>

        </div>
    @endif
								
	@elseif($cv != null)
		<div class="form-group">
			<label for="cv"> {!! ucfirst(Lang::get('lang.cv')) !!} </label> <br />
			<div class="container_input_and_file_flex" id="container_input_and_file_flex_cv">

				<div class="container_file" id="container_file_cv">
					<a href="/forseadesa/readUserDocument/user_{{ $prospect->id }}/{{  $cv->path }}" target="_blank" rel="noopener noreferrer"> 
						<i class="far fa-file-pdf icon_pdf"></i> 
					</a>
				</div>
				<div>
					<input id="cv" class="custom_file" type="file" name="cv" 
						placeholder="{!! ucfirst(Lang::get('lang.cv')) !!}">
					<span class="text-danger validator_error cv_error" role="alert"></span>
				</div
                >
			</div>
		</div>
	@endif
						

</div>