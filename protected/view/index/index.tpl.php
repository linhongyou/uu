<table border="1" >
<tr><th>ID</th><th>Name</th><th>Code</th></tr>
<?php foreach ($userlist as $u):?>
<tr><td><?=$u->id; ?></td><td><?=$u->username; ?></td><td><?=$u->password; ?></td></tr>
<?php endforeach;?>
</table>
<?php echo phpinfo();?>