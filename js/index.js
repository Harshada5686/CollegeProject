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

        
            <div class="card shadow-sm">
              <img src="../Images/Book (1).png" class="bd-placeholder-img card-img-top" width="100%" height="325" alt="nothing">
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
        
          </div>
          
        </div>
      </div>
        `
        postContainer.appendChild(postElement)
    })
}
getBooksData();
