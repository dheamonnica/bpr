<style type="text/css">
	.widget-user-header {
		padding-left: 20px !important;
	}
</style>

<link rel="stylesheet" href="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.css">

<section class="content-header">
	<h1>
		<?= cclang('dashboard') ?>

		<small>
			<?= cclang('control_panel') ?>
		</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="fa fa-dashboard">
				</i>
				<?= cclang('home') ?>
			</a>
		</li>
		<li class="active">
			<?= cclang('dashboard') ?>
		</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-warning">
				<div class="box-body ">
					<!-- /.widget-user -->
					<div class="row" style="padding-bottom: 10px">
						<div class="col-md-8">
							<div class="col-sm-3 padd-left-0  ">
								Start Date :
								<input type="date" class="form-control" name="q" id="filter"
									placeholder="<?= cclang('filter'); ?>" value="<?= $back; ?>">
							</div>
							<div class="col-sm-3 padd-left-0  ">
								End Date :
								<input type="date" class="form-control" name="q" id="filter"
									placeholder="<?= cclang('filter'); ?>" value="<?= $now ?>">
							</div>

							<div class="col-sm-1 padd-left-0" style="padding-top: 20px">
								<button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply"
									title="<?= cclang('filter_search'); ?>">
									Filter
								</button>
							</div>
							<div class="col-sm-1 padd-left-0" style="padding-top: 20px">
								<a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply"
									href="<?= base_url('administrator/pengajuan_kredit'); ?>"
									title="<?= cclang('reset_filter'); ?>">
									<i class="fa fa-undo"></i>
								</a>
							</div>
						</div>

					</div>
					<div id="main" style="width:99%;height: 500px;"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->

<script>
	var editMode = false;
	var dashboardSlug = false;
</script>

<script src="
https://cdn.jsdelivr.net/npm/echarts@5.4.1/dist/echarts.min.js
"></script>
<script type="text/javascript">
	var chartDom = document.getElementById('main');
	var myChart = echarts.init(chartDom);
	var option;

	option = {
		title: {
			text: 'Jumlah Pengajuan Kredit',
		},
		tooltip: {
			trigger: 'axis'
		},
		legend: {
			data: ['Data Pengajuan Kredit']
		},
		toolbox: {
			show: true,
			feature: {
				dataView: { show: true, readOnly: false },
				magicType: { show: true, type: ['line', 'bar'] },
				restore: { show: true },
				saveAsImage: { show: true }
			}
		},
		grid: {
			top: 110,
			left: 50,
			right: 50,
		},
		calculable: true,
		xAxis: [
			{
				type: 'category',
				data: [
					<?php foreach($datas as $data): ?>
						'<?= date("d/m/Y",strtotime($data->created_at))	?>'
					<?php endforeach; ?>

				],
				axisLabel: {
					show: true,
					interval: 0,
					rotate: 45,
					fontSize: 10,
				},
			}
		],
		yAxis: [
			{
				type: 'value'
			}
		],
		series: [
			{
				name: 'jumlah',
				type: 'bar',
				data: [
					<?php foreach($datas as $data): ?>
						'<?= $data->jumlah ?>'
					<?php endforeach; ?>
				],
				label: {
					show: true,
					position: 'top',
					color: "black",
					fontSize: 12,
					formatter: function (d) {
						return 'Rp' + d.data ;
					}
				},

			},
		]
	};

	option && myChart.setOption(option);

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>
<script src="<?= BASE_ASSET; ?>/gridstack/dist/gridstack.js"></script>
<script src="<?= BASE_ASSET; ?>/gridstack/dist/gridstack.jQueryUI.js"></script>
<script src="<?= BASE_ASSET ?>module/dashboard/js/dashboard.js"></script>