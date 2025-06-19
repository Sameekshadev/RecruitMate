// jobSearch.js
let allJobs = [];

function displayItems(items) {
  const rootElement = document.getElementById("jTabs");
  rootElement.innerHTML = "";

  items.forEach((item) => {
    const { job_id, title, experience, location, company_name } = item;
    const jList = document.createElement("div");
    jList.className = "jLists";
    jList.innerHTML = `
  <div class="job-box">
    
      <h3>${title}</h3>
      <p>${experience}</p>
      <p>${location}</p>
  </div>
`;

    jList.addEventListener("click", () => {
      window.location.href = `job-details.html?id=${job_id}`;
    });
    rootElement.appendChild(jList);
  });
}

document.addEventListener("DOMContentLoaded", () => {
  fetch("jobs_api.php")
    .then((res) => res.json())
    .then((data) => {
      allJobs = data;
      displayItems(allJobs);
    });

  document.getElementById("searchBar").addEventListener("keyup", (e) => {
    const searchData = e.target.value.toLowerCase();
    const filterData = allJobs.filter((item) =>
      item.title.toLowerCase().includes(searchData)
    );
    displayItems(filterData);
  });
});
