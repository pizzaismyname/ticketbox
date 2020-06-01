{% extends "layouts/base.volt" %}

{% block content %}
	<h1>Committee List</h1>
	<a href="{{ url("/committee/create") }}" class="btn btn-success">Create Committee</a>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Username</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			{% for committee in committees %}
				<tr>
					<th scope="row">{{ loop.index }}</th>
					<td>{{ committee.username }}</td>
					<td>
						<div class="row">
							<div class="col-md">
								<a href="/committee/edit/{{ committee.id }}" class="btn btn-warning w-100">Edit</a>
							</div>
							<div class="col-md">
								<form method="POST" action="{{ url( "/committee/delete") }}">
									<input type="hidden" name="id" value="{{ committee.id }}">
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
