
const postContainer = document.querySelector('.card-container');

// Function to handle button click

fetch('https://api.itbook.store/1.0/search/mongodb')
    .then(res => res.json())
    .then(json => {
        // Store the API response in the variable
        data = json.books;

        console.log('HI', json)
        postMethods(data);
    });

const postMethods = (data) => {
    data.map((postData) => {
        console.log(postData)
        const postElement = document.createElement('div');
        postElement.classList.add('card');
        postElement.innerHTML = `
        <img src=${postData.image}
        alt="no image from this url"
        style="width: 100%;height: 200px;object-fit: cover;"
        >
        <h3 class="card-heading">${postData.title.substring(0, 20)}..</h3>
        <p class="card-text">${postData.price}</p>
        `
        postContainer.appendChild(postElement)
    })
}
