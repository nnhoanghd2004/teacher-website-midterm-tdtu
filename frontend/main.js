/** @format */

window.onload = async () => {
  await renderPage();
};

const getAllNews = async () => {
  let url =
    "http://localhost/teacher-website-midterm-tdtu/api/routes/news.route.php";
  let option = {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  };
  let response = await fetch(url, option);
  let data = await response.json();
  return data.data;
};

const getAllCourses = async () => {
  let url =
    "http://localhost/teacher-website-midterm-tdtu/api/routes/course.route.php";
  let option = {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  };
  let response = await fetch(url, option);
  let data = await response.json();
  return data.data;
};

const getAllDocuments = async () => {
  let url =
    "http://localhost/teacher-website-midterm-tdtu/api/routes/document.route.php";
  let option = {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  };
  let response = await fetch(url, option);
  let data = await response.json();
  return data.data;
};

const getAllNotifications = async () => {
  let url =
    "http://localhost/teacher-website-midterm-tdtu/api/routes/notification.route.php";
  let option = {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  };
  let response = await fetch(url, option);
  let data = await response.json();
  return data.data;
};

const getAllJobs = async () => {
  let url =
    "http://localhost/teacher-website-midterm-tdtu/api/routes/job.route.php";
  let option = {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  };
  let response = await fetch(url, option);
  let data = await response.json();
  return data.data;
};
const renderPage = async () => {
  renderNews();
  renderNotifications();
  renderDocuments();
  renderJobs();
  renderCourses();
};

const renderNews = async () => {
  let newsHTML = document.getElementById("news");
  let news = await getAllNews();
  let html = "";

  news.reverse().map((v, i) => {
    if (i < 3) {
      createdDate = v.createdDate.slice(0, 10).split("-").reverse().join("/");
      html += `
            <div class="col-4">
                <img
                    src="img/news.jpg"
                    class="img-fluid"
                    alt="demo"
                />
                <h5 class="card-title mt-2">${v.newsTitle}</h5>
                <div class="content mt-1 text-truncate">
                    ${v.newsDesc}
                    <div class="publish-date">
                        <span>${createdDate}</span>
                    </div>
                </div>
            </div>
        `;
    }
  });

  newsHTML.innerHTML = html;
};

const renderNotifications = async () => {
  let notificationsHTML = document.getElementById("notifications");
  let notifications = await getAllNotifications();
  let html = "";

  notifications.reverse().map((v, i) => {
    if (i < 3) {
      createdDate = v.createdDate.slice(0, 10).split("-").reverse().join("/");
      html += `
            <div class="col-4">
            <img
            src="img/notification.jpg"
            class="img-fluid"
            alt="demo"
            />
            <h5 class="card-title mt-2">${v.notificationTitle}</h5>
            <div class="content mt-1 text-truncate">
            ${v.notificationDesc}
            <div class="publish-date">
            <span>${createdDate}</span>
            </div>
            </div>
            </div>
            `;
    }
  });

  notificationsHTML.innerHTML = html;
};

const renderDocuments = async () => {
  let documentsHTML = document.getElementById("documents");
  let documents = await getAllDocuments();
  let html = "";

  documents.reverse().map((v, i) => {
    if (i < 3) {
      createdDate = v.createdDate.slice(0, 10).split("-").reverse().join("/");
      html += `
            <div class="col-4">
                <img
                    src="img/document.jpg"
                    class="img-fluid"
                    alt="demo"
                />
                <h5 class="card-title mt-2">${v.documentTitle}</h5>
                <div class="content mt-1 text-truncate">
					<div>
						${v.documentDesc}
					</div>
					<p class="card-text">
						<a href="${v.documentLink}" target="_blank">Liên kết</a>
					</p>
                    <div class="publish-date">
                        <span>${createdDate}</span>
                    </div>
                </div>
            </div>
            `;
    }
  });

  documentsHTML.innerHTML = html;
};

const renderJobs = async () => {
  let jobsHTML = document.getElementById("jobs");
  let jobs = await getAllJobs();
  let html = "";

  jobs.reverse().map((v, i) => {
    if (i < 3) {
      createdDate = v.createdDate.slice(0, 10).split("-").reverse().join("/");
      html += `
            <div class="col-4">
                <img
                    src="img/job.jpg"
                    class="img-fluid"
                    alt="demo"
                />
                <h5 class="card-title mt-2">${v.jobTitle}</h5>
                <div class="content mt-1 text-truncate">
                    ${v.jobDesc}
                    <div class="publish-date">
                        <span>${createdDate}</span>
                    </div>
                </div>
            </div>
            `;
    }
  });

  jobsHTML.innerHTML = html;
};

const renderCourses = async () => {
  let coursesHTML = document.getElementById("courses");
  let courses = await getAllCourses();
  let html = "";

  courses.reverse().map((v, i) => {
    if (i < 3) {
      createdDate = v.createdDate.slice(0, 10).split("-").reverse().join("/");
      html += `
            <div class="mt-3">
				<i class="fa-solid fa-code"></i>
				<span class="link-course fw-bold   ">${v.courseTitle}</span>
                <div class="col-6 text-secondary">${createdDate}</div>

			</div>
            `;
    }
  });

  coursesHTML.innerHTML = html;
};
