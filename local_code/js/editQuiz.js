/* jshint -W033, esversion: 6 */

var previous = {}, nbOfQuestions = 0, currentNbOfQuestions, maxNbOfQuestions = 10;
var file;
$(document).ready(function() {
	if (data == 0) {
		initQuizEditor();
		$(`#removeQuestion`).prop('disabled', true);
	} else {
		initQuizEditor(data.questions.length);
		getQuizData();

		updateButtonState();
	}
});

// Change the label linked to the radio button between 'vrai' and 'faux'.
$(document).on('change', '.custom-control-input', function() {
	let currentName = $(this).attr(`name`);
	let inputChoices = $(`input[name="${ currentName }"]`);
	for (let input of inputChoices) {
		$(`label[for="${ input.id }"]`).text((input.checked) ? 'vrai' : 'faux')
	}
});

// Add event to the add question button.
$(document).on('click', '#addQuestion', function() {
	addNewQuestion();
});

// Add event to the remove question button.
$(document).on('click', '#removeQuestion', function() {
	removeLastQuestion();
});

/**
 * This function is used to initialise the quiz editor by
 * setting an empty form.
 *
 * @param quizQuestionsNumber
 *		The number of questions in the form.
 *		By default it's set to 2.
 */
function initQuizEditor(quizQuestionsNumber = 2) {
	let res = `<form class="form-horizontal">`;
	for (let i = 0; i < quizQuestionsNumber; i++) {
		res += addNewQuestion(true);
	}
	res += `</form>`;
	$('.quiz').html(res);
}

/**
 * This function is used to set the data from the quiz
 * to modify inside the form.
 */
function getQuizData() {
	let currentQuestion, currentChoices;
	for (let i = 0; i < data.questions.length; i++) {
		currentQuestion = data.questions[i];
		$(`#titleQ${ i + 1 }`).val(currentQuestion.title);

		for (let j = 0; j < currentQuestion.choices.length; j++) {
			currentChoices = currentQuestion.choices[j];
			$(`#choice${ j + 1 }Q${ i + 1 }`).val(currentChoices.choice);
			$(`#explanation${ j + 1 }Q${ i + 1 }`).val(currentChoices.explanation);
			$(`#answer${ j + 1 }Q${ i + 1 }`).attr(`checked`, currentChoices.isTheAnswer);
			$(`label[for="answer${ j + 1 }Q${ i + 1 }"]`).text((currentChoices.isTheAnswer) ? 'vrai' : 'faux');
		}
	}
}

/**
 * This function is used to add a new question to the form.
 *
 * @param isInit
 *		The boolean value used to know if the question is added
 *		when initialising the form.
 *		If true, the question is added to the string containing the form,
 *		otherwise, the question is added inside the page.
 */
function addNewQuestion(isInit = false) {
	if (nbOfQuestions < maxNbOfQuestions) {
		currentNbOfQuestions = nbOfQuestions + 1;
		let res = `<div id="Q${ currentNbOfQuestions }" class="form-group">
			${ (nbOfQuestions > 0) ? "<hr>" : "" }
			<div class="form-group">
				<label for="titleQ${ currentNbOfQuestions }" class="control-label">Question ${ currentNbOfQuestions } : </label>
				<input id="titleQ${ currentNbOfQuestions }" class="form-control" type="text" name="title" required>
			</div>
			<label style="font-weight: bold;" class="control-label">Réponses :</label>
			<div class="col-sm-10 offset-sm-1">${ addChoices() }</div>
		</div>`;
		nbOfQuestions++;
		if (isInit)
			return res;
		$('.quiz form').append(res);
	}

	updateButtonState();
}

/**
 * This function is used to remove the last question of the form.
 * The minimal number of question has to be 2, so the function cannot
 * be used unless there are three or more questions.
 */
function removeLastQuestion() {
	if (nbOfQuestions > 2) {
		$(`#Q${ nbOfQuestions-- }`).remove();
	}

	updateButtonState();
}

/**
 * This function is used to add the three choices
 * of a question in the quiz form.
 *
 * @return the html code of the choices.
 */
function addChoices() {
	let res = ``;
	for (let i = 1; i <= 3; i++) {
		res += `<div class="form-group">
			<div class="form-group">
				<label for="choice${ i }Q${ currentNbOfQuestions }" class="control-label">Choix N°${ i } : </label>
				<input id="choice${ i }Q${ currentNbOfQuestions }" class="form-control" type="text" name="choice" required>
			</div>
			<div class="form-group">
				<label for="explanation${ i }Q${ currentNbOfQuestions }" class="control-label">Explication : </label>
				<input id="explanation${ i }Q${ currentNbOfQuestions }" class="form-control" type="text" name="explanation" required>
			</div>
			<div class="form-group">
				<div class="custom-control custom-radio">
					<input type="radio" class="custom-control-input" name="answersQ${ currentNbOfQuestions }" id="answer${ i }Q${ currentNbOfQuestions }" ${ (i == 1) ? "checked" : "" }>
					<label class="custom-control-label" for="answer${ i }Q${ currentNbOfQuestions }" class="control-label">${ (i == 1) ? "vrai" : "faux" }</label>
				</div>
			</div>
		</div>`;
	}
	return res;
}

/**
* This function/object is used to serialize
* a formulaire into a format compatible with
* the one used for the REST call through ajax.
*
* The code comes from:
* https://stackoverflow.com/questions/12966433/convert-form-data-to-json-object
*/
$.fn.serializeObject = function() {
	let quiz = { questions : [] }, currentQuestion = {};
	let questionNumber = 0;
	let a = this.serializeArray();
	for (let i = 0; i < a.length; i++) {
		if (a[i].name == `title`) {
			currentQuestion = {};
			currentQuestion[a[i].name] = a[i].value;
			currentQuestion.choices = getChoices(a, i + 1);
			quiz.questions[questionNumber++] = currentQuestion;
		}
	}
	return quiz;
};

/**
 * This function is used to get the current question's choices.
 *
 * @param data
 *		The object containing the completed form.
 * @param nb
 *		The number of the question.
 * @return the current question's choices.
 */
function getChoices(data, nb) {
	let choices = [], currentChoice, goodAnswer;
	let nbOfChoices = 3, nbFields = (nbOfChoices * 2) + 1, i = nb, choiceNumber = 0;
	while (i < nb + nbFields) {
		if (data[i].name == `choice`) {
			currentChoice = {};
			goodAnswer = false;
			currentChoice[data[i].name] = data[i].value;
			currentChoice[data[i+1].name] = data[i+1].value;
			if (i+2 != nb + nbFields) {
				goodAnswer = (data[i+2].name.slice(0, 7) == "answers");
			}
			currentChoice.isTheAnswer = goodAnswer;
			choices[choiceNumber++] = currentChoice;
		}
		i++;
	}
	return choices;
}

/**
 * This function is used to save the changes
 * of the current part of the chapter.
 *
 * @param data
 *		If given, this is the content of the imported quiz.
 */
function saveChanges(data = null) {
	if (data === null) {
		data = JSON.stringify($(`form.form-horizontal`).serializeObject());
	} else {
		data = JSON.stringify(data);
	}
	let newData = { quiz: data, part: partId };

	$.post({
		url: '/editer/sauver',
		data: newData,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success: (data) => {
			window.location = urlBack;
		},
	});
}

/**
 * This function is used to update the state of the buttons
 * used to add and remove questions.
 *
 * The quiz has to have less than 10 questions to add one.
 * It has to have more than two questions to remobe one.
 */
function updateButtonState() {
	$(`#addQuestion`).prop('disabled', (nbOfQuestions >= maxNbOfQuestions));
	$(`#removeQuestion`).prop('disabled', (nbOfQuestions > 2) ? false : true);
}

// Verify if the given file is '.json'.
$('input[type="file"]').on('change', function() {
	var ext = $(this).val().split('.')[1];

	if (ext == 'json') {
		$('#importQ').attr('disabled', false);
		$('#error').css('display', 'none');
		$('#error').html('');
		file = $(this)[0].files[0];
	} else {
		$('#importQ').attr('disabled', true);
		$('#error').html(`⚠️ Seuls les fichiers dont l'extension est <wrong>.json</wrong> sont acceptés !`);
		$('#error').css('display', 'block');
	}
});

// Import the given quiz if the file extension is good.
$('#importQuiz').on('click', '#importQ', function(event) {
	event.stopPropagation();
	event.preventDefault();
	readFile(file, function(e) {
		saveChanges(JSON.parse(e.target.result));
	});
});

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
		reader.readAsText(file);
	}
}
