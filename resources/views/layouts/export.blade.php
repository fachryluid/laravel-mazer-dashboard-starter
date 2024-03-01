<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>@yield('title')</title>
		<style>
			table {
				border-collapse: collapse;
				width: 100%;
			}

			.header th,
			.header td {
				text-align: center;
				/* border: 1px solid black; */
			}

			.header tr td:first-child {
				width: 100px;
			}

			.header {
				text-align: left;
				border-bottom: 2px solid #dddddd;
				padding-bottom: 10px; 
			}

			.header img {
				width: 100px;
				height: auto;
				/* border: 1px solid black; */
			}

			.title {
				text-transform: uppercase;
				text-align: center;
			}

			.content th,
			.content td {
				border: 1px solid #dddddd;
				text-align: left;
				padding: 8px;
			}

			.content th {
				background-color: #f2f2f2;
			}
		</style>
	</head>

	<body>
		<div class="header">
			<table>
				<tr>
					<td>
						<img src="{{ isset($setting->report_logo) ? public_path('storage/uploads/settings/' . $setting->report_logo) : public_path('images/default/jejakode.png') }}" alt="Logo">
					</td>
					<td>
						{!! $setting->report_header !!}
					</td>
				</tr>
			</table>
		</div>
		<h5 class="title">@yield('title')</h5>
		<section class="content">
			@yield('content')
		</section>
	</body>

</html>
