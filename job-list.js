document.addEventListener("DOMContentLoaded", () => {
  const jobContainer = document.getElementById("jTabs");

  if (!jobContainer) {
    console.warn("Element with id 'jTabs' not found.");
    return;
  }

  fetch("jobs_api.php")
    .then((response) => {
      if (!response.ok) throw new Error("Failed to fetch job data");
      return response.json();
    })
    .then((jobs) => {
      if (!Array.isArray(jobs) || !jobs.length) {
        jobContainer.innerHTML = "<p>No job listings found.</p>";
        return;
      }

      jobs.forEach(({ job_id, title, experience, location }) => {
        const jobCard = document.createElement("div");
        jobCard.className = "job-card";
        jobCard.style.cursor = "pointer";
        jobCard.innerHTML = `
          <div class="job-box">
            <h3>${title}</h3>
            <p>${experience}</p>
            <p>${location}</p>
          </div>
        `;

        jobCard.addEventListener("click", () => {
          window.location.href = `job-details.html?id=${job_id}`;
        });

        jobContainer.appendChild(jobCard);
      });
    })
    .catch((error) => {
      console.error("Error loading jobs:", error);
      jobContainer.innerHTML =
        "<p>Error loading jobs. Please try again later.</p>";
    });
});
