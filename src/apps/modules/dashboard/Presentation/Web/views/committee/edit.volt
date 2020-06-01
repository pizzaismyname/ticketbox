{% extends "layouts/base.volt" %}

{% block content %}
	<h1>Edit Committee</h1>
	<form method="POST" action="/committee/edit/{{ committee.id }}">
		<div class="form-group">
			<input type="text" class="form-control" name="username" value="{{ committee.username }}" placeholder="username">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="password" placeholder="password">
		</div>
        <input type="hidden" name="id" value="{{ committee.id }}">
		<input type="submit" class="btn btn-primary" value="Save">
	</form>
{% endblock %}
