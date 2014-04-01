{% if oUsers|Exists %}
<table class="table">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Lastlogin</th>
        </tr>
    </thead>
    <tbody>
        {% for oUser in oUsers %}
        <tr>
            <td>{{oUser.firstname}} {{oUser.lastname}}</td>
            <td>{{oUser.mail}}</td>
            <td></td>
            <td><span class="ui-timestamp" data-timestamp="{{oUser.lastlogin}}" data-format="Y:m:d"></span></td>
        </tr>
        {% endfor %}
    </tbody>
</table>
{% else %}
<div class="alert alert-danger fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4>{{tr['no_rights']}}</h4>
    <p>{{tr['check_permissions_with_administrator']}}</p>
    <p>
        <button type="button" class="btn btn-danger">
            <span class="glyphicon glyphicon-envelope"></span> {{tr['contact_administrator']}}
        </button>
        <button type="button" class="btn btn-default">{{tr['cancel']}}</button>
    </p>
</div>
{% endif %}
