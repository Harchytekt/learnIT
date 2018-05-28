<div class="row" id="statisticsBarWritten">
	<div class="col-5 offset-sm-1">
		<div class="statisticsBubble">
			<h2>{{ App\Course::getNumberOfWrittenCourses() }}</h2>
			<p>cours écrits</p>
		</div>
	</div>
	<div class="col-5 offset-2 offset-sm-1 col-md-4">
		<div class="statisticsBubble">
			<h2 id="percentage">{{ App\Enrollment::getAverage(true) }}</h2> <h4>%</h4>
			<p>de moyenne</p>
		</div>
	</div>
</div>
