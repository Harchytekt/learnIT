<div class="col-12 col-md-10 offset-md-1 vignette" id="chapterBlock">
    <img class="pushpin up left" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
    <img class="pushpin right up" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">

    <div class="vignetteContent">
		<h1>Aide sur l'importation d'un fichier de quiz</h1>
		<p>Afin d'importer un fichier de quiz, vous devrez suivre plusieurs règles.</p>

		<p>
			Premièrement, le fichier <strong>doit</strong> avoir l'extension <strong>.json</strong>. <br>
			Sans cela, le fichier ne pourra tout simplement pas être importé.
		</p>
		<p>
			Secondement, le format du quiz doit suivre ces différentes règles :
		</p>
		<ol>
			<li>
				Le nombre minimal de questions est <strong>deux</strong>.
			</li>
			<li>
				Le nombre maximal de questions est <strong>dix</strong>.
			</li>
			<li>
				Le nombre de choix proposés est <strong>trois</strong>.
			</li>
		</ol>

		<p>Voici un exemple de quiz :</p>
		<pre><code class="json">
{
    "questions": [
        {
            "title": "Quel est le type de 42. ?",
            "choices": [
                {
                    "choice": "int",
                    "isTheAnswer": false,
                    "explanation": "Non, le int est un entier."
                },
                {
                    "choice": "float",
                    "isTheAnswer": true,
                    "explanation": "Correct !"
                },
                {
                    "choice": "str",
                    "isTheAnswer": false,
                    "explanation": "Faux."
                }
            ]
        },
        {
            "title": "Une chaine de caractères est déterminée par :",
            "choices": [...]
        }
    ]
}
			</code></pre>
			<p><strong>Explications :</strong></p>
			<ul>
				<li>
					Les différentes questions se retrouvent à l'intérieur du bloc <strong>"questions"</strong>.
				</li>
				<li>
					L'énoncé de la question est lié au champ <strong>"title"</strong>.
				</li>
				<li>
					Les trois choix se retrouvent à l'intérieur du bloc <strong>"choices"</strong>.
				</li>
				<li>
					Le choix à proposer à l'utilisateur est lié au champ <strong>"choice"</strong>.
				</li>
				<li>
					Si le choix est celui répondant correctement à l'énoncé, le champ <strong>"isTheAnswer"</strong> doit contenir la valeur <strong>true</strong>. <br>
					Sinon, la valeur sera <strong>false</strong>.
				</li>
				<li>
					L'explication dépendant du choix de l'utilisateur est liée au champ <strong>"explanation"</strong>.
				</li>
			</ul>
	</div>

	<img class="pushpin bottom left" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
    <img class="pushpin right bottom" src="{{ asset('img/pushpin2.svg') }}" alt="" height="65" width="65">
</div>
