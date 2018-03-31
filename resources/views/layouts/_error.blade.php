<?php
	(Session::has('errorMessage')) ? $errorMessage = Session::get('errorMessage') : false
?>

@if(isset($errorMessage) && !empty($errorMessage))
    <div class="row">
        <div class="col-md-12">
            <div class='alert alert-danger text-center error-message'>
                {{$errorMessage}}
            </div>
        </div>
    </div>
@endif
