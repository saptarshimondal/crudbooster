# Artisan Command
There are some CRUDBooster artisan command: 

<table>
	<tr>
		<th>Command</th>
		<th>Description</th>
	</tr>
	<tr>
		<td><pre>crudbooster:make {--module=ALL}</pre></td>
		<td>Create a module from table. The default is ALL, means will create all tables</td>
	</tr>
	<tr>
		<td><pre>crudbooster:seed {--generate}</pre></td>
		<td>If <tt>--generate</tt> command included it means generate all tables else extract the seed data</td>
	</tr>
	<tr>
		<td><pre>crudbooster:developer {--username=?}</pre></td>
		<td>Create a developer access. You can set the parameter --username if you wish to set your own username. Or you want to generate a random username, do not include the --username</td>
	</tr>
</table>