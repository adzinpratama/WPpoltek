const inputs = document.querySelectorAll(".input");
const password = document.getElementById('password');
const toggle = document.getElementById('toggle');

function showHide() {
	if (password.type === 'password') {
		password.setAttribute('type', 'text');
		toggle.classList.add('hide');
		toggle.classList.remove('fa-eye-slash');
		toggle.classList.add('fa-eye');
	} else {
		password.setAttribute('type', 'password');
		toggle.classList.remove('hide');
		toggle.classList.remove('fa-eye');
		toggle.classList.add('fa-eye-slash');
	}
}

function addcl() {
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
	if(parent.classList.contains("two")){
		if(password.type === 'password'){
			toggle.classList.add('fa-eye');
		}else{
			toggle.classList.add('fa-eye-slash');
		}
	}
}

function remcl() {
	let parent = this.parentNode.parentNode;
	if (this.value == "") {
		parent.classList.remove("focus");
		if(parent.classList.contains("two")){
			toggle.classList.remove('fa-eye');
			toggle.classList.remove('fa-eye-slash');
		}
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});


