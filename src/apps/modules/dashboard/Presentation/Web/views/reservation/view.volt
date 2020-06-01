{% extends "layouts/base.volt" %}

{% block content %}
	<h1>View Ticket</h1>
	<div class="row">
		<div class="col-md">
			<div class="card text-white bg-dark mb-3">
				<div class="card-body">
					<form method="POST" action="{{ url( "/reservation/view") }}">
						<div class="form-group">
							<input type="text" class="form-control" name="id" placeholder="Enter your reservation code here">
						</div>
						<input type="submit" class="btn btn-info" value="View">
					</form>
					<footer class="blockquote-footer">

						{% if tickets is defined %}
							{% for ticket in tickets %}
								<div class="alert alert-info" role="alert">
									{{ ticket.ticket_code }}
								</div>
							{% endfor %}
						{% endif %}

						{% if flashSession.has('error') or flashSession.has('success') or flashSession.has('notice') or flashSession.has('warning') %}
							{{ flashSession.output() }}
						{% endif %}
					</footer>
				</div>
			</div>
		</div>
	</div>
{% endblock %}
