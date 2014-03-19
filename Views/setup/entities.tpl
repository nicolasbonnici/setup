{% if aDatabaseEntitiesClass|Exists %}
	{% for sEntityClass in aDatabaseEntitiesClass %}
	<code class="pre-scrollable">
		{{sEntityClass}}	
	</code>
	<br />
	{% endfor %}
{% else %}
	<div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>{{tr['no_rights']}}</h4>
        <p>{{tr['check_permissions_with_administrator']}}</p>
        <p>
          <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-envelope"></span> {{tr['contact_administrator']}}</button>
          <button type="button" class="btn btn-default">{{tr['cancel']}}</button>
        </p>
    </div>
{% endif %}
