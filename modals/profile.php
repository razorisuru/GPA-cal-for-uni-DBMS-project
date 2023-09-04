<div class="container">
	<table class="table" id="kk">
		<tr>
			<td>Full Name </td>
			<td><?php echo $_SESSION['name'] ?></td>
		</tr>
		<tr>
			<td>User Name </td>
			<td><?php echo $_SESSION['valid'] ?></td>
		</tr>
		<tr>
			<td>E-Mail </td>
			<td><?php echo $_SESSION['email'] ?></td>
		</tr>
		<tr>
			<td>Index </td>
			<td><?php echo $_SESSION['index'] ?></td>
		</tr>
	</table>
</div>