/* jshint -W033, esversion: 6 */

var previous = {}, maxDisplayedQuestionNb = 5, questionNumber = data.questions.length;
var chosensAnswers = [], result = 0, resultArray = [];
// var data is initialized in the Part model
$(document).ready(function() {
	readQuiz();

	$(document).on('change', 'input:radio', function(event) {
		eventOnRadioButtons($(this));
	});

	$(document).on('click', '#saveResult', function(event) {
		eventOnTestCorrection();
	});
});

/**
 * This function is used to add the quiz into the view.
 */
function readQuiz() {
	let res = ``;
	res += (currentIsTest) ? `<h4>Questionnaire final ! 👨🏻‍🏫</h4>` : `<h4>Quiz facultatif... 👨🏻‍💻</h4>`;
	res += (data == 0) ? `Le quiz n'est pas encore disponible.` : `${ readQuestions(data.questions) }`;
	$('.quiz').html(res);
}

/**
 * This function is used to get the questions of the
 * quiz in a random way.
 * It displays a maximum of 5 questions.
 *
 * @param questions
 *		The array containing the questions.
 */
function readQuestions(questions) {
	let res = `<form id="quizForm">`;
	let questionIdArray = [...Array(questionNumber).keys()], questionsArray = [];
	let maxNbQuestions = (questionNumber > maxDisplayedQuestionNb) ? maxDisplayedQuestionNb : questionNumber, currentQuestionIdLength;

	for (let i = 0; i < maxNbQuestions; i++) {
		currentQuestionIdLength = questionIdArray.length;
		questionsArray[i] = questionIdArray[Math.floor(Math.random() * currentQuestionIdLength)]
		questionIdArray.splice($.inArray(questionsArray[i], questionIdArray), 1);
	}

	for (let i = 0; i < questionsArray.length; i++) {
		res += `<div class="form-group">`;
		res += `<label>Question ${ i + 1 }. ${ questions[questionsArray[i]].title }</label>`;
		res += `<div class="col-sm-10 offset-sm-1">`;
		res += readChoices(i, questions[questionsArray[i]].choices);
		res += `</div></div>`;
	}
	if (currentIsTest) {
		res += `<br><hr><div class="form-group end"><button type="button" id="saveResult" class="btn btn-success" title="Enregistrer" disabled><i class="fas fa-save"></i> Enregistrer</button></div><span id="result"></span>`;
	}
	return res + `</form>`;
}

/**
 * This function is used to get the choices of the
 * current question.
 *
 * @param questionNb
 *		The number of the current question.
 * @param choices
 *		The array containing the choices of the
 * 		current question.
 */
function readChoices(questionNb, choices) {
	let res = ``;
	for (let i = 0; i < choices.length; i++) {
		res += `<div class="form-check"><div class="custom-control custom-radio">`;
		res += `<input type="radio" class="custom-control-input" name="qcm${ questionNb }" id="${ questionNb }_${ i }" value="${ choices[i].choice }">`;
		res += `<label class="custom-control-label" for="${ questionNb }_${ i }" id="label${ questionNb }_${ i }">${ choices[i].choice }</label> `;
		res += `<span class="pop" data-toggle="popover" data-placement="right" for="label${ questionNb }_${ i }"><i class="fas fa-info-circle"></i></span>`;
		res += `</div></div>`;

	}
	return res;
}

/**
 * This function is used to set the popover.
 * By default, it's hidden.
 * The title and the content are from the json.
 *
 * @param chosen
 *		The array containing the number of
 *		the question and of the choice.
 * @param hide
 *		The boolean value saying if the popover
 *		has to be shown or hidden.
 */
function setPopover(chosen, hide) {
	let choice = data.questions[chosen[0]].choices[chosen[1]];
	let popover = $(`span[for="label${ chosen[0] }_${ chosen[1] }"]`);
	if (hide) {
		popover.css('display', 'none');
		popover.data('title', ``);
		popover.data('content', ``);
		popover.popover('hide');
	} else {
		popover.css('display', 'inline');
		popover.data('title', `${ (choice.isTheAnswer) ? "Bonne réponse ! 😃" : "Mauvaise réponse 😕" }`);
		popover.data('content', `${ choice.explanation }`);
		popover.popover('show', {trigger: `click`});
	}
}

/**
 * This function is used to add event on the radio buttons.
 * It'll show/hide the popover if it isn't a test.
 *
 * @param currentButton
 *		The current radio button.
 */
function eventOnRadioButtons(currentButton) {
	let name = currentButton.attr('name');

	if (!currentIsTest) {
		if (previous[name] !== undefined) {
			setPopover(previous[name], true);
		}
		previous[name] = currentButton.attr('id').split('_');
		setPopover(previous[name], false);
	} else {
		previous[name] = currentButton.attr('id').split('_');
	}

	$(`#saveResult`).prop(`disabled`, (Object.keys(previous).length < questionNumber));
}

/**
 * This function is used to add event on the test correction.
 * The button is hidden, the result is calculated and saved into the DB,
 * and the popover are shown.
 */
function eventOnTestCorrection() {
	getChosenResult();

	// Disable all radio buttons
	$(`.form-check-input`).prop(`disabled`, true);

	// Display popover
	chosensAnswers = (Object.keys(previous).map(function(v) { return previous[v]; }));
	for (let choice of chosensAnswers) {
		setPopover(choice, false);
	}

	result = calculateResult()

	displayResult(resultArray);

	var newData = { courseId: courseId, chapterId: chapterId, result: result };

	$.post({
		url: '/test/sauver',
		data: newData,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
}

/**
 * This function is used to get an array of the chosen results.
 */
function getChosenResult() {
	let currentQuestion, currentChoice;
	for (let i = 0; i < questionNumber; i++) {
		[currentQuestion, currentChoice] = $(`#quizForm * input:radio[name="qcm${ i }"]:checked`).attr("id").split('_');
		resultArray[i] = (data.questions[currentQuestion].choices[currentChoice].isTheAnswer)
	}
}

/**
 * This function is used to return the result of the test.
 *
 * @return the result of the test.
 */
function calculateResult() {
	let questionPoint = 10 / questionNumber, quizResult = 0;
	for (let answer of resultArray) {
		quizResult += (answer) ? questionPoint : 0;
	}
	return Math.round(quizResult);
}

/**
 * This function is used to display the result of the test.
 */
function displayResult() {
	$(`#saveResult`).css(`display`, `none`);
	if (result < 7) {
		$(`#result`).addClass(`red`);
		$(`#result`).text(`😞 Dommage, votre résultat est ${ result }/10. La prochaine sera la bonne.`);
	} else {
		$(`#result`).addClass(`green`);
		$(`#result`).text(`Bravo ! 🎉 Votre résultat est ${ result }/10. Le chapitre suivant a été débloqué.`);
	}
}
