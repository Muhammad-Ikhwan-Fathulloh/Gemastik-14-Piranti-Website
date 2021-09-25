@extends('layout.v_template')

@section('title','Grafik Pengunjung')
@section('halaman','Grafik Pengunjung')

@section('content')
<!-- @livewire('grafikpengunjung') -->
<div class="card">
	<div class="panel">
		<div id="chartPengunjung"></div>
	</div>
</div>
<hr>
<div class="card">
	<div class="panel">
		<div id="chartPendapatan"></div>
	</div>
</div>
<hr>
@endsection
@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
	Highcharts.chart('chartPengunjung', {
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Grafik Jumlah Pengunjung Destinasi '+{!!json_encode($nama)!!}
	    },
	    subtitle: {
	        text: 'Skut Bandung'
	    },
	    xAxis: {
	        categories: {!!json_encode($tanggal)!!},
	        crosshair: true
	    },
	    yAxis: {
	        min: 0,
	        title: {
	            text: 'Jumlah Pengunjung '+{!!json_encode($nama)!!}
	        }
	    },
	    tooltip: {
	        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	            '<td style="padding:0"><b>{point.y} Orang</b></td></tr>',
	        footerFormat: '</table>',
	        shared: true,
	        useHTML: true
	    },
	    plotOptions: {
	        column: {
	            pointPadding: 0.2,
	            borderWidth: 0
	        }
	    },
	    series: [{
	        name: 'Jumlah Pengunjung '+{!!json_encode($nama)!!},
	        data: {!!json_encode($pengunjung)!!}

	    }]
	});

	Highcharts.chart('chartPendapatan', {
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Grafik Pendapatan Destinasi '+{!!json_encode($nama)!!}
	    },
	    subtitle: {
	        text: 'Skut Bandung'
	    },
	    xAxis: {
	        categories: {!!json_encode($tanggal)!!},
	        crosshair: true
	    },
	    yAxis: {
	        min: 0,
	        title: {
	            text: 'Pendapatan Destinasi '+{!!json_encode($nama)!!}
	        }
	    },
	    tooltip: {
	        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	            '<td style="padding:0"><b>Rp.{point.y},-</b></td></tr>',
	        footerFormat: '</table>',
	        shared: true,
	        useHTML: true
	    },
	    plotOptions: {
	        column: {
	            pointPadding: 0.2,
	            borderWidth: 0
	        }
	    },
	    series: [{
	        name: 'Pendapatan Destinasi '+{!!json_encode($nama)!!},
	        data: {!!json_encode($pendapatan)!!}

	    }]
	});
</script>
@endsection