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
	news = await getAllNew();

	let row = document.getElementById('row');
	let html = '';

	news.reverse().map((v, i) => {
		html += `
			<tr>
				<td>${i + 1}</td>
				<td>${v.newsTitle}</td>
				<td>${v.createdDate}</td>
				<td>${v.updatedDate}</td>
				<td>
					<button class="btn btn-danger btn-sm" onclick="deleteNew(${v.newsID})">Xóa</button>
					<button class="btn btn-warning btn-sm" onclick="renderUpdate(${v.newsID})">Chỉnh sửa</button>
				</td>
			</tr>`;
	});
	row.innerHTML = html;
};

const getAllNew = async () => {
	let url = 'http://localhost/teacher-website-midterm-tdtu/api/routes/news.route.php';
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
	let url = `http://localhost/teacher-website-midterm-tdtu/api/routes/news.route.php?id=${id}`;
	let option = {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json',
		},
	};
	let response = await fetch(url, option);
	let data = await response.json();
	document.getElementById('tieude').value = data.data.newsTitle;
	document.getElementById('mota').value = data.data.newsDesc;

	document.getElementById('btn-submit').innerHTML = 'Sửa';
	stateBtn = 'sua';
	idUpdate = id;
};

const addAndEditNew = async (id) => {
	if (stateBtn == 'them') {
		let url = 'http://localhost/teacher-website-midterm-tdtu/api/routes/news.route.php';
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
		let url = 'http://localhost/teacher-website-midterm-tdtu/api/routes/news.route.php';
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

const deleteNew = async (id) => {
	if (confirm('Do you want delete it?')) {
		let url = 'http://localhost/teacher-website-midterm-tdtu/api/routes/news.route.php';
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
