/** @format */
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

window.onload = async () => {
  await renderPage();
};

const renderPage = async () => {
  renderJobs();
};

const renderJobs = async () => {
  let jobsHTML = document.getElementById("jobs");
  let jobs = await getAllJobs();
  let html = "";

  jobs.reverse().map((v, i) => {
    if (i < 3) {
      createdDate = v.createdDate.slice(0, 10).split("-").reverse().join("/");
      html += `
            <div class="card mb-5">
				<div class="row g-0">
					<div class="col-md-4">
						<img
							src="../img/job.jpg"
							class="img-fluid rounded-start"
							alt="demo"
						/>
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h3 class="card-title">${v.jobTitle}</h3>
							<p class="card-text">
								${v.jobDesc}
							</p>
							<p class="card-text">
								<small class="text-muted">${createdDate}</small>
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

  jobsHTML.innerHTML = html;
};
