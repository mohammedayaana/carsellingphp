let detailData = JSON.parse(localStorage.getItem("detailCompany"));

function renderDetails() {
    let data = document.querySelector(".data");

    data.innerHTML = "";
    data.innerHTML = `
        <img src=${detailData.avatar} alt="">
        <p>${detailData.description}</p>
        <h2>${detailData.companyName}</h2>
        <p><i class="fa-solid fa-star"></i> ${detailData.rating}</p>
        <p>Kms Driven : ${detailData.experience}</p>
        <p>Contact : ${detailData.contact}</p>
        <p>Price : ${detailData.Salary}</p>
        <p>Type : ${detailData.location}</p>
        <p>Mileage : ${detailData.jobRole}</p>
    `
}
renderDetails();