@extends('layouts.app')
@section('title', $title)

@section('js')
	<script>
		var table = HSCore.components.HSDatatables.init('.js-datatable', {
			scrollY: 'calc(100vh - 251px)',
			ajax : '{!! request()->fullUrl() !!}?datatable=true', 
			columns: [
				{ data: 'pilihan', name: 'pilihan', className: 'text-center', orderable: false, searchable: false },
				{ data: 'key', name: 'key' },
				{ data: 'value', name: 'value' },
				{ data: 'action', name: 'action', className: 'text-end', orderable: false, searchable: false }
			],
			@include('nue::partials.datatable.script')
		});
	</script>
@endsection

@section('content')
	
	@include('nue::partials.breadcrumb', ['lists' => [
		'Extensions' => 'javascript:;', 
		$title => 'active'
	]])

	@include('nue::partials.datatable.header', [
		'title' => $title, 
		'description' => 'Kelola variabel umum dalam file <code>.env</code> kamu melalui halaman ini.', 
		'create' => route("$prefix.create"), 
		'datatable' => true
	])

	{!! Form::open(['method' => 'DELETE', 'route' => ["$prefix.destroy", 'hapus-all'], 'id' => 'submit-all']) !!}
		<div class="card card-bordered shadow-none rounded-0">
			<div class="card-body p-0">
				<div class="table-responsive">
					<table id="datatable" class="js-datatable table table-sm table-hover table-thead-bordered table-nowrap">
						<thead class="thead-light">
							<tr>
								<th class="table-column-pr-0" width="1">
									<div class="form-check mb-0">
										<input id="datatable-checkbox-check" type="checkbox" class="form-check-input">
										<label class="form-check-label" for="check-all"></label>
									</div>
								</th>
								<th>Key</th>
								<th>Value</th>
								<th width="15%">Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
			@include('nue::partials.datatable.footer')
		</div>
	{!! Form::close() !!}

@endsection