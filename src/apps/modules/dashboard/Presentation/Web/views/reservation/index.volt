{% extends "layouts/base.volt" %}

{% block content %}
	<h1>Reservation List</h1>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Customer Name</th>
				<th scope="col">Customer Email</th>
				{# <th scope="col">Ticket Category</th>
												<th scope="col">Ticket Amount</th> #}
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			{% for reservation in reservations %}
				<tr>
					<th scope="row">{{ loop.index }}</th>
					{# <th scope="row">1</th> #}
					<td>{{ reservation.customer_name }}</td>
					{# <td>nama</td> #}
					<td>{{ reservation.customer_email }}</td>
					{# <td>email</td> #}
					{# <td>{{ reservation.ticket_category }}</td> #}
					{# <td>kategori tiket</td> #}
					{# <td>{{ reservation.ticket_amount }}</td> #}
					{# <td>jumlah tiket</td> #}
						<td>
							<div class="row"> {% if reservation.status == "PENDING" %}
								<div class="col-md">
									<form method="POST" action="{{ url( "/reservation/verify") }}">
										<input type="hidden" name="id" value="{{ reservation.id }}">
										<input type="submit" class="btn btn-success w-100" value="Verify">
									</form>
								</div>
								<div class="col-md">
									<form method="POST" action="{{ url( "/reservation/cancel") }}">
										<input type="hidden" name="id" value="{{ reservation.id }}">
										<input type="submit" class="btn btn-danger w-100" value="Cancel">
									</form>
								</div>
							{% else %}
								Approved by<br>
								{{ reservation.id_committee }}
							{% endif %}
						</div>
					</td>
				</tr>
			{% endfor %}
		</tbody>
	</table>
{% endblock %}
