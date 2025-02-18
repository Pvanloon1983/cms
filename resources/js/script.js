import './bootstrap';

document.addEventListener("DOMContentLoaded", function() {

	const menuToggle = document.querySelector('.menu-toggle');
	const rightSidebar = document.querySelector('#right-sidebar');
	const menuClose = document.querySelector('.close');
	const alertMessage = document.querySelector('.alert');
	const alertClose = document.querySelector('.alert .close');

	if (menuToggle && rightSidebar) {
			menuToggle.addEventListener('click', function() {
					rightSidebar.classList.toggle('toggle');
			});
	}

	if (menuClose && rightSidebar) {
			menuClose.addEventListener('click', function() {
					rightSidebar.classList.toggle('toggle');
			});
	}

	if (alertClose && alertMessage) {
			alertClose.addEventListener('click', function() {
					alertMessage.style.display = 'none';
			});
	}
	
});
