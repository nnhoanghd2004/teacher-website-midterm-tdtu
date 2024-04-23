/** @format */

window.onload = async () => {
	if (sessionStorage.getItem('login') != 'true') {
		window.location.href = 'index.html';
	}
	await renderPage();
};

let stateBtn = 'them';
let idUpdate = null;

const resetInput = () => {
	document.getElementById('tieude').value = '';
	document.getElementById('mota').value = '';
	document.getElementById('btn-submit').innerHTML = 'Thêm';

	stateBtn = 'them';
};

const renderPage = async () => {
	notifications = await getAllNotification();

	let row = document.getElementById('row');
	let html = '';

	notifications.reverse().map((v, i) => {
		html += `
			<tr>
				<td>${i + 1}</td>
				<td>${v.notificationTitle}</td>
				<td>
					<button class="btn btn-danger btn-sm" onclick="deleteNotification(${v.notificationID})">Xóa</button>
					<button class="btn btn-warning btn-sm" onclick="renderUpdate(${v.notificationID})">Chỉnh sửa</button>
				</td>
			</tr>`;
	});
	row.innerHTML = html;
};

const getAllNotification = async () => {
	let url = 'http://localhost/teacher-website-midterm-tdtu/api/routes/notification.route.php';
	let option = {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json',
		},
	};
	let response = await fetch(url, option);
	let data = await response.json();
	return data.data;
};

const renderUpdate = async (id) => {
	let url = `http://localhost/teacher-website-midterm-tdtu/api/routes/notification.route.php?id=${id}`;
	let option = {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json',
		},
	};
	let response = await fetch(url, option);
	let data = await response.json();
	document.getElementById('tieude').value = data.data.notificationTitle;
	document.getElementById('mota').value = data.data.notificationDesc;

	document.getElementById('btn-submit').innerHTML = 'Sửa';
	stateBtn = 'sua';
	idUpdate = id;
};

const addAndEditNotification = async (id) => {
	if (stateBtn == 'them') {
		let url = 'http://localhost/teacher-website-midterm-tdtu/api/routes/notification.route.php';
		let body = {
			id: idUpdate,
			title: document.getElementById('tieude').value,
			desc: document.getElementById('mota').value,
		};
		let option = {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
			},
			body: JSON.stringify(body),
		};

		let response = await fetch(url, option);
		await renderPage();
		resetInput();
	} else {
		let url = 'http://localhost/teacher-website-midterm-tdtu/api/routes/notification.route.php';
		let body = {
			id: idUpdate,
			title: document.getElementById('tieude').value,
			desc: document.getElementById('mota').value,
		};
		let option = {
			method: 'PUT',
			headers: {
				'Content-Type': 'application/json',
			},
			body: JSON.stringify(body),
		};

		let response = await fetch(url, option);
		console.log('check');
		await renderPage();
		resetInput();
	}
};

const deleteNotification = async (id) => {
	if (confirm('Do you want delete it?')) {
		let url = 'http://localhost/teacher-website-midterm-tdtu/api/routes/notification.route.php';
		let option = {
			method: 'DELETE',
			headers: {
				'Content-Type': 'application/json',
			},
			body: JSON.stringify({
				id,
			}),
		};

		let response = await fetch(url, option);
		await renderPage();
	}
};
