<div class="row" id="statisticsBar">
	<div class="col-5 offset-sm-1 col-md-2 offset-md-0">
		<div class="statisticsBubble">
			<h2>{{ App\Enrollment::numberOfEnrollments() }}</h2>
			<p>cours suivis</p>
		</div>
	</div>
	<div class="col-5 offset-1 col-md-2">
		<div class="statisticsBubble">
			<h2>{{ App\Enrollment::numberOfCompletedEnrollments() }}</h2>
			<p>cours réussis</p>
		</div>
	</div>
	<div class="col-5 offset-sm-1 col-md-2 offset-lg-2">
		<div class="statisticsBubble">
			<h2>{{ App\Chapter::numberOfPassedChapters() }}</h2>
			<p>chapitres réussis</p>
		</div>
	</div>
	<div class="col-5 offset-1 col-md-2">
		<div class="statisticsBubble">
			<h2 id="percentage">{{ App\Enrollment::getAverage() }}</h2> <h4>%</h4>
			<p>de moyenne</p>
		</div>
	</div>
</div>
