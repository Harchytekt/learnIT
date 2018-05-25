/* jshint -W033, esversion: 6 */

var previous = {}, maxDisplayedQuestionNb = 5;
// var data is initialized in the Part model
$(document).ready(function() {
	readQuiz();

	$(document).on('change', 'input:radio', function(event) {
		let name = $(this).attr('name');
		if (previous[name] !== undefined) {
			setPopover(previous[name], true);
		}
		previous[name] = $(this).attr('id').split('_');
		setPopover(previous[name], false);
	});
});

/**
 * This function is used to add the quiz into the view.
 */
function readQuiz() {
	let res = `<h4>Quiz facultatif... 👨🏻‍💻</h4>`;
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
	let res = `<form>`;
	let questionIdArray = [...Array(questions.length).keys()], questionsArray = [];
	let maxNbQuestions = (questions.length > maxDisplayedQuestionNb) ? maxDisplayedQuestionNb : questions.length, currentQuestionIdLength;

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
		res += `<div class="form-check">`;
		res += `<input type="radio" class="form-check-input" name="qcm1_${ questionNb }" id="${ questionNb }_${ i }" value="${ choices[i].choice }">`;
		res += `<label class="form-check-label" for="${ questionNb }_${ i }" id="label${ questionNb }_${ i }">${ choices[i].choice }</label> `;
		res += `<span class="pop" data-toggle="popover" data-placement="right" for="label${ questionNb }_${ i }"><i class="fas fa-info-circle"></i></span>`
		res += `</div>`;
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
