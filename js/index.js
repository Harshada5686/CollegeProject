const featured_books =[
    {
        book_id:1,
        book_name:'Comics',
        book_image:'../images/Book (1).png',
        book_price:300,
        book_category:'Comics'
    },
    {
        book_id:2,
        book_name:'Biographies',
        book_image:'../images/Book (1).png',
        book_price:50,
        book_category:'Biographies'
    },
    {
        book_id:3,
        book_name:'Adventure',
        book_image:'../images/Book (1).png',
        book_price:100,
        book_category:'Adventure'
    },
    {
        book_id:4,
        book_name:'Horror',
        book_image:'../images/Book (1).png',
        book_price:350,
        book_category:'Horror'
    },
];

const postContainer = document.querySelector('.card-container');

postMethods(featured_books);

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
        <h3 class="card-heading">${postData.title}</h3>
        <p class="card-body"> ${postData.description}</p>
        <p class="card-body">${postData.price}</p>
        
        `
        postContainer.appendChild(postElement)
    })
}
