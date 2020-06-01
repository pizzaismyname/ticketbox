<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta
		name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>TicketBox</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	</head>

	<body>
		<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="/">
					TicketBox
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						{% if session.has('committee_info') %}
							<li>
								<a class="nav-link" href="/committee/index">
									Manage Committees
								</a>
							</li>
							<li>
								<a class="nav-link" href="/ticketcategory/index">
									Manage Ticket Categories
								</a>
							</li>
							<li>
								<a class="nav-link" href="/reservation/index">
									Manage Reservations
								</a>
							</li>
						{% endif %}
					</ul>
					<ul class="navbar-nav ml-auto">
						{% if session.has('committee_info') %}
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									{{ committee_info.username }}
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="/logout">Logout</a>
								</div>
							</li>
						{% else %}
							<a class="btn btn-outline-light" href="/reservation/create">
								Reserve Now!
							</a>
						{% endif %}
					</ul>
				</div>
			</div>
		</nav>
		<div class="container"> {% block content %}{% endblock %}
			</div>
			<!-- jQuery first, then Popper.js, and then Bootstrap's JavaScript -->
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		</body>

	</html>
