<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Indeks Kepuasan Masyarakat</title>
		@vite(['resources/css/app.css', 'resources/js/app.js'])
		<style>
			.container {
				width: 100%;
				margin: auto;
				display: grid;
				gap: 10px;
			}

			.table {
				border-collapse: collapse;
			}

			.table th,
			.table td {
				border: 1px solid black;
				padding: 8px;
				text-align: center;
			}

      .bordered {
        border: 1px solid black;
				padding: 8px;
				text-align: center;
      }
		</style>
	</head>

	<body>
		<div class="container">
			<table border="1" class="table" style="margin-bottom: 20px;">
				<tr>
					<td>Nilai IKM Tertimbang</td>
					<td>IKM Unit Pelayanan</td>
					<td>Mutu Pelayanan</td>
					<td>Kinerja Pelayanan</td>
				</tr>
				<tr>
					<td>{{ $ikm['nilaiIkmTertimbang'] }}</td>
					<td>{{ $ikm['ikmUnit'] }}</td>
					<td>{{ $ikm['mutu'] }}</td>
					<td>{{ $ikm['kinerja'] }}</td>
				</tr>
			</table>
			<table>
				<tr class="h-fit">
					<td>
						<table border="1" class="table h-full w-full">
							<tr>
								<td>Nilai IKM</td>
							</tr>
							<tr class="h-full">
								<td>
                  <div style="font-size: 3rem;">{{ $ikm['ikmUnit'] }}</div>
                  <div>({{ $ikm['kinerja'] }})</div>
                </td>
							</tr>
						</table>
					</td>
					<td>
						<table border="1" class="w-full" style="border-collapse: collapse;">
							<tr>
								<td class="bordered">Nama Pelayanan: Kepuasan Masyarakat</td>
							</tr>
							<tr rowspan="2">
								<td class="bordered">
									<table border="0" class="w-full text-left" style="border-collapse: collapse;">
										<tr>
											<td></td>
											<td></td>
											<td>Responden</td>
										</tr>
										<tr>
											<td>Jumlah Responden</td>
											<td>:</td>
											<td>{{ $ikm['responden']->jumlah }}</td>
										</tr>
										<tr>
											<td>Jenis Kelamin</td>
											<td>:</td>
											<td>Laki-laki = {{ $ikm['responden']->laki }}</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td>Perempuan = {{ $ikm['responden']->perempuan }}</td>
										</tr>
										<tr>
											<td>Pendidikan</td>
											<td>:</td>
											<td>SD = {{ $ikm['responden']->sd }}</td>
										</tr>
                    <tr>
											<td></td>
											<td>:</td>
											<td>SMP = {{ $ikm['responden']->smp }}</td>
										</tr>
                    <tr>
											<td></td>
											<td>:</td>
											<td>SMA = {{ $ikm['responden']->sma }}</td>
										</tr>
                    <tr>
											<td></td>
											<td>:</td>
											<td>SMK = {{ $ikm['responden']->smk }}</td>
										</tr>
                    <tr>
											<td></td>
											<td>:</td>
											<td>S1 = {{ $ikm['responden']->s1 }}</td>
										</tr>
                    <tr>
											<td></td>
											<td>:</td>
											<td>S2 = {{ $ikm['responden']->s2 }}</td>
										</tr>
                    <tr>
											<td></td>
											<td>:</td>
											<td>S3 = {{ $ikm['responden']->s3 }}</td> 
										</tr>
                    <tr>
											<td>Periode Survey</td>
											<td>:</td>
											<td>2022</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>

</html>
