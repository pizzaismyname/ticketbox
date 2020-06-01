{% extends "layouts/base.volt" %}

{% block content %}
	<h1>Edit Ticket Category</h1>
	<form method="POST" action="/ticketcategory/edit/{{ ticket_category.id }}">
		<div class="form-group">
			<input type="text" class="form-control" name="type" value="{{ ticket_category.type }}" placeholder="Type">
		</div>
		<div class="form-group">
			<input type="number" class="form-control" name="price" value="{{ ticket_category.price }}" placeholder="Price">
		</div>
		<div class="form-group">
			<input type="number" class="form-control" name="total_amount" value="{{ ticket_category.total_amount }}" placeholder="Total Amount">
		</div>
        <input type="hidden" name="id" value="{{ ticket_category.id }}">
		<input type="submit" class="btn btn-primary" value="Save">
	</form>
{% endblock %}
