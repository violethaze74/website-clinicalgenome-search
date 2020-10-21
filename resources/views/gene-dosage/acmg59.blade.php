@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-7">
			<h1><img src="/images/dosageSensitivity-on.png" width="50" height="50">  Curation of the ACMG 59 Genes</h1>
      	{{-- <h3>Clingen had information on <span id="gene-count">many</span> curated genes</h3> --}}
		</div>

		<div class="col-md-5">
			<div class="">
				<div class="text-right p-2">
					<ul class="list-inline pb-0 mb-0 small">
					<li class="text-stats line-tight text-center pl-3 pr-3"><span class="countCurations text-18px"><i class="glyphicon glyphicon-refresh text-18px text-muted"></i></span><br />Total<br />Genes</li>
					<li class="text-stats line-tight text-center pl-3 pr-3"><span class="countHaplo text-18px"><i class="glyphicon glyphicon-refresh text-18px text-muted"></i></span><br />Haplo<br />Genes</li>
					<li class="text-stats line-tight text-center pl-3 pr-3"><span class="countTriplo text-18px"><i class="glyphicon glyphicon-refresh text-18px text-muted"></i></span><br />Triplo<br />Genes</li>
					<li class="text-stats line-tight text-center pl-3 pr-3"><a href="{{ route('dosage-index') }}"><i class="glyphicon glyphicon-circle-arrow-left text-18px text-muted"></i><br />Return to<br />Dosage Listing</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-md-12">
				@include('_partials.genetable')

		</div>
	</div>
</div>

@endsection

@section('heading')
<div class="content ">
		<div class="section-heading-content">
		</div>
</div>
@endsection


@section('script_js')

<link href="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table-locale-all.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.0/dist/extensions/export/bootstrap-table-export.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.0/dist/extensions/addrbar/bootstrap-table-addrbar.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://unpkg.com/bootstrap-table@1.18.0/dist/extensions/filter-control/bootstrap-table-filter-control.css">
<script src="https://unpkg.com/bootstrap-table@1.18.0/dist/extensions/filter-control/bootstrap-table-filter-control.js"></script>
<link href="https://unpkg.com/bootstrap-table@1.18.0/dist/extensions/group-by-v2/bootstrap-table-group-by.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-table@1.18.0/dist/extensions/group-by-v2/bootstrap-table-group-by.min.js"></script>

<!-- load up all the local formatters and stylers -->
<script src="/js/genetable.js"></script>

<script>

	/**
	**
	**		Globals
	**
	*/

	var $table = $('#table')
	var report = "{{ env('CG_URL_CURATIONS_DOSAGE') }}";

	function responseHandler(res) {
		//$('#gene-count').html(res.total);
		$('.countCurations').html(res.total);
		$('.countGenes').html(res.total);
		$('.countHaplo').html(res.nhaplo);
		$('.countTriplo').html(res.ntriplo);

    	return res
  	}

  	function inittable() {
		$table.bootstrapTable('destroy').bootstrapTable({
		locale: 'en-US',
		columns: [
		{
			title: 'Disorder',
			field: 'pheno',
			//formatter: phenoFormatter,
			cellStyle: cellFormatter,
			filterControl: 'input',
			sortable: true,
			searchFormatter: false,
			visible: false
		},
		{
			title: 'OMIM',
			field: 'omims',
			sortable: true,
			filterControl: 'input',
			formatter: acmomimsFormatter,
			searchFormatter: false,
			cellStyle: cellFormatter
		},
		{
			title: 'GeneReviews',
			field: 'pmids',
			sortable: true,
			filterControl: 'input',
			formatter: acmpmidsFormatter,
			searchFormatter: false,
			cellStyle: cellFormatter
        },
		{
			title: 'Typical Age of Onset',
			field: 'age',
			sortable: true,
			filterControl: 'input',
			//formatter: locationFormatter,
			searchFormatter: false,
			cellStyle: cellFormatter
        },
		{
			title: 'Gene',
			field: 'gene',
			formatter: acmsymbolFormatter,
			cellStyle: cellFormatter,
			filterControl: 'input',
			searchFormatter: false,
			sortable: true
		},
		{
			title: 'Gene (OMIM)',
			field: 'omimgene',
			formatter: acmomimsFormatter,
			cellStyle: cellFormatter,
			filterControl: 'input',
			searchFormatter: false,
			sortable: true
		},
        {
			title: 'Haploinsufficiency',
			field: 'haplo_assertion',
			filterControl: 'select',
			formatter: acmhaploFormatter,
			cellStyle: cellFormatter,
			searchFormatter: false,
			sortable: true
        },
		{
			title: 'Triplosensitity',
			field: 'triplo_assertion',
			filterControl: 'select',
			formatter: acmtriploFormatter,
			cellStyle: cellFormatter,
			searchFormatter: false,
			sortable: true
        }/*,
		{
			field: 'date',
			title: 'Reviewed',
			sortable: true,
			filterControl: 'input',
			cellStyle: cellFormatter,
			formatter: reportFormatter,
			sortName: 'rawdate'
        }*/
      ]
    })

	$table.on('load-error.bs.table', function (e, name, args) {

			$("body").css("cursor", "default");

			swal({
				title: "Load Error",
				text: "The system could not retrieve data from GeneGraph",
				icon: "error"
			});
		})

		$table.on('load-success.bs.table', function (e, name, args) {
<<<<<<< HEAD
=======

>>>>>>> 7ea5582432c2f665ad5206aee53bb0822cd0fd5d
			$("body").css("cursor", "default");

			if (name.hasOwnProperty('error'))
			{
				swal({
					title: "Load Error",
					text: name.error,
					icon: "error"
				});
			}
		})

		$table.on('post-body.bs.table', function (e, name, args) {

			$('[data-toggle="tooltip"]').tooltip();
		})

	}


	$(function() {

		// Set cursor to busy prior to table init
		$("body").css("cursor", "progress");

		// initialize the table and load the data
		inittable();

		// make some mods to the search input field
		var search = $('.fixed-table-toolbar .search input');
		search.attr('placeholder', 'Search in table');

		$( ".fixed-table-toolbar" ).show();
    	$('[data-toggle="tooltip"]').tooltip();
    	$('[data-toggle="popover"]').popover();

  })

</script>
@endsection
