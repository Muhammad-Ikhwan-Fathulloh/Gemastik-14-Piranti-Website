@extends('layout.v_template')

@section('title','Grafik Cuaca')
@section('halaman','Grafik Cuaca')

@section('content')
<div class="card">
	<div class="panel">
		<div id="chartSuhu"></div>
	</div>
</div>
<hr>
<div class="card">
	<div class="panel">
		<div id="chartKelembapan"></div>
	</div>
</div>
<hr>
@endsection
@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
	//-------------------------------------------------------
	Highcharts.chart('chartSuhu', {
	    chart: {
	        type: 'spline'
	    },
	    title: {
	        text: 'Grafik Suhu '+{!!json_encode($nama)!!}
	    },
	    subtitle: {
	        text: 'Skut Bandung'
	    },
	    xAxis: {
	        categories: {!!json_encode($tanggal)!!},
	    },
	    yAxis: {
	        title: {
	            text: 'Suhu '+{!!json_encode($nama)!!}
	        },
	        labels: {
	            formatter: function () {
	                return this.value + '°';
	            }
	        }
	    },
	    tooltip: {
	        crosshairs: true,
	        shared: true
	    },
	    plotOptions: {
	        spline: {
	            marker: {
	                radius: 4,
	                lineColor: '#666666',
	                lineWidth: 1
	            }
	        }
	    },
	    series: [{
	        name: {!!json_encode($nama)!!},
	        marker: {
	            symbol: 'square'
	        },
	        data:  {!!json_encode($suhu)!!},

	    }]
	});

	Highcharts.chart('chartKelembapan', {
	    chart: {
	        type: 'spline'
	    },
	    title: {
	        text: 'Grafik Kelembapan '+{!!json_encode($nama)!!}
	    },
	    subtitle: {
	        text: 'Skut Bandung'
	    },
	    xAxis: {
	        categories: {!!json_encode($tanggal)!!},
	    },
	    yAxis: {
	        title: {
	            text: 'Kelembapan '+{!!json_encode($nama)!!}
	        },
	        labels: {
	            formatter: function () {
	                return this.value + '%';
	            }
	        }
	    },
	    tooltip: {
	        crosshairs: true,
	        shared: true
	    },
	    plotOptions: {
	        spline: {
	            marker: {
	                radius: 4,
	                lineColor: '#666666',
	                lineWidth: 1
	            }
	        }
	    },
	    series: [{
	        name: {!!json_encode($nama)!!},
	        marker: {
	            symbol: 'square'
	        },
	        data:  {!!json_encode($kelembapan)!!},

	    }]
	});

</script>
@endsection