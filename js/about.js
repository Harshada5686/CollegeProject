let storeData = [];

const getBooksData = () => {

  fetch('https://fake-book-store-api.onrender.com/api/books?limit=4')
    .then(res => res.json())
    .then(json => {
      // Store the API response in the variable
      storeData = json;

      console.log(json)
      postMethods(storeData);
    });
}

const postContainer = document.querySelector('.container1');

const postMethods = (data) => {
  data.map((postData) => {
    console.log(postData);
    const postElement = document.createElement('div');

    postElement.innerHTML = ` 
        <div class="container">
        <div class="container">
            <div class="card shadow-sm" style="width:18rem;">
              <img src="${postData.image}" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="nothing">
              <div class="card-body">
                <h5 class="card-heading m-0">${postData.name.substring(0,10)}...</h5>
                <p class="card-text m-0">${postData.description.substring(0,40)}...</p>

                <p class="card-text m-0">Language: ${postData.language}</p>
                <p class="card-text ">₹${postData.price}</p>

                <button class="btn-primary">Order Today</button>

              </div>
          </div>
        </div>
      </div>
        `
    postContainer.appendChild(postElement)
  })
}
getBooksData();
