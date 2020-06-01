{% extends "layouts/base.volt" %}

{% block content %}
	{% if session.has('committee_info') %}
		<br>
		<div>
			Hello, COBA
			{{ committee_info.username }}
		</div>
		<br>
		<div>
			<a class="btn btn-outline-dark" href="/committee/index">
				Manage Committees
			</a>
		</div>
		<br>
		<div>
			<a class="btn btn-outline-dark" href="/ticketcategory/index">
				Manage Ticket Categories
			</a>
		</div>
		<br>
		<div>
			<a class="btn btn-outline-dark" href="/reservation/index">
				Manage Reservations
			</a>
		</div>
	{% else %}
		<br>
		<div>
			<a class="btn btn-outline-dark" href="/reservation/create">
				Reserve Ticket
			</a>
		</div>
		<br>
		<div>
			<a class="btn btn-outline-dark" href="/reservation/view">
				View Ticket
			</a>
		</div>
	{% endif %}
{% endblock %}
