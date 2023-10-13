<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Indeks Kepuasan Masyarakat</title>
		<style>
			.chart-container {
				text-align: center;
			}

			.chart-img {
				max-width: 50%;
				margin: 0 auto;
				display: block;
			}

			table {
				font-size: .8rem;
			}

			table td, table th {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div>
			<table style="width: 100%;">
				<tr>
					<td>
						<table>
							<tr>
								<th>Tanggal Mulai</th>
								<td>:</td>
								<td>{{ request('start_date') }}</td>
							</tr>
							<tr>
								<th>Tanggal Selesai</th>
								<td>:</td>
								<td>{{ request('end_date') }}</td>
							</tr>
						</table>
					</td>
					<td>
						<table>
							<tr>
								<th>Jenis Kelamin</th>
								<td>:</td>
								<td>{{ request('gender') ?? 'Semua' }}</td>
							</tr>
							<tr>
								<th>Umur</th>
								<td>:</td>
								<td>{{ request('age') ?? 'Semua' }}</td>
							</tr>
						</table>
					</td>
					<td>
						<table>
							<tr>
								<th>Pendidikan</th>
								<td>:</td>
								<td>{{ request('education') ?? 'Semua' }}</td>
							</tr>
							<tr>
								<th>Pekerjaan</th>
								<td>:</td>
								<td>{{ request('job') ?? 'Semua' }}</td>
							</tr>
						</table>
					</td>
					<td>
						<table>
							<tr>
								<th>Desa</th>
								<td>:</td>
								<td>{{ request('village') ?? 'Semua' }}</td>
							</tr>
							<tr>
								<th>Pencarian</th>
								<td>:</td>
								<td>{{ request('search') }}</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div class="chart-container">
			<h5>Responden Menurut Jenis Kelamin</h5>
			<img src="{{ 'https://quickchart.io/chart?c=' . urlencode($chartJKConfig) }}" alt="Chart" class="chart-img" />
		</div>
		<div class="chart-container">
			<h5>Responden Menurut Umur</h5>
			<img src="{{ 'https://quickchart.io/chart?c=' . urlencode($chartUmurConfig) }}" alt="Chart" class="chart-img" />
		</div>
		<div class="chart-container">
			<h5>Responden Menurut Pendidikan</h5>
			<img src="{{ 'https://quickchart.io/chart?c=' . urlencode($chartPendidikanConfig) }}" alt="Chart" class="chart-img" />
		</div>
		<div class="chart-container">
			<h5>Responden Menurut Pekerjaan</h5>
			<img src="{{ 'https://quickchart.io/chart?c=' . urlencode($chartPekerjaanConfig) }}" alt="Chart" class="chart-img" />
		</div>
		<div class="chart-container">
			<h5>Responden Menurut Desa</h5>
			<img src="{{ 'https://quickchart.io/chart?c=' . urlencode($chartDesaConfig) }}" alt="Chart" class="chart-img" />
		</div>
	</body>

</html>
