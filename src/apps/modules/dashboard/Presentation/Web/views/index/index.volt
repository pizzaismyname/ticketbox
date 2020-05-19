{% extends "layouts/base.volt" %}

{% block content %}
	{% if session.has('user_info') %}
		{{ user_info.username }}
		<div>
			<a class="btn btn-danger" href="/logout">Logout</a>
		</div>
	{% endif %}
{% endblock %}
