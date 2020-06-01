{% extends "layouts/base.volt" %}

{% block content %}
	<h1>Create Ticket Category</h1>
	<form method="POST" action="/ticketcategory/create">
		<div class="form-group">
			<input type="text" class="form-control" name="type" placeholder="Type">
		</div>
		<div class="form-group">
			<input type="number" class="form-control" name="price" placeholder="Price">
		</div>
		<div class="form-group">
			<input type="number" class="form-control" name="total_amount" placeholder="Total Amount">
		</div>
		<input type="submit" class="btn btn-primary" value="Save">
	</form>
{% endblock %}
