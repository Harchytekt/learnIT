/* jshint -W033, esversion: 6 */

var previous = {}, nbOfQuestions = 0, currentNbOfQuestions, maxNbOfQuestions = 10;
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

$(document).on('change', '.form-check-input', function() {
	let currentName = $(this).attr(`name`);
	let inputChoices = $(`input[name="${ currentName }"]`);
	for (let input of inputChoices) {
		$(`label[for="${ input.id }"]`).text((input.checked) ? 'vrai' : 'faux')
	}
});

$(document).on('click', '#addQuestion', function() {
	addNewQuestion();
});

$(document).on('click', '#removeQuestion', function() {
	removeLastQuestion();
});

function initQuizEditor(quizQuestionsNumber = 2) {
	let res = `<form class="form-horizontal">`;
	for (let i = 0; i < quizQuestionsNumber; i++) {
		res += addNewQuestion(true);
	}
	res += `</form>`;
	$('.quiz').html(res);
}

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

function removeLastQuestion() {
	if (nbOfQuestions > 2) {
		$(`#Q${ nbOfQuestions-- }`).remove();
	}

	updateButtonState();
}

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
				<input type="radio" class="form-check-input" name="answersQ${ currentNbOfQuestions }" id="answer${ i }Q${ currentNbOfQuestions }" ${ (i == 1) ? "checked" : "" }>
				<label class="form-check-label" for="answer${ i }Q${ currentNbOfQuestions }" class="control-label">${ (i == 1) ? "vrai" : "faux" }</label>
			</div>
		</div>`;
	}
	return res;
}

function getDataFromForm() {
	//console.log($(`form.form-horizontal`).serializeObject());
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
 * @param $partId
 *		The id of the current part of the chapter.
 * @param $urlBack
 *		The previous page's URL.
 */
function saveChanges($partId, $urlBack) {
	let data = JSON.stringify($(`form.form-horizontal`).serializeObject());
	let newData = { quiz: data, part: $partId };

	$.post({
		url: '/editer/sauver',
		data: newData,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success: (data) => {
			window.location = $urlBack;
		},
	});
}

function updateButtonState() {
	$(`#addQuestion`).prop('disabled', (nbOfQuestions >= maxNbOfQuestions));
	$(`#removeQuestion`).prop('disabled', (nbOfQuestions > 2) ? false : true);
}
