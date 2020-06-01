{% extends "layouts/base.volt" %}

{% block content %}
	{% if session.has('committee_info') %}
		Hello,
		{{ committee_info.username }}
	{% else %}
		<br>
		<a class="btn btn-outline-dark" href="/reservation/create">
			Reserve Ticket
		</a>
	{% endif %}
{% endblock %}
