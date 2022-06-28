<section class="panel ">
	<div class="panel-body">
		<div class="">
			<div class="row">
				<div class="col-sm-6">
					<a href="#"><img src="{{ asset('Plantilla/assets/img/logo_reporte.png')}}"></a>
				</div>
				<div class="col-sm-6 align-lg-center">
					
					<h4>Descargo {{$tipo}} <br># HCL.:{{$paciente->pa_hcl}} </h4>
				</div>
			</div>
			<hr>
			<input type="number" id="paciente_id_HCL" value="{{$paciente->pa_id}}" hidden>
			<label id="paciente_id_HCL"></label>
			<h5>Paciente : {{$paciente->pa_appaterno }} {{$paciente->pa_apmaterno }} {{$paciente->pa_nombre }}</h5>
			<br>
			<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-6">
						<h5>Fecha: </h5>
						<h5>Diagnostico:</h5>
						<h5>Operacion:</h5>
						<h5>Hora inicio:</h5>
						<h5>Hora Culminacion:</h5>
						<h5>Duracion:</h5>
					</div>
					<div class="col-sm-6">
						<h5>Cirujano:</h5>
						<h5>Anesteseologo:</h5>
						<h5>Instrumentador:</h5>
						<h5>Circulante:</h5>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-6">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td>Medicamentos</td>
									<td>Cantidad</td>
								</tr>
							</thead>
							<tbody id="desQui_list1">
								<tr>
									<th></th>
									<th></th>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-lg-6">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td>Insumo</td>
									<td>Cantidad</td>
								</tr>
							</thead>
							<tbody id="desQui_list2">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //invoice -->
	</div>
</section>
