<div class="col-12 col-md-10 offset-md-1 vignette" id="courseBlock">
    <img class="pushpin up left" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    <img class="pushpin right up" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    <h1>Création du cours</h1>

	<div class="vignetteContent">
		<form class="form-horizontal" method="POST" action="/addTitle">
			{{ csrf_field() }}

			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
				<label for="name" class="control-label"><i class="fab fa-autoprefixer"></i> Titre du cours</label></label>

				<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

				@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
				<label for="description" class="control-label"><i class="fas fa-align-left"></i> Description</label></label>

				<textarea id="description" type="text" class="form-control" name="description" rows="8" cols="80" required>{{ old('description') }}</textarea>

				@if ($errors->has('description'))
					<span class="help-block">
						<strong>{{ $errors->first('description') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group end">
				<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
					<div class="btn-group mr-2" role="group" aria-label="First group">
						<button type="submit" class="btn btn-success btn-block"><i class="fas fa-sign-in-alt"></i> Connexion</button>
					</div>
					<div class="btn-group mr-2" role="group" aria-label="Second group">
						<a class="btn btn-secondary" href="/ecrire">Annuler</a>
					</div>
				</div>
			</div>
		</form>
	</div>

    <img class="pushpin bottom left" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    <img class="pushpin right bottom" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
</div>
