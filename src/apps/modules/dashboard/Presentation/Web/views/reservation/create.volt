{% extends "layouts/base.volt" %}

{% block content %}
	<h1>Reserve Ticket</h1>
	<form method="POST" action="/reservation/create">
		<div class="form-group">
			<input type="text" class="form-control" name="customer_name" placeholder="Name">
		</div>
		<div class="form-group">
			<input type="email" class="form-control" name="customer_email" placeholder="Email">
		</div>
		<div class="form-group">
			<select name="ticket_category_id" class="form-control">
				<option value="0">Ticket Category</option>
				{% for ticket_category in ticket_categories %}
					<option value="{{ ticket_category.id }}">
						{{ ticket_category.type }}
						|
						{{ ticket_category.price }}
						|
						{{ ticket_category.total_amount }}
					</option>
				{% endfor %}
			</select>
		</div>
		<div class="form-group">
			<input type="number" class="form-control" name="ticket_amount" placeholder="Ticket Amount">
		</div>
		<input type="submit" class="btn btn-primary" value="Reserve">
	</form>
	<footer class="blockquote-footer">
		{% if flashSession.has('error') or flashSession.has('success') or flashSession.has('notice') or flashSession.has('warning') %}
			{{ flashSession.output() }}
		{% endif %}
	</footer>
{% endblock %}
