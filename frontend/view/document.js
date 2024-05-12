/** @format */
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

window.onload = async () => {
  await renderPage();
};

const renderPage = async () => {
  renderDocuments();
};

const renderDocuments = async () => {
  let documentsHTML = document.getElementById("documents");
  let documents = await getAllDocuments();
  let html = "";

  documents.reverse().map((v, i) => {
    if (i < 3) {
      createdDate = v.createdDate.slice(0, 10).split("-").reverse().join("/");
      html += `
            <div class="card mb-5">
				<div class="row g-0">
					<div class="col-md-4">
						<img
							src="../img/document.jpg"
							class="img-fluid rounded-start"
							alt="demo"
						/>
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h3 class="card-title">${v.documentTitle}</h3>
							<p class="card-text">
								${v.documentDesc}
							</p>
							<p class="card-text">
								Liên kết tài liệu: <a href="${v.documentLink}" target="_blank">${v.documentLink}</a>
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

  documentsHTML.innerHTML = html;
};
