var CREATE   = 'CREATE'
var READ_ALL = 'READ_ALL'
var DELETE 	 = 'DELETE'
var UPDATE 	 = 'UPDATE'
var READ 	 = 'READ'

var URL_CREATE 	 = 'http://localhost/CRUD_SP/index.php/user/create_user'
var URL_READ_ALL = 'http://localhost/CRUD_SP/index.php/user/get_user'
var URL_DELETE 	 = 'http://localhost/CRUD_SP/index.php/user/delete_user'
var URL_UPDATE 	 = 'http://localhost/CRUD_SP/index.php/user/update_user'
		
var global_user = {
		id : '',
		name : '',
		email : ''
	}


$(document).ready(function() {
	global_user.clear
	call_ajax(READ_ALL,global_user);

});

function add_user() {

	clear_global_user()
	global_user.name  = document.getElementById("user-name").value
	global_user.email = document.getElementById("user-email").value
	
	call_ajax(CREATE,global_user);
}

//Editing user
function edit_user(id_user) {

	clear_global_user()
	global_user.id = id_user
	call_ajax(READ,global_user)
	
}

//Updating user
function update_user() {
	
	clear_global_user()
	global_user.id 	  = document.getElementById("user-id").value
	global_user.name  = document.getElementById("user-name").value
	global_user.email = document.getElementById("user-email").value
		
	call_ajax(UPDATE,global_user);
	
}

// deleting user
function delete_user(id_user) {

	clear_global_user()
	global_user.id = id_user
	
	call_ajax(DELETE,global_user)
}

function call_ajax(operation, data_input) {
	/*
	 * $.ajax({ //data : parametros, url :
	 * favor..."); }, success : function(response) {
	 * //$("#resultado").html(response); alert(response);
	 * //alert(response['user']); //users = response; //alert(users.user); } });
	 */
	var url_operation

	switch (operation) {
	case CREATE:
		url_operation = URL_CREATE
		break;
	case READ_ALL:
		url_operation = URL_READ_ALL
		break;
	case READ:
		url_operation = URL_READ_ALL
		break;
	case DELETE:
		url_operation = URL_DELETE
		break;
	case UPDATE:
		url_operation = URL_UPDATE
		break;

	default:
		break;
	}

	$.ajax({
		dataType : 'json',
		url : url_operation,
		data : data_input
	 // data : { name : 'xd', email : 'xd.xmom' }
	
	}).done(function(data) {
		// alert(data.user);
		console.log(data)
		
		clear_global_user()
		switch (operation) {
		case CREATE:
			alert(data.status)
			call_ajax(READ_ALL,global_user)
			break
		case READ_ALL:
			display_users(data.user)
			break
		case DELETE:
			alert(data.status)
			call_ajax(READ_ALL,global_user)
			break;
		case READ:
			display_user(data.user)
			break
		case UPDATE:
			alert(data.status)
			call_ajax(READ_ALL,global_user)
			break
		default:
			break
		}
	});

}

function display_users(user) {
	
	//codigo para el boton cambie de nombre a SAVE
	var crbtn = document.createElement("button")
	crbtn.innerHTML = "Save";
	crbtn.setAttribute("onclick", "add_user()")
	crbtn.setAttribute("class", "btn btn-sm btn-success")
	document.getElementById("saveupdate").innerHTML = ""
	document.getElementById("saveupdate").appendChild(crbtn);
	
	// codigo para cargar los valores
	document.getElementById("form-list-user-body").innerHTML = "";

	for (i = 0; i < user.length; i++) {

		var myTr = document.createElement("tr")

		for (user_field in user[i]) {

			var mytd = document.createElement("td")
			mytd.innerHTML = user[i][user_field]
			myTr.appendChild(mytd)

		}
		var actionTd = document.createElement("td")
		
		var editBtn = document.createElement("button")
		editBtn.innerHTML = "Edit"
		editBtn.setAttribute("class", "btn btn-sm btn-primary")
		editBtn.setAttribute("onclick", "edit_user(" + user[i]['id'] + ")")

		var deletebtn = document.createElement("button")
		deletebtn.innerHTML = "Delete"
		deletebtn.setAttribute("class", "btn btn-sm btn-danger")
		deletebtn.setAttribute("onclick", "delete_user(" + user[i]['id'] + ")")

		actionTd.appendChild(editBtn)
		actionTd.appendChild(deletebtn)
		myTr.appendChild(actionTd)
		
		document.getElementById("form-list-user-body").appendChild(myTr)
	}
	
	document.getElementById("user-id").value = "";
	document.getElementById("user-name").value = "";
	document.getElementById("user-email").value = ""

}

function display_user(user) {
	
	var updatebtn = document.createElement("button")
	updatebtn.innerHTML = "Update";
	updatebtn.setAttribute("class", "btn btn-sm btn-success")
	updatebtn.setAttribute("onclick", "update_user()")

	document.getElementById("saveupdate").innerHTML = ""
	document.getElementById("saveupdate").appendChild(updatebtn)
	document.getElementById("user-id").value = user[0]['id']
	document.getElementById("user-name").value = user[0]['name']
	document.getElementById("user-email").value = user[0]['email']
				
}



function clear_global_user() {
	
	global_user.id	  = ''
	global_user.name  = ''
	global_user.email = ''
}

/*
 * function call_ajax() {
 * 
 * $.ajax({ data : parametros, url : 'ejemplo_ajax_proceso.php', type : 'post',
 * beforeSend : function() { $("#resultado").html("Procesando, espere por
 * favor..."); }, success : function(response) { $("#resultado").html(response); }
 * }); }
 */
