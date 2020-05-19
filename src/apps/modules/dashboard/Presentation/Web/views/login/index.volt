{% extends "layouts/base.volt" %}

{% block content %}
	<h1>Panitia Login Page</h1>
	<form method="POST" action="/login">
		<div class="form-group">
			<input type="username" class="form-control" name="username" placeholder="username">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="password" placeholder="password">
		</div>
		<input type="submit" class="btn btn-primary" value="Login">
	</form>
{% endblock %}
