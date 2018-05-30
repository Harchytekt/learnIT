<div class="col-12 col-md-10 offset-md-1 vignette" id="chapterBlock">
    <img class="pushpin up left" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
    <img class="pushpin right up" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">

    <div class="vignetteContent">
		<h1>Aide sur l'importation d'un fichier de quiz</h1>
		<p>Afin d'importer une liste d'utilisateurs, vous devrez suivre plusieurs règles.</p>

		<p>
			Premièrement, le fichier <strong>doit</strong> avoir l'extension <strong>.csv</strong>. <br>
			Sans cela, le fichier ne pourra tout simplement pas être importé.
		</p>
		<p>
			Secondement, le format du quiz doit suivre ces différentes règles :
		</p>
		<ol>
			<li>
				La première ligne est <strong>Firstname;Lastname;Email</strong>.
			</li>
			<li>
				Le format d'une ligne est celle de la première ligne. <br>
				Exemple: <strong>John;Doe;john.doe@mail.be</strong>
			</li>
		</ol>
	</div>

	<img class="pushpin bottom left" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
    <img class="pushpin right bottom" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
</div>
