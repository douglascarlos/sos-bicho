
<?php
	(Session::has('successMessage')) ? $successMessage = Session::get('successMessage') : false
?>

@if( !empty($successMessage) )
    <div class="row">
        <div class="col-md-12">
            <div class='alert alert-success text-center' id="success_message">
                {{$successMessage}} 
            </div>
        </div>
    </div>
@endif
