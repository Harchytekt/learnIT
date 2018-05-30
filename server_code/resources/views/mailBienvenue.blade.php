<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<style media="screen">
			body {
				font-family: Avenir, Helvetica, sans-serif;
				box-sizing: border-box; background-color: #f5f8fa; color: #74787E;
				height: 100%; hyphens: auto; line-height: 1.4; margin: 0; -moz-hyphens: auto; -ms-word-break: break-all; width: 100% !important; -webkit-hyphens: auto; -webkit-text-size-adjust: none; word-break: break-word;
			}

			@media  only screen and (max-width: 500px) {
				.button {
					width: 100% !important;
				}
			}
		</style>
	</head>
	<body>
		<div style="margin: 10px 20px;">
			<div style="margin: 0 auto; width: 75%;">
				<h1>Bonjour {{ $user->firstname }},</h1>

				<p style="box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
					Vous venez d'être inscrit sur <a href="http://learnit.dev">learnIT</a> depuis la liste d'un rédacteur de cours. <br>
					Commencez par initialiser votre mot de passe en cliquant sur ce bouton :
				</p>
				<a href="http://learnit.dev/motdepasse/reinitialisation/{{ $token }}" class="button button-blue" target="_blank" style="text-align: center; width: 256px; box-sizing: border-box; border-radius: 3px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); color: #FFF; display: inline-block; text-decoration: none; -webkit-text-size-adjust: none; background-color: #3097D1; border-top: 10px solid #3097D1; border-right: 18px solid #3097D1; border-bottom: 10px solid #3097D1; border-left: 18px solid #3097D1;">Réinitialiser le mot de passe</a>

				<br><br>

				<p style="box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">L'équipe de <i style="box-sizing: border-box;">learnIT</i></p>
			</div>
		</div>
	</body>
</html>
