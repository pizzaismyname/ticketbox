{% extends "layouts/base.volt" %}

{% block content %}
	<h1>Create Committee</h1>
	<form method="POST" action="/committee/create">
		<div class="form-group">
			<input type="text" class="form-control" name="username" placeholder="username">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="password" placeholder="password">
		</div>
		<input type="submit" class="btn btn-primary" value="Save">
	</form>
{% endblock %}
