let storeData = [];
const getBooksData = () => {

    fetch('https://fake-book-store-api.onrender.com/api/books')
        .then(res => res.json())
        .then(json => {
            // Store the API response in the variable
            storeData = json;

            console.log(json)
            postMethods(storeData);
        });
}

const postContainer = document.querySelector('.card-container');

const postMethods = (data) => {
    data.map((postData) => {
        console.log(postData);
        const postElement = document.createElement('div');
        postElement.classList.add('card');
        postElement.classList.add('card-body');

        postElement.innerHTML = ` 
        <img src=${postData.image}
        alt="no image from this url"
        style="width: 100%;height: 200px;object-fit: cover;">
        <h3 class="card-heading">${postData.name}</h3>
        <p class="card-body">Language: ${postData.language}</p>
        <p class="card-body"> ${postData.description.substring(0,30)} <span class="badge bg-secondary">Read more</span></p>
        <p class="card-body">${postData.number_of_pages} Pages</p>
        <p class="card-body">₹${postData.price}</p>
        `
        postContainer.appendChild(postElement)
    })
}
getBooksData();
