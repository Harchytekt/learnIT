/* jshint -W033, esversion: 6 */

// Import the given user list if the file extension is good.
$('#importUsers').on('click', '#importU', function(event) {
	event.stopPropagation();
	event.preventDefault();
	readFile(file, function(e) {
		saveUsers(csvJSON(e.target.result));
	});
});

// Close the div containing the info about the imported users.
$('#imported').on('click', '#closeImported', function(event) {
	$('#imported').css('display', 'none');
	$('#imported').html(``);
});

// Verify if the given file is '.csv'.
$('input[type="file"]').on('change', function() {
	var ext = $(this).val().split('.')[1];

	if (ext == 'csv') {
		$('#importU').attr('disabled', false);
		$('#error').css('display', 'none');
		$('#error').html('');
		file = $(this)[0].files[0];
	} else {
		$('#importU').attr('disabled', true);
		$('#error').html(`⚠️ Seuls les fichiers dont l'extension est <wrong>.csv</wrong> sont acceptés !`);
		$('#error').css('display', 'block');
	}
});

/**
 * This function is used to transform
 * the given CSV into a JSON object.
 *
 * @param csv
 *		The CSV file.
 *
 * Source: https://gist.github.com/iwek/7154578
 */
function csvJSON(csv) {
	var lines;

	lines = csv.split(/\r\n/);

	var result = [];

	var headers = ['firstname', 'lastname', 'email'];
	for (var i = 1; i < lines.length; i++) {
		var obj = {};
		var currentline = [i+1].concat(lines[i].split(";"));

		for (var j = 0; j < headers.length; j++) {
			obj[headers[j]] = currentline[j + 1];
		}

		result.push(obj);
	}

	return JSON.stringify(result); //JSON
}

/**
 * This function is used to list the existing usernames.
 *
 * @param existingUsernames
 *		The list of existing usernames.
 */
function listExistingUsernames(existingUsernames) {
	let res = ``;

	for (let username of existingUsernames) {
		res += `<li>${ username }</li>`;
	}

	return res;
}

/**
 * This function is used to list the existing email addresses.
 *
 * @param existingEmails
 *		The list of existing email addresses.
 */
function listExistingEmails(existingEmails) {
	let res = ``;

	for (let mail of existingEmails) {
		res += `<li>${ mail }</li>`;
	}

	return res;
}

/**
 * This function is used to list the existing
 * usernames and email addresses.
 *
 * @param bothList
 *		The list of existing usernames and email addresses.
 */
function listUsers(bothList) {
	let res = ``;

	for (let both of bothList) {
		res += `<li>${ both[0] } - ${ both[1] }</li>`;
	}

	return res;
}


/**
 * This function is used to get the given file from the form.
 *
 * @param file
 *		The object containing the file content.
 * @param callback
 *		The callback used to get the content of the file.
 */
function readFile(file, callback) {
	if (typeof (FileReader) != "undefined") {
		var reader = new FileReader();
		reader.onload = callback;
		reader.readAsText(file, 'windows-1252');
	}
}

/**
 * This function is used to save a list of users.
 *
 * @param data
 *		The list of users to save.
 */
function saveUsers(data) {
	let newData = { userList: data };

	$.post({
		url: '/importUsers',
		data: newData,
		headers: {
			'X-CSRF-TOKEN': $('span[name="csrf-token"]').attr('content')
		},
		success: (data) => {
			$('#importModal').modal('hide')
			$(`#imported`).css(`display`, `block`);
			$(`#imported`).html(`<hr><i id="closeImported" class="fas fa-times float-right" title="Cacher les informations d'importation."></i><h2>Résultat de l'importation</h2><h5 id="resImport"></h5>`);

			$(`#resImport`).text(`${ data[0] } utilisateurs ont été créés sur les ${ data[1] } donnés.`);
			if (data[2].length > 0) {
				$(`#imported`).append(`<h6 class="darkGreen">Utilisateurs créés</h6><ul>${ listUsers(data[2]) }</ul>`);
			}

			if (data[0] < data[1]) {
				if (data[3].length > 0) {
					$(`#imported`).append(`${ (data[2].length > 0) ? '<hr width="50%">' : '' }<h6>Pseudos déjà utilisés</h6><ul>${ listExistingUsernames(data[3]) }</ul>`);
				}
				if (data[4].length > 0) {
					$(`#imported`).append(`<h6>Adresses mail déjà utilisées</h6><ul>${ listExistingEmails(data[4]) }</ul>`);
				}
				if (data[5].length > 0) {
					$(`#imported`).append(`<h6>Données déjà utilisées <i>(Pseudo - Adresse mail)</i></h6><ul>${ listUsers(data[5]) }</ul>`);
				}
			}
		},
	});
}
