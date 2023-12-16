function validarFormulario()
{
	var txtNombre 	= document.getElementById('nombre').value;
	var txtCorreo 	= document.getElementById('correo').value;
	var txtDesc 	= document.getElementById('descripcion').value;

	var bodyEmail = '';

	//Test campo obligatorio
	if(txtNombre == null || txtNombre.length == 0 || /^\s+$/.test(txtNombre))
	{
		alert('ERROR: The name field, cannot be empty or with blank spaces. Do not cheat !!!');
		return false;
	}
	else
	{
		bodyEmail+= 'Hi Sergio,%0D%0A%0D%0A';
	}

	//Test correo
	if(!(/\S+@\S+\.\S+/.test(txtCorreo)))
	{
		alert('ERROR: You must type a valid email');
		return false;
	}
	else
	{
		bodyEmail+= 'You have an email from ' + txtNombre + ' [ ' + txtCorreo + ' ]%0D%0A%0D%0A';
	}

	//Test campo obligatorio
	if(txtDesc == null || txtDesc.length == 0 || /^\s+$/.test(txtDesc))
	{
		alert('ERROR: The description field, cannot be empty or with blank spaces. Do not cheat !!!');
		return false;
	}
	else
	{
		bodyEmail+= txtDesc + '%0D%0A%0D%0A';
	}

	window.location.href = 'mailto:sergio@sergiojimenez.com?subject=[SergioJimenez] Contact form&body=' + bodyEmail;

	return false;
}