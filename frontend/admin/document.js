/**@format */
window.onload = async () => {
  if (sessionStorage.getItem("login") != "true") {
    window.location.href = "index.html";
  }
  await renderPage();
};

let stateBtn = "them";
let idUpdate = null;

const resetInput = () => {
  document.getElementById("tieude").value = "";
  CKEDITOR.instances.mota.setData("");
  document.getElementById("link").value = "";
  document.getElementById("btn-submit").innerHTML = "Thêm";

  stateBtn = "them";
};

const renderPage = async () => {
  documents = await getAllDocument();

  let row = document.getElementById("row");
  let html = "";

  documents.reverse().map((v, i) => {
    html += `
			<tr>
				<td>${i + 1}</td>
				<td>${v.documentTitle}</td>
				<td>
					<a href="${v.documentLink}" target="_blank">${v.documentLink}</a>
				</td>
				<td>${v.createdDate}</td>
				<td>${v.updatedDate}</td>
				<td>
					<button class="btn btn-danger btn-sm" onclick="deleteDocument(${
            v.documentID
          })">Xóa</button>  
					<button class="btn btn-warning btn-sm" onclick="renderUpdate(${
            v.documentID
          })">Chỉnh sửa</button>
				</td>
			</tr>`;
  });
  row.innerHTML = html;
};

const getAllDocument = async () => {
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

const renderUpdate = async (id) => {
  let url = `http://localhost/teacher-website-midterm-tdtu/api/routes/document.route.php?id=${id}`;
  let option = {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  };
  let response = await fetch(url, option);
  let data = await response.json();
  document.getElementById("tieude").value = data.data.documentTitle;
  CKEDITOR.instances.mota.setData(data.data.documentDesc);
  document.getElementById("link").value = data.data.documentLink;

  document.getElementById("btn-submit").innerHTML = "Sửa";
  stateBtn = "sua";
  idUpdate = id;
};

const addAndEditDocument = async (id) => {
  if (stateBtn === "them") {
    let url =
      "http://localhost/teacher-website-midterm-tdtu/api/routes/document.route.php";
    let body = {
      title: document.getElementById("tieude").value,
      desc: CKEDITOR.instances.mota.getData(),
      link: document.getElementById("link").value,
    };
    let option = {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(body),
    };

    let response = await fetch(url, option);
    await renderPage();
    resetInput();
  } else {
    let url =
      "http://localhost/teacher-website-midterm-tdtu/api/routes/document.route.php";
    let body = {
      id: idUpdate,
      title: document.getElementById("tieude").value,
      desc: CKEDITOR.instances.mota.getData(),
      link: document.getElementById("link").value,
    };
    let option = {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(body),
    };

    let response = await fetch(url, option);
    console.log("check");
    await renderPage();
    resetInput();
  }
};

const deleteDocument = async (id) => {
  if (confirm("Do you want delete it?")) {
    let url =
      "http://localhost/teacher-website-midterm-tdtu/api/routes/document.route.php";
    let option = {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        id,
      }),
    };

    let response = await fetch(url, option);
    await renderPage();
  }
};
