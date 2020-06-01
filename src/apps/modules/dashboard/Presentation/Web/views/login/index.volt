{% extends "layouts/base.volt" %}

{% block content %}
	<h1>Committee Login</h1>
	<form method="POST" action="/login">
		<div class="form-group">
			<input type="text" class="form-control" name="username" placeholder="username">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="password" placeholder="password">
		</div>
		<input type="submit" class="btn btn-primary" value="Login">
	</form>
{% endblock %}
