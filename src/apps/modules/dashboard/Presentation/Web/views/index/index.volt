{% extends "layouts/base.volt" %}

{% block content %}
	{% if session.has('committee_info') %}
		{{ committee_info.username }}
		<div>
			<a class="btn btn-danger" href="/logout">Logout</a>
		</div>
	{% endif %}
{% endblock %}
