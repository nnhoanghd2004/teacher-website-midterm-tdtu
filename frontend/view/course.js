/** @format */
const getAllCourses = async () => {
	let url = 'http://localhost/teacher-website-midterm-tdtu/api/routes/course.route.php';
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

window.onload = async () => {
	await renderPage();
};

const renderPage = async () => {
	renderCourses();
};

const renderCourses = async () => {
	let coursesHTML = document.getElementById('courses');
	let courses = await getAllCourses();
	let html = '';

	courses.reverse().map((v, i) => {
		if (i < 3) {
			createdDate = v.createdDate.slice(0, 10).split('-').reverse().join('/');
			html += `
            <div class="card mb-5">
				<div class="row g-0">
					<div class="col-md-4">
						<img
							src="../img/demo-img.jpg"
							class="img-fluid rounded-start"
							alt="demo"
						/>
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h3 class="card-title">${v.courseTitle}</h3>
							<p class="card-text">
								${v.courseDesc}
							</p>
							<p class="card-text">
								<small class="text-muted">${createdDate}</small>
							</p>
                            <p class="card-text fw-bold">
								${v.coursePrice + ' vnd'}
							</p>
							<div class="more-info mt-3">
								<a href="#">CHI TIẾT >>></a>
							</div>
						</div>
					</div>
				</div>
			</div>
            `;
		}
	});

	coursesHTML.innerHTML = html;
};
