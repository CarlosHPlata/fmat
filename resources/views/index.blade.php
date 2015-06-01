@extends('app')

@section('content')
	<div class="card background programmer">
	  <div class="card-content white-text">
	    	<span class="card-title">Bienvenido a LisFmat Wiki</span>
	    	<p>Un espacio para compartir opiniones y materiales de estudio, relacionados a las clases que
	    	se imparten en la carrera LIS de Fmat.
	    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima ullam explicabo minus debitis dicta possimus itaque, perferendis, consectetur reiciendis praesentium sapiente unde sunt repellendus odit incidunt perspiciatis facilis? Molestiae, officia.</p>
	    	<p>
	    		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum laboriosam, cumque maiores cum officiis natus. Quaerat sapiente maiores deleniti, suscipit repellendus magnam. Repellendus dicta, ratione itaque, placeat hic aliquam expedita.
	    	</p>
	  </div>

	  <div class="card-action">
	  		@if (Auth::guest())
	    		<a href="#">Registrate</a>
	    		<a href="#">Inicia sesión</a>
	    	@else

	    	@endif
	  </div>
	</div>

	<section>
		<div class="card white">
			<div class="card-content">
				<?php
function draw_calendar($month,$year){
	$eventos=\App\Evento::all();
	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';
			$dia= $list_day.'/'.$month.'/'.$year;
			$fecha= DateTime::createFromFormat("d/m/Y", $dia);

			foreach ($eventos as $evento) {

				if ($evento->eventDay==$fecha->format("Y-m-d")) {

					$calendar.='<p>'.$evento->eventContent.'</p>';
				}
				
			}

			
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}

echo date("F, j ,Y");
echo draw_calendar(date("n"),date("Y"));
?>
			</div>
		</div>
	</section>

	<section>
		<hr>
		<h4>Noticias</h4>

		@foreach ($bulletins as $bulletin)
			<div class="card white">
				<div class="card-content">
					<span class="card-title brown-text text-lighten-1">{{ $bulletin->title }}</span>
					<p>
						{{ $bulletin->content }}
					</p>
					<span class="card-date">{{ $bulletin->date }}</span>
				</div>
				<div class="card-action" style="padding:10px">
					<div class="row" style="margin-bottom: 0">
						<div class="col-md-6">
							<a href="{{route('bulletin.show', $bulletin->id )}}">Ver mas...</a>
						</div>
						<div class="col-md-6">
							<span class="pull-right">{{ count($bulletin->comments) }} <i class="mdi-editor-mode-comment"></i></span>
						</div>
					</div>
				</div>
			</div>
		@endforeach

		<div>
			<span class="pull-right"><a href="{{route('bulletin.index')}}">Ver mas</a></span> <br>
			<hr>
		</div>
	</section>



	<div class="row">
		<div class="col-md-6">
			<div class="card white">
				<div class="card-content">
					<span class="card-title brown-text text-lighten-1">TOP 10 Maestros mejor votados</span>
					<p>
						<ul class="collection">
							@foreach ($teachers as $teacher)
								<a class="collection-item" href="{{ route('teacher.show', $teacher) }}">
									<div>
										{{ $teacher->full_name }}
										<span class="secondary-content">
											{{$teacher->rating}}<i class="mdi-action-grade"></i>
										</span>
									</div>
								</a>
							@endforeach
						</ul>
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card white">
				<div class="card-content">
					<span class="card-title brown-text text-lighten-1">TOP 10 Materias con mas recursos</span>
					<p>
						<ul class="collection">
							@foreach ($signatures as $signature)
								<a class="collection-item" href="{{ route('signature.show', $signature) }}">
									<div>
										{{ $signature->name }}
										<span href="#!" class="secondary-content">
										 	{{ count($signature->resources) }}<i class="mdi-editor-attach-file"></i>
										</span>
									</div>
								</a>
							@endforeach
						</ul>
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection
