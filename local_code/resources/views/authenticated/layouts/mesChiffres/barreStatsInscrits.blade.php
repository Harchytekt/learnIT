<div class="row" id="statisticsBarInscrits">
	<div class="col-5 offset-sm-1 col-md-2 offset-md-0">
		<div class="statisticsBubble">
			<h2>{{ App\Enrollment::getNumberOfEnrollments() }}</h2>
			<p>cours suivis</p>
		</div>
	</div>
	<div class="col-5 offset-1 col-md-2">
		<div class="statisticsBubble">
			<h2>{{ App\Enrollment::getNumberOfCompletedEnrollments() }}</h2>
			<p>cours réussis</p>
		</div>
	</div>
	<div class="col-5 offset-sm-1 col-md-2 offset-lg-2">
		<div class="statisticsBubble">
			<h2>{{ App\Chapter::getNumberOfPassedChapters() }}</h2>
			<p>chapitres réussis</p>
		</div>
	</div>
	<div class="col-5 offset-1 col-md-2">
		<div class="statisticsBubble">
			<h2 id="percentage">{{ App\Enrollment::getAverage(false) }}</h2> <h4>%</h4>
			<p>de moyenne</p>
		</div>
	</div>
</div>
