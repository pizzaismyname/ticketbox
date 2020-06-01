{% extends "layouts/base.volt" %}

{% block content %}
	<h1>Ticket Category List</h1>
	<a href="{{ url("/ticketcategory/create") }}" class="btn btn-success">Create Ticket Category</a>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Type</th>
				<th scope="col">Price</th>
				<th scope="col">Total Amount</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			{% for ticket_category in ticket_categories %}
				<tr>
					<th scope="row">{{ loop.index }}</th>
					<td>{{ ticket_category.type }}</td>
					<td>{{ ticket_category.price }}</td>
					<td>{{ ticket_category.total_amount }}</td>
					<td>
						<div class="row">
							<div class="col-md">
								<a href="/ticketcategory/edit/{{ ticket_category.id }}" class="btn btn-warning w-100">Edit</a>
							</div>
							<div class="col-md">
								<form method="POST" action="{{ url( "/ticketcategory/delete") }}">
									<input type="hidden" name="id" value="{{ ticket_category.id }}">
									<input type="submit" class="btn btn-danger w-100" value="Delete">
								</form>
							</div>
						</div>
					</td>
				</tr>
			{% endfor %}
		</tbody>
	</table>
{% endblock %}
